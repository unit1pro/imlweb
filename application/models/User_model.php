<?php

class User_model extends CI_Model {

    public $table = 'usermain';

    function __construct() {
        parent::__construct();
    }

    function login($user_name, $user_password) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('UserName', $user_name);
        $this->db->where('Password', md5($user_password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_emails() {
        $sql = "SELECT Email FROM usermain";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function update_user($user_id, $user_data) {
        $this->db->where('UID', $user_id);
        return $result = $this->db->update('usermain', $user_data);
    }

    function get_single($user_id) {
        $sql = "SELECT * FROM usermain where UID=$user_id";
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    
    function autocheck($data){
        $sql = "SELECT * FROM usermain WHERE ".$data['key']." = '".$data['value']."'";
//        print_r($sql);exit;
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    function insert_data($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_data($conditions = array()) {
        $this->db->select('*');
        $this->db->from($this->table);
        if (!empty($conditions)) {
            foreach ($conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function update_data($data, $conditions = array()) {
        if (!empty($conditions)) {
            foreach ($conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function delete($id) {
        $this->db->where('UID', $id);
        return $this->db->delete('usermain');
    }

}

?>