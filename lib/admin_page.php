<?php
/*
*	COR Plug admin page
*	admin_page.php
*
*/
?>

<style type="text/css">
	.plugheading {
		color: #000;
		text-align: center;
	}
	.plugtext {
		color: #000;
		text-align: left;
		max-width: 500px;
	}
	
	.plugul {
		list-style-type: none;
		padding: 0px;
		margin: 0px;
	}
	.plugli {
		background-image: url();
		background-repeat: no-repeat;
		background-position: 0px center;
		padding-left: 25px; 
	}
	
	.adminform {
		max-width: 360px;
		height: 100px;
		padding: 8px;
		border: 1px solid black;
	}
	
	.adminform label {
		padding-right: 4px;
	}
	
	.adminform input[type=checkbox] {
		margin-top: 2px;
	}

</style>

<div class="wrap">
	<h1 class="plugheading">COR Plug administration page - PRODUCTION VERSION</h1>
	<p class="plugtext">Installation list for COR 2015 theme:<br />
	<em><strong>single-corissue.php, sidebar-corissue.php, header-corissue.php</strong>
	<br />
	<strong>index-page.php, custom.css</strong></em>
	<br /><br />
	template files added:
	</br />
	<strong>email-page.php, bulletin-page.php, landing-page.php, thankyou-page.php, footer-email.php, footer-simple.php, footer-landing.php
	header-bulletin.php, header-simple.php</strong>
	<br /><br />
	additions made to the following theme files:
	<br />
	<strong>image.php, attachment.php, 404.php, theme/js/function.js</strong>
	<br />
	<strong>index.php, content-none.php, page.php, header.php, footer.php</strong>
	<br /><br />
	<strong>FUNCTION LIST FOR COR ISSUE POSTS:</strong>
	<br />
	<strong>Create custom corissue post</strong>
	<br />
	<em>registered post_type' => 'corissue', wp-admin position = 2</em>
	<br />
	<br />
	<strong>Parse php in widget_text</strong>
	<br />
	<em>eval php then return as html, used to get date('Y')</em>
	<br />
	<br />
	<strong>Remove admin menubar</strong>
	<br />
	<em>after theme setup, show admin bar false for non-admins</em>
	<br />
	<br />
	<strong>Custom post Insights (insights)</strong>
	<br />
	<em>template files and custom post type for Industry Insights, archive-insights.php template, custom excerpt and length=17, has_archive = true</em>
	<br />
	<br />
	<strong>Custom post Article (article)</strong>
	<br />
	<em>template files and custom post type for Articles, archive-article.php template, excerpts as above, has_archive = true</em>
	<br />
	<br />
	<strong>cor_get_sidebar shortcode</strong>
	<br />
	<em>shortcode to call index sidebar from within index page content: &#91;cor_get_sidebar&#93;</em>
  	<br />
	<br />
	<strong>cor_custom_feed</strong>
	<br />
	<em>add insights and article custom posts to main rss feed, not corissue</em>
  </p>

</div>
