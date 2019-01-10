<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<?php include (TEMPLATEPATH . '/banner728.php'); ?>

		<?php if ( is_home() && $paged < 2 && $wp_prosper_features_on == 'Wide Featured Content Slider') { ?>
		<?php include (TEMPLATEPATH . '/features.php'); ?>
		<?php } ?>

		<div id="contentleft" class="maincontent">

			<?php if ( is_home() && $paged < 2 && $wp_prosper_features_on == 'Narrow Featured Content Slider') { ?>
			<?php include (TEMPLATEPATH . '/features-2.php'); ?>
			<?php } ?>

			<div id="content" class="clearfix">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

				<?php if ( $wp_prosper_home_layout == 'Option 1 - Standard Blog Layout') { ?>
				<?php include (TEMPLATEPATH . '/index1.php'); ?>

				<?php } elseif ( $wp_prosper_home_layout == 'Option 2 - 2 Posts Aligned Side-by-Side') { ?>
				<?php include (TEMPLATEPATH . '/index2.php'); ?>

				<?php } elseif ( $wp_prosper_home_layout == 'Option 3 - 3 Posts Aligned Side-by-Side') { ?>
				<?php include (TEMPLATEPATH . '/index3.php'); ?>

				<?php } elseif ( $wp_prosper_home_layout == 'Option 4 - 3 Posts Side-by-Side Arranged by Category') { ?>
				<?php include (TEMPLATEPATH . '/index4.php'); ?>

				<?php } elseif ( $wp_prosper_home_layout == 'Option 5 - Posts Arranged by Category Side-by-Side') { ?>
				<?php include (TEMPLATEPATH . '/index5.php'); ?>

				<?php } elseif ( $wp_prosper_home_layout == 'Option 6 - Posts Arranged by Category Stacked') { ?>
				<?php include (TEMPLATEPATH . '/index6.php'); ?>

				<?php } ?>

			</div>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
