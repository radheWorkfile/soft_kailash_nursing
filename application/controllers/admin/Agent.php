<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agent extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Enc_lib');
        $this->config->load("payroll");
        $this->config->load("image_valid");
        $this->config->load("mailsms");
        $this->marital_status = $this->config->item('marital_status');
        $this->blood_group = $this->config->item('bloodgroup');
        $this->load->library('Customlib');
        $this->load->model('agent_model');
    }

    function index() {

        $this->session->set_userdata('top_menu', 'Agent');
        $this->session->set_userdata('sub_menu', 'admin/agent');
        $data['agent_type'] =  $this->agent_model->cat();
        $search = $this->input->post("search");
        $data['agent_details'] = $this->agent_model->searchFullText("", 1);
        $search_text = $this->input->post('search_text');
        if (isset($search)) {
            if ($search == 'search_filter') {
                $this->form_validation->set_rules('agent_type', $this->lang->line('agent_type'), 'trim|required|xss_clean');
                if ($this->form_validation->run() == FALSE) {
                    $data['agent_details'] = array();
                } else {
                    $data['searchby'] = "filter";
                    $role = $this->input->post('agent_type');
                    $data['search_text'] = $this->input->post('search_text');
                    $data['agent_details'] = $this->agent_model->getEmployee($role, 1);
                }
            } else if ($search == 'search_full') {
                $data['searchby'] = "text";
                $data['search_text'] = trim($this->input->post('search_text'));
                $data['agent_details'] = $this->agent_model->searchFullText($search_text, 1);
            }
        } 
        $this->load->view('layout/header');
        $this->load->view('admin/agent/agent_details', $data);
        $this->load->view('layout/footer');
    }

    function unauthorized() {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('unauthorized', $data);
        $this->load->view('layout/footer', $data);
    } 

    public function handle_upload() {

        $image_validate = $this->config->item('image_validate');

        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {

            $file_type = $_FILES["file"]['type'];
            $file_size = $_FILES["file"]["size"];
            $file_name = $_FILES["file"]["name"];
            $allowed_extension = $image_validate['allowed_extension'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_mime_type = $image_validate['allowed_mime_type'];
            if ($files = @getimagesize($_FILES['file']['tmp_name'])) {

                if (!in_array($files['mime'], $allowed_mime_type)) {
                    $this->form_validation->set_message('handle_upload', $this->lang->line('file_type_not_allowed'));
                    return false;
                }
                if (!in_array(strtolower($ext), $allowed_extension) || !in_array($file_type, $allowed_mime_type)) {
                    $this->form_validation->set_message('handle_upload', $this->lang->line('file_type_not_allowed'));
                    return false;
                }
                if ($file_size > $image_validate['upload_size']) {
                    $this->form_validation->set_message('handle_upload', $this->lang->line('file_size_shoud_be_less_than') . number_format($image_validate['upload_size'] / 1048576, 2) . " MB");
                    return false;
                }
            } else {
                $this->form_validation->set_message('handle_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }

            return true;
        }
        return true;
    }

    /************************************************ AGENT CATEGORY SECTION ******************************************/


    function manage_cat(){
        $data['agent_cat'] =  $this->agent_model->cat();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/agent/manage_cat', $data);
        $this->load->view('layout/footer', $data);
    }

    function add_cat(){
        $this->form_validation->set_rules('category_name', $this->lang->line('category') . " " . $this->lang->line('name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('commission', $this->lang->line('commission'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('date', $this->lang->line('date'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', $this->lang->line('description'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $msg = array(
                'category_name'    => form_error('category_name'),
                'commission'       => form_error('commission'),
                'date'             => form_error('date'),
                'description'      => form_error('description'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {
            $data = array(
                'category_name' => $this->input->post('category_name'),
                'commission' => $this->input->post('commission'),
                'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                'description' => $this->input->post('description'),
            );
            $insert_id = $this->agent_model->add_cat($data);            
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
        }
        echo json_encode($array);
    }

    function get_cat($id) {
        $data['id'] = $id;
        $data['category'] = $this->agent_model->get_cat($id);
        $this->load->view('admin/agent/edit_cat', $data);
    }

    function edit_cat($id){
        $this->form_validation->set_rules('category_name', $this->lang->line('category') . " " . $this->lang->line('name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('commission', $this->lang->line('commission'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', $this->lang->line('description'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $msg = array(
                'category_name'    => form_error('category_name'),
                'commission'       => form_error('commission'),
                'description'      => form_error('description'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {
            $data = array(
                'id' => $id,
                'category_name' => $this->input->post('category_name'),
                'commission' => $this->input->post('commission'),
                'description' => $this->input->post('description'),
            );
            $insert_id = $this->agent_model->add_cat($data);            
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('update_message'));
        }
        echo json_encode($array);
    }

    function delete_cat($id) {
        $this->agent_model->remove($id);
        redirect('admin/agent/manage_cat');
    }

    /************************************************ AGENT SECTION ************************************************/

    function add_agent() {

        $this->session->set_userdata('top_menu', 'HR');
        $this->session->set_userdata('sub_menu', 'admin/agent');
        
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $marital_status = $this->marital_status;
        $data["marital_status"] = $marital_status;
        $data["bloodgroup"] = $this->blood_group;
        $data['agent_type'] =  $this->agent_model->cat();
        $this->form_validation->set_rules('agent_id', $this->lang->line('agent_id'),'trim|required');
        $this->form_validation->set_rules('pass', $this->lang->line('password'), 'trim|required');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('dob', $this->lang->line('date_of_birth'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('gender', $this->lang->line('gender'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('blood_group', $this->lang->line('blood_group'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('mobileno', $this->lang->line('mobile_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('email'),'required');/*'valid_email',array('check_exists', array($this->staff_model, 'valid_email_id')))*/
        $this->form_validation->set_rules('addhar', $this->lang->line('addhar_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('pan', $this->lang->line('pan_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('agent_type', $this->lang->line('agent_type'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('file', $this->lang->line('image'), 'required');
        $this->form_validation->set_rules('permanent_address', $this->lang->line('permanent_address'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header', $data);
            $this->load->view('admin/agent/addagent', $data);
            $this->load->view('layout/footer', $data);
        } else {


            $agent_id = $this->input->post("agent_id");
            $password = $this->input->post("pass");//$this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);
            $name = $this->input->post("name")." ".$this->input->post("surname");
            $dob = $this->input->post("dob");
            $gender = $this->input->post("gender");
            $guardian_name = $this->input->post("guardian_name");
            $blood_group = $this->input->post("blood_group");
            $marital_status = $this->input->post("marital_status");
            $date_of_joining = $this->input->post("date_of_joining");
            $contact_no = $this->input->post("mobileno");
            $email = $this->input->post("email");
            $qualification = $this->input->post("qualification");
            $addhar = $this->input->post("addhar");
            $pan = $this->input->post("pan");
            $agent = $this->input->post("agent_type");
            $address = $this->input->post("address");
            $permanent_address = $this->input->post("permanent_address");
            $bank_name = $this->input->post('bank_name');
            $branch_name = $this->input->post('branch_name');
            $account_holder_name = $this->input->post('account_holder_name');
            $acc_no = $this->input->post('acc_no');
            $ifsc = $this->input->post('ifsc');
            if (!empty($dob)) {
                $insert_dob = date('Y-m-d', $this->customlib->datetostrtotime($dob));
            }
            if (!empty($date_of_joining)) {
                $insert_date_of_joining = date('Y-m-d', $this->customlib->datetostrtotime($date_of_joining));
            } else {
                $insert_date_of_joining = "";
            }
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {


                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $img_name = $agent_id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/agent_images/" . $img_name);
                $data_img = array('image' => $img_name);
            }
            $data_insert = array(
                'agent_id'          => $agent_id,
                'password'          => $password,
                'name'              => $name,
                'dob'               => $insert_dob,
                'gender'            => $gender,
                'guardian_name'     => $guardian_name,
                'blood_group'       => $blood_group,
                'marital_status'    => $marital_status,
                'date_of_joining'   => $insert_date_of_joining,
                'contact_no'        => $contact_no,
                'email'             => $email,
                'qualification'     => $qualification,
                'addhar'            => $addhar,
                'pan'               => $pan,
                'agent_cat'         => $agent,
                'current_address'   => $address,
                'permanent_address' => $permanent_address,
                'bank_name'         => $bank_name,
                'branch_name'       => $branch_name,
                'account_holder_name'=> $account_holder_name,
                'account_no'        => $acc_no,
                'ifsc_code'         => $ifsc,
                'image'             => $data_img['image'],
                'is_active' => 1
            );
            $this->agent_model->add_agent($data_insert);
            

            
            /* if ($agent_id) {

                $teacher_login_detail = array('id' => $agent_id, 'credential_for' => 'agent', 'username' => $agent_id, 'password' => $password, 'contact_no' => $contact_no, 'email' => $email);

                $this->mailsmsconf->mailsms('login_credential', $teacher_login_detail);
            }  */

            //==========================

            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('success_message') . '</div>');

            redirect('admin/agent');
        } 
    }

    function edit_agent($id) {
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $marital_status = $this->marital_status;
        $data["marital_status"] = $marital_status;
        $data["bloodgroup"] = $this->blood_group;
        $data['agent_type'] =  $this->agent_model->cat();
        $data['agent_details'] = $this->agent_model->get_agent($id);

        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('dob', $this->lang->line('date_of_birth'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('gender', $this->lang->line('gender'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('blood_group', $this->lang->line('blood_group'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('mobileno', $this->lang->line('mobile_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('email'),'required');/*'valid_email',array('check_exists', array($this->staff_model, 'valid_email_id')))*/
        $this->form_validation->set_rules('addhar', $this->lang->line('addhar_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('pan', $this->lang->line('pan_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('agent_type', $this->lang->line('agent_type'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('file', $this->lang->line('image'), 'callback_handle_upload');
        $this->form_validation->set_rules('permanent_address', $this->lang->line('permanent_address'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header', $data);
            $this->load->view('admin/agent/agentedit', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $agent_id = $this->input->post("agent_id");
            $name = $this->input->post("name");
            $dob = $this->input->post("dob");
            $gender = $this->input->post("gender");
            $guardian_name = $this->input->post("guardian_name");
            $blood_group = $this->input->post("blood_group");
            $marital_status = $this->input->post("marital_status");
            $contact_no = $this->input->post("mobileno");
            $email = $this->input->post("email");
            $qualification = $this->input->post("qualification");
            $addhar = $this->input->post("addhar");
            $pan = $this->input->post("pan");
            $agent = $this->input->post("agent_type");
            $address = $this->input->post("address");
            $permanent_address = $this->input->post("permanent_address");
            $bank_name = $this->input->post('bank_name');
            $branch_name = $this->input->post('branch_name');
            $account_holder_name = $this->input->post('account_holder_name');
            $acc_no = $this->input->post('acc_no');
            $ifsc = $this->input->post('ifsc');
            $img = $this->input->post("img");
            if (!empty($dob)) {
                $insert_dob = date('Y-m-d', strtotime($dob));
            }
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {


                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $img_name = $agent_id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/agent_images/" . $img_name);
                $data_img = array('image' => $img_name);
            }else{
                $data_img = array('image' => $img);
            }
            $data_insert = array(
                //'agent_id'          => $agent_id,
                //'password'          => $this->enc_lib->passHashEnc($password),
                'name'              => $name,
                'dob'               => $insert_dob,
                'gender'            => $gender,
                'guardian_name'     => $guardian_name,
                'blood_group'       => $blood_group,
                'marital_status'    => $marital_status,
                'contact_no'        => $contact_no,
                'email'             => $email,
                'qualification'     => $qualification,
                'addhar'            => $addhar,
                'pan'               => $pan,
                'agent_cat'         => $agent,
                'current_address'   => $address,
                'permanent_address' => $permanent_address,
                'bank_name'         => $bank_name,
                'branch_name'       => $branch_name,
                'account_holder_name'=> $account_holder_name,
                'account_no'        => $acc_no,
                'ifsc_code'         => $ifsc,
                'image'             => $data_img['image'],
            );
            $this->agent_model->update_agent($data_insert,$id);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/agent/edit_agent/' . $id);
        }
    }

    function agent_profile($id) {
        $staff_data = $this->session->flashdata('staff_data');
        $data['staff_data'] = $staff_data;
        $data["id"] = $id;
        $data['title'] = 'Staff Details';
        $data['agent_details']  = $this->agent_model->get_agent($id);
        $data['cat'] = $this->agent_model->get_cat($data['agent_details']['agent_cat']);
        $userdata = $this->customlib->getUserData();
        $userid = $userdata['id'];
        $timeline_status = '';
        if ($userid == $id) {
            $timeline_status = 'yes';
        }
        $timeline_list = $this->timeline_model->getStaffTimeline($id, $timeline_status);
        $data["timeline_list"] = $timeline_list;
        $staff_leaves = $this->leaverequest_model->staff_leave_request($id);
        $alloted_leavetype = $this->staff_model->allotedLeaveType($id);
        $attendencetypes = $this->staffattendancemodel->getStaffAttendanceType();
        $data['attendencetypeslist'] = $attendencetypes;
        $i = 0;
        $leaveDetail = array();
        foreach ($alloted_leavetype as $key => $value) {
            $count_leaves[] = $this->leaverequest_model->countLeavesData($id, $value["leave_type_id"]);
            $leaveDetail[$i]['type'] = $value["type"];
            $leaveDetail[$i]['alloted_leave'] = $value["alloted_leave"];
            $leaveDetail[$i]['approve_leave'] = $count_leaves[$i]['approve_leave'];
            $i++;
        }
        $data["leavedetails"] = $leaveDetail;
        $data["staff_leaves"] = $staff_leaves;
        $data['staff_doc_id'] = $id;
        
        $data['agent_payment'] = $this->agent_model->paymentlist($data['agent_details']['agent_id']);
        $data['com_total'] = $this->agent_model->count_com($data['agent_details']['agent_id']);
        $data['com_paid'] = $this->agent_model->count_com_paid($data['agent_details']['agent_id']);
        $data['com_today'] = $this->agent_model->count_com_today($data['agent_details']['agent_id']);
        $monthlist = $this->customlib->getMonthDropdown();
        $startMonth = $this->setting_model->getStartMonth();
        $data["monthlist"] = $monthlist;
        $data['yearlist'] = $this->staffattendancemodel->attendanceYearCount();

        $year = date("Y");

        $j = 0;
        for ($n = 1; $n <= 31; $n++) {

            $att_date = sprintf("%02d", $n);

            $attendence_array[] = $att_date;

            foreach ($monthlist as $key => $value) {

                $datemonth = date("m", strtotime($value));
                $att_dates = $year . "-" . $datemonth . "-" . sprintf("%02d", $n);
                $date_array[] = $att_dates;
                $res[$att_dates] = $this->staffattendancemodel->searchStaffattendance($id, $att_dates);
            }

            $j++;
        }

        $session = $this->setting_model->getCurrentSessionName();

        $session_start = explode("-", $session);
        $start_year = $session_start[0];

        $date = $start_year . "-" . $startMonth;
        $newdate = date("Y-m-d", strtotime($date . "+1 month"));

        //$countAttendance = $this->countAttendance($start_year, $startMonth, $id);
        //$data["countAttendance"] = $countAttendance;

        $data["resultlist"] = $res;
        $data["attendence_array"] = $attendence_array;
        $data["date_array"] = $date_array;
        $data["payroll_status"] = $this->payroll_status;
        $data["payment_mode"] = $this->payment_mode;
        $data["contract_type"] = $this->contract_type;
        $data["status"] = $this->status;
        $roles = $this->role_model->get();
        $data["roles"] = $roles;

        $stafflist = $this->staff_model->get();
        $data['stafflist'] = $stafflist;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/agent/agentprofile', $data);
        $this->load->view('layout/footer', $data);
    }

    function change_password($id) {
        $this->form_validation->set_rules('new_pass', $this->lang->line('password'), 'trim|required|xss_clean|matches[confirm_pass]');
        $this->form_validation->set_rules('confirm_pass', $this->lang->line('confirm_password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $msg = array(
                'new_pass' => form_error('new_pass'),
                'confirm_pass' => form_error('confirm_pass'),
            );

            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {

            if (!empty($id)) {
                $newdata = array(
                    'password' => $this->input->post('new_pass')
                );


                $query2 = $this->agent_model->saveNewPass($newdata,$id);
                if ($query2) {
                    $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('password_changed_successfully'));
                } else {

                    $array = array('status' => 'fail', 'error' => '', 'message' => $this->lang->line('password_not_changed'));
                }
            } else {
                $array = array('status' => 'fail', 'error' => '', 'message' => $this->lang->line('password_not_changed'));
            }
        }
        echo json_encode($array);
    }

    function disableagent($id) {
        $this->agent_model->disableagent($id);
        redirect('admin/agent/agent_profile/' . $id);
    }

    function enableagent($id) {
        $this->agent_model->enableagent($id);
        redirect('admin/agent/agent_profile/' . $id);
    }
    
    function deleteagent($id) {
        $this->agent_model->remove_agent($id);
        redirect('admin/agent');
    }

    function disableagentlist() {
        $this->session->set_userdata('top_menu', 'Agent');
        $this->session->set_userdata('sub_menu', 'admin/agent');
        $data['agent_type'] =  $this->agent_model->cat();
        $search = $this->input->post("search");
        $data['agent_details'] = $this->agent_model->searchFullText("", 0);
        $search_text = $this->input->post('search_text');
        if (isset($search)) {
            if ($search == 'search_filter') {
                $this->form_validation->set_rules('agent_type', $this->lang->line('agent_type'), 'trim|required|xss_clean');
                if ($this->form_validation->run() == FALSE) {
                    $data['agent_details'] = array();
                } else {
                    $data['searchby'] = "filter";
                    $role = $this->input->post('agent_type');
                    $data['search_text'] = $this->input->post('search_text');
                    $data['agent_details'] = $this->agent_model->getEmployee($role, 0);
                }
            } else if ($search == 'search_full') {
                $data['searchby'] = "text";
                $data['search_text'] = trim($this->input->post('search_text'));
                $data['agent_details'] = $this->agent_model->searchFullText($search_text, 0);
            }
        } 
        $this->load->view('layout/header');
        $this->load->view('admin/agent/disableagent', $data);
        $this->load->view('layout/footer');
    }

    /********************************************* AGENT PAYMENT SECTION *******************************************/

    function pay_commission() {
        $this->session->set_userdata('top_menu', 'Agent');
        $this->session->set_userdata('sub_menu', 'admin/agent');
        $data['agent_type'] =  $this->agent_model->cat();
        $data["month"] = date("F", strtotime("-1 month"));
        $data["year"] = date("Y");
        $user_type = $this->staff_model->getStaffRole();
        $data['classlist'] = $user_type;
        $data['monthlist'] = $this->customlib->getMonthDropdown();
        $submit = $this->input->post("search");
        if (isset($submit) && $submit == "search") {

            $month = $this->input->post("month");
            $year = $this->input->post("year");
            $role = $this->input->post("agent_type");
            $data["agent_pay"] = $this->agent_model->searchagentpay($month, $year,$role);
            $data["month"] = $month;
            $data["year"] = $year;
        }
        $data["payroll_status"] = $this->payroll_status;
        $this->load->view("layout/header", $data);
        $this->load->view("admin/agent/agent_payment", $data);
        $this->load->view("layout/footer", $data);
    }

    function paymentRecord() {

        $month = $this->input->get_post("month");
        $year = $this->input->get_post("year");
        $id = $this->input->get_post("agent_id");
        //echo $id, $month, $year; die;
        $searchEmployee = $this->agent_model->searchPayment($id, $month, $year);

        $data['result'] = $searchEmployee;
        $data["month"] = $month;
        $data["year"] = $year;
        echo json_encode($data);
    }

    function paymentSuccess() {

        
        $this->form_validation->set_rules('payment_mode', $this->lang->line('payment') . " " . $this->lang->line('mode'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $msg = array(
                'payment_mode' => form_error('payment_mode'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {
          $pay_id = $this->input->post("pay_id");
          $payment_mode = $this->input->post("payment_mode");
          $payment_date = $this->input->post("payment_date");
          $remark = $this->input->post("remarks");
          $status = 2;
            $data = array(
                    'mode' => $payment_mode, 
                    'transaction' => $remark, 
                    'payment_date' => $payment_date, 
                    'status' => $status
                );
          //echo $pay_id;
          //print_r($data);die;
            $this->agent_model->paymentSuccess($data, $pay_id);
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
        }
        echo json_encode($array);

    }

    function payslipView() {
        $id = $this->input->post("payslipid");
        $result = $this->agent_model->viewslip($id);
        $data['print_details'] = $this->printing_model->get('', 'payslip');
        $data["result"] = $result;
        if (!empty($result)) {
            $this->load->view("admin/agent/payslipview", $data);
        } else {
            echo $this->lang->line('no_record_found');
        }
    }
}
?>