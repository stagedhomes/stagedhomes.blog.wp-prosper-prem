<?php 
// This starts the Side Tabs widget.
add_action( 'widgets_init', 'sidetabs_load_widgets' );

function sidetabs_load_widgets() {
	register_widget( 'Sidetabs_Widget' );
}

class Sidetabs_Widget extends WP_Widget {

	function Sidetabs_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'sidetabs', 'description' => __('Adds the Side Tabs box for popular posts, archives, categories and tags.', 'wp-prosper') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sidetabs-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'sidetabs-widget', __('Side Tabs Widget', 'wp-prosper'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Before widget (defined by themes). */
		echo $before_widget; ?>

		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/tabs.js"></script>

		<ul class="tabs clearfix">
			<li><a href="javascript:tabSwitch_2(1, 4, 'tab_', 'content_');" id="tab_1" class="on"><?php _e("Popular", "wp-prosper"); ?></a></li>
			<li><a href="javascript:tabSwitch_2(2, 4, 'tab_', 'content_');" id="tab_2"><?php _e("Categories", "wp-prosper"); ?></a></li>
			<li><a href="javascript:tabSwitch_2(3, 4, 'tab_', 'content_');" id="tab_3"><?php _e("Archives", "wp-prosper"); ?></a></li>
			<li><a href="javascript:tabSwitch_2(4, 4, 'tab_', 'content_');" id="tab_4"><?php _e("Tags", "wp-prosper"); ?></a></li>
		</ul>

		<div style="clear:both;"></div>

		<div id="content_1" class="cat_content clearfix">
			<?php if ( function_exists('get_mostpopular') ) : ?>
				<span class="popular"><?php get_mostpopular("range=weekly&limit=5&order_by=avg&stats_comments=0&pages=0"); ?></span>
			<?php else : ?>
				<p><?php _e("This feature has not been activated yet.", "wp-prosper"); ?></p>
			<?php endif; ?>
		</div>

		<div id="content_2" class="cat_content clearfix" style="display:none">
			<ul class="arc"><?php wp_list_categories('hierarchical=0&title_li='); ?></ul>
		</div>

		<div id="content_3" class="cat_content clearfix" style="display:none">
			<ul class="arc"><?php get_archives(); ?></ul>
		</div>

		<div id="content_4" class="cat_content clearfix" style="display:none">
			<?php wp_tag_cloud('number=40&smallest=9&largest=9&format=list'); ?>
		</div>

		<?php /* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		return $instance;
	}
}
?>
