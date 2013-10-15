
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

	</div>

	<div id="main">

	<p>

<?php


echo "fill the below form and submit for new registration";

echo "<p>" . $refresh_captcha . "</p>";

echo "<br />";

if($refresh_captcha == 0)
{
	echo validation_errors();


if(isset($captcha_error)){

	echo "<br />";

	echo $captcha_error;
}

if (isset($message)) {
    echo "<br />";
    echo $message;
}

}

echo form_open('login/new_user');

echo "<table>";

echo "<tr>";

echo "<td>Username:</td>";

echo "<td>" . form_input('username', set_value('username')) . "</td>";

echo "</tr>";

echo "<tr>";

echo "<td>Password</td>";

echo "<td>" . form_password('password', set_value('password')) . "</td>";

echo "</tr>";

echo "<tr>";

echo "<tr>";

echo "<td>confirm_Password:</td>";

echo "<td>" . form_password('confirm_password', set_value('confirm_password')) ."</td>";

echo "</tr>";

echo "<tr>";

echo "<td>First name:</td>";

echo "<td>" . form_input('first_name', set_value('first_name')) . "</td>";

echo "</tr>";

echo "<tr>";

echo "<td>Last name:</td>";

echo "<td>" .form_input('last_name', set_value('last_name')) . "</td>";

echo "</tr>";


echo "</tr>";

echo "<tr>";

echo "<td>" .$captcha['image'] . "</td>";

echo "<td>" . form_input('captcha_word_sent') . "</td>";

echo "</tr>";

echo "<tr>";

$submit_attributes_1 = array('name' => 'refresh_captcha', 'value' => 'refresh_captcha', 'class' => 'button');

echo "<td>" . anchor('login/refresh_captcha','refresh captcha') ."</td>";

echo "</tr>";

echo "</table>";

echo "<br />";

$submit_attributes2 = array('name' => 'submit', 'value' => 'create', 'class' => 'button');

echo form_submit($submit_attributes2);

echo form_close();

?>

</p>

</div>

</div>

</body>

</html>