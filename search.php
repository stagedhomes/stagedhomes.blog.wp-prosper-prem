<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<?php include (TEMPLATEPATH . '/banner728.php'); ?>

		<div id="contentleft" class="maincontent">

			<div id="content" class="clearfix">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

				<h1 class="archive-title"><?php _e("Search Results for", "wp-prosper"); ?> '<?php echo wp_specialchars($s, 1); ?>'</h1>

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
