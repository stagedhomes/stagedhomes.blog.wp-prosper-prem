<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php if ( $wp_prosper_ad468 == yes ) { ?>
<div class="banner468">
	<?php echo stripslashes($wp_prosper_ad468_code); ?>
</div>
<?php } ?>
