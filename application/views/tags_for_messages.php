if ($messages != null) {
            for($k = 0;$k < count($messages);$k++) {
                $msg = $messages[$k];
                $count = strlen($msg->message);
                $mid = $msg->id;
                $message = $msg->message;
                $tag_array[$k] = array($count, $message,base_url().'index.php/login/show_comments/' . $mid);
            }
        } else {
            $tag_array = null;
        }

        $data['result_array'] = $result_array;
        if ($tag_array != null) {
            $tags = $this->taggly->cloud($tag_array);
        } else {
            $tags = null;
        }
        $data['tags'] = $tags;