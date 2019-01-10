<?php
// This starts the Subscribe Box widget.
add_action( 'widgets_init', 'subscribebox_load_widgets' );

function subscribebox_load_widgets() {
	register_widget( 'SubscribeBox_Widget' );
}

class SubscribeBox_Widget extends WP_Widget {

	function SubscribeBox_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'subscribebox', 'description' => __('Adds the Subscribe Box and/or social network icons.', 'wp-prosper') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'subscribebox-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'subscribebox-widget', __('Subscribe Box Widget', 'wp-prosper'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$intro = $instance['intro'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		printf( '<div class="intro">' );

		/* Display intro from widget settings if one was input. */
		if ( $intro )
			printf( '<p>' . __('%1$s', 'wp-prosper') . '</p>', $intro ); ?>

			<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

			<?php if ( $wp_prosper_subscribe_settings == 'Use Google/FeedBurner Email' && $wp_prosper_fb_feed_id ) { ?>

			<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=<?php echo $wp_prosper_fb_feed_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<input type="hidden" value="<?php echo $wp_prosper_fb_feed_id; ?>" name="uri"/>
				<input type="hidden" name="loc" value="en_US"/>
				<p class="email-form">
					<input type="text" class="sub" name="email" />
					<input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/blank.gif" class="subbutton" alt="<?php _e("submit", "wp-prosper"); ?>" />
				</p>
				<div style="clear:both;"><small><?php _e("Privacy guaranteed. We'll never share your info.", "wp-prosper"); ?></small></div>
			</form>

			<?php } elseif ( $wp_prosper_subscribe_settings == 'Use Alternate Email List Form' && $wp_prosper_alt_email_code ) { ?>

			<?php echo stripslashes($wp_prosper_alt_email_code); ?>

			<?php } else { ?>

			<div><?php _e("Please visit your Theme Settings Page, and complete your Subscription Form Settings.", "wp-prosper"); ?></div>

			<?php } ?>

			<?php include (TEMPLATEPATH . '/sub-icons.php'); ?>

		<?php printf( '</div>' );

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and intro to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['intro'] = strip_tags( $new_instance['intro'] );

		return $instance;
	}

	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Subscribe', 'wp-prosper'), 'intro' => __('Enter your email address below to receive updates each time we publish new content.', 'wp-prosper') );

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wp-prosper'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" /></p>

		<!-- Intro: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'intro' ); ?>"><?php _e('Introduction:', 'wp-prosper'); ?></label>
		<textarea rows="3" id="<?php echo $this->get_field_id( 'intro' ); ?>" name="<?php echo $this->get_field_name( 'intro' ); ?>" style="width:100%;"><?php echo $instance['intro']; ?></textarea></p>

	<?php
	}
}
?>
