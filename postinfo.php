<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<div class="meta">
	<?php the_author_posts_link(); ?> | <?php the_time( get_option( 'date_format' ) ); ?><?php if ('open' == $post->comment_status) { ?> | <a href="<?php comments_link(); ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Comments for", "wp-prosper"); ?> <?php the_title(); ?>"><?php _e("Comments", "wp-prosper"); ?> <?php comments_number('(0)','(1)','(%)'); ?></a><?php } ?> 
</div>
