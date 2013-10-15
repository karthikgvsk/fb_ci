

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
</div>

<div id=main>

<?php

echo "enter your email adddress.your username and password will be sent to your mail";

if(isset($error)){
	echo $error;
}

echo form_open('login/email_forgot_password');

echo form_input('email_address');

echo "<br />";

echo form_submit('submit','ok');

echo form_close();

?>

</div>

</div>

</body>

</html>