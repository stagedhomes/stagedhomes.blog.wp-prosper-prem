<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

<div class="allcomments">

	<h3 id="comments"><?php _e("Comments", "wp-prosper"); ?> (<?php comments_number('0', '1', '%');?>)</h3>

	<p class="comments-number"><a href="<?php trackback_url(); ?>" title="<?php _e("Trackback URL", "wp-prosper"); ?>"><?php _e("Trackback URL", "wp-prosper"); ?></a> | <a title="<?php _e("Comments RSS Feed for This Entry", "wp-prosper"); ?>" href="<?php the_permalink() ?>feed"><?php _e("Comments RSS Feed", "wp-prosper"); ?></a></p>

	<ol class="commentlist">
	<?php 
	$avsize = $wp_prosper_grav_size;
	wp_list_comments('avatar_size='.$avsize);
	?>
	</ol>

	<div class="comments-navigation clearfix">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e("Comments are closed.", "wp-prosper"); ?></p>

	<?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><?php comment_form_title(__("Leave a Reply", "wp-prosper"), __("Leave a Reply", "wp-prosper")); ?></h3>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e("You must be", "wp-prosper"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in", "wp-prosper"); ?></a> <?php _e("to post a comment", "wp-prosper"); ?>.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php _e("Logged in as"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> | <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Logout", "wp-prosper"); ?>"><?php _e("Logout", "wp-prosper"); ?></a></p>

<?php else : ?>

<p><label for="author"><?php _e("Name", "wp-prosper"); ?> <small><?php if ($req) echo __("( required )", "wp-prosper"); ?></small></label><br />
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" /></p>

<p><label for="email">Email <small><?php if ($req) echo __("( required; will not be published )", "wp-prosper"); ?></small></label><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" /></p>

<p><label for="url"><?php _e("Website", "wp-prosper"); ?></label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" /></p>

<?php endif; ?>

<!--<p><small><strong><?php _e("XHTML", "wp-prosper"); ?>:</strong> <?php _e("You can use these tags", "wp-prosper"); ?>: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><strong><?php _e("If you want a picture to show with your comment, go get a", "wp-prosper"); ?> <a href="http://en.gravatar.com/"><?php _e("Gravatar", "wp-prosper"); ?></a></strong>.</p>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("Submit Comment", "wp-prosper"); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
