<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>


<?php if ( function_exists('wp_pagenavi') ) { ?>
	<?php wp_pagenavi(); ?>
<?php } else { ?>
	<div class="navigation">
		<?php posts_nav_link(); ?>
	</div>
<?php } ?>