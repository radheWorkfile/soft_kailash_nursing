<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Agent_model extends CI_Model
{



    public function __construct()
    {

        parent::__construct();

    }



    public function checkLogin($data)
    {



        $this->db->select('id, agent_id, email, password,is_active');

        $this->db->from('agent_details');

        $this->db->where('agent_id', $data['username']);

        $this->db->where('password', $data['password']);

        $this->db->limit(1);

        $query = $this->db->get();



        if ($query->num_rows() == 1) {

            return $query->result();

        }
        else {

            return false;

        }

    }





    public function add_cat($data)
    {

        if (isset($data['id'])) {

            $this->db->where('id', $data['id']);

            $this->db->update('agent_category', $data);

        }
        else {

            $this->db->insert('agent_category', $data);

            return $this->db->insert_id();

        }

    }



    public function cat()
    {

        $query = $this->db->select('*')->get('agent_category')->result_array();

        return $query;

    }



    public function get_cat($id)
    {

        $query = $this->db->select('*')->where('id', $id)->get('agent_category')->row_array();

        return $query;

    }



    public function remove($id)
    {

        $this->db->where('id', $id);

        $this->db->delete('agent_category');

    }





    public function add_agent($data_insert)
    {

        if (!empty($data_insert)) {

            $this->db->insert('agent_details', $data_insert);

        }

    }



    public function get_agent($id)
    {

        $query = $this->db->select('*')->where('id', $id)->get('agent_details')->row_array();

        return $query;

    }

    public function agent_details()
    {

        $query = $this->db->select('id,agent_id,name')->get('agent_details')->result_array();

        return $query;

    }

    public function searchFullText($searchterm, $active)
    {



        $query = $this->db->query("SELECT `agent_details`.*, `agent_category`.category_name as agent_type FROM `agent_details` LEFT JOIN `agent_category` ON `agent_category`.`id` = `agent_details`.`agent_cat`  WHERE  `agent_details`.`is_active` = '$active' and (`agent_details`.`name` LIKE '%$searchterm%' ESCAPE '!' OR `agent_details`.`agent_id` LIKE '%$searchterm%' ESCAPE '!' OR `agent_details`.`current_address` LIKE '%$searchterm%' ESCAPE '!'  OR `agent_details`.`contact_no` LIKE '%$searchterm%' ESCAPE '!' OR `agent_details`.`email` LIKE '%$searchterm%' ESCAPE '!') ");

        //$query = $this->db->select('*')->where(array('is_active' => $active))->get('agent_details');

        $result = $query->result_array();

        if ($this->session->has_userdata('hospitaladmin')) {

            $superadmin_rest = $this->session->userdata['hospitaladmin']['superadmin_restriction'];

            if ($superadmin_rest == 'enabled') {

                $search = in_array(7, array_column($result, 'role_id'));

                $search_key = array_search(7, array_column($result, 'role_id'));

                if (!empty($search)) {

                    unset($result[$search_key]);

                }

            }

        }



        return $result;

    }



    function getEmployee($role, $active = 1)
    {



        $query = $this->db->select("agent_details.*,agent_category.category_name as agent_type")->join('agent_category', "agent_category.id = agent_details.agent_cat", "left")->where("agent_details.is_active", $active)->where("agent_details.agent_cat", $role)->get("agent_details");



        return $query->result_array();

    }



    public function update_agent($data_insert, $id)
    {

        if (!empty($data_insert)) {

            $this->db->where('id', $id);

            $this->db->update('agent_details', $data_insert);

        }

    }



    public function saveNewPass($data, $id)
    {

        $this->db->where('id', empty($id) ? $data['id'] : $id);

        $query = $this->db->update('agent_details', $data);

        if ($query) {

            return true;

        }
        else {

            return false;

        }

    }



    public function disableagent($id)
    {



        $data = array('is_active' => 0);



        $query = $this->db->where("id", $id)->update("agent_details", $data);

    }



    public function enableagent($id)
    {



        $data = array('is_active' => 1);



        $query = $this->db->where("id", $id)->update("agent_details", $data);

    }



    public function remove_agent($id)
    {



        $this->db->where('id', $id);

        $this->db->delete('agent_details');

    }



    public function insert_pay($data)
    {

        return $this->db->insert('agent_payment', $data);

    }



    function searchagentpay($month, $year, $role)
    {

        $query = $this->db->select("agent_payment.*,agent_payment.id as agent_uq_id,agent_details.*,agent_category.category_name as agent_type,patients.patient_name")->join('patients', 'patients.patient_unique_id = agent_payment.patient_id')->join('agent_details', "agent_details.agent_id = agent_payment.agent_id", "left")->join('agent_category', "agent_category.id = agent_payment.agent_cat", "left")->where(array("agent_payment.month" => $month, "agent_payment.year" => $year, "agent_payment.agent_cat" => $role))->get("agent_payment");



        return $query->result_array();

    }



    function searchPayment($id, $month, $year)
    {



        $query = $this->db->select('agent_payment.*,agent_payment.id as pay_id,agent_details.*')->join('agent_details', "agent_details.agent_id = agent_payment.agent_id")->where(array('agent_payment.month' => $month, 'agent_payment.year' => $year, 'agent_payment.id' => $id))->get("agent_payment");



        return $query->row_array();

    }



    function paymentSuccess($data, $pay_id)
    {

        $this->db->where("id", $pay_id)->update("agent_payment", $data);

    }



    function viewslip($id)
    {



        $query = $this->db->select('agent_payment.*,agent_details.*,agent_category.category_name as agent_type,agent_category.commission,patients.patient_name')->join('agent_details', "agent_details.agent_id = agent_payment.agent_id")->join('agent_category', "agent_category.id = agent_payment.agent_cat")->join('patients', 'patients.patient_unique_id = agent_payment.patient_id')->where(array('agent_payment.id' => $id))->get("agent_payment");



        return $query->row_array();

    }



    function paymentlist($agent_id)
    {

        $query = $this->db->select('a.*,p.patient_name')->join('patients as p', 'p.patient_unique_id = a.patient_id')->where(array('a.agent_id' => $agent_id))->get("agent_payment as a");

        return $query->result_array();

    }



    function count_com($agent_id)
    {

        $query = $this->db->select('sum(amount) as total')->where('agent_id', $agent_id)->get('agent_payment');

        return $query->result_array();

    }



    function count_com_paid($agent_id)
    {

        $query = $this->db->select('sum(amount) as total')->where(array('agent_id' => $agent_id, 'status' => 2))->get('agent_payment');

        return $query->result_array();

    }



    function count_com_unpaid($agent_id)
    {

        $query = $this->db->select('sum(amount) as total')->where(array('agent_id' => $agent_id, 'status' => 1))->get('agent_payment');

        return $query->result_array();

    }



    function count_patient($agent_id)
    {

        $query = $this->db->select('COUNT(*) as count')->where(array('agent_details' => $agent_id, 'is_active' => "yes"))->get('patients');

        return $query->result_array();

    }



    function count_com_today($agent_id)
    {

        $query = $this->db->select('sum(amount) as total')->where(array('agent_id' => $agent_id, 'create_date' => date('Y-m-d')))->get('agent_payment');

        return $query->result_array();

    }



    public function checkOldPass($data)
    {

        $this->db->where('id', $data['user_id']);

        $this->db->where('password', $data['current_pass']);

        $query = $this->db->get('agent_details');

        if ($query->num_rows() > 0)

            return TRUE;

        else

            return FALSE;

    }



    function patient_details($agent_id)
    {

        $query = $this->db->select('*')->order_by("id", "desc")->limit(10)->where(array('agent_details' => $agent_id, 'is_active' => "yes"))->get('patients');

        return $query->result_array();

    }



    function patient_data($agent_id)
    {

        $query = $this->db->select('*')->where(array('agent_details' => $agent_id, 'is_active' => "yes"))->get('patients');

        return $query->result_array();

    }



    function appointment_list($id)
    {

        $query = $this->db->select('a.*,s.name as doctor_name,s.surname as doctor_surname')->join('staff as s', 's.id = a.doctor')->where(array('a.agent_details' => $id))->get('appointment as a');

        return $query->result_array();

    }






}




?>