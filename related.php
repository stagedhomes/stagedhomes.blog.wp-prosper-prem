<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<div id="related" class="clearfix">

<?php if ( function_exists('related_posts') ) { ?>
	<div class="related-posts">
		<?php related_posts(); ?>
	</div>
<?php } ?>

	<div class="subscribe">

		<p class="intro"><?php _e("If you enjoyed this article, subscribe to receive more just like it.", "wp-prosper"); ?></p>

		<p class="feed"><a title="<?php _e("Subscribe via RSS Feed", "wp-prosper"); ?>" href="<?php bloginfo('rss2_url'); ?>"><?php _e("Subscribe via RSS Feed", "wp-prosper"); ?></a></p>

	<?php if ( $wp_prosper_subscribe_settings == 'Use Google/FeedBurner Email' && $wp_prosper_fb_feed_id ) { ?>

	<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=<?php echo $wp_prosper_fb_feed_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
		<input type="hidden" value="<?php echo $wp_prosper_fb_feed_id; ?>" name="uri"/>
		<input type="hidden" name="loc" value="en_US"/>
		<p class="email-form">
			<input type="text" class="sub" name="email" value="<?php _e("subscribe via email", "wp-prosper"); ?>" onfocus="if (this.value == '<?php _e("subscribe via email", "wp-prosper"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("subscribe via email", "wp-prosper"); ?>';}" />
			<input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/blank.gif" class="subbutton" alt="<?php _e("submit", "wp-prosper"); ?>" />
		</p>
		<div style="clear:both;"><small><?php _e("Privacy guaranteed. We'll never share your info.", "wp-prosper"); ?></small></div>
	</form>

	<?php } elseif ( $wp_prosper_subscribe_settings == 'Use Alternate Email List Form' && $wp_prosper_alt_email_code ) { ?>

	<?php echo stripslashes($wp_prosper_alt_email_code); ?>

	<?php } ?>

	</div>

</div>
