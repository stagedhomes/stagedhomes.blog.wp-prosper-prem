<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<div id="footer-widgets" class="clearfix maincontent">

	<div class="footer-widget1">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 1') ) : ?>
		<div class="widget">
			<h3 class="widgettitle">This is a Widget</h3>
			This is a widget area. Visit the Widget page in your WordPress control panel to add some content here
		</div>
<?php endif; ?>	
	</div>

	<div class="footer-widget2">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 2') ) : ?>
		<div class="widget">
			<h3 class="widgettitle">This is a Widget</h3>
			This is a widget area. Visit the Widget page in your WordPress control panel to add some content here
		</div>
<?php endif; ?>	
	</div>

	<div class="footer-widget3">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 3') ) : ?>
		<div class="widget">
			<h3 class="widgettitle">This is a Widget</h3>
			This is a widget area. Visit the Widget page in your WordPress control panel to add some content here
		</div>
<?php endif; ?>	
	</div>

	<div class="footer-widget4">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 4') ) : ?>
		<div class="widget">
			<h3 class="widgettitle">This is a Widget</h3>
			This is a widget area. Visit the Widget page in your WordPress control panel to add some content here
		</div>
<?php endif; ?>
	</div>

</div>