<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<?php include (TEMPLATEPATH . '/banner728.php'); ?>

		<div id="contentleft" class="maincontent">

			<div id="content" class="clearfix">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

				<?php if (is_category()) { ?>			
				<h1 class="archive-title"><?php _e("Category", "wp-prosper"); ?>: <?php echo single_cat_title(); ?></h1>
		
				<?php } elseif (is_day()) { ?>
				<h1 class="archive-title"><?php _e("Archive for", "wp-prosper"); ?> <?php the_time('F jS, Y'); ?></h1>

				<?php } elseif (is_search()) { ?>
				<h1 class="archive-title"><?php _e("Search Results for", "wp-prosper"); ?> '<?php echo wp_specialchars($s, 1); ?>'</h1>
		
				<?php } elseif (is_month()) { ?>
				<h1 class="archive-title"><?php _e("Archive for", "wp-prosper"); ?> <?php the_time('F, Y'); ?></h1>

				<?php } elseif (is_year()) { ?>
				<h1 class="archive-title"><?php _e("Archive for", "wp-prosper"); ?> <?php the_time('Y'); ?></h1>
		
				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="archive-title"><?php _e("Blog Archives", "wp-prosper"); ?></h1>

				<?php } elseif (is_tag()) { ?>
				<h1 class="archive-title"><?php _e("Tag", "wp-prosper"); ?>: "<?php single_tag_title(); ?>"</h1>

				<?php } ?>

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
