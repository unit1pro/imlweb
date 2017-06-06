<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,OPTIONS");

class About extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');

//        $this->load->library('session');
    }

    function index() {
        $session_data = $this->session->userdata('user_data');
        $user_id = $session_data['UID'];
        if ($user_id) {
            $data['user_data'] = $this->User_model->get_single($user_id);
        } else {
            $data['profile_data'] = $session_data;
        }
        $data['page'] = "about";
        $this->load->view('home/page', $data);
    }

}
