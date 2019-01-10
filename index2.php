<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php if (have_posts()) : while (have_posts()) : the_post();
$post_class = ('post-left' == $post_class) ? 'post-right' : 'post-left'; ?>

				<div class="<?php echo $post_class; ?>">

					<div <?php post_class(); ?> id="post-main-<?php the_ID(); ?>">

						<div class="entry">

							<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

							<?php include (TEMPLATEPATH . "/postinfo.php"); ?>

							<?php include (TEMPLATEPATH . "/post-thumb.php"); ?>

							<?php if ( $wp_prosper_post_content == 'Excerpts' ) { ?>
							<?php the_excerpt(); ?>
							<?php } else { ?>
							<?php the_content(__('', 'wp-prosper')); ?>
							<?php } ?>
	
						</div>

						<p><a class="more-link" href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php _e("Read More", "wp-prosper"); ?></a></p>

					</div>

				</div>

				<?php if ( $post_class == 'post-right' ) { ?>
				<div class="post-clear"></div>
				<?php } ?>

<?php endwhile; endif; ?>

				<?php include (TEMPLATEPATH . "/bot-nav.php"); ?>
