

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
			echo "<li>" . anchor('login/logout', 'Logout') . "</li>";
			?>
		</ul>
	</div>

<div id="main">

<?php

if (isset($message_array)) {
    echo "<div id=message>";
    
    $uid = $message_array['uid'];
    
    echo "<div id = message_pic>";
    echo "<img src=".base_url()."profile_pics/".$uid.".jpg width=70px />";
    echo "</div>";
    
    echo "<div id= message_text>";
    echo $message_array['username'] . ":" . $message_array['message'];
    echo "</div>";
    echo "<br /><br />";
    
    echo "<div id=comments>";
    if (isset($comments_array) && $comments_array != null) {
        for($j = 0;$j < count($comments_array);$j++) {
            $comment = $comments_array[$j];
	    
	    echo "<div id=message_pic>";
            echo "<img src=".base_url()."profile_pics/".$comment['uid'].".jpg width=30px />";
	    echo "</div>";
	    
	    echo "<div id=message_text>";
            echo "---";
            echo $comment['username'] . ":" . $comment['comment'];
	    echo "</div>";
	    
            echo "<br /><br />";
        }
    }

    $msg_id = $message_array['mid'];

    if ($friend_profile == 0 && $unknown_user_profile == 0) {
        $url_string = 'login/post_comment';

        echo form_open($url_string);

        echo form_hidden('mid', $msg_id);

        echo form_hidden('set_comment', "set_comment");

        echo "<br />";

        echo form_input('new_comment');

        echo "<br />";

        echo form_submit('submit', 'comment');

        echo form_close();

        echo "<br /><br />";
    }
    
    echo "</div>";
    
    echo "</div>";
}


?>

</div>

</div>

</body>

</html>