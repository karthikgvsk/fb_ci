

<div id="main">

<h1 >Status messages</h1>
<?php

if ($friend_profile == 0 && $unknown_user_profile == 0) {
    $new_message = array(
        'name' => 'new_message',
        'id' => 'new_message',
        'value' => 'post a new status message',
        'rows' => '3',
        'columns' => '3',
        'style' => 'width:300px;'
        );

    echo '<table align="center">';

    echo form_open('login/set_message');

    echo "<tr><td>";

    echo form_textarea($new_message);

    echo "</tr></td>";

    echo "<br /><br />";

    echo "<tr><td>";

    echo form_submit('submit', 'post message');

    echo "</tr></td>";

    echo form_close();

    echo "</table>";
}
echo "<br /><br />";
?>


<?php


if ($messages_array == null) {
    echo "no messages to display";
} else {
    for($j = 0;$j < count($messages_array);$j++) {
    	$uid = $messages_array[$j]['uid'];
	
	echo "<div id=message_pic>";
        echo "<img src=".base_url()."profile_pics/".$uid.".jpg width=50px />";
	echo "</div>";
	
	echo "<div id=message_text>";
        echo $messages_array[$j]['username'];
        echo ":";
        echo $messages_array[$j]['message'];
        echo "<br />";
        $msg_id = $messages_array[$j]['mid'];

        if (isset($comments_array[$msg_id]) && $comments_array[$msg_id] != null) {
            $comments = $comments_array[$msg_id];
            $count = count($comments);
            echo "---no of comments: " . anchor('login/show_comments/' . $msg_id, $count);
            echo "<br /><br />";
        } else {
        	echo "---no of comments: " . anchor('login/show_comments/' . $msg_id, 0);
        	echo "<br /><br />";
        }
        // can send message id as a hidden attribute.
	echo "</div>";
	echo "<br /><br />";
    }
    
    echo $this->pagination->create_links();

	echo "<br /><br />";
}

?>

</div>

<?php
echo "<div id=\"rightbar\">";
if ($friend_profile == 0 && $unknown_user_profile == 0) {
    if ($friend_suggestor == 2) {
        echo "<p>At present u dont have any friends!</p>";
    } elseif ($friend_suggestor == 1) {
        echo "sorting failed!";
    } elseif ($friend_suggestor == 0) {
        echo "<p>no firnd suggestion</p>";
    } elseif ($friend_suggestor == 4) {
        echo "<p>no suggestions!</p>";
    } else {
    	echo "<h1> friend suggestor </h1>";
        $sfid = $friend_suggestor['sfid'];
        $username = $friend_suggestor['username'];
	echo "<h4><img src = ".base_url()."profile_pics/{$sfid}.jpg width=50px />";
        echo anchor('login/user_from_search/'.$sfid,$username)."</h4>";
	echo "<br />";
    }
    
    echo "<h2>Recent Searches</h2>";
    if(isset($tags) && $tags != null){
	echo $tags;
    }else{
	echo "<p>no recent searches</p>";
    } 
}
echo "</div>";
?>

</div>
</body>

</html>