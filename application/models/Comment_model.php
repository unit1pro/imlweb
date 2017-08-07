<?php

class Comment_model extends CI_Model {

    public $table = 'iml_comment_song';
    public $attachment_table = 'comment_attachments';
    public $user_table = 'usermain';
    public $response_table = 'social_response';
    public $song_table = 'songs';

    function __construct() {
        parent::__construct();
    }

    function insert_data($data) {

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function insert_comment_attachment($data) {

        $this->db->insert($this->attachment_table, $data);
//            print_r($this->db->last_query());exit;
        return $this->db->insert_id();
    }

    public function get_data($conditions = array(), $limit = NULL, $offset = NULL, $order = 'DESC') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->user_table, 'iml_comment_song.id = usermain.UID', 'inner');
//        $this->db->join($this->response_table, 'usermain.UID = social_response.updated_by', 'inner');
//        $query = "SELECT c.*,u.* from ".$this->table." as c INNER JOIN ".$this->user_table." ON c.id = u.UID INNER JOIN (SELECT count(1) as like_count,response_on from ".$this->response_table." WHERE response_type = 1 group by response_type) as lc ON c.=lc.response_on COM"
        if (!empty($conditions)) {
            foreach ($conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        if ($limit)
            $this->db->limit($limit, $offset);
        $this->db->order_by('COM_ID', $order);
        $query = $this->db->get();
//        print_r($this->db->last_query());
        $result = $query->result_array();
        return $result;
    }

    public function get_post_by_user($user_id) {
        $sql = "SELECT iml_comment_song.*,comment_attachments.attachment_path FROM iml_comment_song LEFT JOIN comment_attachments ON iml_comment_song.COM_ID=comment_attachments.comment_id WHERE iml_comment_song.Created_By='$user_id' and iml_comment_song.parent_id=0 ORDER BY `Updated_On` DESC LIMIT 3";
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    public function get_post_by_Id($id) {
        $sql = "SELECT iml_comment_song.*,comment_attachments.attachment_path FROM iml_comment_song LEFT JOIN comment_attachments ON iml_comment_song.COM_ID=comment_attachments.comment_id WHERE iml_comment_song.COM_ID='$id'";
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function get_total_like($post_id, $response_type) {
        $query = $this->db->query("SELECT * FROM $this->response_table WHERE response_on='" . $post_id['0'] . "' and response_type='" . $response_type . "'");
        return $query->num_rows();
    }

    public function get_total_dislike($post_id, $response_type) {
        $query = $this->db->query("SELECT * FROM $this->response_table WHERE response_on='" . $post_id['0'] . "' and response_type='" . $response_type . "'");
        return $query->num_rows();
    }

    public function get_song_comment($song_id) {
        $sql = "SELECT iml_comment_song.*, usermain.* FROM iml_comment_song INNER JOIN usermain ON iml_comment_song.Created_By=usermain.UID WHERE song_id='$song_id' ORDER BY `COM_ID` DESC";

        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function get_comment_byparent($parent_id) {
        $sql = "SELECT * FROM iml_comment_song WHERE parent_id='$parent_id' ORDER BY `created_On` DESC";

        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    function getAttachment($conditions = array(), $limit = NULL, $offset = NULL) {
        $this->db->select('*');
        $this->db->from($this->attachment_table);
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

    function get_like_status($conditions) {
        $this->db->select('*');
        $this->db->from($this->response_table);
        if (!empty($conditions)) {
            foreach ($conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();
//        print_r($this->db->last_query());exit;
        $result = $query->result_array();
        return $result;
    }

    function insert_response($data) {
        $this->db->insert($this->response_table, $data);
        return $this->db->insert_id();
    }

    function update_like_status($data, $conditions = array()) {
        if (!empty($conditions)) {
            foreach ($conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->update($this->response_table, $data);

        return TRUE;
    }

    function getResponse($post_id, $user_id) {
        $sql = "SELECT response_type FROM social_response WHERE response_on='$post_id' and updated_by='$user_id'";
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    function deletePost($id){
//        print_r($id);
//        $condition = array(
//            'COM_ID' => $id
//        );
        $this->db->delete($this->attachment_table,array('comment_id' => $id));
        $this->db->delete($this->table, array('COM_ID' => $id));
//        print_r($this->db->last_query());exit;
        return true;

    }

    

}

?>
