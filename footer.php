<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

		<?php if ( $wp_prosper_footer_widgets == 'Yes' ) { ?>
		<?php include (TEMPLATEPATH . '/footer-widgets.php'); ?>
		<?php } ?>

	</div>

	<div id="footer" class="clearfix">
		&copy; <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> <?php echo date('Y'); ?>. <?php _e("All rights reserved.", "wp-prosper"); ?> | <a href="https://stagedhomes.com/">Home Staging</a> | <a href="https://stagedhomes.com/training/three-day/threedaycourse.php">Staging Training</a> | <a href="https://stagedhomes.com/training/home-stager/career.php">Staging Jobs</a>


		<?php include (TEMPLATEPATH . '/sub-icons.php'); ?>
	</div>

</div>




<?php wp_footer(); ?>

</body>
</html>
