<?php

class Songs_model extends CI_Model {

    public $table = 'songs';
    public $song_cat_table = 'song_cat';
    public $usermain_table = 'usermain';
    public $comment_table = 'iml_comment_song';

    function __construct() {
        parent::__construct();
    }
    
    function get_song_details($id,$conditions=array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->user_table, 'iml_comment_song.id = usermain.UID', 'inner');
        if (!empty($conditions)) {
            foreach ($conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        if ($limit)
            $this->db->limit($limit, $offset);
        $this->db->order_by('COM_ID', $order);
        $query = $this->db->get();
//        print_r($this->db->last_query());exit;
        $result = $query->result_array();
        return $result;
    }
}

