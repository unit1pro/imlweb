<?php

class Home_model extends CI_Model {

    public $userTable = 'usermain';
    public $songsTable = 'songs';
    public $userSongTable = 'user_song';

//    public $artistTable = 'artist';

    function __construct() {
        parent::__construct();
    }

    public function get_video($condition = array(), $limit = NULL, $offset = NULL) {
        $sql = "SELECT s.*,u.FirstName,u.LastName,us.UID,us.SongsID,mus.LUSID From (SELECT max(ID) AS LUSID, UID as LUID FROM " . $this->userSongTable . " GROUP BY UID) AS mus INNER JOIN " . $this->userSongTable . " AS us ON mus.LUSID = us.ID INNER JOIN " . $this->songsTable . " AS s ON us.SongsID = s.ID INNER JOIN " . $this->userTable . " AS u ON us.UID = u.UID WHERE s.Song_status = 1 ";
        if(!empty($condition)){
            foreach ($condition as $key => $value) {
                $sql.=" AND $key = $value";
            }
        }
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    public function getVideoBySongId($songID) {
        $sql = "Select us.*,s.*,u.* FROM " . $this->userSongTable . " AS us INNER JOIN " . $this->songsTable . " AS s ON us.SongsID = s.ID INNER JOIN " . $this->userTable . " AS u ON us.UID = u.UID WHERE s.Song_status = 1 AND us.SongsID = $songID";
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    public function get_artist_video($artist_id,$songID) {
        $sql = "Select us.*,s.*,u.* FROM " . $this->userSongTable . " AS us INNER JOIN " . $this->songsTable . " AS s ON us.SongsID = s.ID INNER JOIN " . $this->userTable . " AS u ON us.UID = u.UID WHERE s.Song_status = 1 AND us.UID = $artist_id AND us.SongsID != $songID";
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    public function get_video_by_artist($artist_id) {
        $sql = "Select us.*,s.*,u.* FROM " . $this->userSongTable . " AS us INNER JOIN " . $this->songsTable . " AS s ON us.SongsID = s.ID INNER JOIN " . $this->userTable . " AS u ON us.UID = u.UID WHERE s.Song_status = 1 AND us.UID = $artist_id ORDER BY us.created_On DESC";
        $query = $this->db->query($sql);
        $result = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

}
