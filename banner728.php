<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php if ( $wp_prosper_ad728 == yes ) { ?>
<div class="banner728">
	<?php echo stripslashes($wp_prosper_ad728_code); ?>
</div>
<?php } ?>
