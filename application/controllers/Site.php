<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends Public_Controller {

    public function __construct() {

        parent::__construct();

        $this->check_installation();
        if ($this->config->item('installed') == true) {
            $this->db->reconnect();
        }


        $this->load->library('Auth');
        $this->load->library('Enc_lib');
        $this->load->library('mailer');
        $this->load->config('ci-blog');
        $this->mailer;
    }

    private function check_installation() {
        if ($this->uri->segment(1) !== 'install') {
            $this->load->config('migration');
            if ($this->config->item('installed') == false && $this->config->item('migration_enabled') == false) {
                redirect(base_url() . 'install/start');
            } else {
                if (is_dir(APPPATH . 'controllers/install')) {
                    echo '<h3>Delete the install folder from application/controllers/install</h3>';
                    die;
                }
            }
        }
    }

    function login() {
        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }
        $data = array();
        $data['title'] = 'Login';
        $school = $this->setting_model->get();
        $notice_content = $this->config->item('ci_front_notice_content');
        $notices = $this->cms_program_model->getByCategory($notice_content, array('start' => 0, 'limit' => 5));
        $data['notice'] = $notices;
        $data['school'] = $school[0];
        $this->form_validation->set_rules('username', $this->lang->line('username'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login', $data);
        } else {
            $login_post = array(
                'email' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $setting_result = $this->setting_model->get();
            $result = $this->staff_model->checkLogin($login_post);
            if ($result) {
                if ($result->is_active) {
                    $setting_result = $this->setting_model->get();
                    $session_data = array(
                        'id' => $result->id,
                        'username' => $result->name,
                        'email' => $result->email,
                        'roles' => $result->roles,
                        'date_format' => $setting_result[0]['date_format'],
                        'currency_symbol' => $setting_result[0]['currency_symbol'],
                        'start_month' => $setting_result[0]['start_month'],
                        'school_name' => $setting_result[0]['name'],
                        'timezone' => $setting_result[0]['timezone'],
                        'sch_name' => $setting_result[0]['name'],
                        'language' => array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']),
                        'is_rtl' => $setting_result[0]['is_rtl'],
                        'doctor_restriction' => $setting_result[0]['doctor_restriction'],
                        'superadmin_restriction' => $setting_result[0]['superadmin_restriction'],
                        'theme' => $setting_result[0]['theme'],
                    );
                    $this->session->set_userdata('hospitaladmin', $session_data);
                    $role = $this->customlib->getStaffRole();
                    $role_name = json_decode($role)->name;
                    $this->customlib->setUserLog($this->input->post('username'), $role_name);

                    if (isset($_SESSION['redirect_to']))
                        redirect($_SESSION['redirect_to']);
                    else
                        redirect('admin/admin/dashboard');
                }else {

                    $data['error_message'] = $this->lang->line('administrator_message');
                    $this->load->view('admin/login', $data);
                }
            } else {
                $data['error_message'] = $this->lang->line('invalid_message');
                $this->load->view('admin/login', $data);
            }
        }
    }

    function logout() {
        $admin_session = $this->session->userdata('hospitaladmin');
        $student_session = $this->session->userdata('patient');
        $agent_session = $this->session->userdata('agent');
        $this->auth->logout();
        if ($admin_session) {
            redirect('site/login');
        } else if ($student_session) {
            redirect('site/userlogin');
        } else if ($agent_session){
            redirect('site/agentlogin');
        }
    }

    function forgotpassword() {
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|valid_email|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/forgotpassword');
        } else {
            $email = $this->input->post('email');

            $result = $this->staff_model->getByEmail($email);

            if ($result && $result->email != "") {

                $verification_code = $this->enc_lib->encrypt(uniqid(mt_rand()));
                $update_record = array('id' => $result->id, 'verification_code' => $verification_code);
                $this->staff_model->add($update_record);
                $name = $result->name;

                $resetPassLink = site_url('admin/resetpassword') . "/" . $verification_code;

                $body = $this->forgotPasswordBody($name, $resetPassLink);
                $body_array = json_decode($body);

                if (!empty($this->mail_config)) {

                    $result_new = $this->mailer->send_mail($result->email, $body_array->subject, $body_array->body);
                }

                $this->session->set_flashdata('message', $this->lang->line('recover_message'));

                redirect('site/login', 'refresh');
            } else {
                $data = array(
                    'error_message' => $this->lang->line('invalid_email')
                );
            }
            $this->load->view('admin/forgotpassword', $data);
        }
    }

    //reset password - final step for forgotten password
    public function admin_resetpassword($verification_code = null) {
        if (!$verification_code) {
            show_404();
        }

        $user = $this->staff_model->getByVerificationCode($verification_code);

        if ($user) {
            //if the code is valid then display the password reset form
            $this->form_validation->set_rules('password', $this->lang->line('password'), 'required');
            $this->form_validation->set_rules('confirm_password', $this->lang->line('confirm_password'), 'required|matches[password]');
            if ($this->form_validation->run() == false) {


                $data['verification_code'] = $verification_code;
                //render
                $this->load->view('admin/admin_resetpassword', $data);
            } else {

                // finally change the password
                $password = $this->input->post('password');
                $update_record = array(
                    'id' => $user->id,
                    'password' => $this->enc_lib->passHashEnc($password),
                    'verification_code' => ""
                );

                $change = $this->staff_model->update($update_record);
                if ($change) {
                    //if the password was successfully changed
                    $this->session->set_flashdata('message', $this->lang->line('reset_message'));
                    redirect('site/login', 'refresh');
                } else {
                    $this->session->set_flashdata('message', $this->lang->line('worning_message'));
                    redirect('admin_resetpassword/' . $verification_code, 'refresh');
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->lang->line('invalid_link'));
            redirect("site/forgotpassword", 'refresh');
        }
    }

    //reset password - final step for forgotten password
    public function resetpassword($role = null, $verification_code = null) {
        if (!$role || !$verification_code) {
            show_404();
        }

        $user = $this->user_model->getUserByCodeUsertype($role, $verification_code);

        if ($user) {
            //if the code is valid then display the password reset form
            $this->form_validation->set_rules('password', $this->lang->line('password'), 'required');
            $this->form_validation->set_rules('confirm_password', $this->lang->line('confirm_password'), 'required|matches[password]');
            if ($this->form_validation->run() == false) {

                $data['role'] = $role;
                $data['verification_code'] = $verification_code;
                //render
                $this->load->view('resetpassword', $data);
            } else {

                // finally change the password

                $update_record = array(
                    'id' => $user->user_tbl_id,
                    'password' => $this->input->post('password'),
                    'verification_code' => ""
                );

                $change = $this->user_model->saveNewPass($update_record);
                if ($change) {
                    //if the password was successfully changed
                    $this->session->set_flashdata('message', $this->lang->line('reset_message'));
                    redirect('site/userlogin', 'refresh');
                } else {
                    $this->session->set_flashdata('message', $this->lang->line('worning_message'));
                    redirect('user/resetpassword/' . $role . '/' . $verification_code, 'refresh');
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->lang->line('invalid_link'));
            redirect("site/ufpassword", 'refresh');
        }
    }

    function ufpassword() {
        $this->form_validation->set_rules('username', $this->lang->line('email'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('user[]', $this->lang->line('user_type'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('ufpassword');
        } else {
            $email = $this->input->post('username');
            $usertype = $this->input->post('user[]');

            $result = $this->user_model->forgotPassword($usertype[0], $email);

            if ($result && $result->email != "") {

                $verification_code = $this->enc_lib->encrypt(uniqid(mt_rand()));
                $update_record = array('id' => $result->user_tbl_id, 'verification_code' => $verification_code);
                $this->user_model->updateVerCode($update_record);
                if ($usertype[0] == "student") {
                    $name = $result->firstname . " " . $result->lastname;
                } else {
                    $name = $result->name;
                }
                $resetPassLink = site_url('user/resetpassword') . '/' . $usertype[0] . "/" . $verification_code;

                $body = $this->forgotPasswordBody($name, $resetPassLink);
                $body_array = json_decode($body);

                if (!empty($this->mail_config)) {
                    $result = $this->mailer->send_mail($result->email, $body_array->subject, $body_array->body);
                }

                $this->session->set_flashdata('message', $this->lang->line('recover_message'));
                redirect('site/userlogin', 'refresh');
            } else {
                $data = array(
                    'error_message' => $this->lang->line('invalid_user_email')
                );
            }
            $this->load->view('ufpassword', $data);
        }
    }

    function forgotPasswordBody($name, $resetPassLink) {
        //===============
        $subject = "Password Update Request";
        $body = 'Dear ' . $name . ', 
                <br/>Recently a request was submitted to reset password for your account. If you didn\'t make the request, just ignore this email. Otherwise you can reset your password using this link <a href="' . $resetPassLink . '"><button>Click here to reset your password</button></a>';
        $body .= '<br/><hr/>if you\'re having trouble clicking the password reset button, copy and paste the URL below into your web browser';
        $body .= '<br/>' . $resetPassLink;
        $body .= '<br/><br/>Regards,
                <br/>' . $this->customlib->getSchoolName();

        //======================
        return json_encode(array('subject' => $subject, 'body' => $body));
    }

    function userlogin() {
        if ($this->auth->user_logged_in()) {
            $this->auth->user_redirect();
        }
        $data = array();
        $data['title'] = 'Login';
        $school = $this->setting_model->get();
        $notice_content = $this->config->item('ci_front_notice_content');
        $notices = $this->cms_program_model->getByCategory($notice_content, array('start' => 0, 'limit' => 5));
        $data['notice'] = $notices;
        $data['school'] = $school[0];
        $this->form_validation->set_rules('username', $this->lang->line('username'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('userlogin', $data);
        } else {
            $login_post = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $login_details = $this->user_model->checkLogin($login_post);

            if (isset($login_details) && !empty($login_details)) {
                $user = $login_details[0];

                if ($user->is_active == "yes") {

                    if ($user->role == "patient") {

                        $result = $this->user_model->read_user_information($user->id);
                    }


                    if ($result != false) {
                        $setting_result = $this->setting_model->get();

                        if ($result[0]->role == "patient") {
                            $session_data = array(
                                'id' => $result[0]->id,
                                'patient_id' => $result[0]->user_id,
                                'patient_type' => $result[0]->patient_type,
                                'role' => $result[0]->role,
                                'username' => $result[0]->username,
                                'name' => $result[0]->patient_name,
                                'date_format' => $setting_result[0]['date_format'],
                                'currency_symbol' => $setting_result[0]['currency_symbol'],
                                'timezone' => $setting_result[0]['timezone'],
                                'sch_name' => $setting_result[0]['name'],
                                'language' => array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']),
                                'is_rtl' => $setting_result[0]['is_rtl'],
                                'theme' => $setting_result[0]['theme'],
                                'image' => $result[0]->image,
                            );

                            $this->session->set_userdata('patient', $session_data);
                            $this->customlib->setUserLog($result[0]->username, $result[0]->role);

                            redirect('patient/dashboard/appointment');
                        }
                    } else {
                        $data['error_message'] = $this->lang->line('account_suspended');
                        $this->load->view('userlogin', $data);
                    }
                } else {
                    $data['error_message'] = $this->lang->line('administrator_message');
                    $this->load->view('userlogin', $data);
                }
            } else {
                $data['error_message'] = $this->lang->line('invalid_message');
                $this->load->view('userlogin', $data);
            }
        }
    }
    public function app_add() {
        $this->form_validation->set_rules('date', $this->lang->line('date'), 'required');
        $this->form_validation->set_rules('patient_name', $this->lang->line('patient') . " " . $this->lang->line('name'), 'required');
        $this->form_validation->set_rules('mobileno', $this->lang->line('phone'), 'required|numeric');
        $this->form_validation->set_rules('doctor', $this->lang->line('doctor'), 'required');
        $this->form_validation->set_rules('message', $this->lang->line('message'), 'required');
        $this->form_validation->set_rules('appointment_status', $this->lang->line('appointment') . " " . $this->lang->line('status'), 'required');
        session_start();
             $answer=$_SESSION["auto_sum"];
             $uanswer=intval(trim($_POST["uanswer"]));
        if($uanswer == $answer){
            if ($this->form_validation->run() == FALSE) {
                $msg = array(
                    'date' => form_error('date'),
                    'patient_name' => form_error('patient_name'),
                    'mobileno' => form_error('mobileno'),
                    'doctor' => form_error('doctor'),
                    'message' => form_error('message'),
                    'appointment_status' => form_error('appointment_status')
                );
                $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
            } else {

                $date = $this->input->post('date');
                $patient_id = $this->input->post('patient_id');
                //print_r($patient_id);
                // exit();
                $patient_name = $this->input->post('patient_name');
                $status = $this->input->post('appointment_status');
                $check_id = $this->appointment_model->getMaxId();
                if (empty($check_id)) {
                    $check_id = 0;
                }

                $max_id = $check_id + 1;
                if ($status == 'approved') {
                    $app_no = 'APPNO' . $max_id;
                } else {
                    $app_no = '';
                }
                $appointment = array(
                    'patient_id' => $patient_id,
                    'appointment_no' => $app_no,
                    'date' => date("Y-m-d H:i:s", $this->customlib->datetostrtotime($date)),
                    'patient_name' => $this->input->post('patient_name'),
                    'gender' => $this->input->post('gender'),
                    'email' => $this->input->post('email'),
                    'mobileno' => $this->input->post('mobileno'),
                    'doctor' => $this->input->post('doctor'),
                    'message' => $this->input->post('message'),
                    'source' => 'Online',
                    'appointment_status' => $status
                );

                // print_r($appointment);
                // exit();
                $insert_id = $this->appointment_model->add($appointment);
                $notificationurl = $this->notificationurl;
                $url_link = $notificationurl["appointment"];
                $url = base_url() . $url_link . '/' . $insert_id;

                
                $array = array('status' => 'success', 'error' => '', 'message' => 'Record Saved Successfully.');
            }
            //echo json_encode($array);
            $this->session->set_userdata('success','Appointment Request Submitted Successfull!');
            redirect(base_url());
        }
        else{
            $this->session->set_userdata('error','Please Check Captcha');
            redirect(base_url());
            //echo "<script>alert('Please Check Captcha');window.location.href='".base_url()."';</script>";
        }
    }
    public function enquiry(){
                if (isset($_POST['submit_enquiry'])) {
                        $name     = trim($_POST["name"]);
                        $email    = trim($_POST["mail"]);
                        $mobile   = trim($_POST["number"]);
                        $location = trim($_POST["location"]);
                        $message  = trim($_POST["message"]);

                        $to =  'manishtiwary0007cmawel@gmail.com';
                        $subject = "Enquiry From Aehospital.com";
                        $headers =  'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'From: Aehospital.com' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $full_message = "<html>
                                        <head><title>Enquiry Data</title></head>
                                        <body>
                                        <table>
                                            <tr>
                                            <td>Name</td>
                                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                            <td> $name</td>
                                            </tr>
                                            <tr>
                                            <td>Email Id</td>
                                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                            <td> $email</td>
                                            </tr>
                                            <tr>
                                            <td>Mobile No</td>
                                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                            <td> $mobile</td>
                                            </tr>
                                            <tr>
                                            <td>Location</td>
                                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                            <td> $location</td>
                                            </tr>
                                            <tr>
                                            <td>Message</td>
                                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                            <td> $message</td>
                                            </tr>
                                        </table>
                                        </body>
                                        </html>";
				//echo $to, $subject, $full_message, $headers;die;
			$user = $email;
                        $user_subject = "Thank You $name";
                        $user_headers = 'From:'.base_url() . "\r\n";
                        $user_message = "Dear $name.\nWelcome to". base_url()."\n We have got your query.We will reach you soon.\nThank You!";
                        
			if (mail($to, $subject, $full_message, $headers)) {
                                mail($user, $user_subject, $user_message, $user_headers);
                                $data["message"] = "<h3>Dear <span class='text-info'>$name</span>,</h3><blockquote><p>We have got your query. We will contact you soon.<br/>For Quick Enquiry <span class='text-warning'>Call Us</span> at <span class='text-info'><i class='fa fa-phone px-2 fa-rotate-90 '></i><span> +91 ".$data['hospital']['mobile']."</span></span></p>
                                <p>Thank You!</p></blockquote>";
				redirect('http://aehospital.com/page/response-negative');
                        } else {
                                //echo $name.$mobile.$whatsapp.$email.$need.$message;
                                $data["message"] = "<h3>Dear <span class='text-info'>$name</span>,</h3><blockquote><p>Something is wrong. It seems like internet is not working well.<br/>For Quick Enquiry <span class='text-warning'>Call Us</span> at <span class='text-info'><i class='fa fa-phone px-2 fa-rotate-90 '></i><span>+91 ".$data['hospital']['mobile']."</span></span></p>
                                <p>Please, try again!</p><p>Thank You!</p></blockquote>";
				redirect('http://aehospital.com/page/response');
                        }
                        
        }
    }

    public function agentlogin(){
        if ($this->auth->user_logged_in()) {
            $this->auth->user_redirect();
        }
        $data = array();
        $data['title'] = ' Agent Login';
        $school = $this->setting_model->get();
        $notice_content = $this->config->item('ci_front_notice_content');
        $notices = $this->cms_program_model->getByCategory($notice_content, array('start' => 0, 'limit' => 5));
        $data['notice'] = $notices;
        $data['school'] = $school[0];
        $this->form_validation->set_rules('username', $this->lang->line('username'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('agentlogin', $data);
        } else {
            $login_post = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $login_details = $this->agent_model->checkLogin($login_post);

            if (isset($login_details) && !empty($login_details)) {
                $user = $login_details[0];

                if ($user->is_active == 1) {

                    $result = $this->agent_model->get_agent($user->id);

                    if (!empty($result)) {
                        $setting_result = $this->setting_model->get();
                            $session_data = array(
                                'id' => $result['id'],
                                'agent_id' => $result['agent_id'],
                                'agent_cat' => $result['agent_cat'],
                                'email' => $result['email'],
                                'name' => $result['name'],
                                'date_format' => $setting_result[0]['date_format'],
                                'currency_symbol' => $setting_result[0]['currency_symbol'],
                                'timezone' => $setting_result[0]['timezone'],
                                'sch_name' => $setting_result[0]['name'],
                                'language' => array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']),
                                'is_rtl' => $setting_result[0]['is_rtl'],
                                'theme' => $setting_result[0]['theme'], 
                                'image' => $result['image'],
                            );
                            //print_r($session_data);die;
                            $this->session->set_userdata('agent', $session_data);
                            $this->customlib->setUserLog($result['agent_id'], 'Agent');

                            redirect('agent/dashboard');
                    } else {
                        $data['error_message'] = "User Does Not Exist";
                        $this->load->view('agentlogin', $data);
                    }
                } else {
                    $data['error_message'] = $this->lang->line('account_suspended');
                    $this->load->view('agentlogin', $data);
                }
            } else {
                $data['error_message'] = $this->lang->line('invalid_message');
                $this->load->view('agentlogin', $data);
            }
        }
    }
}

?>