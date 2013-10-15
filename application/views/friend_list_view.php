
<div id="main">

<p>
<?php
if ($friend_list_array != null) {
	echo "<h2>Friends list</h2>";
    for($j = 0;$j < count($friend_list_array);$j++) {
        $fid = $friend_list_array[$j]['fid'];
	echo "<img src = ".base_url()."profile_pics/{$fid}.jpg width=50px />";
        echo anchor('login/go_to_friend/' . $fid, $friend_list_array[$j]['friend_name']);
    	echo "<br />";
    }
} else {
    echo "u have no friends";
}

?>

</p>

</div>

</div>

</body>

</main>