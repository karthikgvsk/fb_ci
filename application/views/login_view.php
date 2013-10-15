




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
<div id="mian">
<?php

$this->load->helper('form');

if (isset($error)) {
    if ($error == 0) {
        //echo "username or password not correct";
    } elseif ($error == - 1) {
        //echo "many users with same username exist";
    }
}


echo validation_errors();



echo form_open('login/login_check');

echo "<br />";

echo "<p>";
echo "username:" . form_input('username');

echo "<br /><br />";

echo "password:" . form_password('password');

echo "<br /><br />";

$submit_attributes = array('name' => 'submit', 'value' => 'login', 'class' => 'button');

echo form_submit($submit_attributes);

echo "<br /><br />";

echo "</p>";

echo form_close();

echo anchor('login/forgot_password','forgot password?');

echo "<br />";

echo anchor('login/load_new_user_view','new user?');

?>

</div>

</body>

</html>