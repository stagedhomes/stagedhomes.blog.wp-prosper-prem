<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cycle.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/slideshow.js"></script>

<div id="home-top-narrow" class="clearfix">

	<div id="slideshow" class="clearfix">

		<div class="slides clearfix">

			<ul class="clearfix">

<?php
$count = 1;
$featurecount = $wp_prosper_features_number;
$my_query = new WP_Query("tag=featured&showposts=$featurecount");
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

				<li id="main-post-<?php echo $count; ?>">

					<div class="entry">

<?php $data = get_post_meta( $post->ID, 'WP-Prosper', true );
if ($data['video_embed']) { ?>

					<div class="feature-video">
						<?php $embed = $data['video_embed'];
						$alt = preg_match_all('/(width|height)=("[^"]*")/i', $embed, $matches);
						$embed = preg_replace('/(width)=("[^"]*")/i', 'width="294"', $embed);
						$embed = preg_replace('/(height)=("[^"]*")/i', 'height="194"', $embed);
						echo $embed;
						?>
					</div>

<?php } else { ?>

					<?php
					if ( $wp_prosper_default_features == 'yes' ) { $defthumb = get_bloginfo('stylesheet_directory') . '/images/def-thumb3.jpg'; } else { $defthumb == 'false'; }
					if ( function_exists('get_the_image') ) { ?>
					<div class="feature-image">
						<?php get_the_image(array(
							'custom_key' => array('home_feature','feature'),
							'default_size' => 'full',
							'default_image' => $defthumb,
							'link_to_post' => true,
							'image_scan' => true,
						)); ?>
					</div>
					<?php } ?>
<?php } ?>

						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

						<?php include (TEMPLATEPATH . "/postinfo.php"); ?>

						<?php the_excerpt(); ?>

						<div style="clear:both;"></div>

					</div>

				</li>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

			</ul>

		</div>

		<ul class="slides-nav">

<?php
$count = 1;
$featurecount = $wp_prosper_features_number;
$my_query = new WP_Query("tag=featured&showposts=$featurecount");
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[] = $post->ID; ?>

<?php if ( $count == 1 ) { ?>
			<li class="on clearfix" id="nav-post-<?php echo $count; ?>">
				<a href="#main-post-<?php echo $count; ?>" title="<?php the_title(); ?>">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/blank.gif" alt="<?php the_title(); ?>" align="top" />
				</a>
			</li>
<?php } else { ?>
			<li id="nav-post-<?php echo $count; ?>" class="clearfix">
				<a href="#main-post-<?php echo $count; ?>" title="<?php the_title(); ?>">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/blank.gif" alt="<?php the_title(); ?>" align="top" />
				</a>
			</li>
<?php } ?>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

		</ul>

	</div>

</div>
