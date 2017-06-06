<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,OPTIONS");

class SingWithUs extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('SingWithUs_model');
        $this->load->helper('url');
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
        $data['result']=$session_data = $this->session->userdata('msg');
        $this->session->set_userdata('msg', '');
        
        $data['page'] = "singwithus";
        $this->load->view('home/page', $data);
    }

    function insert_data() {
        $form_data = $_POST;
//        print_r($form_data);
        try {
//        print_r($_FILES['attachment']);
            if (!isset($_FILES['attachment']['error']) || is_array($_FILES['attachment']['error'])) {
                throw new RuntimeException('Invalid parameters.');
            }
            switch ($_FILES['attachment']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }
            if ($_FILES['attachment']['size'] > 1000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }
            $types = array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
                'mp4' => 'video/mp4',
                'wmv' => 'video/x-ms-wmv',
                'mov' => 'video/quicktime',
                'avi' => 'video/msvideo',
                'avi' => 'video/avi',
                'avi' => 'application/x-troff-msvideo',
                'mp3' => 'audio/mpeg3',
                'mp3' => 'audio/x-mpeg-3',
                'mp3' => 'audio/mpeg',
                'mp3' => 'audio/x-mpeg'
            );
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search($finfo->file($_FILES['attachment']['tmp_name']), $types, true)) {
                throw new RuntimeException('Invalid file format.');
            }
            
            $filename = base_url() . sprintf('./uploads/singWithUs/%s_%s.%s', md5($_FILES['upfile']['tmp_name']), date('ymdhis'), $ext);

//            echo $filename;
//            exit;
            if (!move_uploaded_file($_FILES['attachment']['tmp_name'], sprintf('./uploads/singWithUs/%s_%s.%s', md5($_FILES['upfile']['tmp_name']), date('ymdhis'), $ext))) {
                throw new RuntimeException('Failed to move uploaded file.');
            }

            $uploadResult = TRUE;
            if ($uploadResult) {
                $insertData = array(
                    'name' => $form_data['name'],
                    'phone' => $form_data['phone'],
                    'email' => $form_data['email'],
                    'message' => $form_data['message'],
                    'attachement_path' => $filename,
                    'attachment_type' => $types[$ext]
                );
                $insertResult=0;
                $insertResult = $this->SingWithUs_model->insert_data($insertData);
                if ($insertResult!=0) {
                    
                    $this->session->set_userdata('msg', 'Your request has been sent we will contact you soon');
//                print_r($insertResult);
              
//                    redirect('SingWithUs/index', 'refresh');
                    $this->index();
                }
            }
        } catch (RuntimeException $e) {
            $this->session->set_userdata('msg', $e->getMessage());
//                    redirect('SingWithUs/index', 'refresh');
                    $this->index();
        }
    }

}
