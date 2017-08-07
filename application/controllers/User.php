<?php

ini_set('display_errors', 1);
require_once('./vendor/autoload.php');

use Postmark\PostmarkClient;

class User extends CI_Controller {

    function User() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('UserType_model');
        $this->load->model('Comment_model');
        $this->load->library('encryption');
//        $this->encryption->initialize(
//        array(
//                'cipher' => 'cast5',
//                'mode' => 'Stream',
//                'key' => '10101'
//        )
//);
//        $this->load->library('session');
    }

    function index() {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {
            $data['artist_data'] = $this->User_model->get_data();
            $data['page_title'] = "User List";
            $data['user_data'] = $session_data;
            $data['page'] = "list_user";
            $this->load->view('backend/page', $data);
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function profile() {
        $session_data = $this->session->userdata('user_data');
        $user_id = $this->uri->segment(3);
        $profile_id = $session_data;

        if (isset($session_data) && ($session_data['UID'])) {
            $data['profile_data'] = $this->User_model->get_single($user_id);
            $data['user_data'] = $this->User_model->get_single($profile_id['UID']);
            $data['user_posts'] = $this->Comment_model->get_post_by_user($session_data['UID']);
            $data['page_title'] = "Profile Page";
            $data['page'] = "profile";
            $this->load->view('front/page', $data);
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function signup() {
        $this->form_validation->set_rules('UserName', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $formdata = $this->input->post();
            $result = $this->User_model->login($formdata['UserName'], $formdata['Password']);
            if ($result) {
                $sess_array = array();
                $this->session->set_userdata('user_data', (array) $result[0]);
                redirect('User/index', 'refresh');
            } else {
                $this->load->view('backend/login');
            }
        } else {
            $data['page_title'] = "Login";
            $data['page'] = 'login';
            $this->load->view('backend/login');
        }
    }

    function login() {
        $this->form_validation->set_rules('UserName', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $formdata = $this->input->post();
            $result = $this->User_model->login($formdata['UserName'], $formdata['Password']);
            if ($result) {
                $sess_array = array();
                $this->session->set_userdata('user_data', (array) $result[0]);
                redirect('User/index', 'refresh');
            } else {
                $this->load->view('backend/login');
            }
        } else {
            $data['page_title'] = "Login";
            $data['page'] = 'login';
            $this->load->view('backend/login');
        }
    }

    function login_front() {
        $uri = $_GET['uri'];
        $this->form_validation->set_rules('UserName', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $formdata = $this->input->post();
            $result = $this->User_model->login($formdata['UserName'], $formdata['Password']);
            if ($result) {
                $sess_array = array();
                $this->session->set_userdata('user_data', (array) $result[0]);
                $this->session->set_userdata('alert_msg', '');
                redirect($uri, 'refresh');
            } else {
                // print "<pre>";print_r($uri);exit;
                $this->session->set_flashdata('alert_msg', 'Wrong Username or password');
                // $this->session->set_userdata('alert_msg', 'Wrong Username or password');
                redirect($uri, 'refresh');
            }
        } else {
            $this->session->set_flashdata('alert_msg', 'Please enter Username and password');
            // $this->session->set_userdata('alert_msg', 'Please enter Username and password');
            redirect($uri, 'refresh');
        }
    }

    function signup_front() {
        $uri = $_GET['uri'];
        $formdata = $this->input->post();

        if (!empty($formdata)) {
            //   print_r($formdata);exit;
            if ($formdata['password'] == $formdata['conf_password']) {
                $email = array();
                $UserName = array();
                $email = $this->User_model->autocheck(array('key' => 'Email', 'value' => $formdata['Email']));
                // echo 'hello';
                $UserName = $this->User_model->autocheck(array('key' => 'UserName', 'value' => $formdata['UserName']));

                // print_r($list_emial);exit;
                if (empty($email) && empty($UserName)) {

                    $user_data = array(
                        'UserName' => isset($formdata['UserName']) && $formdata['UserName'] ? $formdata['UserName'] : '',
                        'FirstName' => isset($formdata['firstName']) && $formdata['firstName'] ? $formdata['firstName'] : '',
                        'LastName' => isset($formdata['lastName']) && $formdata['lastName'] ? $formdata['lastName'] : '',
                        'Email' => isset($formdata['Email']) && $formdata['Email'] ? $formdata['Email'] : '',
                        'Password' => isset($formdata['password']) && $formdata['password'] ? md5($formdata['password']) : '',
                        'UserType' => '4',
                        'isActive' => '1',
                    );
                    $result = $this->User_model->insert_data($user_data);
                    $user_data = $this->User_model->get_single($result);
                    if ($result) {
                        $sess_array = array();
                        $this->session->set_userdata('user_data', $user_data[0]);
                        $this->session->set_flashdata('alert_msg', 'User Successful Registed, You can login into your account');
                        redirect($uri, 'refresh');
                    } else {
                        $this->session->set_flashdata('alert_msg', 'Sign up Failed!!!');
                        redirect($uri, 'refresh');
                    }
                } else {
                    // echo 'hello1';exit;
                    $this->session->set_flashdata('alert_msg', 'Email or UserName already exist.');
                    redirect($uri, 'refresh');
                }
            } else {
                $this->session->set_flashdata('alert_msg', 'Password not matched!!!');
                redirect($uri, 'refresh');
            }
        } else {
            $this->session->set_flashdata('alert_msg', 'Please Enter values in the Field!!!');
            redirect($uri, 'refresh');
        }
    }

    function edit() {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {

            if (isset($_POST["add"])) {
                $this->form_validation->set_rules('UserName', 'UserName', 'required');
                $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
                $this->form_validation->set_rules('Email', 'Email', 'required');
                $this->form_validation->set_rules('Password', 'Password', 'required');
                $this->form_validation->set_rules('UserType', 'UserType', 'required');
                if ($this->form_validation->run()) {
                    $formdata = $this->input->post();
                    if (isset($formdata['UID']) && $formdata['UID'] != '') {
                        $artist_data = array(
                            'UserName' => isset($formdata['UserName']) && $formdata['UserName'] ? $formdata['UserName'] : '',
                            'FirstName' => isset($formdata['FirstName']) && $formdata['FirstName'] ? $formdata['FirstName'] : '',
                            'LastName' => isset($formdata['LastName']) && $formdata['LastName'] ? $formdata['LastName'] : '',
                            'Email' => isset($formdata['Email']) && $formdata['Email'] ? $formdata['Email'] : '',
                            'Password' => isset($formdata['Password']) && $formdata['Password'] ? md5($formdata['Password']) : '',
                            'AboutMe' => isset($formdata['AboutMe']) && $formdata['AboutMe'] ? $formdata['AboutMe'] : '',
                            'City' => isset($formdata['City']) && $formdata['City'] ? $formdata['City'] : '',
                            'State' => isset($formdata['State']) && $formdata['State'] ? $formdata['State'] : '',
                            'Country' => isset($formdata['Country']) && $formdata['Country'] ? $formdata['Country'] : '',
                            'DOB' => isset($formdata['DOB']) && $formdata['DOB'] ? date('YY-mm-dd', strtotime($formdata['DOB'])) : '',
                            'DateJoined' => isset($formdata['DateJoined']) && $formdata['DateJoined'] ? date('YY-mm-dd', strtotime($formdata['DateJoined'])) : '',
                            'Photo' => isset($formdata['Photo']) && $formdata['Photo'] ? $formdata['Photo'] : '',
                            'Website' => isset($formdata['Website']) && $formdata['Website'] ? $formdata['Website'] : '',
                            'UserType' => isset($formdata['UserType']) && $formdata['UserType'] ? $formdata['UserType'] : '',
                            'isActive' => 1,
                            'Created_By' => $session_data['UID'],
                            'Updated_By' => $session_data['UID'],
                        );
                        $result = $this->User_model->update_data($artist_data, array('UID' => $formdata['UID']));
                        if ($result) {
                            $sess_array = array();
                            $data['success'] = true;
                            $data['msg'] = "User Updated";
                            $data['page_title'] = "Add User";
                            $data['page'] = 'add_user';
                            $data['user_data'] = $session_data;
                            redirect('User/list', 'refresh');
                        } else {
                            $data['success'] = false;
                            $data['msg'] = "User not Updated";
                            $data['page_title'] = "Add User";
                            $data['page'] = 'add_user';
                            $data['user_data'] = $session_data;
                            redirect('User/list', 'refresh');
                        }
                    }
                    $artist_data = array(
                        'UserName' => isset($formdata['UserName']) && $formdata['UserName'] ? $formdata['UserName'] : '',
                        'FirstName' => isset($formdata['FirstName']) && $formdata['FirstName'] ? $formdata['FirstName'] : '',
                        'LastName' => isset($formdata['LastName']) && $formdata['LastName'] ? $formdata['LastName'] : '',
                        'Email' => isset($formdata['Email']) && $formdata['Email'] ? $formdata['Email'] : '',
                        'Password' => isset($formdata['Password']) && $formdata['Password'] ? md5($formdata['Password']) : '',
                        'AboutMe' => isset($formdata['AboutMe']) && $formdata['AboutMe'] ? $formdata['AboutMe'] : '',
                        'City' => isset($formdata['City']) && $formdata['City'] ? $formdata['City'] : '',
                        'State' => isset($formdata['State']) && $formdata['State'] ? $formdata['State'] : '',
                        'Country' => isset($formdata['Country']) && $formdata['Country'] ? $formdata['Country'] : '',
                        'DOB' => isset($formdata['DOB']) && $formdata['DOB'] ? date('YY-mm-dd', strtotime($formdata['DOB'])) : '',
                        'DateJoined' => isset($formdata['DateJoined']) && $formdata['DateJoined'] ? date('YY-mm-dd', strtotime($formdata['DateJoined'])) : '',
                        'Photo' => isset($formdata['Photo']) && $formdata['Photo'] ? $formdata['Photo'] : '',
                        'Website' => isset($formdata['Website']) && $formdata['Website'] ? $formdata['Website'] : '',
                        'UserType' => isset($formdata['UserType']) && $formdata['UserType'] ? $formdata['UserType'] : '',
                        'isActive' => 1,
                        'Created_By' => $session_data['UID'],
                        'Updated_By' => $session_data['UID'],
                    );

                    $result = $this->User_model->insert_data($artist_data);
                    if ($result) {
                        $data['userType'] = $this->UserType_model->get();
                        $sess_array = array();
                        $data['success'] = true;
                        $data['msg'] = "User added";
                        $data['page_title'] = "Add User";
                        $data['page'] = 'add_user';
                        $data['user_data'] = $session_data;
                        $this->load->view('backend/page', $data);
                    } else {
                        $data['userType'] = $this->UserType_model->get();
                        $data['success'] = false;
                        $data['msg'] = "User not added";
                        $data['page_title'] = "Add User";
                        $data['page'] = 'add_user';
                        $data['user_data'] = $session_data;
                        $this->load->view('backend/page', $data);
                    }
                } else {
                    $data['userType'] = $this->UserType_model->get();
                    $data['page_title'] = "Add User";
                    $data['page'] = 'add_user';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                }
            }

            if (isset($_POST["update"])) {
                $formdata = $this->input->post();

                $artist_data = array(
                    'UID' => isset($formdata['UID']) && $formdata['UID'] ? $formdata['UID'] : '',
                    'UserName' => isset($formdata['UserName']) && $formdata['UserName'] ? $formdata['UserName'] : '',
                    'FirstName' => isset($formdata['FirstName']) && $formdata['FirstName'] ? $formdata['FirstName'] : '',
                    'LastName' => isset($formdata['LastName']) && $formdata['LastName'] ? $formdata['LastName'] : '',
                    'Email' => isset($formdata['Email']) && $formdata['Email'] ? $formdata['Email'] : '',
                    'Password' => isset($formdata['Password']) && $formdata['Password'] ? md5($formdata['Password']) : '',
                    'AboutMe' => isset($formdata['AboutMe']) && $formdata['AboutMe'] ? $formdata['AboutMe'] : '',
                    'City' => isset($formdata['City']) && $formdata['City'] ? $formdata['City'] : '',
                    'State' => isset($formdata['State']) && $formdata['State'] ? $formdata['State'] : '',
                    'Country' => isset($formdata['Country']) && $formdata['Country'] ? $formdata['Country'] : '',
                    'DOB' => isset($formdata['DOB']) && $formdata['DOB'] ? date('YY-mm-dd', strtotime($formdata['DOB'])) : '',
                    'DateJoined' => isset($formdata['DateJoined']) && $formdata['DateJoined'] ? date('YY-mm-dd', strtotime($formdata['DateJoined'])) : '',
                    'Photo' => isset($formdata['Photo']) && $formdata['Photo'] ? $formdata['Photo'] : '',
                    'Website' => isset($formdata['Website']) && $formdata['Website'] ? $formdata['Website'] : '',
                    'UserType' => isset($formdata['UserType']) && $formdata['UserType'] ? $formdata['UserType'] : '',
                    'isActive' => 1,
                    'Created_By' => $session_data['UID'],
                    'Updated_By' => $session_data['UID'],
                );

                $artist_id = $artist_data['UID'];
                $result = $this->User_model->update_user($artist_id, $artist_data);

                if ($result) {
                    $data['success'] = true;

                    $data['user_data'] = $session_data;
                    $data['msg'] = "User Edited";
                    $data['page_title'] = "List User";
                    $data['page'] = 'list_user';
                    redirect('User', 'refresh');
                } else {
                    $data['success'] = false;
                    $data['msg'] = "User not Updated";
                    $data['page_title'] = "Editing User";
                    $data['page'] = 'list_user';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                }
            }
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function add() {

        $session_data = $this->session->userdata('user_data');

        if (isset($session_data) && ($session_data['UID'])) {


            $this->form_validation->set_rules('UserName', 'UserName', 'required');
            $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
            $this->form_validation->set_rules('Email', 'Email', 'required');
            $this->form_validation->set_rules('Password', 'Password', 'required');
            $this->form_validation->set_rules('UserType', 'UserType', 'required');
            if ($this->form_validation->run()) {
                $formdata = $this->input->post();
                if (isset($formdata['UID']) && $formdata['UID'] != '') {
                    $artist_data = array(
                        'UserName' => isset($formdata['UserName']) && $formdata['UserName'] ? $formdata['UserName'] : '',
                        'FirstName' => isset($formdata['FirstName']) && $formdata['FirstName'] ? $formdata['FirstName'] : '',
                        'LastName' => isset($formdata['LastName']) && $formdata['LastName'] ? $formdata['LastName'] : '',
                        'Email' => isset($formdata['Email']) && $formdata['Email'] ? $formdata['Email'] : '',
                        'Password' => isset($formdata['Password']) && $formdata['Password'] ? md5($formdata['Password']) : '',
                        'AboutMe' => isset($formdata['AboutMe']) && $formdata['AboutMe'] ? $formdata['AboutMe'] : '',
                        'City' => isset($formdata['City']) && $formdata['City'] ? $formdata['City'] : '',
                        'State' => isset($formdata['State']) && $formdata['State'] ? $formdata['State'] : '',
                        'Country' => isset($formdata['Country']) && $formdata['Country'] ? $formdata['Country'] : '',
                        'DOB' => isset($formdata['DOB']) && $formdata['DOB'] ? date('YY-mm-dd', strtotime($formdata['DOB'])) : '',
                        'DateJoined' => isset($formdata['DateJoined']) && $formdata['DateJoined'] ? date('YY-mm-dd', strtotime($formdata['DateJoined'])) : '',
                        'Photo' => isset($formdata['Photo']) && $formdata['Photo'] ? $formdata['Photo'] : '',
                        'Website' => isset($formdata['Website']) && $formdata['Website'] ? $formdata['Website'] : '',
                        'UserType' => isset($formdata['UserType']) && $formdata['UserType'] ? $formdata['UserType'] : '',
                        'isActive' => 1,
                        'Created_By' => $session_data['UID'],
                        'Updated_By' => $session_data['UID'],
                    );
                    $result = $this->User_model->update_data($artist_data, array('UID' => $formdata['UID']));
                    if ($result) {
                        $sess_array = array();
                        $data['success'] = true;
                        $data['msg'] = "User Updated";
                        $data['page_title'] = "Add User";
                        $data['page'] = 'add_user';
                        $data['user_data'] = $session_data;
                        redirect('User/list', 'refresh');
                    } else {
                        $data['success'] = false;
                        $data['msg'] = "User not Updated";
                        $data['page_title'] = "Add User";
                        $data['page'] = 'add_user';
                        $data['user_data'] = $session_data;
                        redirect('User/list', 'refresh');
                    }
                }
                $artist_data = array(
                    'UserName' => isset($formdata['UserName']) && $formdata['UserName'] ? $formdata['UserName'] : '',
                    'FirstName' => isset($formdata['FirstName']) && $formdata['FirstName'] ? $formdata['FirstName'] : '',
                    'LastName' => isset($formdata['LastName']) && $formdata['LastName'] ? $formdata['LastName'] : '',
                    'Email' => isset($formdata['Email']) && $formdata['Email'] ? $formdata['Email'] : '',
                    'Password' => isset($formdata['Password']) && $formdata['Password'] ? md5($formdata['Password']) : '',
                    'AboutMe' => isset($formdata['AboutMe']) && $formdata['AboutMe'] ? $formdata['AboutMe'] : '',
                    'City' => isset($formdata['City']) && $formdata['City'] ? $formdata['City'] : '',
                    'State' => isset($formdata['State']) && $formdata['State'] ? $formdata['State'] : '',
                    'Country' => isset($formdata['Country']) && $formdata['Country'] ? $formdata['Country'] : '',
                    'DOB' => isset($formdata['DOB']) && $formdata['DOB'] ? date('YY-mm-dd', strtotime($formdata['DOB'])) : '',
                    'DateJoined' => isset($formdata['DateJoined']) && $formdata['DateJoined'] ? date('YY-mm-dd', strtotime($formdata['DateJoined'])) : '',
                    'Photo' => isset($formdata['Photo']) && $formdata['Photo'] ? $formdata['Photo'] : '',
                    'Website' => isset($formdata['Website']) && $formdata['Website'] ? $formdata['Website'] : '',
                    'UserType' => isset($formdata['UserType']) && $formdata['UserType'] ? $formdata['UserType'] : '',
                    'isActive' => 1,
                    'Created_By' => $session_data['UID'],
                    'Updated_By' => $session_data['UID'],
                );

                $result = $this->User_model->insert_data($artist_data);
                if ($result) {
                    $data['userType'] = $this->UserType_model->get();
                    $sess_array = array();
                    $data['success'] = true;
                    $data['msg'] = "User added";
                    $data['page_title'] = "Add User";
                    $data['page'] = 'add_user';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                } else {
                    $data['userType'] = $this->UserType_model->get();
                    $data['success'] = false;
                    $data['msg'] = "User not added";
                    $data['page_title'] = "Add User";
                    $data['page'] = 'add_user';
                    $data['user_data'] = $session_data;
                    $this->load->view('backend/page', $data);
                }
            } else {
                $data['userType'] = $this->UserType_model->get();
                $data['page_title'] = "Add User";
                $data['page'] = 'add_user';
                $data['user_data'] = $session_data;
                $this->load->view('backend/page', $data);
            }
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function update($user_id = NULL) {
        $session_data = $this->session->userdata('user_data');
        if (isset($session_data) && ($session_data['UID'])) {
            if (!empty($user_id)) {
                $data['formdata'] = $this->User_model->get_single($user_id);
                $data['page_title'] = "Edit Songs";
                $data['page'] = 'add_user';
                $data['user_data'] = $session_data;
                $this->load->view('backend/page', $data);
            }
        } else {
            $this->session->unset_userdata('user_data');
            redirect('user/login', 'refresh');
        }
    }

    function logout() {
        $this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
        redirect('User', 'refresh');
    }

    function logoutFront() {
        $this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
        redirect('Index', 'refresh');
    }

    function delete($user_id = NULL) {
        if (isset($user_id) && $user_id) {
            $result = array();
            $result = $this->User_model->delete($user_id);
            if (!empty($result)) {
                $data['msg'] = "User Deleted";
                $data['page_title'] = "List User";
                $data['page'] = 'list_user';
                redirect('User', 'refresh');
            } else {
                $response['success'] = false;
                $response = 'User not Deleted';
            }
        } else {
            $response['success'] = false;
            $response['msg'] = 'User not Found';
        }
        echo json_encode($response);
        exit;
    }

    function update_profile() {
        $session_data = $this->session->userdata('user_data');
//        print_r($_FILES['upload']);exit;
        $user_id = $session_data['UID'];
        try {
            if (!$user_id)
                throw new Exception("Session Expired Please Login");

            if (!empty($_FILES) && $_FILES['upload']['error'] != 4) {
                if (!isset($_FILES['upload']['error']) || is_array($_FILES['upload']['error'])) {
                    throw new RuntimeException('Invalid parameters.');
                }
                switch ($_FILES['upload']['error']) {
                    case UPLOAD_ERR_OK:
                        break;
//                    case UPLOAD_ERR_NO_FILE:
//                        throw new RuntimeException('No file sent.');
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new RuntimeException('Exceeded filesize limit.');
                    default:
                        throw new RuntimeException('Unknown errors.');
                }
                if ($_FILES['upload']['size'] > 10000000) {
                    throw new RuntimeException('Exceeded filesize limit.');
                }
                $types = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                );
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search($finfo->file($_FILES['upload']['tmp_name']), $types, true)) {
                    throw new RuntimeException('Invalid file format.');
                }

                $filename = base_url() . sprintf('./uploads/images/%s_%s.%s', md5($_FILES['upload']['tmp_name']), date('ymdhis'), $ext);
                $file = md5($_FILES['upload']['tmp_name']) . '_' . date('ymdhis') . '.' . $ext;
                //            echo $filename;
                //            exit;
                if (!move_uploaded_file($_FILES['upload']['tmp_name'], sprintf('./uploads/images/%s_%s.%s', md5($_FILES['upload']['tmp_name']), date('ymdhis'), $ext))) {
                    throw new RuntimeException('Failed to move uploaded file.');
                }
            }

            $formdata = $_POST;
            if (isset($file) && $file != '') {
                $user_data = array(
                    'FirstName' => isset($formdata['FirstName']) && $formdata['FirstName'] ? $formdata['FirstName'] : '',
                    'LastName' => isset($formdata['LastName']) && $formdata['LastName'] ? $formdata['LastName'] : '',
                    'Email' => isset($formdata['Email']) && $formdata['Email'] ? $formdata['Email'] : '',
                    'Website' => isset($formdata['Website']) && $formdata['Website'] ? $formdata['Website'] : '',
                    'ContactMe' => isset($formdata['ContactMe']) && $formdata['ContactMe'] ? $formdata['ContactMe'] : '',
                    'DOB' => isset($formdata['DOB']) && $formdata['DOB'] ? date('Y-m-d', strtotime($formdata['DOB'])) : '',
                    'City' => isset($formdata['City']) && $formdata['City'] ? $formdata['City'] : '',
                    'State' => isset($formdata['State']) && $formdata['State'] ? $formdata['State'] : '',
                    'Country' => isset($formdata['Country']) && $formdata['Country'] ? $formdata['Country'] : '',
                    'Photo' => isset($file) && !empty($file) ? $file : '',
                    'AboutMe' => isset($formdata['AboutMe']) && $formdata['AboutMe'] ? $formdata['AboutMe'] : '',
                    'DateJoined' => date("Y-m-d"),
                    'UserType' => '4',
                    'isActive' => '1',
                    'Created_By' => '1',
                    'Updated_By' => $_SESSION['user_data']['UID']
                );
            } else {
                $user_data = array(
                    'FirstName' => isset($formdata['FirstName']) && $formdata['FirstName'] ? $formdata['FirstName'] : '',
                    'LastName' => isset($formdata['LastName']) && $formdata['LastName'] ? $formdata['LastName'] : '',
                    'Email' => isset($formdata['Email']) && $formdata['Email'] ? $formdata['Email'] : '',
                    'Website' => isset($formdata['Website']) && $formdata['Website'] ? $formdata['Website'] : '',
                    'ContactMe' => isset($formdata['ContactMe']) && $formdata['ContactMe'] ? $formdata['ContactMe'] : '',
                    'DOB' => isset($formdata['DOB']) && $formdata['DOB'] ? date('Y-m-d', strtotime($formdata['DOB'])) : '',
                    'City' => isset($formdata['City']) && $formdata['City'] ? $formdata['City'] : '',
                    'State' => isset($formdata['State']) && $formdata['State'] ? $formdata['State'] : '',
                    'Country' => isset($formdata['Country']) && $formdata['Country'] ? $formdata['Country'] : '',
                    'AboutMe' => isset($formdata['AboutMe']) && $formdata['AboutMe'] ? $formdata['AboutMe'] : '',
                    'DateJoined' => date("Y-m-d"),
                    'UserType' => '4',
                    'isActive' => '1',
                    'Created_By' => '1',
                    'Updated_By' => $_SESSION['user_data']['UID']
                );
            }

//            print_r($session_data);exit;

            $result = $this->User_model->update_user($user_id, $user_data);
            $profile_data = $this->User_model->get_single($user_id);
            if ($result) {
                $this->session->set_flashdata('alert_msg', 'User Updated');
                $data['success'] = true;
                $data['profile_data'] = $profile_data;
                $data['alert_msg'] = "User Updated";
                $data['page_title'] = "Profile Page";
                $data['page'] = 'profile';
                redirect('User/profile/' . $user_id, 'refresh');
            } else {
                $this->session->set_flashdata('alert_msg', 'Updation Failed');
                $data['success'] = false;
                $data['alert_msg'] = "Updation Failed";
                $data['page_title'] = "Profile Page";
                $data['page'] = 'profile';
                $data['profile_data'] = $profile_data;
                redirect('User/profile/' . $user_id, 'refresh');
//                $this->load->view('front/page', $data);
            }
        } catch (Exception $exc) {
            print_r($exc->getMessage());
            exit;
            $this->session->set_flashdata('alert_msg', $exc->getMessage());
            redirect('User/profile/' . $user_id, 'refresh');
//            $response['success'] = FALSE;
//            $response['msg'] = $exc->getMessage();
        }
//        echo json_encode($response);
//        exit();
    }

    function autocheck() {
        $data = $_POST;
        $result = $this->User_model->autocheck($data);
        $response = array();
        if (!empty($result)) {
            $response['success'] = FALSE;
            $response['msg'] = $data['value'] . " exist, please choose diffrent " . $data['key'];
        } else {
            $response['success'] = TRUE;
            $response['msg'] = $data['value'] . " available";
        }
        echo json_encode($response);
    }

    function forgetPassword() {
        $email = isset($_POST['Email']) && $_POST['Email'] != '' ? $_POST['Email'] : '';
        if ($email != '') {
            $emailExist = array();
            $emailExist = $this->User_model->autocheck(array('key' => 'Email', 'value' => $email));
            if (!empty($emailExist)) {
                $subject = 'Indian Music Lab - Change Password';
//                $token = $emailExist[0]['UserName'].$emailExist[0]['UID'];
                $token = md5($emailExist[0]['UserName'] . '|' . $emailExist[0]['Email']);
                $real = $emailExist[0]['UserName'] . '|' . $emailExist[0]['UID'];
                $changePasswordUrl = site_url('User/passwordReset/') . $token . '/' . $real;
                $message = '<h1 style = "color:#094662;">Indian Music Lab</h1>';
                $message .= '<p><b>Hi ' . $emailExist[0]['FirstName'] . '</b></p>';
                $message .= '<p>A password reset was requested on Indian Music Lab using your email address.</p><br><p>To reset your password for ' . $emailExist[0]['UserName'] . ' (' . $emailExist[0]['FirstName'] . ' ' . $emailExist[0]['LastName'] . ') ,<br/>follow the link below.</p><br/>';
                $message .= '<a href = "' . $changePasswordUrl . '" target="__blank">Click here to change password</a>';
                $message .= '<p>If you think you received this message by mistake, please ignore it </p>';

//                print_r($message);exit;
                $result = $this->sendMail('contact@indianmusiclab.com', $email, $subject, $message);
//                var_dump($result);
                if ($result) {
                    $this->session->set_flashdata('alert_msg', 'A mail has been sent to your email for password reset');
                    redirect($uri, 'refresh');
                } else {
                    $this->session->set_flashdata('alert_msg', 'Mail can not be sent right now please try again later');
                    redirect($uri, 'refresh');
                }
            } else {
                $this->session->set_flashdata('alert_msg', 'Email is not registered with Indian Music Lab');
                redirect($uri, 'refresh');
            }
        } else {
            $this->session->set_flashdata('alert_msg', 'Please enter email');
            redirect($uri, 'refresh');
        }
    }

    function sendMail($from, $to, $subject, $message) {
//      

        $client = new PostmarkClient("f83d7879-81dc-4a5d-95b1-5152463be83b");

        $sendResult = $client->sendEmail(
                $from, $to, $subject, $message);
// print_r($sendResult);exit;
        if (!$sendResult) {
            return false;
        } else {
            return true;
        }
    }

    function passwordReset() {
        $formData = array();
        $formData = $_POST;
        if (!empty($formData)) {
            $user_data = array(
                'Password' => md5($formData['Password'])
            );
            $result = $this->User_model->update_user($formData['UID'], $user_data);
            if ($result) {
                $this->session->set_flashdata('alert_msg', 'Password Changed please login');
            } else {
                $this->session->set_flashdata('alert_msg', 'Link Expired try sending a new link');
            }
            redirect('Index', 'refresh');
//            print_r($result);exit;
        }
        $token = $this->uri->segment(4);
        $tokenArray = explode('%7C', $token);

        $data['UserName'] = $tokenArray[0];
        $data['UID'] = $tokenArray[1];
        $data['page'] = "resetPassword";
//        print_r($data);
        $this->load->view('front/page', $data);
    }

    function fbLogin() {
        $data = $_POST;
        $userId = '';
        $getUser = $this->User_model->checkFbUser($data['Email'], $data['fId']);
        $location = array();
        if (isset($data['address']) && $data['address'] != '')
            $location = explode(',', $data['address']);
        $getUser = $getUser[0];

        if (!empty($getUser)) {
            $updateData = array();
            if ($getUser['UserName'] == '') {
                $username = $this->createUserName($data['FirstName']);
                $updateData['UserName'] = $username;
            }
            if ($getUser['Email'] == '')
                $updateData['Email'] = $data['Email'];
            if ($getUser['fId'] == '')
                $updateData['fId'] = $data['fId'];
            if ($getUser['Photo'] == '') {
                $updateData['Photo'] = isset($data['Photo']) && $data['Photo'] != '' ? $data['Photo'] : '';
                $updateData['fullUrlPhoto'] = 1;
            }
            if ($getUser['Password'] == '') {
                $password = random_int(100000, 999999);
                $updateData['Password'] = md5($password);
            }
            $updateData['FirstName'] = isset($data['FirstName']) && $data['FirstName'] ? $data['FirstName'] : $getUser['FirstName'];
            $updateData['LastName'] = isset($data['LastName']) && $data['LastName'] ? $data['LastName'] : $getUser['LastName'];
            $updateData['City'] = isset($location[0]) && $location[0] ? trim($location[0]) : $getUser['City'];
            $updateData['Country'] = isset($location[1]) && $location[1] ? trim($location[1]) : $getUser['Country'];
            $updateData['DOB'] = isset($data['DOB']) && $data['DOB'] ? date('Y-m-d', strtotime($data['DOB'])) : $getUser['DOB'];
            $resultUpdate = $this->User_model->update_user($getUser['UID'], $updateData);
            $userId = $getUser['UID'];
        } else {
            $password = random_int(100000, 999999);
            $username = $this->createUserName($data['FirstName']);
            $insertData = array(
                'UserName' => $username,
                'Password' => md5($password),
                'Email' => $data['Email'],
                'fId' => $data['fId'],
                'FirstName' => $data['FirstName'],
                'LastName' => $data['LastName'],
                'DOB' => date('Y-m-d', strtotime($data['DOB'])),
                'Photo' => $data['Photo'],
                'fullUrlPhoto' => 1,
                'City' => trim($location[0]),
                'Country' => trim($location[1]),
                'UserType' => '4',
                'isActive' => '1'
            );
            $userId = $this->User_model->insert_data($user_data);
            if ($userId) {
                $subject = 'Indian Music Lab - New Account Registration';
                $message = '<h1 style = "color:#094662;">Indian Music Lab</h1>';
                $message .= '<p><b>Hello ' . $data['FirstName'] . '</b></p>';
                $message .= '<p>Your account has been created on <a href = "http://indianmusiclab.com/">Indian Music Lab</a> using facebook. </p><br><p>You may continue using facebook as a login method or you can login with following details,</p>';
                $message .= '<p>Username : <b>' . $username . '</b> </p>';
                $message .= '<p>Password : <b>' . $password . '</b> </p>';
                $message .= '<p>If you think you received this message by mistake, please ignore it. </p>';

                $result = $this->sendMail('contact@indianmusiclab.com', $data['Email'], $subject, $message);
            }
        }
        $user_data = $this->User_model->get_single($userId);
        $sess_array = array();
        $this->session->set_userdata('user_data', $user_data[0]);
        if ($userId) {
            $response['success'] = TRUE;
            $response['userId'] = $userId;
        } else {
            $response['success'] = FALSE;
            $response['message'] = 'Login failed please try again later';
        }
        echo json_encode($response);
        exit();
    }

    function createUserName($firstname) {
        $userName = '';
        while ($userName == '') {
            $userDetails = array();
            $tempName = $firstname . random_int(100000, 999999);
            $userDetails = $this->User_model->autocheck(array('key' => 'UserName', 'value' => $tempName));
            if (empty($userDetails)) {
                return $userName = $tempName;
            }
        }

        return $userName;
    }

}

?>
