<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

		<div id="contentright">

			<div id="sidebar" class="clearfix">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar - Top') ) : ?>
				<div class="widget">
					<h3 class="widgettitle">This is a Widget</h3>
					<div class="text-widget">
						This is a widget area. Visit the Widget page in your WordPress control panel to add some content here
					</div>
				</div>
<?php endif; ?>
			</div>

			<div id="sidebar-bottom" class="clearfix">
				<div id="sidebar-bottom-left">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar - Bottom Left') ) : ?>
<?php endif; ?>
				</div>	

				<div id="sidebar-bottom-right">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar - Bottom Right') ) : ?>
<?php endif; ?>	
				</div>

			</div>

		</div>