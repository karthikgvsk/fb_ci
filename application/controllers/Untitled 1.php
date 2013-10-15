<?php

$user_messages = $this->message_model->get_messages($uid);
if ($user_messages != null) {
    foreach($user_messages->result() as $row) {
        $user = $this->user_model->get_user_by_id($uid);
        $user_messages_array[] = array(
            'uid' => $row->uid,
            'mid' => $row->id,
            'message' => $row->message,
            'username' => $user->username,
            'time' => $row->time
            );
    }
}
if ($user_messages_array != null) {
    $count1 = count($user_messages_array);
}

$fid = $this->user_model->get_user_fid($uid);

if ($fid == - 1) {
    die('multiple users selected');
} elseif ($fid != null) {
    for($j = 0;$j < count($fid);$j++) {
        $friend_messages = $this->message_model->get_messages($fid[$j]);
        if ($friend_messages != null) {
            foreach($friend_messages->result() as $row) {
                $user = $this->user_model->get_user_by_id($fid[$j]);
                $friend_messages_array[] = array(
                    'uid' => $row->uid,
                    'mid' => $row->id,
                    'message' => $row->message,
                    'username' => $user->username,
                    'time' => $row->time
                    );
            }
        }
    }
    if ($friend_messages_array != null) {
        $count2 = count($friend_messages_array);
    }
}

if ($user_messages_array != null && $friend_messages_array != null) {
    $messages_array = array_merge($user_messages_array, $friend_messages_array);
} elseif ($user_messages_array != null && $friend_messages_array == null) {
    $messages_array = $user_messages_array;
} elseif ($user_messages_array == null && $friend_messages_array != null) {
    $messages_array = $friend_messages_array;
} else {
    $messages_array = null;
}

if ($messages_array != null) {
}

$data['messages_array'] = $messages_array;

?>