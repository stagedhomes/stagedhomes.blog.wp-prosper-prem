<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<div class="sub-icons">

	<a title="<?php _e("Subscribe via RSS Feed", "wp-prosper"); ?>" href="<?php bloginfo('rss2_url'); ?>"><img class="rss-sub" src="<?php bloginfo('stylesheet_directory'); ?>/images/rss2.png" alt="<?php _e("Subscribe via RSS Feed", "wp-prosper"); ?>" align="top" /></a>

<?php if ( $wp_prosper_twitter_url ) { ?>
	<a rel="external" title="<?php echo stripslashes($wp_prosper_twitter_link_text); ?>" href="http://www.twitter.com/<?php echo stripslashes($wp_prosper_twitter_url); ?>"><img class="twitter-sub" src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter2.png" alt="<?php echo stripslashes($wp_prosper_twitter_link_text); ?>" align="top" /></a>
<?php } ?>

<?php if ( $wp_prosper_facebook_url ) { ?>
	<a title="<?php echo stripslashes($wp_prosper_facebook_link_text); ?>" rel="external" href="http://www.facebook.com/<?php echo stripslashes($wp_prosper_facebook_url); ?>"><img class="facebook-sub" src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook2.png" alt="<?php echo stripslashes($wp_prosper_facebook_link_text); ?>" align="top" /></a>
<?php } ?>

<?php if ( $wp_prosper_linkedin_url ) { ?>
	<a title="<?php echo stripslashes($wp_prosper_linkedin_link_text); ?>" rel="external" href="http://www.linkedin.com/in/<?php echo stripslashes($wp_prosper_linkedin_url); ?>"><img class="linkedin-sub" src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin2.png" alt="<?php echo stripslashes($wp_prosper_linkedin_link_text); ?>" align="top" /></a>
<?php } ?>

<?php if ( $wp_prosper_flickr_url ) { ?>
	<a title="<?php echo stripslashes($wp_prosper_flickr_link_text); ?>" rel="external" href="http://www.flickr.com/photos/<?php echo stripslashes($wp_prosper_flickr_url); ?>"><img class="flickr-sub" src="<?php bloginfo('stylesheet_directory'); ?>/images/flickr2.png" alt="<?php echo stripslashes($wp_prosper_flickr_link_text); ?>" align="top" /></a>
<?php } ?>

<?php if ( $wp_prosper_youtube_url ) { ?>
	<a title="<?php echo stripslashes($wp_prosper_youtube_link_text); ?>" rel="external" href="https://www.youtube.com/user/<?php echo stripslashes($wp_prosper_youtube_url); ?>"><img class="youtube-sub" src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube2.png" alt="<?php echo stripslashes($wp_prosper_youtube_link_text); ?>" align="top" /></a>
	<a href="http://www.pinterest.com/barbstagedhomes"><img src="https://d2itdnqewolu1g.cloudfront.net/legacy/stagedhomes-http/images/Logo - Pinterest.png" width="32" alt="Pinterest StagedHomes.com" /></a>
<?php } ?>

</div>
