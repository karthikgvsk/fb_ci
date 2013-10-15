<?php

class Message_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    // gets messages for all ids given in an array
    function get_messages($total_id_array, $limit, $offest)
    {
        $this->db->from('message');
        $this->db->where_in('uid', $total_id_array);
        $this->db->order_by('time', 'desc');
        $this->db->limit($limit, $offest);
        $query = $this->db->get();
        return $query;
    }
    // returns number of messages posted by an array of ids
    function get_message_number($total_id_array)
    {
        $this->db->from('message');
        $this->db->where_in('uid', $total_id_array);
        $this->db->order_by('time', 'desc');
        $query = $this->db->get();
        return (int)($query->num_rows());
    }

    function set_message($uid, $message)
    {
        $message = array('uid' => $uid, 'message' => $message);
        $result = $this->db->insert('message', $message);
        return $result;
    }

    function get_comments($mid)
    {
        $this->db->from('comment');
        $this->db->where('mid', $mid);
        $this->db->order_by('time', 'asc');
        $query = $this->db->get();
        return $query;
    }

    function set_comment($uid, $mid, $comment)
    {
        $comments = array('uid' => $uid, 'mid' => $mid, 'comment' => $comment);
        $result = $this->db->insert('comment', $comments);
        return $result;
    }

	function get_message($mid){
		$this->db->from('message');
		$this->db->where('id',$mid);
		$result=$this->db->get();
		$row=$result->row();
		return $row;
	}
}

?>