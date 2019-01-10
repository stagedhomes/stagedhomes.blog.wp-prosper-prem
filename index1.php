<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class(); ?> id="post-main-<?php the_ID(); ?>">

					<?php include (TEMPLATEPATH . "/post-thumb.php"); ?>

					<div class="entry basic">

						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

						<?php include (TEMPLATEPATH . "/postinfo.php"); ?>

						<?php if ( $wp_prosper_post_content == 'Excerpts' ) { ?>
						<?php the_excerpt(); ?>
						<p><a class="more-link" href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php _e("Read More", "wp-prosper"); ?></a></p>
						<?php } else { ?>
						<?php the_content(__('Read More', 'wp-prosper')); ?>
						<?php } ?>

						<div style="clear:both;"></div>

					</div>

				</div>

<?php endwhile; endif; ?>

				<?php include (TEMPLATEPATH . "/bot-nav.php"); ?>
