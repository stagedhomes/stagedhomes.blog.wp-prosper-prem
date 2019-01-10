<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<?php include (TEMPLATEPATH . '/banner728.php'); ?>

		<div id="contentleft" class="maincontent">

			<div id="content" class="clearfix">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

				<?php $curauth = get_userdata(intval($author)); ?>
				<div class="auth-bio auth-archive clearfix">
					<?php $gravsize = $wp_prosper_grav_size; ?>
					<?php if (function_exists('get_avatar')) { ?>
					<?php echo get_avatar($curauth->user_email,$size=$gravsize); ?>
					<?php } ?>
					<h1><?php echo $curauth->display_name; ?></h1>
					<?php echo wpautop( $curauth->description, $br = 1 ); ?>

					<p class="auth-icons">

						<a rel="external" title="<?php _e("RSS Feed for", "wp-prosper"); ?> <?php echo $curauth->display_name; ?>" href="<?php bloginfo('url'); ?>/author/<?php echo $curauth->user_login; ?>/feed/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.png" alt="<?php _e("rss feed", "wp-prosper"); ?>" /></a>

						<?php if ( $curauth->facebook ) { ?>
						<a rel="external" title="<?php echo $curauth->display_name; ?> <?php _e("on Facebook", "wp-prosper"); ?>" href="https://www.facebook.com/<?php echo $curauth->facebook; ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook.png" alt="<?php _e("Facebook", "wp-prosper"); ?>" /></a>
						<?php } ?>

						<?php if ( $curauth->twitter ) { ?>
						<a rel="external" title="<?php echo $curauth->display_name; ?> <?php _e("on Twitter", "wp-prosper"); ?>" href="https://www.twitter.com/<?php echo $curauth->twitter; ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.png" alt="<?php _e("Twitter", "wp-prosper"); ?>" /></a>
						<?php } ?>

						<?php if ( $curauth->flickr ) { ?>
						<a rel="external" title="<?php echo $curauth->display_name; ?> <?php _e("on Flickr", "wp-prosper"); ?>" href="https://www.flickr.com/photos/<?php echo $curauth->flickr; ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/flickr.png" alt="<?php _e("Flickr", "wp-prosper"); ?>r" /></a>
						<?php } ?>

						<?php if ( $curauth->linkedin ) { ?>
						<a rel="external" title="<?php echo $curauth->display_name; ?> <?php _e("on LinkedIn", "wp-prosper"); ?>" href="https://www.linkedin.com/in/<?php echo $curauth->linkedin; ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin.png" alt="<?php _e("LinkedIn", "wp-prosper"); ?>" /></a>
						<?php } ?>

						<?php if ( $curauth->youtube ) { ?>
						<a rel="external" title="<?php echo $curauth->display_name; ?> <?php _e("on YouTube", "wp-prosper"); ?>" href="https://www.youtube.com/user/<?php echo $curauth->youtube; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube.png" alt="<?php _e("YouTube", "wp-prosper"); ?>" /></a>
						<?php } ?>

					</p>

					<?php if ( $curauth->user_url ) { ?>
					<p class="auth-website"><a rel="external" title="<?php echo $curauth->display_name; ?>'<?php _e("s Website", "wp-prosper"); ?>" href="<?php echo $curauth->user_url; ?>">Visit <?php echo $curauth->display_name; ?>'<?php _e("s Website", "wp-prosper"); ?></a></p>
					<?php } ?>

				</div>

				<?php if ( $wp_prosper_archive_layout == 'Option 1 - Standard Blog Layout') { ?>
				<?php include (TEMPLATEPATH . '/index1.php'); ?>

				<?php } elseif ( $wp_prosper_archive_layout == 'Option 2 - 2 Posts Aligned Side-by-Side') { ?>
				<?php include (TEMPLATEPATH . '/index2.php'); ?>

				<?php } elseif ( $wp_prosper_archive_layout == 'Option 3 - 3 Posts Aligned Side-by-Side') { ?>
				<?php include (TEMPLATEPATH . '/index3.php'); ?>

				<?php } ?>

			</div>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
