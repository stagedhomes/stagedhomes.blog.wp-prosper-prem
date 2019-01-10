<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-8196867-8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-8196867-8');
</script>




<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo ' | '; } ?><?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/external.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/suckerfish.js"></script>

<!--PNG Fix for IE6-->
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/iepngfix/iepngfix_tilebg.js"></script>
<style>
#wrap, #wrap-top, #wrap-bottom { behavior:url(<?php bloginfo('stylesheet_directory'); ?>/iepngfix/iepngfix.htc); }
</style>
<![endif]-->

</head>

<body>

<div id="header" class="clearfix">

	<div id="topnav" class="clearfix">
		<?php if (function_exists('wp_nav_menu')) { ?>
		<?php wp_nav_menu( array( 'theme_location' => 'topnav' ) ); ?>
		<?php } else { ?>
		<ul>
			<?php if ( $wp_prosper_hide_home_link == 'no' ) { ?>
			<li id="home"<?php if (is_front_page()) { echo " class=\"current_page_item\""; } ?>><a href="<?php bloginfo('url'); ?>"><?php _e("Home", "wp-glide"); ?></a></li>
			<?php } ?>
			<?php wp_list_pages('title_li='); ?>
		</ul>
		<?php } ?>

		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	</div>

	<div id="head-content" class="clearfix" <?php if ( $wp_prosper_site_title_option == 'Image/Logo-Type Title' && $wp_prosper_site_logo_url ) { ?>onclick="location.href='<?php bloginfo('url'); ?>';" style="cursor: pointer;"<?php } ?>>

		<div id="sitetitle">
			<!-- <div class="title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div> 
			<div class="description"><?php bloginfo('description'); ?></div> -->
		</div>

		<?php if ( $wp_prosper_ad468head == yes ) { ?>
		<div id="head-banner468">
			<?php echo stripslashes($wp_prosper_ad468head_code); ?>
		</div>
		<?php } ?>

	</div>

</div>

<div id="wrap" class="clearfix">

	<?php if ( $wp_prosper_show_catnav == 'yes'  ) { ?>
	<div id="catnav" class="clearfix">
		<?php if (function_exists('wp_nav_menu')) { ?>
		<?php wp_nav_menu( array( 'theme_location' => 'catnav' ) ); ?>
		<?php } else { ?>
		<ul class="clearfix"><?php wp_list_categories('title_li='); ?></ul>
		<?php } ?>
	</div>
	<?php } ?>
