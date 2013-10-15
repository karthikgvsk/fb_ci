
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

echo "user creation success.";

if(isset($error)){
	echo $error;
}


echo form_open_multipart('login/profile_pic_loading');

echo form_upload('profile_pic');

echo "<br /><br />";

echo form_submit('submit','load');

echo form_close();

?>

</p>

</div>

</div>

</body>

</html>