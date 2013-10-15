<?php

class Search extends CI_Controller {
    function Search()
    {
        parent::__construct();
        $this->load->model(array('user_model'));
        $this->load->model(array('message_model'));
        $this->load->helper(array('form', 'url'));
        $this->load->library('taggly');
    }

    function search_from_home()
    {

        $uid = $this->session->userdata('uid');
        $user_id_array[0] = $uid;
        $friend_id_string = $this->user_model->get_friends($uid);
        if ($friend_id_string != null) {
            $friend_id_array = explode(',', $friend_id_string);
            $total_id_array = array_merge($friend_id_array, $user_id_array);
        } else {
            $total_id_array = $user_id_array;
        }
        
        $search_key = $this->input->post('search_from_home');
        if($search_key == false){
            $search_key = $this->session->userdata('search_word');
            $search_word = $search_key;
        }
        
        $result_array = array();
        $this->db->from('user');
        $this->db->like('username', $search_key);
        $this->db->where_in('id', $total_id_array);
        $items = $this->db->get();

        if ($items->num_rows() > 0) {
            foreach($items->result() as $row) {
                $result_array['users'][] = $row;
            }
        } else {
            $result_array['users'] = null;
        }
        
        $data['users'] = $result_array['users'];
        
        
        $this->db->from('message');
        $this->db->like('message', $search_key);
        $this->db->where_in('uid', $total_id_array);
        $this->db->order_by('time', 'desc');

        $items = $this->db->get();
        if ($items->num_rows() > 0) {
            foreach($items->result() as $row) {
                $uid = $row->uid;
                $user = $this->user_model->get_user_by_id($uid);
                $result_array['messages'][] = array('message' => $row ,'user' => $user);
            }
        } else {
            $result_array['messages'] = null;
        }
        
        $messages = $result_array['messages'];
        
        
        $data['messages'] = $messages;
        
        //remove code for tag creation 
        //adding searches into database
        //first we will search for if already existing
        $search_key = $this->input->post('search_from_home');
        if($search_key == false){
            $search_key = $this->session->userdata('search_word');
            $search_word = $search_key;
        }
        
        $this->db->from('search');
        $this->db->where('search_word',$search_key);
        $result= $this->db->get();
        if($result->num_rows() == 1){
            $row = $result->row();
            $count = (int)$row->count;
            $count = $count + 1;
            $update = array('count' => $count);
            $this->db->where('id',$row->id);
            $this->db->update('search',$update);
        }elseif($result->num_rows() == 0){
            $uid = $this->session->userdata('uid');
            $search_key = $this->input->post('search_from_home');
            if($search_key == false){
                $search_key = $this->session->userdata('search_word');
                $search_word = $search_key;
                $this->session->unset_userdata('search_word');
            }
            $update = array('search_word' => $search_key,'count' => 1);
            $this->db->insert('search',$update);
        }
        
        $data['friend_profile'] = 0;
	$data['unknown_user_profile'] = 0;
        
        
        $this->load->view('header_absolute' , $data);
        $this->load->view('display_search_home', $data);
    }
    
    function search_from_tags($key){
        $this->session->set_userdata('search_word',$key);
        $this->search_from_home();
    }
}

?>