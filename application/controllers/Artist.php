<?php

class Artist extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Artist_model');
        $this->load->model('UserType_model');
//        $this->load->library('session');
    }

    function index() {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {
            $data['artist_data'] = $this->Artist_model->get();
            $data['page_title'] = "Artist list";
            $data['user_data'] = $session_data;
            $data['page'] = "list_artist";
            $this->load->view('backend/page', $data);
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function add() {

        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {


            $this->form_validation->set_rules('artist_name', 'Artistname', 'required');
//            $this->form_validation->set_rules('user_password', 'Password', 'required');
            if ($this->form_validation->run()) {
//                print_r($_POST);
//                exit;
                $formdata = $this->input->post();
                if (isset($formdata['artist_id'])&&$formdata['artist_id']!='') {
                    $artist_data = array(
                        'artist_name' => isset($formdata['artist_name']) && $formdata['artist_name'] ? $formdata['artist_name'] : 'N/A',
                        'artist_age' => isset($formdata['artist_age']) && $formdata['artist_age'] ? $formdata['artist_age'] : 'N/A',
                        'artist_genre' => isset($formdata['artist_genre']) && $formdata['artist_genre'] ? $formdata['artist_genre'] : 'N/A',
                        'artist_phone' => isset($formdata['artist_phone']) && $formdata['artist_phone'] ? $formdata['artist_phone'] : 'N/A',
                        'artist_email' => isset($formdata['artist_email']) && $formdata['artist_email'] ? $formdata['artist_email'] : '1',
                        'artist_address' => isset($formdata['artist_address']) && $formdata['artist_address'] ? $formdata['artist_address'] : 'N/A',
                        'artist_city' => isset($formdata['artist_city']) && $formdata['artist_city'] ? $formdata['artist_city'] : 'N/A',
                        'artist_state' => isset($formdata['artist_state']) && $formdata['artist_state'] ? $formdata['artist_state'] : '0',
                        'artist_country' => isset($formdata['artist_country']) && $formdata['artist_country'] ? $formdata['artist_country'] : '0',
                        'artist_price' => isset($formdata['artist_price']) && $formdata['artist_price'] ? $formdata['artist_price'] : '0',
                    );
                    $result = $this->Artist_model->update($artist_data, array('artist_id' => $formdata['artist_id']));
                    if ($result) {
                        $sess_array = array();
                        $data['success'] = true;
                        $data['msg'] = "Artist Updated";
                        $data['page_title'] = "Add Artist";
                        $data['page'] = 'add_artist';
                        $data['user_data'] = $session_data;
                        redirect('Artist', 'refresh');
                    } else {
                        $data['success'] = false;
                        $data['msg'] = "Artist not Updated";
                        $data['page_title'] = "Add Artist";
                        $data['page'] = 'add_artist';
                        $data['user_data'] = $session_data;
                        redirect('Artist', 'refresh');
                    }
                }
                $artist_data = array(
                    'artist_name' => isset($formdata['artist_name']) && $formdata['artist_name'] ? $formdata['artist_name'] : 'N/A',
                    'artist_age' => isset($formdata['artist_age']) && $formdata['artist_age'] ? $formdata['artist_age'] : 'N/A',
                    'artist_genre' => isset($formdata['artist_genre']) && $formdata['artist_genre'] ? $formdata['artist_genre'] : 'N/A',
                    'artist_phone' => isset($formdata['artist_phone']) && $formdata['artist_phone'] ? $formdata['artist_phone'] : 'N/A',
                    'artist_email' => isset($formdata['artist_email']) && $formdata['artist_email'] ? $formdata['artist_email'] : '1',
                    'artist_address' => isset($formdata['artist_address']) && $formdata['artist_address'] ? $formdata['artist_address'] : 'N/A',
                    'artist_city' => isset($formdata['artist_city']) && $formdata['artist_city'] ? $formdata['artist_city'] : 'N/A',
                    'artist_state' => isset($formdata['artist_state']) && $formdata['artist_state'] ? $formdata['artist_state'] : '0',
                    'artist_country' => isset($formdata['artist_country']) && $formdata['artist_country'] ? $formdata['artist_country'] : '0',
                    'artist_price' => isset($formdata['artist_price']) && $formdata['artist_price'] ? $formdata['artist_price'] : '0',
                );
//                $song_name = isset($formdata['song_name']) && $formdata['song_name'] ? $formdata['song_name'] : 'N/A';
//                $song_composer = isset($formdata['song_composer']) && $formdata['song_composer'] ? $formdata['song_composer'] : 'N/A';
//                $song_lyrics_writer = isset($formdata['song_lyrics_writer']) && $formdata['song_lyrics_writer'] ? $formdata['song_lyrics_writer'] : 'N/A';
//                $song_genre = isset($formdata['song_genre']) && $formdata['song_genre'] ? $formdata['song_genre'] : 'N/A';
//                $song_owner = isset($formdata['song_owner']) && $formdata['song_owner'] ? $formdata['song_owner'] : '1';
//                $song_album = isset($formdata['song_album']) && $formdata['song_album'] ? $formdata['song_album'] : 'N/A';
//                $song_film = isset($formdata['song_film']) && $formdata['song_film'] ? $formdata['song_film'] : 'N/A';
//                $song_price = isset($formdata['song_price']) && $formdata['song_price'] ? $formdata['song_price'] : 'N/A';
//                $melody = isset($formdata['melody']) && $formdata['melody'] ? $formdata['melody'] : '0';
//                $lyrics = isset($formdata['lyrics']) && $formdata['lyrics'] ? $formdata['lyrics'] : '0';
//                $arrangement = isset($formdata['arrangement']) && $formdata['arrangement'] ? $formdata['arrangement'] : '0';
//                $dubbing = isset($formdata['dubbing']) && $formdata['dubbing'] ? $formdata['dubbing'] : '0';
//                $song_lyrics = isset($formdata['song_lyrics']) && $formdata['song_lyrics'] ? $formdata['song_lyrics'] : 'N/A';

                $result = $this->Artist_model->insert_data($artist_data);
//print_r($result);exit;
                if ($result) {
                    $sess_array = array();
                    $data['success'] = true;
                    $data['msg'] = "Artist added";
                    $data['page_title'] = "Add Artist";
                    $data['page'] = 'add_artist';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                } else {
                    $data['success'] = false;
                    $data['msg'] = "Artist not added";
                    $data['page_title'] = "Add Artist";
                    $data['page'] = 'add_artist';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                }
            } else {
                $data['userType']=  $this->UserType_model->get();
                $data['page_title'] = "Add Artist";
                $data['page'] = 'add_artist';
                $data['user_data'] = $session_data;
                $this->load->view('backend/page', $data);
            }
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    public function get() {
        $response = array();
        $data = $_POST;
        if (isset($data['artist_id']) && $data['artist_id']) {
            $result = array();
            $result = $this->Artist_model->get(array('artist_id' => $data['artist_id']));
            if (!empty($result)) {
                $response['success'] = true;
                $response['artist_details'] = $result[0];
            } else {
                $response['success'] = false;
                $response['msg'] = 'Artist Detais not available';
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