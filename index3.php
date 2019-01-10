<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

				<div class="posts-by-3">

<?php 
$count = 1;
if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if ( $count%3 == 0 ) { ?>
					<div class="post right clearfix" id="post-<?php the_ID(); ?>">
<?php } else { ?>
					<div class="post clearfix" id="post-<?php the_ID(); ?>">
<?php } ?>

					<?php
					$data = get_post_meta( $post->ID, 'WP-Prosper', true );
					if ( $wp_prosper_default_thumbs == 'yes' ) { $defthumb = get_bloginfo('stylesheet_directory') . '/images/def-thumb4.jpg'; } else { $defthumb == 'false'; }
					if ( $wp_prosper_show_thumbs == 'yes' && function_exists('get_the_image') && $data['remove_thumb'] != 'on' ) { ?>
					<div class="feature-image">
						<?php get_the_image(array(
							'custom_key' => array('post_thumbnail','thumbnail'),
							'default_size' => 'medium',
							'default_image' => $defthumb,
							'link_to_post' => true,
							'image_scan' => true,
						)); ?>
					</div>
					<?php } ?>

						<div class="entry">

							<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

							<div class="meta">
								<?php the_time( get_option( 'date_format' ) ); ?> | <a href="<?php comments_link(); ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Comments for", "wp-prosper"); ?> <?php the_title(); ?>"><?php _e("Comments", "wp-prosper"); ?> <?php comments_number('(0)','(1)','(%)'); ?></a> 
							</div>

							<?php if ( $wp_prosper_post_content == 'Excerpts' ) { ?>
							<?php the_excerpt(); ?>
							<?php } else { ?>
							<?php the_content(''); ?>
							<?php } ?>

						</div>

						<p><a class="more-link" href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php _e("Read More", "wp-prosper"); ?></a></p>

					</div>

<?php if ( $count%3 == 0 ) { ?>
					<div style="clear:both;margin:0;padding:0;height:0;"></div>
<?php } ?>

<?php $count = $count + 1 ?>
<?php endwhile; endif; ?>
					<div style="clear:both;"></div>

				</div>

				<?php include (TEMPLATEPATH . "/bot-nav.php"); ?>
