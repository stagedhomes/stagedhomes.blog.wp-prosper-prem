<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php
$data = get_post_meta( $post->ID, 'WP-Prosper', true );
if ( $wp_prosper_default_thumbs == 'yes' ) { $defthumb = get_bloginfo('stylesheet_directory') . '/images/def-thumb.jpg'; } else { $defthumb == 'false'; }
if ( $wp_prosper_show_thumbs == 'yes' && function_exists('get_the_image') && $data['remove_thumb'] != 'on' ) { ?>

<div class="feature-image">
	<?php get_the_image(array(
		'custom_key' => array('post_thumbnail','thumbnail'),
		'default_size' => 'thumbnail',
		'default_image' => $defthumb,
		'link_to_post' => true,
		'image_scan' => true,
	)); ?>
</div>

<?php } ?>
