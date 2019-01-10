<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<div id="search">
	<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/" ><input type="text" size="18" maxlength="50" name="s" id="searchfield" /><input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/blank.gif" id="submitbutton" alt="<?php _e("go", "wp-prosper"); ?>" /></form>
</div>
