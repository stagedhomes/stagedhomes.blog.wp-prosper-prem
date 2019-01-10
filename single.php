<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php if (has_tag('post-wide')) { ?>
<?php include (TEMPLATEPATH . '/single-wide.php'); ?>
<?php } else { ?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<?php include (TEMPLATEPATH . '/banner728.php'); ?>

		<div id="contentleft" class="maincontent">

			<div id="content">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="singlepost">

					<div class="post clearfix" id="post-main-<?php the_ID(); ?>">

						<div class="entry">

							<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h1>

							<?php include (TEMPLATEPATH . '/postinfo.php'); ?>

<?php $data = get_post_meta( $post->ID, 'WP-Prosper', true );
if ($data['video_embed']) { ?>
							<div class="single-video">
								<?php $embed = $data['video_embed'];
								$alt = preg_match_all('/(width|height)=("[^"]*")/i', $embed, $matches);
								$embed = preg_replace('/(width)=("[^"]*")/i', 'width="590"', $embed);
								$embed = preg_replace('/(height)=("[^"]*")/i', 'height="350"', $embed);
								echo $embed;
								?>
							</div>
<?php } ?>

							<?php the_content(); ?>

							<?php if(function_exists('the_tags')) { the_tags('<p class="tags"><strong>'. __('Tags', 'wp-prosper'). ': </strong> ', ', ', '</p>'); } ?>
							<p class="cats"><strong><?php _e('Category', "wp-prosper"); ?></strong>: <?php the_category(', '); ?></p>

						</div>

						<?php include (TEMPLATEPATH . '/auth-bio.php'); ?>

						<?php include (TEMPLATEPATH . '/related.php'); ?>

					</div>

					<?php comments_template('', true); ?>

<?php endwhile; endif; ?>

				</div>

			</div>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

<?php } ?>
