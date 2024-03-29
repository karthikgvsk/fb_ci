<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="images/Blue.css" type="text/css" />

<title>socialize</title>

</head>

<body>
<!-- wrap starts here -->
<div id="wrap">

	<div id="header">

		<h1 id="logo">socialize</span></h1>
	<?php

echo form_open('search/search_from_home');

echo form_input('search_from_home', 'enter a keyword to search');

echo form_submit('submit', 'search');

echo form_close();

?>

	</div>

	<div id="menu">
		<ul>
			<?php
echo "<li>" . anchor('login/logout', 'logout') . "</li>";
echo "<li>" . anchor('login/redirect_to_home', 'home') . "</li>";

?>
		</ul>
	</div>

	<!-- content-wrap starts here -->
	<div id="content-wrap">

			<div id="sidebar">

				<img src="<?php echo base_url() . "profile_pics/{$uid}.jpg" ?>" width = 200px />

				<h1>Site Partners</h1>
				<ul class="sidemenu">
					<li><a href="http://partners.ipower.com/z/57/CD5822/">IPowerweb</a></li>
					<li><a href="http://www.4templates.com/?aff=ealigam">4templates</a></li>
					<li><a href="http://www.fotolia.com/partner/114283">Fotolia.com</a></li>
					<li><a href="http://www.bigstockphoto.com/?refid=grKPpdNw6k">BigStockPhoto.com</a></li>
					<li><a href="http://www.text-link-ads.com/?ref=40025">Text Link Ads</a></li>
				</ul>

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

				<h1>friends list</h1>

				<ul class="sidemenu">

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

			</div>

	  		<div id="main">

				<a name="TemplateInfo"></a>
				<h1>Template Info</h1>

				<p><strong>Stylevantage</strong> is a free, W3C-compliant, CSS-based website template
				by <strong><a href="http://www.styleshout.com/">styleshout.com</a></strong>. This work is
				distributed under the <a rel="license" href="http://creativecommons.org/licenses/by/2.5/">
				Creative Commons Attribution 2.5  License</a>, which means that you are free to
				use and modify it for any purpose. All I ask is that you include a link back to
				<a href="http://www.styleshout.com/">my website</a> in your credits.</p>

				<p>For more free designs, you can visit
				<a href="http://www.styleshout.com/">my website</a> to see
				my other works.</p>

				<p>Good luck and I hope you find my free templates useful!</p>

				<p class="post-footer align-right">
					<a href="blue.html" class="readmore">Read more</a>
					<a href="blue.html" class="comments">Comments (7)</a>
					<span class="date">Sep 15, 2006</span>
				</p>

				<a name="SampleTags"></a>
				<h1>Sample Tags</h1>

				<h3>Code</h3>
				<p><code>
				code-sample { <br />
				font-weight: bold;<br />
				font-style: italic;<br />
				}
				</code></p>

				<h3>Example Lists</h3>

				<ol>
					<li><span>example of ordered list</span></li>
					<li><span>uses span to color the numbers</span></li>
				</ol>

				<ul>
					<li><span>example of unordered list</span></li>
					<li><span>uses span to color the bullets</span></li>
				</ul>

				<h3>Blockquote</h3>
				<blockquote><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
				nibh euismod tincidunt ut laoreet dolore magna aliquam erat....</p></blockquote>

				<h3>Image and text</h3>
				<p><a href="http://getfirefox.com/"><img src="images/firefox-gray.jpg" width="100" height="120" alt="firefox" class="float-left" /></a>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
				Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu
				posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum
				odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra
				condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna.
				In tristique orci porttitor ipsum. Aliquam ornare diam iaculis nibh. Proin luctus, velit pulvinar
				ullamcorper nonummy, mauris enim eleifend urna, congue egestas elit lectus eu est.
				</p>

				<h3>Example Form</h3>
				<form action="#">
					<p>
					<label>Name</label>
					<input name="dname" value="Your Name" type="text" size="30" />
					<label>Email</label>
					<input name="demail" value="Your Email" type="text" size="30" />
					<label>Your Comments</label>
					<textarea rows="5" cols="5"></textarea>
					<br />
					<input class="button" type="submit" />
					</p>
				</form>
				<br />

	  		</div>

			<div id="rightbar">

				<h1>More Text</h1>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
				Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu
				posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum
				odio, ac blandit ante orci ut diam. Cras fringilla magna.</p>

				<h1>Support Styleshout</h1>
				<p>If you are interested in supporting my work and would like to contribute, you are
				welcome to make a small donation through the
				<a href="http://www.styleshout.com/">donate link</a> on my website - it will
				be a great help and will surely be appreciated.</p>

			</div>

	<!-- content-wrap ends here -->
	</div>

<!-- wrap ends here -->
</div>

<!-- footer starts here -->
		<div id="footer">
			<p>
			&copy; copyright 2006 <strong>Your Company</strong>&nbsp;&nbsp;

			Design by: <a href="http://www.styleshout.com/">styleshout</a> |
			Valid: <a href="http://validator.w3.org/check/referer">XHTML</a> |
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="Blue.html">Home</a> | <a href="Blue.html">Sitemap</a> | <a href="Blue.html">RSS Feed</a>
			</p>
		</div>
<!-- footer ends here -->

</body>
</html>