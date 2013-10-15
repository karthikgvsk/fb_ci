
    
<div id=main>

<?php

if ($users != null) {
    
    echo "users:";
    $user_array = $users;
    for($j = 0;$j < count($user_array);$j++) {
        $user = $user_array[$j];
        $id = $user->id;
        $username = $user->username;
        echo "<img src = ".base_url()."profile_pics/{$user->id}.jpg width = 50px />";
        echo anchor('login/user_from_search/' . $id, $username);
    }
} else {
    echo "no users from search";
}

echo "<br /><br />";

//if ($tags != null) {
    //echo "messages:";
    //echo "<br />";
    //echo $tags;
//} else {
    //echo "no messages from search";
//}


if($messages == null){
    echo "<p>no messages to display</p>";
}else{
    echo "<p>messages:</p>";
    echo "<br />";
    for($j=0;$j<count($messages);$j++){
        $msg = $messages[$j]['message'];
        $user = $messages[$j]['user'];
        echo "<img src = ".base_url()."profile_pics/{$user->id}.jpg width = 50px />";
        echo $user->username;
        echo ":";
        echo anchor('login/show_comments/'.$msg->id , $msg->message);
        echo "<br /><br />";
    }
}

?>

</div>
</body>
    
</html>