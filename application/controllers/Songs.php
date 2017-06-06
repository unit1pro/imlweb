<?php

class Songs extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Songs_model');
        $this->load->model('user_song_model');
        $this->load->model('SongCat_model');
        $this->load->model('User_model');
        $this->load->model('UserType_model');
    }

    function index() {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {
            $data['songs_data'] = $this->Songs_model->get();
            $data['page_title'] = "songs list";
            $data['user_data'] = $session_data;
            $data['page'] = "list_songs";
            $this->load->view('backend/page', $data);
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function edit() {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {

            if (isset($_POST["add"])) {

                $imageUploadPath = UPLOADS . '/images';
                $videoUploadPath = UPLOADS . '/videos';
                $image_path = '';
                $video_path = '';
//                if ($this->input->post('submit') == 'add') {
                $this->form_validation->set_rules('Song_Title', 'Song_Title', 'required');
//                    if ($this->form_validation->run()) {
                $formdata = $this->input->post();
                if (isset($_FILES['Image']) && $_FILES['Image']['name'] != '') {
                    $_FILES['Image']['name'] = date('YYmmddHisu') . str_replace(' ', '', $_FILES['Image']['name']);
                    $config = array();
                    $config['upload_path'] = $videoUploadPath;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2097152';
                    $config['max_filename'] = '100';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('Image')) {
                        $datai = $this->upload->data();
                    } else {
                        $data['user_types'] = $this->UserType_model->get();
                        $data['songCats'] = $this->SongCat_model->get_data();
                        $data['success'] = false;
                        $data['msg'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
                        ;
                        $data['page_title'] = "Add Songs";
                        $data['page'] = 'add_songs';
                        $data['user_data'] = $session_data;
                        $this->load->view('backend/page', $data);
//                        $datav['error'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
                    }
                }

                if (isset($_FILES['Song_File_Name']) && $_FILES['Song_File_Name']['name'] != '') {
                    $_FILES['Song_File_Name']['name'] = date('YYmmddHisu') . str_replace(' ', '', $_FILES['Song_File_Name']['name']);

                    $config = array();
                    $config['upload_path'] = $videoUploadPath;
                    $config['allowed_types'] = 'mp4';
                    $config['max_size'] = '26214400';
//                    $config['max_width'] = '1024';
//                    $config['max_height'] = '768';
                    $config['max_filename'] = '100';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('Song_File_Name')) {
                        $datav = $this->upload->data();
                    } else {
//                        $data['artists'] = $this->User_model->get_data(array('UserType' => '3'));
                        $data['user_types'] = $this->UserType_model->get();
                        $data['songCats'] = $this->SongCat_model->get_data();
                        $data['success'] = false;
                        $data['msg'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
                        ;
                        $data['page_title'] = "Add Songs";
                        $data['page'] = 'add_songs';
                        $data['user_data'] = $session_data;
                        $this->load->view('backend/page', $data);
                    }
                }
                $song_data = array(
                    'CAT_ID' => isset($formdata['CAT_ID']) && $formdata['CAT_ID'] ? $formdata['CAT_ID'] : '',
                    'Song_Title' => isset($formdata['Song_Title']) && $formdata['Song_Title'] ? $formdata['Song_Title'] : '',
                    'composer' => isset($formdata['composer']) && $formdata['composer'] ? $formdata['composer'] : '',
                    'director' => isset($formdata['director']) && $formdata['director'] ? $formdata['director'] : '',
                    'Writers' => isset($formdata['Writers']) && $formdata['Writers'] ? $formdata['Writers'] : '',
                    'synopsis' => isset($formdata['synopsis']) && $formdata['synopsis'] ? $formdata['synopsis'] : '',
                    'Date' => isset($formdata['Date']) && $formdata['Date'] ? $formdata['Date'] : '',
                    'Image' => isset($_FILES['Image']['name']) && $_FILES['Image']['name'] ? $_FILES['Image']['name'] : '',
                    'Song_status' => 0,
                    'Song_File_Name' => isset($_FILES['Song_File_Name']['name']) && $_FILES['Song_File_Name']['name'] ? $_FILES['Song_File_Name']['name'] : '',
                    'isActive' => 1,
                    'Created_By' => $session_data['UID'],
                    'Updated_By' => $session_data['UID'],
                );
                $result = $this->Songs_model->insert_data($song_data);
                $user_song_data = array();
                foreach ($formdata['UID'] as $uid) {
                    $user_song_data = array(
                        'UID' => $uid,
                        'SongsID' => $result,
                        'isActive' => 1,
                        'Created_By' => $session_data['UID'],
                        'Updated_By' => $session_data['UID'],
                    );
                    $user_song_result = $this->user_song_model->insert_data($user_song_data);
                }
                if ($result) {
                    $sess_array = array();
                    $data['artists'] = $this->User_model->get_data(array('UserType' => '3'));
                    $data['songCats'] = $this->SongCat_model->get_data();
                    $data['success'] = true;
                    $data['msg'] = "song added";
                    $data['page_title'] = "Add Songs";
                    $data['page'] = 'add_songs';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                } else {
                    $data['user_types'] = $this->UserType_model->get();
                    $data['songCats'] = $this->SongCat_model->get_data();
                    $data['page_title'] = "Add Songs";
                    $data['page'] = 'add_songs';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                }
            }

            if (isset($_POST["update"])) {
                $imageUploadPath = UPLOADS . '/images';
                $videoUploadPath = UPLOADS . '/videos';
                $formdata = $this->input->post();

                if (isset($_FILES['Image']) && $_FILES['Image']['name'] != '') {
                    $_FILES['Image']['name'] = date('YYmmddHisu') . str_replace(' ', '', $_FILES['Image']['name']);
                    $config = array();
                    $config['upload_path'] = $videoUploadPath;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2097152';
                    $config['max_filename'] = '100';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('Image')) {
                        $datai = $this->upload->data();
                    }
                }
                if (isset($_FILES['Song_File_Name']) && $_FILES['Song_File_Name']['name'] != '') {
                    $_FILES['Song_File_Name']['name'] = date('YYmmddHisu') . str_replace(' ', '', $_FILES['Song_File_Name']['name']);
                    $config = array();
                    $config['upload_path'] = $videoUploadPath;
                    $config['allowed_types'] = 'mp4';
                    $config['max_size'] = '26214400';
                    $config['max_filename'] = '100';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('Song_File_Name')) {
                        $datav = $this->upload->data();
                    }
                }
                $song_data = array(
                    'ID' => isset($formdata['ID']) && $formdata['ID'] ? $formdata['ID'] : '',
                    'CAT_ID' => isset($formdata['CAT_ID']) && $formdata['CAT_ID'] ? $formdata['CAT_ID'] : '',
                    'Song_Title' => isset($formdata['Song_Title']) && $formdata['Song_Title'] ? $formdata['Song_Title'] : '',
                    'composer' => isset($formdata['composer']) && $formdata['composer'] ? $formdata['composer'] : '',
                    'director' => isset($formdata['director']) && $formdata['director'] ? $formdata['director'] : '',
                    'Writers' => isset($formdata['Writers']) && $formdata['Writers'] ? $formdata['Writers'] : '',
                    'synopsis' => isset($formdata['synopsis']) && $formdata['synopsis'] ? $formdata['synopsis'] : '',
                    'Date' => isset($formdata['Date']) && $formdata['Date'] ? $formdata['Date'] : '',
                    'Image' => isset($_FILES['Image']['name']) && $_FILES['Image']['name'] ? $_FILES['Image']['name'] : '',
                    'Song_status' => 0,
                    'Song_File_Name' => isset($_FILES['Song_File_Name']['name']) && $_FILES['Song_File_Name']['name'] ? $_FILES['Song_File_Name']['name'] : '',
                    'isActive' => 1,
                    'Updated_By' => $session_data['UID'],
                );
                $song_id = $song_data['ID'];
                $result = $this->Songs_model->update_song($song_id, $song_data);
                $user_song_data = array();
                foreach (@$formdata['UID'] as $uid) {
                    $user_song_data = array(
                        'UID' => $uid,
                        'SongsID' => $result,
                        'isActive' => 1,
                        'Updated_By' => $session_data['UID'],
                    );
                    $user_song_result = $this->user_song_model->update_songs_info($song_id, $user_song_data);
                }
                if ($result) {
                    $data['success'] = true;

                    $data['user_data'] = $session_data;
                    $data['msg'] = "Song Edited";
                    $data['page_title'] = "List Songs";
                    $data['page'] = 'list_songs';
                    redirect('Songs', 'refresh');
                } else {
                    $data['success'] = false;
                    $data['msg'] = "Song not Updated";
                    $data['page_title'] = "Editing Songs";
                    $data['page'] = 'list_songs';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                }
//                    }
            }
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function add() {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {
            $imageUploadPath = UPLOADS . '/images';
            $videoUploadPath = UPLOADS . '/videos';
            $image_path = '';
            $video_path = '';
            if ($this->input->post('submit') == 'add') {
                $this->form_validation->set_rules('Song_Title', 'Song_Title', 'required');
                if ($this->form_validation->run()) {
                    $formdata = $this->input->post();
                    if (isset($_FILES['Image']) && $_FILES['Image']['name'] != '') {
                        $_FILES['Image']['name'] = date('YYmmddHisu') . str_replace(' ', '', $_FILES['Image']['name']);
                        $config = array();
                        $config['upload_path'] = $videoUploadPath;
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '2097152';
                        $config['max_filename'] = '100';

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('Image')) {
                            $datai = $this->upload->data();
                        } else {
                            $data['user_types'] = $this->UserType_model->get();
                            $data['songCats'] = $this->SongCat_model->get_data();
                            $data['success'] = false;
                            $data['msg'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
                            ;
                            $data['page_title'] = "Add Songs";
                            $data['page'] = 'add_songs';
                            $data['user_data'] = $session_data;
                            $this->load->view('backend/page', $data);
//                        $datav['error'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
                        }
                    }
                }
                if (isset($_FILES['Song_File_Name']) && $_FILES['Song_File_Name']['name'] != '') {
                    $_FILES['Song_File_Name']['name'] = date('YYmmddHisu') . str_replace(' ', '', $_FILES['Song_File_Name']['name']);

                    $config = array();
                    $config['upload_path'] = $videoUploadPath;
                    $config['allowed_types'] = 'mp4';
                    $config['max_size'] = '26214400';
//                    $config['max_width'] = '1024';
//                    $config['max_height'] = '768';
                    $config['max_filename'] = '100';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('Song_File_Name')) {
                        $datav = $this->upload->data();
                    } else {
//                        $data['artists'] = $this->User_model->get_data(array('UserType' => '3'));
                        $data['user_types'] = $this->UserType_model->get();
                        $data['songCats'] = $this->SongCat_model->get_data();
                        $data['success'] = false;
                        $data['msg'] = $this->upload->display_errors('<div class="alert alert-error">', '</div>');
                        ;
                        $data['page_title'] = "Add Songs";
                        $data['page'] = 'add_songs';
                        $data['user_data'] = $session_data;
                        $this->load->view('backend/page', $data);
                    }
                }
                $song_data = array(
                    'CAT_ID' => isset($formdata['CAT_ID']) && $formdata['CAT_ID'] ? $formdata['CAT_ID'] : '',
                    'Song_Title' => isset($formdata['Song_Title']) && $formdata['Song_Title'] ? $formdata['Song_Title'] : '',
                    'composer' => isset($formdata['composer']) && $formdata['composer'] ? $formdata['composer'] : '',
                    'director' => isset($formdata['director']) && $formdata['director'] ? $formdata['director'] : '',
                    'Writers' => isset($formdata['Writers']) && $formdata['Writers'] ? $formdata['Writers'] : '',
                    'synopsis' => isset($formdata['synopsis']) && $formdata['synopsis'] ? $formdata['synopsis'] : '',
                    'Date' => isset($formdata['Date']) && $formdata['Date'] ? $formdata['Date'] : '',
                    'Image' => isset($_FILES['Image']['name']) && $_FILES['Image']['name'] ? $_FILES['Image']['name'] : '',
                    'Song_status' => 0,
                    'Song_File_Name' => isset($_FILES['Song_File_Name']['name']) && $_FILES['Song_File_Name']['name'] ? $_FILES['Song_File_Name']['name'] : '',
                    'isActive' => 1,
                    'Created_By' => $session_data['UID'],
                    'Updated_By' => $session_data['UID'],
                );

                $result = $this->Songs_model->insert_data($song_data);
                $user_song_data = array();
                foreach ($formdata['UID'] as $uid) {
                    $user_song_data = array(
                        'UID' => $uid,
                        'SongsID' => $result,
                        'isActive' => 1,
                        'Created_By' => $session_data['UID'],
                        'Updated_By' => $session_data['UID'],
                    );
                    $user_song_result = $this->user_song_model->insert_data($user_song_data);
                }
                if ($user_song_result) {

                    $data['msg'] = "Song Edited";
                    $data['page_title'] = "List Songs";
                    $data['page'] = 'list_songs';
                    redirect('Songs', 'refresh');
//                    $sess_array = array();
//                    $data['artists'] = $this->User_model->get_data(array('UserType' => '3'));
//                    $data['songCats'] = $this->SongCat_model->get_data();
//                    $data['success'] = true;
//                    $data['msg'] = "song added";
//                    $data['page_title'] = "Add Songs";
//                    $data['page'] = 'add_songs';
//                    $data['user_data'] = $session_data;
//                    $this->load->view('backend/page', $data);
                } else {
                    $data['artists'] = $this->User_model->get_data(array('UserType' => '3'));
                    $data['songCats'] = $this->SongCat_model->get_data();
                    $data['success'] = false;
                    $data['msg'] = "song not added";
                    $data['page_title'] = "Add Songs";
                    $data['page'] = 'add_songs';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                }
            } else {
                $data['user_types'] = $this->UserType_model->get();
                $data['songCats'] = $this->SongCat_model->get_data();
                $data['page_title'] = "Add Songs";
                $data['page'] = 'add_songs';
                $data['user_data'] = $session_data;
                $this->load->view('backend/page', $data);
            }
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function update($song_id = NULL) {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {
            if (!empty($song_id)) {
                $data['formdata'] = $this->Songs_model->get_single($song_id);
                $data['user_types'] = $this->UserType_model->get();
                $data['songCats'] = $this->SongCat_model->get_data();
                $data['page_title'] = "Edit Songs";
                $data['page'] = 'add_songs';
                $data['user_data'] = $session_data;
                $this->load->view('backend/page', $data);
            }
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function get() {
        $response = array();
        $data = $_POST;
        if (isset($data['song_id']) && $data['song_id']) {
            $result = array();
            $result = $this->Songs_model->get(array('song_id' => $data['song_id']));
            if (!empty($result)) {
                $response['success'] = true;
                $response['song_details'] = $result[0];
            } else {
                $response['success'] = false;
                $response['msg'] = 'Song Detais not available';
            }
        } else {
            $response['success'] = false;
            $response['msg'] = 'Please select a song';
        }
        echo json_encode($response);
        exit;
    }
    

    function delete($song_id = NULL) {
        if (isset($song_id) && $song_id) {
            $result = array();
            $result = $this->Songs_model->delete($song_id);
            if (!empty($result)) {
                $data['msg'] = "Song Deleted";
                $data['page_title'] = "List Songs";
                $data['page'] = 'list_songs';
                redirect('Songs', 'refresh');
            } else {
                $response['success'] = false;
                $response = 'Song not Deleted';
            }
        } else {
            $response['success'] = false;
            $response['msg'] = 'Song not Found';
        }
        echo json_encode($response);
        exit;
    }

}

?>