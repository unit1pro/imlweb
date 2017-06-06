<?php

class user_song_model extends CI_Model {

    public $table = 'user_song';

    function __construct() {
        parent::__construct();
    }

    function insert_data($data) {

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    function update_songs_info($song_id,$song_data) {
        $this->db->where('SongsID', $song_id);
        $result = $this->db->update('user_song', $song_data);
        return $result;
    }

    public function get($conditions = array()) {
        $this->db->select('*');
        $this->db->from($this->table);
        if (!empty($conditions)) {
            foreach ($conditions as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
?>



