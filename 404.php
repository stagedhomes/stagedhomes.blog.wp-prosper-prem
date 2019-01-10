<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<?php include (TEMPLATEPATH . '/banner728.php'); ?>

		<div id="contentleft" class="maincontent">

			<div id="content">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

				<div class="singlepost">

					<div class="post clearfix">

						<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

						<div class="entry clearfix">

							<h1 class="page-title"><?php _e("Sorry ... Page Not Found", "wp-prosper"); ?></h1>

	 						<p><?php _e("I'm sorry, but the page you're looking for could not be found. Below are our most articles. Perhaps you'll find what you're looking for there.", "wp-prosper"); ?></p>

							<ol>
								<?php query_posts('showposts=20'); ?>
								<?php while (have_posts()) : the_post(); ?>
								<li><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
							</ol>

						</div>

					</div>

				</div>

			</div>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
