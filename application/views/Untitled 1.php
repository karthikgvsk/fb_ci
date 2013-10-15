
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
$uid = (int)$uid;
echo $uid;
if ($friend_profile == 1) {
	echo "friend's page";
}
if ($unknown_user_profile == 1) {
	echo "from search-page";
}

?>




<html>

<head>
<title>Home page</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/home.css" type="text/css" />
</head>

<body>

<div id="socialize">
<h1 id="Logo">Socialize!</h1>
</div>

<div id="top">

<?php

echo anchor('login/logout', 'logout');


echo anchor('login/redirect_to_home', 'home');


?>

<?php

if($unknown_user_profile == 1){

	echo "<p align=center>".anchor('friend/friend_request_sender2/'.$unknown_user_id,'add as a friend');
}

?>

<?php

echo "<div align=\"center\">";

echo form_open('search/search_from_home');

echo form_input('search_from_home', 'enter a keyword to search');

echo form_submit('submit', 'search');

echo form_close();

echo "</div>";

?>

</div>

<div id="left">

<img src="<?php echo base_url() . "profile_pics/{$uid}.jpg" ?>" width = 200px />

<ul>
<li><?php echo anchor('friend/friend_list', "Friend List"); ?></li>
<li><?php if ($friend_profile == 0 && $unknown_user_profile == 0) {
	echo anchor('friend/friend_request', "Friend requests");
}

?></li>
<li><?php if ($friend_profile == 0 && $unknown_user_profile == 0) {
	echo anchor('friend/friend_adder', "Send friend requests");
}

?></li>

<li>friend's list:</li>

<li>

<ul>

<?php

if ($friend_list_array != null) {
	for($j = 0;$j < count($friend_list_array);$j++) {
		$friend = $friend_list_array[$j];
		$fid = $friend['fid'];
		$fname = $friend['friend_name'];
		echo "<li>" . anchor('login/go_to_friend/' . $fid, $fname) . "</li>";
	}
}

?>

</ul>

</li>

</ul>
</div>