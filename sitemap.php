<?php
/*
Template Name: Site Map
*/
?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<?php include (TEMPLATEPATH . '/banner728.php'); ?>

		<div id="contentleft" class="maincontent">

			<div id="content">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>

				<div class="sitemap">

					<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

				<div class="post clearfix">

					<h1 class="page-title"><?php the_title(); ?></h1>

					<div class="sitemap-narrow">

						<h2><span><?php _e("Site Feeds", "wp-prosper"); ?></span></h2>
						<ul class="archives">
							<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e("Main RSS Feed", "wp-prosper"); ?></a></li>
							<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e("Comments RSS Feed", "wp-prosper"); ?></a></li>
						</ul>

						<h2><span><?php _e("Pages", "wp-prosper"); ?></span></h2>
						<ul class="archives">
							<li><a href="<?php bloginfo('home'); ?>"><?php _e("Home", "wp-prosper"); ?></a></li>
							<?php wp_list_pages('title_li='); ?>
						</ul>

						<h2><span><?php _e("Monthly Archives", "wp-prosper"); ?></span></h2>
						<ul class="archives">
							<?php wp_get_archives(); ?>
						</ul>
		
						<h2><span><?php _e("Categories", "wp-prosper"); ?></span></h2>
						<ul class="archives">
							<?php wp_list_categories('title_li='); ?>
						</ul>

						<h2><span><?php _e("Popular Tags", "wp-prosper"); ?></span></h2>
						<?php wp_tag_cloud('number=40&smallest=9&largest=9&format=list'); ?> 

					</div> <!-- end sitemap-narrow div -->

					<div class="sitemap-wide">

						<h2><span><?php _e("All Articles", "wp-prosper"); ?></span></h2>
<?php
$numposts = 20; 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('showposts='.$numposts.'&paged=' . $paged); ?>
<?php while (have_posts()) : the_post(); ?>

						<div class="post clearfix" id="post-<?php the_ID(); ?>">

							<?php /* include (TEMPLATEPATH . "/post-thumb.php"); */ ?>

							<div class="entry">
								<p class="site-map post-title"><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Permanent Link to", "wp-prosper"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></p>
								<div><?php the_time( get_option( 'date_format' ) ); ?> | <?php the_author_posts_link(); ?> | <a href="<?php comments_link(); ?>" rel="<?php _e("bookmark", "wp-prosper"); ?>" title="<?php _e("Comments for", "wp-prosper"); ?> <?php the_title(); ?>"><?php comments_number(__('0 Comments', 'wp-prosper'), __('1 Comments', 'wp-prosper'), __( '% Comments', 'wp-prosper'));?></a></div>
							</div>

						</div>
<?php endwhile; ?>
						<?php include (TEMPLATEPATH . '/bot-nav.php'); ?>

					</div> <!-- end sitemap-wide div -->

				</div> <!-- end post div -->

				</div> <!-- end sitemap div -->

			</div> <!-- end content div -->

		</div> <!-- end contentleft div -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
