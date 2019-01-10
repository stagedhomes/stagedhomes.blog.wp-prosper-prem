<?php
// This starts the Video widget.
add_action( 'widgets_init', 'videoslide_load_widgets' );

function videoslide_load_widgets() {
	register_widget( 'VideoSlide_Widget' );
}

class VideoSlide_Widget extends WP_Widget {

	function VideoSlide_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'videoslide', 'description' => __('Adds the YouTube Video slider.', 'wp-prosper') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'videoslide-widget' );
		/* Create the widget. */
		$this->WP_Widget( 'videoslide-widget', __('YouTube Video Widget', 'wp-prosper'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$numvids = $instance['numvids'];
		$ytrss = $instance['ytrss'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title; ?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cycle.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/slideshowvids.js"></script>

<div id="slideshowvids" class="clearfix">

	<div class="slides clearfix">

		<ul class="clearfix">

<?php
$count = 1;
// Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/rss.php');
$rss = fetch_rss($instance['ytrss']);
$maxitems = $instance['numvids']; //set number of items to display
$items = array_slice($rss->items, 0, $maxitems); ?>

<?php
foreach ( $items as $item ) :
$youtubeid = strchr($item['link'],'=');
$youtubeid = substr($youtubeid,1);
?>

			<li id="vid-post-<?php echo $count; ?>" class="vid-post">
				<object width="286" height="210">
					<param name="movie" value="https://www.youtube.com/v/<?php echo $youtubeid ?>&hl=en_US&fs=1&rel=0"></param>
					<param name="allowFullScreen" value="true"></param>
					<param name="allowscriptaccess" value="always"></param>
					<embed src="https://www.youtube.com/v/<?php echo $youtubeid ?>&hl=en_US&fs=1&rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="286" height="210"></embed>
				</object>
			</li>

<?php $count = $count + 1; endforeach; ?>

		</ul>

	</div>


	<ul class="slides-nav">

<?php
$count = 1;
// Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/rss.php');
$rss = fetch_rss($instance['ytrss']);
$maxitems = $instance['numvids']; //set number of items to display
$items = array_slice($rss->items, 0, $maxitems); ?>

<?php
foreach ( $items as $item ) :
$youtubeid = strchr($item['link'],'=');
$youtubeid = substr($youtubeid,1);
?>
		<li id="vids-nav-post-<?php echo $count; ?>" class="vid-post-title clearfix">
			<a href="#vid-post-<?php echo $count; ?>" title="<?php the_title(); ?>">
				<?php echo $item['title']; ?>
			</a>
		</li>

<?php
$count = $count + 1;
endforeach; ?>

	</ul>

</div>

		<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('Recent YouTube Videos', 'wp-prosper'),
			'numvids' => '5',
			'ytrss' => 'https://gdata.youtube.com/feeds/base/users/mdp8593/uploads?alt=rss&v=2&orderby=published&client=ytapi-youtube-profile');

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wp-prosper'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" /></p>

		<p><label for="<?php echo $this->get_field_id( 'numvids' ); ?>"><?php _e('Number of YouTube videos to show:', 'wp-prosper'); ?></label>
		<input id="<?php echo $this->get_field_id( 'numvids' ); ?>" name="<?php echo $this->get_field_name( 'numvids' ); ?>" value="<?php echo $instance['numvids']; ?>" style="width:100%;" /></p>

		<!-- numvids: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'ytrss' ); ?>"><?php _e('Youtube RSS Feed:', 'wp-prosper'); ?></label>
		<textarea rows="3" id="<?php echo $this->get_field_id( 'ytrss' ); ?>" name="<?php echo $this->get_field_name( 'ytrss' ); ?>" style="width:100%;"><?php echo $instance['ytrss']; ?></textarea></p>

	<?php
	}
}
?>
