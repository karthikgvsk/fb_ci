<?php

class Friend extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function friend_list()
    {
        $fid1 = $this->session->userdata('friend_id');
        $unknown_id = $this->session->userdata('unknown_user_id');

        if ($fid1 != null) {
            $uid = (int)$fid1;
        } elseif ($unknown_id != null) {
            $uid = (int)$unknown_id;
        }else {
            $uid = (int)$this->session->userdata('uid');
        }
        // load a view
        $friend_list_string = $this->user_model->get_friends($uid);

        if ($friend_list_string != null) {
            $friend_list_array = explode(',', $friend_list_string);

            for($j = 0;$j < count($friend_list_array);$j++) {
                $fid = $friend_list_array[$j];
                $friend = $this->user_model->get_user_by_id($fid);
                $list[] = array(
                    'uid' => $uid,
                    'fid' => $fid,
                    'friend_name' => $friend->username
                    );
            }
        } else {
            $list = null;
        }

        if ($fid1 != null) {
            $data['friend_profile'] = 1;
            $data['unknown_user_profile'] = 0;
        } elseif ($unknown_id != null) {
            $data['friend_profile'] = 0;
            $data['unknown_user_profile'] = 1;
        } else {
            $data['friend_profile'] = 0;
            $data['unknown_user_profile'] = 0;
        }

        $data['friend_list_array'] = $list;
		$data['uid'] = $uid;

        $this->load->view('header_view', $data);
        $this->load->view('friend_list_view', $data);
    }

    function friend_request()
    {
        $uid = (int)$this->session->userdata('uid');
        // load a view
        $friend_request_array = $this->user_model->get_friend_requests($uid);

        $data['friend_request_array'] = $friend_request_array;
    	$data['uid'] = $uid;
    	$data['friend_profile'] = 0;
    	$data['unknown_user_profile'] = 0;
	
	//getting an array of information of people who sent request
	
	if($friend_request_array[0] != 0){
	    for($k=0;$k<$friend_request_array;$k++){
		$frid = $friend_request_array[$k];
		$sender = $this->user_model->get_user_by_id($frid);
		$friend_requests[] = array('frid' => $frid , 'username' => $sender->username);
	    }    
	}else{
	    $friend_requests = null;
	}
	
	$data['friend_requests'] = $friend_requests;
	
    	//getting friends

    	$uid = $this->session->userdata('uid');
	
	//code for deleting already added friends
	
    	$friend_list_string = $this->user_model->get_friends($uid);

    	if ($friend_list_string != null) {
    		$friend_list_array = explode(',', $friend_list_string);

    		for($j = 0;$j < count($friend_list_array);$j++) {
    			$fid = $friend_list_array[$j];
    			$friend = $this->user_model->get_user_by_id($fid);
    			$list[] = array(
    			    'uid' => $uid,
    			    'fid' => $fid,
    			    'friend_name' => $friend->username
    			    );
    		}
    	} else {
    		$list = null;
    	}
    	$data['friend_list_array'] = $list;
	
	
    	$this->load->view('header_view', $data);
        $this->load->view('friend_request_view', $data);
    }

    function friend_adder()
    {
        $uid = (int)$this->session->userdata('uid');
        $data['uid'] = $uid;
        $data['all_users'] = $this->user_model->get_all_users();
	
	$data['friend_profile'] = 0;
	$data['unknown_user_profile'] = 0;
	$this->load->view('header_absolute', $data);
        $this->load->view('friend_adder_page', $data);
    }

    function friend_request_sender()
    {
        $uid = $this->session->userdata('uid');
        $friend_requests_sent = $this->input->post('friend_request_sent_array');
        print_r($friend_requests_sent);
        $result = $this->user_model->set_friend_request($uid, $friend_requests_sent);
        if ($result) {
            echo "SUCCESS 1";
        }
    }

	function friend_request_sender2($fid){
		$uid = $this->session->userdata('uid');
		$friend_request[0] = $fid;
		$result = $this->user_model->set_friend_request($uid, $friend_request);
		if ($result) {
			echo "success";
		}
	}

    function set_friends()
    {
        $uid = $this->session->userdata('uid');
        $friend_request_sent_array = $this->input->post('friend_request_sent_array');
        $result = $this->user_model->set_friends($uid, $friend_request_sent_array);
        if (!$result) {
            die('ERROR IN SETTING FRIENDS');
        } else {
            echo "friend list successfully updated";
        }
    }
}

?>