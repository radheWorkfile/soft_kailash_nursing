<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Agent extends Agent_Controller {

    public $school_name;
    public $school_setting;
    public $setting;
    public $payment_method;
    public $patient_data; 

    public function __construct() {
        parent::__construct();
        $this->payment_method = $this->paymentsetting_model->getActiveMethod();
        $this->agent_data = $this->session->userdata('agent');
        $this->config->load("payroll");
        $this->load->library('Enc_lib');
        $this->appointment_status = $this->config->item('appointment_status');
        $this->marital_status = $this->config->item('marital_status');
        $this->payment_mode = $this->config->item('payment_mode');
        $this->search_type = $this->config->item('search_type');
        $this->blood_group = $this->config->item('bloodgroup');

        $this->charge_type = $this->config->item('charge_type');
        $data["charge_type"] = $this->charge_type; 
    }

    /* function dashboard() {

        $this->session->set_userdata('top_menu', 'Dashboard');
        $patient_id = $this->customlib->getPatientSessionUserID();
        print_r($patient_id);
        die;
        $student = $this->student_model->get($student_id);

        $data = array();
        if (!empty($student)) {
            $student_session_id = $student['student_session_id'];
            $gradeList = $this->grade_model->get();
            $student_due_fee = $this->studentfeemaster_model->getStudentFees($student_session_id);
            $student_discount_fee = $this->feediscount_model->getStudentFeesDiscount($student_session_id);
            $data['student_discount_fee'] = $student_discount_fee;
            $data['student_due_fee'] = $student_due_fee;
            $timeline = $this->timeline_model->getStudentTimeline($student["id"], $status = 'yes');
            $data["timeline_list"] = $timeline;

            $examList = $this->examschedule_model->getExamByClassandSection($student['class_id'], $student['section_id']);
            $data['examSchedule'] = array();
            if (!empty($examList)) {
                $new_array = array();
                foreach ($examList as $ex_key => $ex_value) {
                    $array = array();
                    $x = array();
                    $exam_id = $ex_value['exam_id'];
                    $student['id'];
                    $exam_subjects = $this->examschedule_model->getresultByStudentandExam($exam_id, $student['id']);
                    foreach ($exam_subjects as $key => $value) {
                        $exam_array = array();
                        $exam_array['exam_schedule_id'] = $value['exam_schedule_id'];
                        $exam_array['exam_id'] = $value['exam_id'];
                        $exam_array['full_marks'] = $value['full_marks'];
                        $exam_array['passing_marks'] = $value['passing_marks'];
                        $exam_array['exam_name'] = $value['name'];
                        $exam_array['exam_type'] = $value['type'];
                        $exam_array['attendence'] = $value['attendence'];
                        $exam_array['get_marks'] = $value['get_marks'];
                        $x[] = $exam_array;
                    }
                    $array['exam_name'] = $ex_value['name'];
                    $array['exam_result'] = $x;
                    $new_array[] = $array;
                }
                $data['examSchedule'] = $new_array;
            }
            $student_doc = $this->student_model->getstudentdoc($student_id);
            $data['student_doc'] = $student_doc;
            $data['student_doc_id'] = $student_id;
            $category_list = $this->category_model->get();
            $data['category_list'] = $category_list;
            $data['gradeList'] = $gradeList;
            $data['student'] = $student;
        }

        $this->load->view('layout/patient/header', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('layout/patient/footer', $data);
    } */

    function changepass() {
        $data['title'] = 'Change Password';
        $this->form_validation->set_rules('current_pass', $this->lang->line('current_password'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('new_pass', $this->lang->line('new_password'), 'trim|required|xss_clean|matches[confirm_pass]');
        $this->form_validation->set_rules('confirm_pass', $this->lang->line('confirm_password'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $sessionData = $this->session->userdata('loggedIn');
            $this->data['id'] = $sessionData['id'];
            $this->data['username'] = $sessionData['username'];
            $this->load->view('layout/agent/header', $data);
            $this->load->view('agent/change_password', $data);
            $this->load->view('layout/agent/footer', $data);
        } else {
            $sessionData = $this->agent_data;
            $data_array = array(
                'current_pass' => ($this->input->post('current_pass')),
                'new_pass' => ($this->input->post('new_pass')),
                'user_id' => $sessionData['id'],
                'user_name' => $sessionData['username']
            );
            $newdata = array(
                'id' => $sessionData['id'],
                'password' => $this->input->post('new_pass')
            );
            $query1 = $this->agent_model->checkOldPass($data_array);
            if ($query1) {
                $query2 = $this->agent_model->saveNewPass($newdata);
                if ($query2) {

                    $this->session->set_flashdata('success_msg', $this->lang->line('success_message'));
                    $this->load->view('layout/agent/header', $data);
                    $this->load->view('agent/change_password', $data);
                    $this->load->view('layout/agent/footer', $data);
                }
            } else {

                $this->session->set_flashdata('error_msg', $this->lang->line('invalid_current_password'));
                $this->load->view('layout/agent/header', $data);
                $this->load->view('agent/change_password', $data);
                $this->load->view('layout/agent/footer', $data);
            }
        }
    }

    function edit_profile() {
        $sessionData = $this->agent_data;
        $id = $sessionData['id'];
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('dob', $this->lang->line('date_of_birth'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('guardian', $this->lang->line('guardian_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('marital', $this->lang->line('marital_status'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('contact', $this->lang->line('contact'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('qualification', $this->lang->line('qualification'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('caddress', $this->lang->line('current')." ".$this->lang->line('address'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_name', $this->lang->line('bank_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_branch_name', $this->lang->line('bank_branch_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('account_holder_name', $this->lang->line('account_holder_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_account_no', $this->lang->line('bank_account_no'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('ifsc_code', $this->lang->line('ifsc_code'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            
        }else{
            $data_array = array(
                'name'              => $this->input->post('name'),
                'dob'               => $this->input->post('dob'), 
                'guardian_name'     => $this->input->post('guardian'), 
                'marital_status'    => $this->input->post('marital'), 
                'contact_no'        => $this->input->post('contact'), 
                'email'             => $this->input->post('email'), 
                'qualification'     => $this->input->post('qualification'), 
                'current_address'   => $this->input->post('caddress'), 
                'bank_name'         => $this->input->post('bank_name'), 
                'branch_name'       => $this->input->post('bank_branch_name'), 
                'account_holder_name'=> $this->input->post('account_holder_name'), 
                'account_no'        => $this->input->post('bank_account_no'), 
                'ifsc_code'         => $this->input->post('ifsc_code')
            );
            $is_valid = $this->agent_model->update_agent($data_array,$id);
            if ($is_valid) {
                $this->session->set_flashdata('success_msg', $this->lang->line('success_message'));
                redirect('agent/agent/edit_profile');
            }else{
                $this->session->set_flashdata('error_msg', $this->lang->line('error'));
            }
        }
        $sessionData = $this->agent_data;
        $id = $sessionData['id'];
        $data['value'] = $this->agent_model->get_agent($id);
        $this->load->view('layout/agent/header', $data);
        $this->load->view('agent/edit_profile', $data);
        $this->load->view('layout/agent/footer', $data);
    }

    public function appointment() {
        $sessionData = $this->agent_data;
        $data['agent'] = $sessionData['id'];
        $data["result"] = $this->agent_model->appointment_list($data['agent']);
        $data["doctors"] = $this->staff_model->getStaffbyrole(3);
        
        $this->load->view("layout/agent/header");
        $this->load->view("agent/appointment", $data);
        $this->load->view("layout/agent/footer");
    }

    public function bookAppointment() {
        $this->form_validation->set_rules('name', $this->lang->line("name"), 'required');
        $this->form_validation->set_rules('date', $this->lang->line("date"), 'required');
        $this->form_validation->set_rules('gender', $this->lang->line("gender"), 'required');
        $this->form_validation->set_rules('doctor', $this->lang->line("doctor"), 'required');
        $this->form_validation->set_rules('mobile', $this->lang->line("mobile"), 'required');
        $this->form_validation->set_rules('email', $this->lang->line("email"), 'required');
        $this->form_validation->set_rules('message', $this->lang->line("message"), 'required');
        if ($this->form_validation->run() == false) {
            $msg = array(
                'name' => form_error('name'),
                'date' => form_error('date'),
                'gender' => form_error('gender'),
                'doctor' => form_error('doctor'),
                'mobile' => form_error('mobile'),
                'email' => form_error('email'),
                'message' => form_error('message'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {
            $appointment = array(
                'date'                  => $this->input->post('date'),
                'patient_name'          => $this->input->post('name'),
                'gender'                => $this->input->post('gender'),
                'email'                 => $this->input->post('email'),
                'mobileno'              => $this->input->post('mobile'),
                'doctor'                => $this->input->post('doctor'),
                'message'               => $this->input->post('message'),
                'appointment_status'    => "pending",
                'agent_details'         => $this->input->post('agent'),
                'source'                => "agent",
            );
            $this->appointment_model->add($appointment);

            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
        }
        echo json_encode($array);
    }

    public function  patient_list(){
        $sessionData = $this->agent_data;
        $id = $sessionData['id'];
        $data['patient'] = $this->agent_model->patient_data($id);
        $this->load->view('layout/agent/header', $data);
        $this->load->view('agent/patientlist', $data);
        $this->load->view('layout/agent/footer', $data);
    }

    public function  commission_list(){
        $sessionData = $this->agent_data;
        $id = $sessionData['agent_id'];
        $data['commission'] = $this->agent_model->paymentlist($id);
        $this->load->view('layout/agent/header', $data);
        $this->load->view('agent/commissionlist', $data);
        $this->load->view('layout/agent/footer', $data);
    }

}

?>