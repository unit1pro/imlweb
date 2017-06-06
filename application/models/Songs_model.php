<?php

class Songs_model extends CI_Model {

    public $table = 'songs';
    public $attachment_table = 'comment_attachments';
    public $user_table = 'usermain';
    public $comment_table = 'iml_comment_song';

    function __construct() {
        parent::__construct();
    }

    function insert_data($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update_song($song_id, $song_data) {
        $this->db->where('ID', $song_id);
        return $result = $this->db->update('songs', $song_data);
    }

    public function get($conditions = array(), $limit = NULL, $offset = NULL, $order = 'DESC') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->user_table, 'songs.Created_By = usermain.UID', 'inner');
        if (!empty($conditions)) {
            foreach ($conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        if ($limit)
            $this->db->limit($limit, $offset);
        $this->db->order_by('songs.Updated_On', $order);
        $query = $this->db->get();
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function get_single($song) {
        $sql = "SELECT * FROM songs where ID=$song";
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    function delete($id) {
        $this->db->where('ID', $id);
        return $this->db->delete('songs');
    }
}
?>



