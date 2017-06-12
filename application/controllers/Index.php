<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,OPTIONS");
require_once('./vendor/autoload.php');

use Postmark\PostmarkClient;

//ini_set('display_errors', 1);

class Index extends CI_Controller {

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
        $data['page'] = "home";
        $this->load->view('home/page', $data);
    }

    function bookArtist() {
        $data = $_POST;
        $html = '<div>
                        <table border="0">
                            <tr>
                                <th colspan="2">
                                    New Booking For Shikhar Kumar
                                </th> 
                            </tr>
                            <tr>
                                <th>Requester Email</th><td>' . $data['email'] . '</td>
                            </tr><tr>
                                <th>Requester name</th><td>' . $data['name'] . '</td>
                            </tr><tr>
                                <th>Message</th><td>' . $data['message'] . '</td>
                            </tr>
                        </table>
                    </div>';

        $subject = $data['subject'] . " : " . $data['name'];
        $result = $this->sendMail('contact@indianmusiclab.com', 'artist@indianmusiclab.com', $subject, $html);
        if (!$result) {
            echo "Your Request Can Not Be saved Please Try Again";
        } else {
            echo "Your request has been received, we will contact you within 24 hours";
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

    function uploadFiles() {
//        exit('hello');
        $imageUploadPath = UPLOADS . '/images';
        $videoUploadPath = UPLOADS . '/videos';
        $audioUploadPath = UPLOADS . '/audios';
        $session_data = $this->session->userdata('user_data');
//        if ($session_data['UID']) {
        $response = array();
        $date = date('YmdHisu');
        $input = $_FILES["file"]["tmp_name"];
        $name = str_replace(' ', '', basename($_FILES['file']['name']));
        $filename = explode('.', $name);
//        print_r($filename);exit;
//            $uploaddir = ROOT_DIR . 'community/uploads/';
        if ($_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/gif') {
            $type = 'images';
            $uploadfile = $imageUploadPath . '/' . $date . $name;

            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $response['success'] = TRUE;
                $response['type'] = $type;
                $response['filename'] = $date . $name;
            } else {
                $response['success'] = FALSE;
            }
        } else if ($_FILES['file']['type'] == 'video/x-msvideo' || $_FILES['file']['type'] == 'video/x-flv' || $_FILES['file']['type'] == 'video/x-matroska' || $_FILES['file']['type'] == 'video/x-mpeg' || $_FILES['file']['type'] == 'video/ogg' || $_FILES['file']['type'] == 'video/x-ms-wmv' || $_FILES['file']['type'] == 'video/mp4') {
            $type = 'videos';

            $uploadfile = $videoUploadPath . '/' . $date . $name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $response['success'] = TRUE;
                $response['type'] = $type;
                $response['filename'] = $date . $name;
            } else {
                $response['success'] = FALSE;
            }
//                $uploadfile = $videoUploadPath . '/' . $date . $filename[0] . '.mp4';
//                $command = "ffmpeg -i $input -vcodec h264 -acodec aac -strict -2 $uploadfile";
//
//                @exec($command, $ret);
//                $response['success'] = TRUE;
//                $response['type'] = $type;
//                $response['filename'] = WWWROOT . 'live/community/uploads/' . $type . '/' . $date . $filename[0] . '.mp4';
//            var_dump($command);
//            exit;
        } else if ($_FILES['file']['type'] == 'audio/aac' || $_FILES['file']['type'] == 'audio/mp3' || $_FILES['file']['type'] == 'audio/wav' || $_FILES['file']['type'] == 'audio/x-ms-wma' || $_FILES['file']['type'] == 'audio/ogg') {
            $type = 'audios';
//                $uploadfile = $uploaddir . '/' . $type . '/' . $date . $filename[0] . '.mp3';
//                $command = "ffmpeg -i $input -acodec libmp3lame $uploadfile";
//                @exec($command, $ret);
//                $response['success'] = TRUE;
//                $response['type'] = $type;
//                $response['filename'] = WWWROOT . 'live/community/uploads/' . $type . '/' . $date . $filename[0] . '.mp3';

            $uploadfile = $audioUploadPath . '/' . $date . $name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $response['success'] = TRUE;
                $response['type'] = $type;
                $response['filename'] = $date . $name;
            } else {
                $response['success'] = FALSE;
            }
        }
//        }else{
//            $response['success'] = FALSE;
//            $response['msg'] = "Session Expired Please Login";
//        }
        echo json_encode($response);
        exit;
    }

    Public function post_comment() {
        $session_data = $this->session->userdata('user_data');
        $response = array();
        try {
            $formData = $_POST;
            if (!$session_data['UID'])
                throw new Exception("Session Expired Please Login");
            if ($formData['COMMENTS'] == '' && (!isset($formData['attchment_path'])))
                throw new Exception("Please write some comment or add a file to submit");
            $insertData = array(
                'ID' => $session_data['UID'],
                'parent_id' => isset($formData['parent_id']) && $formData['parent_id'] ? $formData['parent_id'] : 0,
                'Song_id' => isset($formData['Song_id']) && $formData['Song_id'] ? $formData['Song_id'] : 0,
                'COMMENTS' => isset($formData['COMMENTS']) && $formData['COMMENTS'] ? $formData['COMMENTS'] : '',
                'isActive' => 1,
                'created_by' => $session_data['UID'],
                'updated_by' => $session_data['UID'],
            );

            $comment_id = $this->Comment_model->insert_data($insertData);
            if (!$comment_id)
                throw new Exception("Comment not saved Please check your network and try again");
            if ($comment_id && isset($formData['attchment_path']) && !empty($formData['attchment_path'])) {
                $attachmentId = array();
                foreach ($formData['attchment_path'] as $key => $attachment_path) {
                    $attachmentData = array(
                        'comment_id' => $comment_id,
                        'attachment_type' => $formData['attchment_type'][$key],
                        'attachment_path' => $attachment_path,
                        'isActive' => 1,
                        'created_by' => $session_data['UID'],
                        'updated_by' => $session_data['UID'],
                    );
                    $attachmentId[] = $this->Comment_model->insert_comment_attachment($attachmentData);
                }
            }
            $comment = $this->Comment_model->get_data(array('COM_ID' => $comment_id));
            $comment[0]['attachment'] = $this->Comment_model->getAttachment(array('comment_id' => $comment_id));
            $response['success'] = TRUE;
            $response['msg'] = "Post Saved";
            $response['comment'] = $comment;
        } catch (Exception $exc) {
            $response['success'] = FALSE;
            $response['msg'] = $exc->getMessage();
        }

        echo json_encode($response);
        exit();
    }

    public function get_posts() {
        $response = array();
        $comments = array();
        try {
            $formdata = $_POST;
            $limit = isset($formdata['limit']) && $formdata['limit'] ? $formdata['limit'] : NULL;
            $offset = isset($formdata['offset']) && $formdata['offset'] ? $formdata['offset'] : NULL;
            $offset_song = isset($formdata['offset_song']) && $formdata['offset_song'] ? $formdata['offset_song'] : NULL;
            $conditions_song = array('songs.isActive' => 1);
            $conditions = array(
                'parent_id' => 0,
                'UserType' => 4,
            );
            $comments = $this->Comment_model->get_data($conditions, $limit, $offset);
            $song_limit = 5 - count($comments);
            $songs = $this->Songs_model->get($conditions_song, $song_limit, $offset_song);
            $session_user_id = $_SESSION['user_data']['UID'];
            $i = 0;
            if (is_array($comments) && !empty($comments)) {
                foreach ($comments as $key => $value) {
                    $i++;
                    $comments[$key]['song'] = FALSE;
                    $result = $this->Comment_model->getResponse($value['COM_ID'], $session_user_id);
                    $comments[$key]['user_response'] = (int) $result[0]['response_type'];
                    $comments[$key]['attachment'] = $this->Comment_model->getAttachment(array('comment_id' => $value['COM_ID']));
                    $comments[$key]['like_count'] = $this->Comment_model->get_total_like(array($value['COM_ID']), 1);
                    $comments[$key]['dislike_count'] = $this->Comment_model->get_total_dislike(array($value['COM_ID']), 2);
                    $comments[$key]['subComments'] = $this->Comment_model->get_data(array('parent_id' => $value['COM_ID']), 2, 0, 'DESC');
                    foreach ($comments[$key]['subComments'] as $key2 => $value2) {
                        $comments[$key]['subComments'][$key2]['like_count'] = $this->Comment_model->get_total_like(array($value2['COM_ID']), 1);
                        $comments[$key]['subComments'][$key2]['dislike_count'] = $this->Comment_model->get_total_like(array($value2['COM_ID']), 2);
                        $result_sub = $this->Comment_model->getResponse($value2['COM_ID'], $session_user_id);
                        $comments[$key]['subComments'][$key2]['user_response'] = (int) $result_sub[0]['response_type'];
                    }
                }
            }
            if (is_array($songs) && !empty($songs)) {
                foreach ($songs as $key1 => $value1) {
                    $result1 = array();
                    $comments[$i] = $value1;
                    $comments[$i]['song'] = true;
                    $result = $this->Comment_model->getResponse($value1['ID'], $session_user_id);
                    $comments[$i]['user_response'] = (int) $result1[0]['response_type'];
                    $comments[$i]['like_count'] = $this->Comment_model->get_total_like(array($value1['ID']), 1);
                    $comments[$i]['dislike_count'] = $this->Comment_model->get_total_dislike(array($value1['ID']), 2);
                    $comments[$i]['subComments'] = $this->Comment_model->get_data(array('Song_id' => $value1['ID']), 2, 0, 'DESC');
                    foreach ($comments[$i]['subComments'] as $key3 => $value3) {
//                        print_r($this->Comment_model->get_total_like(array($value3['Song_id']), 1));exit;
                        $comments[$i]['subComments'][$key3]['like_count'] = $this->Comment_model->get_total_like(array($value3['Song_id']), 1);
                        $comments[$i]['subComments'][$key3]['dislike_count'] = $this->Comment_model->get_total_dislike(array($value3['Song_id']), 2);
                        $result_sub = $this->Comment_model->getResponse($value3['Song_id'], $session_user_id);
                        $comments[$i]['subComments'][$key3]['user_response'] = (int) $result_sub[0]['response_type'];
                    }
                    $i++;
                }
//                print_r($comments);exit;
            }
            $response['success'] = TRUE;
            $response['song_offset'] = $offset_song + $song_limit;
            $response['comment'] = $comments;
        } catch (Exception $exc) {
            $response['success'] = FALSE;
            $response['msg'] = $exc->getMessage();
        }
        echo json_encode($response);
        exit();
    }

    public function get_posts_industry() {
        $response = array();
        $comments = array();
        $session_data = $this->session->userdata('user_data');
        try {
            $formdata = $_POST;
            if ($session_data['UserType'] == 5) {

                $limit = isset($formdata['limit']) && $formdata['limit'] ? $formdata['limit'] : NULL;
                $offset = isset($formdata['offset']) && $formdata['offset'] ? $formdata['offset'] : NULL;
                $conditions = array(
                    'parent_id' => 0,
                    'UserType' => 5,
                );
                $comments = $this->Comment_model->get_data($conditions, $limit, $offset);
                if (is_array($comments) && !empty($comments)) {
                    foreach ($comments as $key => $value) {
//                    print_r($value['COM_ID']);
//                    print_r($key);
                        $comments[$key]['attachment'] = $this->Comment_model->getAttachment(array('comment_id' => $value['COM_ID']));
                        $comments[$key]['subComments'] = $this->Comment_model->get_data(array('parent_id' => $value['COM_ID']), 2, 0, 'DESC');
                    }
//                exit;
                } else {
                    throw new Exception("No data fetched");
                }

                $response['success'] = TRUE;
                $response['comment'] = $comments;
            } else {
                if ($formdata['offset'] == 0) {
                    $conditions = array(
                        'UserType' => 5,
                    );
                    $comments = $this->User_model->get_data($conditions);
                    if (!is_array($comments) || empty($comments))
                        throw new Exception("No data fetched");
                    $response['success'] = TRUE;
                    $response['comment'] = $comments;
                }
            }
        } catch (Exception $exc) {
            $response['success'] = FALSE;
            $response['msg'] = $exc->getMessage();
        }
        echo json_encode($response);
        exit();
    }

    public function like() {

        $data = $_POST;
        $response = array();
        try {
            $conditions = array(
                'response_on' => $data['comment_id'],
                'post_type' => $data['post_type'],
                'updated_by' => $data['userid'],
            );

            $search_result = $this->Comment_model->get_like_status($conditions);
//            print "<pre>";
//            print_r($search_result);
//            exit;
            if (empty($search_result)) {
//                if ($data['response_type'] == 1) {
                $likeData = array(
                    'post_type' => $data['post_type'],
                    'response_type' => $data['response_type'],
                    'response_on' => $data['comment_id'],
                    'created_by' => $data['userid'],
                    'created_on' => date("Y-m-d h:i:s"),
                    'updated_by' => $data['userid'],
                    'updated_on' => date("Y-m-d h:i:s"),
                );
                $likeId = $this->Comment_model->insert_response($likeData);

                if ($likeId) {
                    $response['success'] = TRUE;
                    $response['data'] = $likeId;
                    $response['msg'] = $data['response_type'];
                }
//                } else if ($data['response_type'] == 2) {
//                    $dislikeData = array(
//                        'post_type' => $data['post_type'],
//                        'response_type' => $data['response_type'],
//                        'response_on' => $data['comment_id'],
//                        'created_by' => $data['userid'],
//                        'created_on' => date("Y-m-d h:i:s"),
//                        'updated_by' => $data['userid'],
//                        'updated_on' => date("Y-m-d h:i:s"),
//                    );
//                    $likeId = $this->Comment_model->insert_response($dislikeData);
//
//                    if ($likeId) {
//                        $response['success'] = TRUE;
//                        $response['data'] = $likeId;
//                        $response['msg'] = 'dislike';
//                        $response['likeCount'] = $this->Comment_model->get_total_like(array($data['comment_id']), 1);
//                        $response['dislikeCount'] = $this->Comment_model->get_total_dislike(array($data['comment_id']), 2);
//                    }
//                }
            } else {

                $response_type = $search_result[0]['response_type'];
                if ($response_type == $data['response_type']) {
                    $like_data = array(
                        'response_type' => 0,
                        'updated_by' => $data['userid'],
                        'updated_on' => date("Y-m-d h:i:s"),
                    );
                } else {
                    $like_data = array(
                        'response_type' => $data['response_type'],
                        'updated_by' => $data['userid'],
                        'updated_on' => date("Y-m-d h:i:s"),
                    );
                }
                $update_result = $this->Comment_model->update_like_status($like_data, array('response_on' => $data['comment_id'], 'updated_by' => $data['userid']));
                if ($update_result) {
                    $response['success'] = TRUE;
                    $response['data'] = $update_result;
                    $response['msg'] = $like_data['response_type'];
                }



//                if ($data['response_type'] == 1) {
//
//                    if ($response_type == 1) {
//                        $dislike_data = array(
//                            'response_type' => 0,
//                            'updated_by' => $data['userid'],
//                            'updated_on' => date("Y-m-d h:i:s"),
//                        );
//
//                        $update_result = $this->Comment_model->update_like_status($dislike_data, array('response_on' => $data['comment_id'], 'updated_by' => $data['userid']));
//                        if ($update_result) {
//                            $response['success'] = TRUE;
//                            $response['data'] = $update_result;
//                            $response['msg'] = 'neutral';
//                            $response['likeCount'] = $this->Comment_model->get_total_like(array($data['comment_id']), 1);
//                            $response['dislikeCount'] = $this->Comment_model->get_total_dislike(array($data['comment_id']), 2);
//                        }
//                    } else {
//                        $like_data = array(
//                            'response_type' => 1,
//                            'updated_by' => $data['userid'],
//                            'updated_on' => date("Y-m-d h:i:s"),
//                        );
//                        $update_result = $this->Comment_model->update_like_status($like_data, array('response_on' => $data['comment_id'], 'updated_by' => $data['userid']));
//                        if ($update_result) {
//                            $response['success'] = TRUE;
//                            $response['data'] = $update_result;
//                            $response['msg'] = 'like';
//                            $response['likeCount'] = $this->Comment_model->get_total_like(array($data['comment_id']), 1);
//                            $response['dislikeCount'] = $this->Comment_model->get_total_dislike(array($data['comment_id']), 2);
//                        }
//                    }
//                } else if ($data['response_type'] == 2) {
//
//                    $response_type = $search_result[0]['response_type'];
//                    if ($response_type == 2) {
//                        $dislike_data = array(
//                            'response_type' => 0,
//                            'updated_by' => $data['userid'],
//                            'updated_on' => date("Y-m-d h:i:s"),
//                        );
//
//                        $update_result = $this->Comment_model->update_like_status($dislike_data, array('response_on' => $data['comment_id'], 'updated_by' => $data['userid']));
//                        if ($update_result) {
//                            $response['success'] = TRUE;
//                            $response['data'] = $update_result;
//                            $response['msg'] = 'nuetral';
//                            $response['likeCount'] = $this->Comment_model->get_total_like(array($data['comment_id']), 1);
//                            $response['dislikeCount'] = $this->Comment_model->get_total_dislike(array($data['comment_id']), 2);
//                        }
//                    } else {
//                        $like_data = array(
//                            'response_type' => 2,
//                            'updated_by' => $data['userid'],
//                            'updated_on' => date("Y-m-d h:i:s"),
//                        );
//                        $update_result = $this->Comment_model->update_like_status($like_data, array('response_on' => $data['comment_id']));
//                        if ($update_result) {
//                            $response['success'] = TRUE;
//                            $response['data'] = $update_result;
//                            $response['msg'] = 'dislike';
//                            $response['likeCount'] = $this->Comment_model->get_total_like(array($data['comment_id']), 1);
//                            $response['dislikeCount'] = $this->Comment_model->get_total_dislike(array($data['comment_id']), 2);
//                        }
//                    }
//                }
            }
            $response['likeCount'] = $this->Comment_model->get_total_like(array($data['comment_id']), 1);
            $response['dislikeCount'] = $this->Comment_model->get_total_dislike(array($data['comment_id']), 2);
        } catch (Exception $exc) {
            $response['success'] = FALSE;
            $response['msg'] = $exc->getMessage();
        }
        echo json_encode($response);
        exit();
    }

}
