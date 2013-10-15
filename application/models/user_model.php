<?php

class User_model extends CI_Model {
    function User_model()
    {
        parent::__construct();
    }

    function user_check($uid)
    {
    }

    function get_all_users()
    {
        $this->db->from('user');
        return $this->db->get();
    }

    function getid($un, $pd)
    {
        $this->db->where('username', $un);
        $this->db->where('password', $pd);
        $result = $this->db->get('user');
        if ($result->num_rows > 1) {
            $return - 1;
        } elseif ($result->num_rows == 0) {
            return 0;
        } else {
            $row = $result->row();
            return $row->id;
        }
    }

    function get_user_by_id($uid)
    {
        $this->db->from('user');
        $this->db->where('id', $uid);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return null;
        }
    }

    function get_friends($uid)
    {
        $this->db->select('friend_id');
        $this->db->from('user');
        $this->db->where('id', $uid);
        $query = $this->db->get();
        if ($query->num_rows == 1) {
            $row = $query->row();
            return $row->friend_id;
        } else {
            return null;
        }
    }

    function get_friend_requests($uid)
    {
        $this->db->select('friend_request');
        $this->db->from('user');
        $this->db->where('id', $uid);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $friend_request_string = $row->friend_request;
            if ($friend_request_string == null) {
                $friend_request_array[] = 0;
            } else {
                $friend_request_array = explode(',', $friend_request_string);
            }
            return $friend_request_array;
        } else {
            // additional functionality required (what has to be returned)
            return null;
        }
    }

    function set_friend_request($uid, $request_array)
    {
        // updating the friend_request_string in each of id's of friend requests sent
        $status = false;
        for($j = 0;$j < count($request_array);$j++) {
            $fid = $request_array[$j];
            $this->db->from('user');
            $this->db->where('id', $fid);
            $query = $this->db->get();
            if (($query->num_rows) != 1) {
                die('absurd number of friends selected');
            } else {
                $row = $query->row();
                $previous_request_string = $row->friend_request;
                if ($previous_request_string == null) {
                    $new_request_string = (string)$uid;
                    echo $new_request_string . ",," . $fid . "--" . ($j + 1) . "<br />";
                    $this->db->where('id', $fid);
                    $update = array('friend_request' => $new_request_string);
                    $result = $this->db->update('user', $update);
                    if (!$result) {
                        die('failed 1');
                    } else {
                        $status = true;
                    }
                } else {
                    $previous_request_array = explode(',', $previous_request_string);
                    $new_request_array[] = $uid;
                    $mod_request_array = array_merge($previous_request_array, $new_request_array);
                    $mod_request_array = array_unique($mod_request_array);
                    $mod_request_string = implode(',', $mod_request_array);
                    echo $mod_request_string . ",," . $fid . "--" . ($j + 1) . "<br />";
                    $this->db->where('id', $fid);
                    $update = array('friend_request' => $mod_request_string);
                    $result = $this->db->update('user', $update);
                    if (!$result) {
                        die('failed 2');
                    } else {
                        $status = true;
                    }
                }
            }
        }
    	return $status;
    }

    function set_friends($uid, $friend_request_sent_array)
    {
        // THIS FUNCTION IS INTENDED TO UPDATE THE FRIEND LIST OF VARIOUS USERS IN THE DATABASE
        $friend_request_array = array_unique($friend_request_sent_array);
        $friend_request_string = implode(',', $friend_request_array);
        $status = false;

        $this->db->from('user');
        $this->db->where('id', $uid);
        $query = $this->db->get();
        if ($query->num_rows != 1) {
            die('more than 1 user having same id!');
        } else {
            $this->db->from('user');
            $this->db->where('id', $uid);
            $query = $this->db->get();
            $row = $query->row();
            $prev_friend_list = $row->friend_id;

            if ($prev_friend_list == null) {
                $this->db->where('id', $uid);
                $update = array('friend_id' => $friend_request_string);
                $result = $this->db->update('user', $update);
                if (!$result) {
                    die('friends not updated');
                } else {
                    $status = true;
                }
                // UPDATING THE FRIEND LIST OF FRIENDS
                for($j = 0;$j < count($friend_request_array);$j++) {
                    $fid = $friend_request_array[$j];
                    $this->db->from('user');
                    $this->db->where('id', $fid);
                    $query = $this->db->get();

                    if ($query->num_rows != 1) {
                        die('more than 1 user having same id!');
                        $status = false;
                    } else {
                        $fid = $friend_request_array[$j];
                        $this->db->from('user');
                        $this->db->where('id', $fid);
                        $query = $this->db->get();

                        $row = $query->row();
                        $prev_friend_list_of_friend = $row->friend_id;
                        if ($prev_friend_list_of_friend == null) {
                            $update = array('friend_id' => $uid);
                            $this->db->where('id', $fid);
                            $result = $this->db->update('user', $update);

                            if (!$result) {
                                die('went wrong');
                                $status = false;
                            } else {
                                $status = true;
                            }
                        } else {
                            $prev_friend_array_of_friend = array_unique(explode(',', $prev_friend_list_of_friend));
                            $new_friend_array_of_friend = array_unique($friend_request_sent_array);
                            $mod_friend_array_of_friend = array_merge($prev_friend_array_of_friend, $new_friend_array_of_friend);
                            $mod_friend_array_of_friend = array_unique($mod_friend_array_of_friend);
                            $mod_friend_list_of_friend = implode($mod_friend_array_of_friend);

                            $update = array('friend_id' => $uid);
                            $this->db->where('id', $fid);
                            $result = $this->db->update('user', $update);

                            if (!$result) {
                                die('went wrong');
                                $status = false;
                            } else {
                                $status = true;
                            }
                        }
                    }
                }
            } else {
                $this->db->from('user');
                $this->db->where('id', $uid);
                $query = $this->db->get();
                $row = $query->row();
                $previous_friend_list = $row->friend_id;

                $previous_friend_array = array_unique(explode(',', $previous_friend_list));
                $new_request_array = $friend_request_sent_array;
                $mod_friend_array = array_merge($previous_friend_array, $new_request_array);
                $mod_friend_string = implode(',', $mod_friend_array);

                $this->db->where('id', $uid);
                $update = array('friend_id' => $mod_friend_string);
                $result = $this->db->update('user', $update);
                if (!$result) {
                    die('friends not updated');
                } else {
                    $status = true;
                }
                // UPDATING THE FRIEND LIST OF FRIENDS
                for($j = 0;$j < count($friend_request_array);$j++) {
                    $fid = $friend_request_array[$j];
                    $this->db->from('user');
                    $this->db->where('id', $fid);
                    $query = $this->db->get();

                    if ($query->num_rows != 1) {
                        die('more than 1 user having same id!');
                        $status = false;
                    } else {
                        $fid = $friend_request_array[$j];
                        $this->db->from('user');
                        $this->db->where('id', $fid);
                        $query = $this->db->get();

                        $row = $query->row();
                        $prev_friend_list_of_friend = $row->friend_id;
                        if ($prev_friend_list_of_friend == null) {
                            $update = array('friend_id' => $uid);
                            $this->db->where('id', $fid);
                            $result = $this->db->update('user', $update);

                            if (!$result) {
                                die('went wrong');
                                $status = false;
                            } else {
                                $status = true;
                            }
                        } else {
                            $prev_friend_array_of_friend = array_unique(explode(',', $prev_friend_list_of_friend));
                            $new_friend_array_of_friend = array_unique($friend_request_sent_array);
                            $mod_friend_array_of_friend = array_merge($prev_friend_array_of_friend, $new_friend_array_of_friend);
                            $mod_friend_array_of_friend = array_unique($mod_friend_array_of_friend);
                            $mod_friend_list_of_friend = implode($mod_friend_array_of_friend);

                            $update = array('friend_id' => $uid);
                            $this->db->where('id', $fid);
                            $result = $this->db->update('user', $update);

                            if (!$result) {
                                die('went wrong');
                                $status = false;
                            } else {
                                $status = true;
                            }
                        }
                    }
                }
            }
        }

        if ($status = true) {
            $this->db->from('user');
            $this->db->where('id', $uid);
            $query = $this->db->get();
            $row = $query->row();
            $old_friend_request_list = $row->friend_request;
            $old_friend_request_array = explode(',', $old_friend_request_list);
            $mod_friend_request_array = array_diff($old_friend_request_array, $friend_request_sent_array);
            $mod_friend_request_string = implode(',', $mod_friend_request_array);

            $update = array('friend_request' => $mod_friend_request_string);
            $this->db->where('id', $uid);
            $result = $this->db->update('user', $update);
            if (!$result) {
                die('friend request firld not updated');
                $status = false;
            } else {
                $status = true;
            }
        }

        if ($status == true) {
            for($j = 0;$j < count($friend_request_array);$j++) {
                $fid = $friend_request_array[$j];
                $update = array('uid' => $uid, 'fid' => $fid);
                $result = $this->db->insert('friends_list', $update);
                if (!$result) {
                    die('friends not set, error');
                    $status = false;
                }
            }
        }

        return $status;
    }

    function get_user_fid($uid)
    {
        $uid = (int)$uid;
        $this->db->from('user');
        $this->db->where('id', $uid);
        $result = $this->db->get();
        if ($result->num_rows == 1) {
            $row = $result->row();
            $friend_string = $row->friend_id;
            if ($friend_string != null) {
                $friend_array = explode(',', $friend_string);
                return $friend_array;
            } else {
                return null;
            }
        } else {
            return - 1;
        }
    }

    function get_user($un)
    {
        $this->db->from('user');
        $this->db->where('username', $un);
        $result = $this->db->get();
        return $result->num_rows();
    }

    function set_user($un, $pd, $fn, $ln)
    {
        $values = array(
            'username' => $un,
            'password' => $pd,
            'first_name' => $fn,
            'last_name' => $ln
            );
        $result = $this->db->insert('user', $values);
        return $result;
    }

    function get_user_by_email($email_address)
    {
        $this->db->from('user');
        $this->db->where('email', $email_address);
        $result = $this->db->get();
        return $result;
    }

    function friend_suggestor($uid)
    {
    }
}

?>