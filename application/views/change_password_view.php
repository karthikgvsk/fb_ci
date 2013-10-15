

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

echo "submit the new password";

echo validation_errors();

echo form_open('login/submitted_password');

echo "Password:"

echo form_input('password');

echo "<br />";

echo "Confirm password:";

echo form_input('confirm_password');

echo "<br />";

echo form_submit('submit','change password');

?>


</div>

</div>

</body>

</html>