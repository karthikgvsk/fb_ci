<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
$uid = (int)$uid;
//echo $uid;
if ($friend_profile == 1) {
	//echo "friend's page";
}
if ($unknown_user_profile == 1) {
	//echo "from search-page";
}

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="<?php echo base_url()?>images/Blue.css" type="text/css" />

<title>socialize</title>

</head>

<body>
<!-- wrap starts here -->
<div id="wrap">

	<div id="header">

		<h1 id="logo">socialize</span></h1>
	<?php

	$attributes = array('class' => 'searchform');

	echo form_open('search/search_from_home',$attributes);

	echo "<p>";

	echo form_input('search_from_home');

	$submit_attributes = array('name' => 'submit', 'value' => 'search', 'class' => 'button');

	echo form_submit($submit_attributes);

	echo "</p>";

	echo form_close();

	?>

	</div>

	<div id="menu">
		<ul style="align:right">
			<?php
			echo "<li>" . anchor('login/redirect_to_home', 'Home') . "</li>";
			if($friend_profile == 0 && $unknown_user_profile == 0){
			echo "<li>" . anchor('login/profile_view','profile') . "</li>";	
			}
			echo "<li>" . anchor('login/logout', 'Logout') . "</li>";
			?>
		</ul>
	</div>

	<!-- content-wrap starts here -->
	<div id="content-wrap">

			<div id="sidebar">

				<img src="<?php echo base_url() . "profile_pics/{$uid}.jpg" ?>" width = 150px />

				<h1>options</h1>

				<ul class="sidemenu">
					<li><?php echo anchor('friend/friend_list', "Friend List"); ?></li>
					<li><?php if ($friend_profile == 0 && $unknown_user_profile == 0) {
						echo anchor('friend/friend_request', "Friend requests");
					}

					?>
					</li>
					<li><?php if ($friend_profile == 0 && $unknown_user_profile == 0) {
						echo anchor('friend/friend_adder', "Send friend requests");
					}

					?>
					</li>
				</ul>

				<h1>friends list</h1>

				<ul class="sidemenu">

				<?php

				if ($friend_list_array != null) {
					for($j = 0;$j < count($friend_list_array);$j++) {
						$friend = $friend_list_array[$j];
						$fid = $friend['fid'];
						$fname = $friend['friend_name'];
						echo "<li><img src = ".base_url()."profile_pics/{$fid}.jpg width=50px />";
						echo  anchor('login/go_to_friend/' . $fid, $fname) . "</li>";
					}
				}

				?>
			</ul>

			</div>
