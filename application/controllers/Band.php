<?php

class Band extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Band_model');
//        $this->load->library('session');
    }

    function index() {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['user_id'])) {
            $data['band_data'] = $this->Band_model->get();
            $data['page_title'] = "Band Member List";
            $data['user_data'] = $session_data;
            $data['page'] = "list_band";
            $this->load->view('page', $data);
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function add() {

        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['user_id'])) {


            $this->form_validation->set_rules('band_member_name', 'BandMemberName', 'required');
//            $this->form_validation->set_rules('user_password', 'Password', 'required');
            if ($this->form_validation->run()) {
//                print_r($_POST);
//                exit;
                $formdata = $this->input->post();
                if (isset($formdata['band_member_id'])&&$formdata['band_member_id']!='') {
                    $artist_data = array(
                        'band_member_name' => isset($formdata['band_member_name']) && $formdata['band_member_name'] ? $formdata['band_member_name'] : 'N/A',
                        'band_member_age' => isset($formdata['band_member_age']) && $formdata['band_member_age'] ? $formdata['band_member_age'] : 'N/A',
                        'band_member_instrument' => isset($formdata['band_member_instrument']) && $formdata['band_member_instrument'] ? $formdata['band_member_instrument'] : 'N/A',
                        'band_member_phone' => isset($formdata['band_member_phone']) && $formdata['band_member_phone'] ? $formdata['band_member_phone'] : 'N/A',
                        'band_member_email_id' => isset($formdata['band_member_email_id']) && $formdata['band_member_email_id'] ? $formdata['band_member_email_id'] : '1',
                        'band_member_address' => isset($formdata['band_member_address']) && $formdata['band_member_address'] ? $formdata['band_member_address'] : 'N/A',
                        'band_member_price' => isset($formdata['band_member_price']) && $formdata['band_member_price'] ? $formdata['band_member_price'] : 'N/A',
                    );
                    $result = $this->Band_model->update($artist_data, array('band_member_id' => $formdata['band_member_id']));
                    if ($result) {
                        $sess_array = array();
                        $data['success'] = true;
                        $data['msg'] = "Band Member Updated";
                        $data['page_title'] = "Add Band Member";
                        $data['page'] = 'list_band';
                        $data['user_data'] = $session_data;
                        $data['band_data'] = $this->Band_model->get();
                        $this->load->view('page', $data);
                    } else {
                        $data['success'] = false;
                        $data['msg'] = "Band Member not Updated";
                        $data['page_title'] = "Add Band Member";
                        $data['page'] = 'list_band';
                        $data['user_data'] = $session_data;
                        $data['band_data'] = $this->Band_model->get();
                        $this->load->view('page', $data);
                    }
                }
                $artist_data = array(
                    'band_member_name' => isset($formdata['band_member_name']) && $formdata['band_member_name'] ? $formdata['band_member_name'] : 'N/A',
                    'band_member_age' => isset($formdata['band_member_age']) && $formdata['band_member_age'] ? $formdata['band_member_age'] : 'N/A',
                    'band_member_instrument' => isset($formdata['band_member_instrument']) && $formdata['band_member_instrument'] ? $formdata['band_member_instrument'] : 'N/A',
                    'band_member_phone' => isset($formdata['band_member_phone']) && $formdata['band_member_phone'] ? $formdata['band_member_phone'] : 'N/A',
                    'band_member_email_id' => isset($formdata['band_member_email_id']) && $formdata['band_member_email_id'] ? $formdata['band_member_email_id'] : '1',
                    'band_member_address' => isset($formdata['band_member_address']) && $formdata['band_member_address'] ? $formdata['band_member_address'] : 'N/A',
                    'band_member_price' => isset($formdata['band_member_price']) && $formdata['band_member_price'] ? $formdata['band_member_price'] : 'N/A',
                );


                $result = $this->Band_model->insert_data($artist_data);
//print_r($result);exit;
                if ($result) {
                    $sess_array = array();
                    $data['success'] = true;
                    $data['msg'] = "Band Member added";
                    $data['page_title'] = "Add Band Member";
                    $data['page'] = 'list_band';
                    $data['user_data'] = $session_data;
                    $data['band_data'] = $this->Band_model->get();
                    $this->load->view('page', $data);
                } else {
                    $data['success'] = false;
                    $data['msg'] = "Band Member not added";
                    $data['page_title'] = "Add Band Member";
                    $data['page'] = 'list_band';
                    $data['user_data'] = $session_data;
                    $data['band_data'] = $this->Band_model->get();
                    $this->load->view('page', $data);
                }
            } else {
                $data['page_title'] = "Add Band Member";
                $data['page'] = 'list_band';
                $data['user_data'] = $session_data;
                $this->load->view('page', $data);
            }
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    public function get() {
        $response = array();
        $data = $_POST;
        if (isset($data['band_member_id']) && $data['band_member_id']) {
            $result = array();
            $result = $this->Band_model->get(array('band_member_id' => $data['band_member_id']));
            if (!empty($result)) {
                $response['success'] = true;
                $response['artist_details'] = $result[0];
            } else {
                $response['success'] = false;
                $response['msg'] = 'Band Member Detais not available';
            }
        } else {
            $response['success'] = false;
            $response['msg'] = 'Please select a song';
        }
        echo json_encode($response);
        exit;
    }

}

?>