<?php
/*
Template Name: Page - Narrow Features
*/
?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<?php include (TEMPLATEPATH . '/banner728.php'); ?>

		<div id="contentleft" class="maincontent">

			<?php include (TEMPLATEPATH . '/features-2.php'); ?>

			<div id="content">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="singlepost">

					<div class="post clearfix" id="post-main-<?php the_ID(); ?>">

						<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

						<div class="entry">
							<h1 class="page-title"><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>

					</div>

<?php endwhile; endif; ?>

				</div>

			</div>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>