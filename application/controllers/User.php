<?php

class User extends CI_Controller {

    function User() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('UserType_model');
        $this->load->model('Comment_model');
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
                $this->session->set_userdata('alert_msg', 'Wrong Username or password');
                redirect($uri, 'refresh');
            }
        } else {
            $this->session->set_userdata('alert_msg', 'Please enter Username and password');
            redirect($uri, 'refresh');
        }
    }

    function signup_front() {
        $uri = $_GET['uri'];
        $formdata = $this->input->post();
        if ($formdata['password'] == $formdata['conf_password']) {
            $emails = $this->User_model->get_emails();
            $list_emial = array_column($emails, 'Email');

            if (empty(array_search($formdata['email'], $list_emial))) {
                $user_data = array(
                    'UserName' => isset($formdata['UserName']) && $formdata['UserName'] ? $formdata['UserName'] : '',
                    'FirstName' => isset($formdata['firstName']) && $formdata['firstName'] ? $formdata['firstName'] : '',
                    'LastName' => isset($formdata['lastName']) && $formdata['lastName'] ? $formdata['lastName'] : '',
                    'Email' => isset($formdata['email']) && $formdata['email'] ? $formdata['email'] : '',
                    'Password' => isset($formdata['password']) && $formdata['password'] ? md5($formdata['password']) : '',
                    'UserType' => '4',
                    'isActive' => '1',
                );
                $result = $this->User_model->insert_data($user_data);
                $user_data=$this->User_model->get_single($result);
                if ($result) {
                    $sess_array = array();
                    $this->session->set_userdata('user_data', $user_data[0]);
                    $this->session->set_userdata('alert_msg', 'User Successful Registed, You can login into your account');
                    redirect($uri, 'refresh');
                } else {
                    $this->session->set_userdata('alert_msg', 'Sign up Failed!!!');
                    redirect($uri, 'refresh');
                }
            } else {
                $this->session->set_userdata('alert_msg', 'Email already exist.');
                redirect($uri, 'refresh');
            }
        } else {
            $this->session->set_userdata('alert_msg', 'Password not matched!!!');
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
        try {
            if (!$session_data['UID'])
                throw new Exception("Session Expired Please Login");

            if (!empty($_FILES)) {
                $target_dir = UPLOADS . '/images/';
                $target_file = $target_dir . basename($_FILES["upload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if (imageFileType) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $data['error_msg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                        $response['status'] = 1;
                    } else {
                        $data['error_msg'] = "File uploading Failed because ";
                    }
                }
            } else {
                $response['error_msg'] = "File doenst exits";
            }
            $formdata = $_POST;

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
                'Photo' => isset($formdata['photo_name']) && $formdata['photo_name'] ? $formdata['photo_name'] : '',
                'AboutMe' => isset($formdata['AboutMe']) && $formdata['AboutMe'] ? $formdata['AboutMe'] : '',
                'DateJoined' => date("Y-m-d"),
                'UserType' => '4',
                'isActive' => '1',
                'Created_By' => '1',
                'Updated_By' => $_SESSION['user_data']['UID']
            );

            $user_id = $session_data['UID'];
            $result = $this->User_model->update_user($user_id, $user_data);
            $profile_data = $this->User_model->get_single($user_id);
            if ($result) {
                $data['success'] = true;
                $data['profile_data'] = $profile_data;
                $data['alert_msg'] = "User Updated";
                $data['page_title'] = "Profile Page";
                $data['page'] = 'profile';
                redirect('User/profile/'.$user_id, 'refresh');
            } else {
                $data['success'] = false;
                $data['alert_msg'] = "Updation Failed";
                $data['page_title'] = "Profile Page";
                $data['page'] = 'profile';
                $data['profile_data'] = $profile_data;
                $this->load->view('front/page', $data);
            }
        } catch (Exception $exc) {
            $response['success'] = FALSE;
            $response['msg'] = $exc->getMessage();
        }
        echo json_encode($response);
        exit();
    }

}

?>