<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
require_once( dirname(__FILE__) . '/functions.php');
header("Content-type: text/css");
global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

@import 'custom.css';

/* --------------[ User-Defined Adjustments ]-------------- */

body {
	<?php if ( $wp_prosper_body_backgroundcolor ) { ?>
	background: <?php echo $wp_prosper_body_backgroundcolor; ?>;
	<?php } ?>
	<?php if ( $wp_prosper_custom_body_bg_image ) { ?>
	background-image: url(<?php echo $wp_prosper_custom_body_bg_image; ?>);
	background-repeat: <?php echo $wp_prosper_custom_body_bg_image_repeat; ?>;
	background-attachment: <?php echo $wp_prosper_custom_body_bg_image_attachment; ?>;
	background-position: <?php echo $wp_prosper_custom_body_bg_image_position; ?>;
	background-color: <?php echo $wp_prosper_body_backgroundcolor; ?>;
	<?php } ?>
	font-family: <?php echo $wp_prosper_body_font_family; ?>;
	<?php if ( $wp_prosper_body_font_color ) { ?>
	color: <?php echo $wp_prosper_body_font_color; ?>;
	<?php } ?>
	}

h1, h2, h3, h4, h5, h6, h7, .sitetitle {
	font-family: <?php echo $wp_prosper_post_title_font; ?>;
	font-weight: <?php echo $wp_prosper_post_title_weight; ?>;
	}

/* -------------------[ Site Title Adjustments ]------------------- */

#sitetitle h1, #sitetitle .title {
	font-size: <?php echo $wp_prosper_site_title_size; ?>;
	font-weight: <?php echo $wp_prosper_site_title_weight; ?>;
	font-family: <?php echo $wp_prosper_site_title_font_family; ?>;
	}

<?php if ( $wp_prosper_site_title_color ) { ?>
#sitetitle .description, #sitetitle .title, #sitetitle .title a {
	color:<?php echo $wp_prosper_site_title_color; ?>;
	}
<?php } ?>

<?php if ( $wp_prosper_site_title_option == 'Basic Text-Type Title' ) { ?>
#head-content {
	background-image: none;
	}
<?php } ?>

<?php if ( $wp_prosper_site_title_option == 'Image/Logo-Type Title' ) { ?>
#sitetitle {
	float:none;
	text-indent:-999em;
	position:absolute;
	display:none;
	left:-999em;
	}
<?php } ?>

<?php if ( $wp_prosper_ad468head == 'no' ) { ?>
#sitetitle {
	width:980px;
	}
<?php } ?>

<?php if ( $wp_prosper_site_title_option == 'Image/Logo-Type Title' && $wp_prosper_site_logo_url ) { ?>
#head-content {
	background: transparent;
	<!-- background-image: url(<?php echo $wp_prosper_site_logo_url; ?>); -->
	background-position: <?php echo $wp_prosper_site_logo_position; ?>;
	background-repeat: no-repeat;
	}
<?php } ?>

<?php if ( $wp_prosper_header_bg_color ) { ?>
/* ----------[ Header Background Color Adjustments ]---------- */

#header {
	background-image:none;
	background-color: <?php echo $wp_prosper_header_bg_color; ?>;
	}
<?php } ?>

/* --------------[ Top Navigation Adjustments ]-------------- */

#topnav,
#topnav li ul {
	font-size: <?php echo $wp_prosper_topnav_size; ?>;
	font-weight: <?php echo $wp_prosper_topnav_weight; ?>;
	font-family: <?php echo $wp_prosper_topnav_font_family; ?>;
	}

<?php if ( $wp_prosper_topnav_link_color ) { ?>
#topnav ul a,
#topnav ul a:link,
#topnav ul a:visited {
	color:<?php echo $wp_prosper_topnav_link_color; ?>;
	}
<?php } ?>

<?php if ( $wp_prosper_topnav_link_hover_color ) { ?>
#topnav ul a:hover,
#topnav ul a:active  {
	color:<?php echo $wp_prosper_topnav_link_hover_color; ?>;
	}
<?php } ?>

/* --------------[ Cat Navigation Adjustments ]-------------- */

#catnav,
#catnav li ul {
	font-size: <?php echo $wp_prosper_catnav_size; ?>;
	font-weight: <?php echo $wp_prosper_catnav_weight; ?>;
	font-family: <?php echo $wp_prosper_catnav_font_family; ?>;
	}

<?php if ( $wp_prosper_catnav_link_color ) { ?>
#catnav ul a,
#catnav ul a:link,
#catnav ul a:visited {
	color:<?php echo $wp_prosper_catnav_link_color; ?>;
	}
<?php } ?>

<?php if ( $wp_prosper_catnav_link_hover_color ) { ?>
#catnav ul a:hover,
#catnav ul a:active  {
	color:<?php echo $wp_prosper_catnav_link_hover_color; ?>;
	}
<?php } ?>

/* --------------[ Main Content Adjustments ]-------------- */

.maincontent {
	font-size: <?php echo $wp_prosper_content_size; ?>;
	}

.maincontent a, .maincontent a:link, .maincontent a:visited {
	<?php if ( $wp_prosper_content_link_color ) { ?>
	color: <?php echo $wp_prosper_content_link_color; ?>;
	<?php } ?>
	}

.maincontent a:hover, .maincontent a:active, .post h1 a:active, .post h1 a:hover, .post h2 a:active, .post h2 a:hover {
	<?php if ( $wp_prosper_content_link_hover_color ) { ?>
	color: <?php echo $wp_prosper_content_link_hover_color; ?>;
	<?php } ?>
	}

/* --------------[ Sidebar-Right Adjustments ]-------------- */

#contentright {
	font-size: <?php echo $wp_prosper_right_sidebar_size; ?>;
	}

<?php if ( $wp_prosper_right_sidebar_link_color ) { ?>
#contentright a, #contentright a:link, #contentright a:visited {
	color: <?php echo $wp_prosper_right_sidebar_link_color; ?>;
	}
	<?php } ?>

<?php if ( $wp_prosper_right_sidebar_hover_link_color ) { ?>
#contentright a:hover, #contentright a:active {
	color: <?php echo $wp_prosper_right_sidebar_hover_link_color; ?>;
	}
<?php } ?>

<?php if ( $wp_prosper_sidebar_left == Yes ) { ?>
/* --------------[ Sidebar Float Adjustments ]-------------- */

#page {
	background:#fff url(images/dot.gif) 330px 0 repeat-y;
	}

#contentleft {
	float:right;
	padding: 0;
	}

#contentright {
	margin: 0;
	}

#sidebar-bottom {
	padding:0 30px 0 0;
	}

#contentright li {
	padding:0 30px 20px 0;
	}
<?php } ?>

/* --------------[ Footer Adjustments ]-------------- */

#footer {
	<?php if ( $wp_prosper_footer_bg_color ) { ?>
	background:<?php echo $wp_prosper_footer_bg_color; ?>;
	<?php } ?>
	font-size:<?php echo $wp_prosper_footer_font_size; ?>;
	<?php if ( $wp_prosper_footer_font_color ) { ?>
	color:<?php echo $wp_prosper_footer_font_color; ?>;
	<?php } ?>
	}

#footer a, #footer a:link, #footer a:visited {
	<?php if ( $wp_prosper_footer_link_color ) { ?>
	color: <?php echo $wp_prosper_footer_link_color; ?>;
	<?php } ?>
	}

#footer a:hover, #footer a:active {
	<?php if ( $wp_prosper_footer_hover_link_color ) { ?>
	color: <?php echo $wp_prosper_footer_hover_link_color; ?>;
	<?php } ?>
	}

/* --------------[ Post Title Link Color Adjustments ]-------------- */

<?php if ( $wp_prosper_post_title_link_color ) { ?>
.post-title a, .post-title a:link, .post-title a:visited {
	color: <?php echo $wp_prosper_post_title_link_color; ?> !important;
	}
<?php } ?>

<?php if ( $wp_prosper_post_title_link_hover_color ) { ?>
.post-title a:hover, .post-title a:active {
	color: <?php echo $wp_prosper_post_title_link_hover_color; ?> !important;
	}
<?php } ?>


<?php if ( $wp_prosper_show_catnav == 'yes'  ) { ?>
#page {
	border-top:0;
	}
<?php } ?>
