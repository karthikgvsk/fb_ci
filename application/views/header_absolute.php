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