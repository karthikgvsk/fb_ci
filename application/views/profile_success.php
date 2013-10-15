

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
        </div>

<div id=main>



<?php

echo "your profile successfully created";

echo anchor('login/index','click here to login');

?>


</div>

</div>

</body>

</html>