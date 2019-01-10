<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php if ( $wp_prosper_show_auth_bio == 'yes' ) { ?>
<div class="auth-bio clearfix">
	<div class="bio">
		<?php // this is the author photo pulled from gravatar.com  
		if (function_exists('get_avatar')) {
		$gravsize = $wp_prosper_grav_size; 
		$author_email = get_the_author_email();
		echo get_avatar($author_email,$size="$gravsize"); } ?>
		<p><strong><?php _e("About", "wp-prosper"); ?> <?php the_author_meta('display_name'); ?></strong>: <?php the_author_meta('description'); ?> <a href="<?php bloginfo('url'); ?>/author/<?php the_author_meta('user_login'); ?>/"><?php _e("View author profile", "wp-prosper"); ?></a>.</p>
	</div>
</div>
<?php } ?>
