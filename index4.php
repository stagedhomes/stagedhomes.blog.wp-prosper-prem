				<?php /* CATEGORY BOX 1 */ ?>
				<?php if ( $wp_prosper_cat_box_1 !== 'Select a Category Slug' ) { ?>

				<div class="cat-posts">

					<h2 class="feat-title"><span><?php echo stripslashes($wp_prosper_cat_box_1_title); ?></span></h2>

<?php 
$count = 1;
$my_query = new WP_Query('category_name=' .$wp_prosper_cat_box_1. '&showposts=' .$wp_prosper_num_home_posts_by_cat. '');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

<?php if ( $count%3 == 0 ) { ?>
					<div class="post right clearfix" id="post-1-<?php the_ID(); ?>">
<?php } else { ?>
					<div class="post clearfix" id="post-1-<?php the_ID(); ?>">
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

							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

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
<?php $count = $count + 1 ?>
<?php endwhile; ?>
					<div style="clear:both;"></div>
				</div>
				<?php } ?>




				<?php /* CATEGORY BOX 2 */ ?>
				<?php if ( $wp_prosper_cat_box_2 !== 'Select a Category Slug' ) { ?>

				<div class="cat-posts">

					<h2 class="feat-title"><span><?php echo stripslashes($wp_prosper_cat_box_2_title); ?></span></h2>

<?php 
$count = 1;
$my_query = new WP_Query('category_name=' .$wp_prosper_cat_box_2. '&showposts=' .$wp_prosper_num_home_posts_by_cat. '');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

<?php if ( $count%3 == 0 ) { ?>
					<div class="post right clearfix" id="post-2-<?php the_ID(); ?>">
<?php } else { ?>
					<div class="post clearfix" id="post-2-<?php the_ID(); ?>">
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

							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

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
<?php $count = $count + 1 ?>
<?php endwhile; ?>
					<div style="clear:both;"></div>
				</div>
				<?php } ?>






				<?php /* CATEGORY BOX 3 */ ?>
				<?php if ( $wp_prosper_cat_box_3 !== 'Select a Category Slug' ) { ?>

				<div class="cat-posts">

					<h2 class="feat-title"><span><?php echo stripslashes($wp_prosper_cat_box_3_title); ?></span></h2>

<?php 
$count = 1;
$my_query = new WP_Query('category_name=' .$wp_prosper_cat_box_3. '&showposts=' .$wp_prosper_num_home_posts_by_cat. '');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

<?php if ( $count%3 == 0 ) { ?>
					<div class="post right clearfix" id="post-3-<?php the_ID(); ?>">
<?php } else { ?>
					<div class="post clearfix" id="post-3-<?php the_ID(); ?>">
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

							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

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
<?php $count = $count + 1 ?>
<?php endwhile; ?>
					<div style="clear:both;"></div>
				</div>
				<?php } ?>



				<?php /* CATEGORY BOX 4 */ ?>
				<?php if ( $wp_prosper_cat_box_4 !== 'Select a Category Slug' ) { ?>

				<div class="cat-posts">

					<h2 class="feat-title"><span><?php echo stripslashes($wp_prosper_cat_box_4_title); ?></span></h2>

<?php 
$count = 1;
$my_query = new WP_Query('category_name=' .$wp_prosper_cat_box_4. '&showposts=' .$wp_prosper_num_home_posts_by_cat. '');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

<?php if ( $count%3 == 0 ) { ?>
					<div class="post right clearfix" id="post-4-<?php the_ID(); ?>">
<?php } else { ?>
					<div class="post clearfix" id="post-4-<?php the_ID(); ?>">
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

							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

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
<?php $count = $count + 1 ?>
<?php endwhile; ?>
					<div style="clear:both;"></div>
				</div>
				<?php } ?>






				<?php /* CATEGORY BOX 5 */ ?>
				<?php if ( $wp_prosper_cat_box_5 !== 'Select a Category Slug' ) { ?>

				<div class="cat-posts">

					<h2 class="feat-title"><span><?php echo stripslashes($wp_prosper_cat_box_5_title); ?></span></h2>

<?php 
$count = 1;
$my_query = new WP_Query('category_name=' .$wp_prosper_cat_box_5. '&showposts=' .$wp_prosper_num_home_posts_by_cat. '');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

<?php if ( $count%3 == 0 ) { ?>
					<div class="post right clearfix" id="post-5-<?php the_ID(); ?>">
<?php } else { ?>
					<div class="post clearfix" id="post-5-<?php the_ID(); ?>">
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

							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

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
<?php $count = $count + 1 ?>
<?php endwhile; ?>
					<div style="clear:both;"></div>
				</div>
				<?php } ?>




				<?php /* CATEGORY BOX 6 */ ?>
				<?php if ( $wp_prosper_cat_box_6 !== 'Select a Category Slug' ) { ?>

				<div class="cat-posts">

					<h2 class="feat-title"><span><?php echo stripslashes($wp_prosper_cat_box_6_title); ?></span></h2>

<?php 
$count = 1;
$my_query = new WP_Query('category_name=' .$wp_prosper_cat_box_6. '&showposts=' .$wp_prosper_num_home_posts_by_cat. '');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

<?php if ( $count%3 == 0 ) { ?>
					<div class="post right clearfix" id="post-6-<?php the_ID(); ?>">
<?php } else { ?>
					<div class="post clearfix" id="post-6-<?php the_ID(); ?>">
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

							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

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
<?php $count = $count + 1 ?>
<?php endwhile; ?>
					<div style="clear:both;"></div>
				</div>
				<?php } ?>





				<?php /* OTHER RECENT ARTICLES */ ?>
				<?php if ( $wp_prosper_other_articles == yes ) { ?>

				<div class="cat-posts-stacked">

					<h2 class="feat-title"><span><?php echo $wp_prosper_other_title; ?></span></h2>

<?php
$count = 1;
query_posts(array(
	'post__not_in' => $do_not_duplicate,
	'posts_per_page' => $wp_prosper_other_number
));
if (have_posts()) : while (have_posts()) : the_post();
update_post_caches($posts); ?> 

					<div class="post clearfix" id="post-main-<?php the_ID(); ?>">

						<?php include (TEMPLATEPATH . "/post-thumb.php"); ?>

						<div class="entry basic">

							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

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
<?php $count = $count + 1 ?>
<?php endwhile; endif; ?>

				</div>
				<?php } ?>
