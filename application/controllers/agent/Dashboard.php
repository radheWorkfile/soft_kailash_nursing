<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends Agent_Controller {

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


    public function index() {
        $id = $this->agent_data['agent_id'];
        $agent = $this->agent_data['id'];
        $data["id"] = $id;
        $doctors = $this->staff_model->getStaffbyrole(3);
        $data["doctors"] = $doctors;
        $result = array();
        $diagnosis_details = array();
        $opd_details = array();
        $timeline_list = array();
        if (!empty($id)) {
            $result = $this->patient_model->getDetails($id);
            if (empty($result)) {
                $result = $this->patient_model->getDataAppoint($id);
            }
            $opd_details = $this->patient_model->getOPDetails($id);
            $diagnosis_details = $this->patient_model->getDiagnosisDetails($id);
            $timeline_list = $this->timeline_model->getPatientTimeline($id, $timeline_status = '');
            $prescription_details = $this->prescription_model->getPatientPrescription($id);
        }

        $data["result"] = $result;
        $data["diagnosis_detail"] = $diagnosis_details;
        $data["prescription_detail"] = $prescription_details;
        $data["opd_details"] = $opd_details;
        $data["timeline_list"] = $timeline_list;
        $data['com_total'] = $this->agent_model->count_com($id);
        $data['com_paid'] = $this->agent_model->count_com_paid($id);
        $data['com_unpaid'] = $this->agent_model->count_com_unpaid($id);
        $data['count_patient'] = $this->agent_model->count_patient($agent); 
        $data['patient'] = $this->agent_model->patient_details($agent);
        $this->load->view("layout/agent/header");
        $this->load->view("agent/dashboard",$data);
        $this->load->view("layout/agent/footer");
    }
}
?>
