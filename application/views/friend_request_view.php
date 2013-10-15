


<div id="main">

<?php

if ($friend_requests != null) {
    echo form_open('friend/set_friends');
    echo "<br />";
    for($j = 0;$j < count($friend_requests);$j++) {
	$sender = $friend_requests[$j];
	$frid = $sender['frid'];
	echo "<li><img src = ".base_url()."profile_pics/{$frid}.jpg width=50px />";
        echo form_checkbox('friend_request_sent_array[]', $frid, false);
        echo " ";
        echo $sender['username'];
        echo "<br />";
    }
    echo "<br />";
    echo form_submit('submit', 'send');
    echo "<br />";
    echo form_close();
}else{
	echo "no friend requests";
}

?>

</div>

</body>

</html>