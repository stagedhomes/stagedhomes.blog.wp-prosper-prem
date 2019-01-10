<?php if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar - Top',
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
	'after_widget' => '</div></div>',
	'before_title' => '<h3 class="widgettitle"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array('name'=>'Sidebar - Bottom Left',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widgettitle"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array('name'=>'Sidebar - Bottom Right',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widgettitle"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array('name'=>'Footer Widget 1',
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
	'after_widget' => '</div></div>',
	'before_title' => '<h3 class="widgettitle"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array('name'=>'Footer Widget 2',
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
	'after_widget' => '</div></div>',
	'before_title' => '<h3 class="widgettitle"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array('name'=>'Footer Widget 3',
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
	'after_widget' => '</div></div>',
	'before_title' => '<h3 class="widgettitle"><span>',
	'after_title' => '</span></h3>',
	));
	register_sidebar(array('name'=>'Footer Widget 4',
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
	'after_widget' => '</div></div>',
	'before_title' => '<h3 class="widgettitle"><span>',
	'after_title' => '</span></h3>',
	));

// Add the Youtube Video Widget
require_once(TEMPLATEPATH . "/widget-videoslider.php");

// Add the Subscribe Box Widget
require_once(TEMPLATEPATH . "/widget-subscribebox.php");

// Add the Side Tabs Widget
require_once(TEMPLATEPATH . "/widget-sidetabs.php");

// Add support for WP 3.0 Menu Management
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

if (function_exists('register_nav_menus')) {
	function register_my_menus() {
		register_nav_menus(
			array(
			'topnav' => __( 'Top Navigation' ),
			'catnav' => __( 'Category Navigation' )
			)
		);
	}

add_action( 'init', 'register_my_menus' );

}

// Ready the theme for translation
load_theme_textdomain('wp-prosper');

// Add Twitter and other social media links to user profile
add_filter('user_contactmethods','add_twitter_contactmethod',10,1);
function add_twitter_contactmethod( $contactmethods ) {
	$contactmethods['twitter'] = 'Twitter Username';
	$contactmethods['facebook'] = 'Facebook Username';
	$contactmethods['linkedin'] = 'LinkedIn Username';
	$contactmethods['flickr'] = 'Flickr Username';
	$contactmethods['youtube'] = 'Youtube Username';

	return $contactmethods;
}

// Comments backward compatibility
add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if ( !function_exists('wp_list_comments') )
		$file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}

// Get custom field value
function get_custom_field($key, $echo = FALSE) {
	global $post;
	$custom_field = get_post_meta($post->ID, $key, true);
	if ($echo == FALSE) return $custom_field;
	echo $custom_field;
}

// This function limits the number of words in the magazine home page excerpt.
function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// WP-Prosper Options Panel
$themename = "WP-Prosper";
$shortname = "wp_prosper";

// Get Categories in a drop-down list
$categories_list = get_categories('hide_empty=0&orderby=name');
$getcat = array();
foreach($categories_list as $acategory) {
	$getcat[$acategory->cat_ID] = $acategory->category_nicename;
}
$category_dropdown = array_unshift($getcat, "Select a Category Slug");

// Set standard font and font choices
$std_font = "arial, helvetica, sans-serif";
$font_choices = array("arial, helvetica, sans-serif", "verdana, lucida, sans-serif", "tahoma, geneva, sans-serif", "rockwell, georgia, serif", "georgia, times, serif", "times, georgia, serif", "cambria, georgia, serif");

$options = array (

// Basic Site Settings

	array(    "name" => __("Basic Site Settings", "wp-prosper"),
		"id" => $shortname."_basic_settings",
		"type" => "header"),

	array(    "name" => __("Activate Footer Widgets", "wp-prosper"),
		"id" => $shortname."_footer_widgets",
		"type" => "select",
		"std" => "No",
		"options" => array("No", "Yes"),
		"help" => __("Select Yes to activate widgets at the bottom of the page.", "wp-prosper")),

	array(    "name" => __("Post Excerpts or Content", "wp-prosper"),
		"id" => $shortname."_post_content",
		"type" => "select",
		"std" => "Excerpts",
		"options" => array("Excerpts", "Content"),
		"help" => __("On your home page and archive/category pages, you can display post excerpts or the full post content. See <a href='http://codex.wordpress.org/Glossary#Excerpt'>here</a> for more info.", "wp-prosper")),

	array(    "name" => __("Add Post Thumbnail Images", "wp-prosper"),
		"id" => $shortname."_show_thumbs",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => __("Select no to turn off post thumbnail images.", "wp-prosper")),

	array(    "name" => __("Show Default Post Thumbnail Image", "wp-prosper"),
		"id" => $shortname."_default_thumbs",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => __("If you don't add your own thumbnail image to a post, WP-Prosper can add a default, generic thumbnail image for you. To change the default thumbnail, you'll need an image that's 150px x 150px named <strong>def-thumb.jpg</strong> and an image that's 184px x 121px named <strong>def-thumb2.jpg</strong>. Upload them to the /images folder found within your WP-Prosper theme folder.", "wp-prosper")),

	array(    "name" => __("Show Default Image for Featured Posts", "wp-prosper"),
		"id" => $shortname."_default_features",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => __("If you don't add your own Featured Article image to a post, WP-Prosper can add a default, generic featured image for you.<br />
		To change the default Featured Article image, you'll need an image that's 440px x 290px named <strong>def-thumb3.jpg</strong> and an image that's 294px x 194px named <strong>def-thumb4.jpg</strong>. Upload them to the /images folder found within your WP-Prosper theme folder.", "wp-prosper")),

	array(    "name" => __("Show Author Bio on Single Post", "wp-prosper"),
		"id" => $shortname."_show_auth_bio",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => __("If you'd like to show the author biographical info at the bottom of the single post page, select yes above.", "wp-prosper")),

	array(    "name" => __("Size of Gravatar", "wp-prosper"),
		"id" => $shortname."_grav_size",
		"type" => "select",
		"std" => "60",
		"options" => array("60", "24", "36", "48", "72", "84", "96"),
		"help" => __("This is the pixel size of the Gravatar that will be used in the comments section and the author profile section found at the bottom of the single post page.", "wp-prosper")),

// Subscription Form and Contact Settings

		array(    "name" => __("Subscription Form and Contact Settings", "wp-prosper"),
		"id" => $shortname."_subscription_form_settings",
		"type" => "header"),

	array(    "name" => __("Subscription Form Settings", "wp-prosper"),
		"id" => $shortname."_subscribe_settings",
		"type" => "select",
		"std" => "No Subscription Form",
		"options" => array("No Subscription Form", "Use Google/FeedBurner Email", "Use Alternate Email List Form"),
		"help" => __("Google/FeedBurner Email allows publishers to deliver their content to subscribers via email. See <a href='http://www.feedburner.com/fb/a/publishers/fbemail'>here</a> for more info. If using this service, enter your Google/Feedburner Feed URI below.<br />You can also use an Alternate Email List provider. To do so, make your selection above, and enter the form code below", "wp-prosper")),

	array(    "name" => __("Google/Feedburner URI", "wp-prosper"),
		"id" => $shortname."_fb_feed_id",
		"std" => "",
		"type" => "text",
		"pre" => "http://feeds.feedburner.com/",
		"help" => __("Enter Google/Feedburner URI only (rather than the full URL).<br /> For example, in this Google/FeedBurner feed URL: http://feeds.feedburner.com/<strong>solostream</strong>, the Feed URI is <strong>solostream</strong>.", "wp-prosper")),

	array(    "name" => __("Alternate Email List Form Code", "wp-prosper"),
		"id" => $shortname."_alt_email_code",
		"std" => "",
		"type" => "textarea",
		"help" => __("If using an alternate email list provider, enter your subscription form code here.", "wp-prosper")),

	array(    "name" => __("Twitter Username", "wp-prosper"),
		"id" => $shortname."_twitter_url",
		"std" => "",
		"type" => "text",
		"pre" => "http://www.twitter.com/",
		"help" => __("Enter your Twitter Username.", "wp-prosper")),

	array(    "name" => __("Twitter Link Text", "wp-prosper"),
		"id" => $shortname."_twitter_link_text",
		"std" => __("Follow me on Twitter", "wp-prosper"),
		"type" => "textarea",
		"help" => ""),

	array(    "name" => __("Facebook Username", "wp-prosper"),
		"id" => $shortname."_facebook_url",
		"std" => "",
		"type" => "text",
		"pre" => "http://www.facebook.com/",
		"help" => __("Enter your Facebook Profile Username.", "wp-prosper")),

	array(    "name" => __("Facebook Link Text", "wp-prosper"),
		"id" => $shortname."_facebook_link_text",
		"std" => __("Connect with me on Facebook", "wp-prosper"),
		"type" => "textarea",
		"help" => ""),

	array(    "name" => __("LinkedIn Username", "wp-prosper"),
		"id" => $shortname."_linkedin_url",
		"std" => "",
		"type" => "text",
		"pre" => "http://www.linkedin.com/in/",
		"help" => __("Enter your LinkedIn Profile Username.", "wp-prosper")),

	array(    "name" => __("LinkedIn Link Text", "wp-prosper"),
		"id" => $shortname."_linkedin_link_text",
		"std" => __("Connect with me on LinkedIn", "wp-prosper"),
		"type" => "textarea",
		"help" => ""),

	array(    "name" => __("Flickr Username", "wp-prosper"),
		"id" => $shortname."_flickr_url",
		"std" => "",
		"type" => "text",
		"pre" => "http://www.flickr.com/photos/",
		"help" => __("Enter your Flickr Profile Username.", "wp-prosper")),

	array(    "name" => __("Flickr Link Text", "wp-prosper"),
		"id" => $shortname."_flickr_link_text",
		"std" => __("Connect with me on Flickr", "wp-prosper"),
		"type" => "textarea",
		"help" => ""),

	array(    "name" => __("YouTube Username", "wp-prosper"),
		"id" => $shortname."_youtube_url",
		"std" => "",
		"type" => "text",
		"pre" => "https://www.youtube.com/user/",
		"help" => __("Enter your Youtube Profile Username.", "wp-prosper")),

	array(    "name" => __("YouTube Link Text", "wp-prosper"),
		"id" => $shortname."_youtube_link_text",
		"std" => __("Connect with me on YouTube", "wp-prosper"),
		"type" => "textarea",
		"help" => ""),

// Site Title Settings

		array(    "name" => __("Site Title Settings", "wp-prosper"),
		"id" => $shortname."_site_title_settings",
		"type" => "header"),

		array(    "name" => __("Site Title Option", "wp-prosper"),
		"id" => $shortname."_site_title_option",
		"type" => "select",
		"std" => "Basic Text-Type Title",
		"options" => array("Basic Text-Type Title", "Image/Logo-Type Title"),
		"help" => __("You can use simple text as your site title or you can use an image. If you have a Custom Image/Logo you'd like to use, you can enter the URL below.", "wp-prosper")),

	array(    "name" => __("Site Title Font Family", "wp-prosper"),
		"id" => $shortname."_site_title_font_family",
		"type" => "select",
		"std" => $std_font,
		"options" => $font_choices,
		"help" => __("Applies only to Basic Text-Type Title option.", "wp-prosper")),

		array(    "name" => __("Site Title Color", "wp-prosper"),
		"id" => $shortname."_site_title_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Applies only to Basic Text-Type Title option. Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

		array(    "name" => __("Site Title Size", "wp-prosper"),
		"id" => $shortname."_site_title_size",
		"type" => "text",
		"std" => "24px",
		"help" => __("Enter the size of your Site Title in px (e.g. 24px). Applies only to Basic Text-Type Title option.", "wp-prosper")),

	array(    "name" => __("Site Title Weight", "wp-prosper"),
		"id" => $shortname."_site_title_weight",
		"type" => "select",
		"std" => "bold",
		"options" => array("bold","normal"),
		"help" => __("Applies only to Basic Text-Type Title option.", "wp-prosper")),

	array(    "name" => __("Site Title Background Color", "wp-prosper"),
		"id" => $shortname."_header_bg_color",
		"std" => "",
		"type" => "text-color",
		"help" => __("Leave blank to use default background. This is the entire header area behind the site title. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Custom Image/Logo URL", "wp-prosper"),
		"id" => $shortname."_site_logo_url",
		"std" => "",
		"type" => "textarea",
		"help" => __("Upload your logo file (logo width should not exceed 980px; height should not exceed 100px;), and enter the URL for the file location (e.g. http://www.mysite.com/images/logo.gif).<br /><strong>Also note: Make sure you DO NOT have any spaces in the filename for your logo file. For example: 'my logo.gif' will not work. Change the filename to 'mylogo.gif'</strong>.", "wp-prosper")),

	array(    "name" => __("Custom Image/Logo Position", "wp-prosper"),
		"id" => $shortname."_site_logo_position",
		"std" => "0px 0px",
		"type" => "text",
		"help" => __("The first digit is the number of pixels to move the logo from the left. Second digit is the number of pixels to move the logo from the top of the header area. If unsure, leave the default values.", "wp-prosper")),

// Home Page and Archive Page Layout

	array(    "name" => __("Home Page and Archive Page Layout", "wp-prosper"),
		"id" => $shortname."_home_archive_layout",
		"type" => "header"),

	array(    "name" => __("Featured Content on Home Page", "wp-prosper"),
		"id" => $shortname."_features_on",
		"type" => "select",
		"std" => "No",
		"options" => array("No", "Narrow Featured Content Slider", "Wide Featured Content Slider"),
		"help" => __("If you would like to add a Featured Content Slider to the home page, change your selection above.", "wp-prosper")),

	array(    "name" => __("How Many Featured Items", "wp-prosper"),
		"id" => $shortname."_features_number",
		"type" => "text",
		"std" => "5",
		"help" => __("How many featured items would you like to display?", "wp-prosper")),

	array(    "name" => __("Home Page Post Layout", "wp-prosper"),
		"id" => $shortname."_home_layout",
		"type" => "select",
		"std" => "Option 1 - Standard Blog Layout",
		"options" => array("Option 1 - Standard Blog Layout", "Option 2 - 2 Posts Aligned Side-by-Side", "Option 3 - 3 Posts Aligned Side-by-Side", "Option 4 - 3 Posts Side-by-Side Arranged by Category", "Option 5 - Posts Arranged by Category Side-by-Side", "Option 6 - Posts Arranged by Category Stacked"),
		"help" => __("If using Option, 4, 5 or 6, complete the '<strong>Home Page Posts Arranged by Category</strong>' section below.", "wp-prosper")),

	array(    "name" => __("Archive Page Post Layout", "wp-prosper"),
		"id" => $shortname."_archive_layout",
		"type" => "select",
		"std" => "Option 1 - Standard Blog Layout",
		"options" => array("Option 1 - Standard Blog Layout", "Option 2 - 2 Posts Aligned Side-by-Side", "Option 3 - 3 Posts Aligned Side-by-Side"),
		"help" => ""),

// Home Page Posts Arranged by Category

	array(    "name" => __("Home Page Posts Arranged by Category", "wp-prosper"),
		"id" => $shortname."_home_by_cat",
		"type" => "header"),

	array(    "name" => __("How Many Posts In Each Category", "wp-prosper"),
		"id" => $shortname."_num_home_posts_by_cat",
		"type" => "select",
		"std" => "3",
		"options" => array("3","2","4","5","6"),
		"help" => __("Select the number of posts in each category.", "wp-prosper")),

	array(	"name" => __("Category Box 1", "wp-prosper"),
		"id" => $shortname."_cat_box_1",
		"type" => "select",
		"std" => "Select a Category Slug",
		"options" => $getcat,
		"help" => __("Select the category slug for Category Box 1.", "wp-prosper")),

	array(    "name" => __("Category Box 1 Title", "wp-prosper"),
		"id" => $shortname."_cat_box_1_title",
		"type" => "text",
		"help" => __("Enter a title for Category Box 1.", "wp-prosper")),

	array(	"name" => __("Category Box 2", "wp-prosper"),
		"id" => $shortname."_cat_box_2",
		"type" => "select",
		"std" => "Select a Category Slug",
		"options" => $getcat,
		"help" => __("Select the category slug for Category Box 2.", "wp-prosper")),

	array(    "name" => __("Category Box 2 Title", "wp-prosper"),
		"id" => $shortname."_cat_box_2_title",
		"type" => "text",
		"help" => __("Enter a title for Category Box 2.", "wp-prosper")),

	array(	"name" => __("Category Box 3", "wp-prosper"),
		"id" => $shortname."_cat_box_3",
		"type" => "select",
		"std" => "Select a Category Slug",
		"options" => $getcat,
		"help" => __("Select the category slug for Category Box 3.", "wp-prosper")),

	array(    "name" => __("Category Box 3 Title", "wp-prosper"),
		"id" => $shortname."_cat_box_3_title",
		"type" => "text",
		"help" => __("Enter a title for Category Box 3.", "wp-prosper")),

	array(	"name" => __("Category Box 4", "wp-prosper"),
		"id" => $shortname."_cat_box_4",
		"type" => "select",
		"std" => "Select a Category Slug",
		"options" => $getcat,
		"help" => __("Select the category slug for Category Box 4.", "wp-prosper")),

	array(    "name" => __("Category Box 4 Title", "wp-prosper"),
		"id" => $shortname."_cat_box_4_title",
		"type" => "text",
		"help" => __("Enter a title for Category Box 4.", "wp-prosper")),

	array(	"name" => __("Category Box 5", "wp-prosper"),
		"id" => $shortname."_cat_box_5",
		"type" => "select",
		"std" => "Select a Category Slug",
		"options" => $getcat,
		"help" => __("Select the category slug for Category Box 5.", "wp-prosper")),

	array(    "name" => __("Category Box 5 Title", "wp-prosper"),
		"id" => $shortname."_cat_box_5_title",
		"type" => "text",
		"help" => __("Enter a title for Category Box 5.", "wp-prosper")),

	array(	"name" => __("Category Box 6", "wp-prosper"),
		"id" => $shortname."_cat_box_6",
		"type" => "select",
		"std" => "Select a Category Slug",
		"options" => $getcat,
		"help" => __("Select the category slug for Category Box 6.", "wp-prosper")),

	array(    "name" => __("Category Box 6 Title", "wp-prosper"),
		"id" => $shortname."_cat_box_6_title",
		"type" => "text",
		"help" => __("Enter a title for Category Box 6.", "wp-prosper")),

	array(    "name" => __("List Other Recent Articles Below Category Boxes", "wp-prosper"),
		"id" => $shortname."_other_articles",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => __("By default, Other Recent Articles will appear below your category boxes. Select no to remove them.", "wp-prosper")),

	array(    "name" => __("Title for Other Recent Articles", "wp-prosper"),
		"id" => $shortname."_other_title",
		"type" => "text",
		"std" => "Other Recent Articles",
		"help" => __("", "wp-prosper")),

	array(    "name" => __("Number of Other Recent Articles", "wp-prosper"),
		"id" => $shortname."_other_number",
		"type" => "text",
		"std" => "3",
		"help" => __("How many Other Recent Articles would you like to display?", "wp-prosper")),

// Advertisement Settings

	array(    "name" => __("Advertisement Settings", "wp-prosper"),
		"id" => $shortname."_ad_settings",
		"type" => "header"),

	array(    "name" => __("Display 468x60 Ad in Header", "wp-prosper"),
		"id" => $shortname."_ad468head",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => __("Select yes to add the 468x60 banner advertisement in the site header next to the site title. Enter your own ad code below.", "wp-prosper")),

	array(    "name" => __("Header 468x60 Ad Code", "wp-prosper"),
		"id" => $shortname."_ad468head_code",
		"std" => "<a href='http://www.solostream.com'><img src='http://www.solostream.com/images/solo-banner-468-2.gif' alt='banner ad' /></a>",
		"type" => "textarea",
		"help" => __("Replace the above code with your own advertising code.", "wp-prosper")),

	array(    "name" => __("Display 468x60 Ad Above Posts", "wp-prosper"),
		"id" => $shortname."_ad468",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => __("Select yes to add the 468x60 banner advertisement just above your posts. Enter your own ad code below.", "wp-prosper")),

	array(    "name" => __("468x60 Ad Code", "wp-prosper"),
		"id" => $shortname."_ad468_code",
		"std" => "<a href='http://www.solostream.com'><img src='http://www.solostream.com/images/solo-banner-468-3.gif' alt='banner ad' /></a>",
		"type" => "textarea",
		"help" => __("Replace the above code with your own advertising code.", "wp-prosper")),

	array(    "name" => __("Display 728x90 Ad Below Nav Bar", "wp-prosper"),
		"id" => $shortname."_ad728",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => __("Select yes to add the 728x90 banner advertisement just below your navigation bar. Enter your own ad code below.", "wp-prosper")),

	array(    "name" => __("728x90 Ad Code", "wp-prosper"),
		"id" => $shortname."_ad728_code",
		"std" => "",
		"type" => "textarea",
		"help" => __("Add your code for the 728x90 banner ad.", "wp-prosper")),

// Basic Style Settings

		array(    "name" => __("Basic Style Settings", "wp-prosper"),
		"id" => $shortname."_basic_style_settings",
		"type" => "header"),

	array(    "name" => __("Body Background Color", "wp-prosper"),
		"id" => $shortname."_body_backgroundcolor",
		"std" => "",
		"type" => "text-color",
		"help" => __("Leave blank to use default body background. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Custom Body Background Image", "wp-prosper"),
		"id" => $shortname."_custom_body_bg_image",
		"std" => "",
		"type" => "textarea",
		"help" => __("Upload your Custom Body Background Image and enter the URL for the file location (e.g. http://www.mysite.com/images/myimage.gif).<br /><strong>Also note: Make sure you DO NOT have any spaces in the file name for your Custom Body Background Image. For example: 'my image.gif' will not work. Change the filename to 'myimage.gif'</strong>.", "wp-prosper")),

	array(    "name" => __("Custom Body Background Image Repeat", "wp-prosper"),
		"id" => $shortname."_custom_body_bg_image_repeat",
		"type" => "select",
		"std" => "repeat",
		"options" => array("repeat", "no-repeat", "repeat-x", "repeat-y"),
		"help" => __("For info on this property, see <a href='http://www.w3schools.com/css/pr_background-repeat.asp'>here</a>.", "wp-prosper")),

	array(    "name" => __("Custom Body Background Image Position", "wp-prosper"),
		"id" => $shortname."_custom_body_bg_image_position",
		"type" => "text",
		"std" => "top left",
		"help" => __("For info on this property, see <a href='http://www.w3schools.com/css/pr_background-position.asp'>here</a>.", "wp-prosper")),

	array(    "name" => __("Custom Body Background Image Attachment", "wp-prosper"),
		"id" => $shortname."_custom_body_bg_image_attachment",
		"type" => "select",
		"std" => "fixed",
		"options" => array("fixed", "scroll"),
		"help" => __("For info on this property, see <a href='http://www.w3schools.com/Css/pr_background-attachment.asp'>here</a>.", "wp-prosper")),

	array(    "name" => __("Page Font Color", "wp-prosper"),
		"id" => $shortname."_body_font_color",
		"std" => "",
		"type" => "text-color",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Page Font Family", "wp-prosper"),
		"id" => $shortname."_body_font_family",
		"type" => "select",
		"std" => $std_font,
		"options" => $font_choices,
		"help" => ""),

	array(    "name" => __("Post Title Font Family", "wp-prosper"),
		"id" => $shortname."_post_title_font",
		"type" => "select",
		"std" => $std_font,
		"options" => $font_choices,
		"help" => ""),

	array(    "name" => __("Post Title Weight", "wp-prosper"),
		"id" => $shortname."_post_title_weight",
		"type" => "select",
		"std" => "bold",
		"options" => array("bold","normal"),
		"help" => ""),

	array(    "name" => __("Post Title Link Color", "wp-prosper"),
		"id" => $shortname."_post_title_link_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Post Title Hover Link Color", "wp-prosper"),
		"id" => $shortname."_post_title_link_hover_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color.  Click on field to show color picker.", "wp-prosper")),

// Top Nav Style Settings

	array(    "name" => __("Top Navigation Style Settings", "wp-prosper"),
		"id" => $shortname."_topnav_style_settings",
		"type" => "header"),

	array(    "name" => __("Remove Home Link from Top Navigation", "wp-prosper"),
		"id" => $shortname."_hide_home_link",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => __("By default, a link to the Home page will appear on the Top Navigation bar. Select 'yes' to remove it.", "wp-prosper")),

	array(    "name" => __("Top Navigation Font Family", "wp-prosper"),
		"id" => $shortname."_topnav_font_family",
		"type" => "select",
		"std" => $std_font,
		"options" => $font_choices,
		"help" => ""),

	array(    "name" => __("Top Navigation Font Size", "wp-prosper"),
		"id" => $shortname."_topnav_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => __("Top Navigation Font Weight", "wp-prosper"),
		"id" => $shortname."_topnav_weight",
		"type" => "select",
		"std" => "normal",
		"options" => array("normal", "bold"),
		"help" => ""),

	array(    "name" => __("Top Navigation Link Color", "wp-prosper"),
		"id" => $shortname."_topnav_link_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Top Navigation Hover Link Color", "wp-prosper"),
		"id" => $shortname."_topnav_link_hover_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

// Cat Nav Style Settings

	array(    "name" => __("Category Navigation Style Settings", "wp-prosper"),
		"id" => $shortname."_catnav_style_settings",
		"type" => "header"),

	array(    "name" => __("Display Category Navigation", "wp-prosper"),
		"id" => $shortname."_show_catnav",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => __("Select no to hide the category navigation bar.", "wp-prosper")),

	array(    "name" => __("Category Navigation Font Family", "wp-prosper"),
		"id" => $shortname."_catnav_font_family",
		"type" => "select",
		"std" => $std_font,
		"options" => $font_choices,
		"help" => ""),

	array(    "name" => __("Category Navigation Font Size", "wp-prosper"),
		"id" => $shortname."_catnav_size",
		"type" => "select",
		"std" => "8pt",
		"options" => array("8pt", "9pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => __("Category Navigation Font Weight", "wp-prosper"),
		"id" => $shortname."_catnav_weight",
		"type" => "select",
		"std" => "normal",
		"options" => array("normal", "bold"),
		"help" => ""),

	array(    "name" => __("Category Navigation Link Color", "wp-prosper"),
		"id" => $shortname."_catnav_link_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Category Navigation Hover Link Color", "wp-prosper"),
		"id" => $shortname."_catnav_link_hover_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

// Main Content Style Settings

	array(    "name" => __("Main Content Style Settings", "wp-prosper"),
		"id" => $shortname."_content_style_settings",
		"type" => "header"),

	array(    "name" => __("Main Content Font Size", "wp-prosper"),
		"id" => $shortname."_content_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => __("Main Content Link Color", "wp-prosper"),
		"id" => $shortname."_content_link_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Main Content Hover Link Color", "wp-prosper"),
		"id" => $shortname."_content_link_hover_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

// Sidebar Style Settings

	array(    "name" => __("Sidebar Style Settings", "wp-prosper"),
		"id" => $shortname."_right_sidebar_style_settings",
		"type" => "header"),

	array(    "name" => __("Move Sidebar to Left of Content", "wp-prosper"),
		"id" => $shortname."_sidebar_left",
		"type" => "select",
		"std" => "No",
		"options" => array("No", "Yes"),
		"help" => __("Select Yes to move the sidebar to the left side of the main content area.", "wp-prosper")),

	array(    "name" => __("Sidebar Font Size", "wp-prosper"),
		"id" => $shortname."_right_sidebar_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => __("Sidebar Link Color", "wp-prosper"),
		"id" => $shortname."_right_sidebar_link_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Sidebar Hover Link Color", "wp-prosper"),
		"id" => $shortname."_right_sidebar_hover_link_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

// Footer Style Settings

	array(    "name" => __("Footer Style Settings", "wp-prosper"),
		"id" => $shortname."_footer_style_settings",
		"type" => "header"),

	array(    "name" => __("Footer Font Size", "wp-prosper"),
		"id" => $shortname."_footer_font_size",
		"type" => "select",
		"std" => "8pt",
		"options" => array("8pt", "9pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => __("Footer Font Color", "wp-prosper"),
		"id" => $shortname."_footer_font_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Footer Link Color", "wp-prosper"),
		"id" => $shortname."_footer_link_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),

	array(    "name" => __("Footer Hover Link Color", "wp-prosper"),
		"id" => $shortname."_footer_hover_link_color",
		"type" => "text-color",
		"std" => "",
		"help" => __("Leave blank to use default color. Click on field to show color picker.", "wp-prosper")),
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Theme Settings Page", __("WP-Prosper Theme Settings", "wp-prosper"), 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jscolor/jscolor.js"></script>

<div class="wrap" id="backtotop">

<h2><?php echo $themename; ?> <?php _e("Theme Settings", "wp-prosper"); ?></h2>

<p style="width:60%;"><?php _e("Thanks so much for your purchase. A great deal of time, energy and brain power went into making this theme as simple and flexible as possible. Below, you'll find oodles of optional settings for WP-Prosper. If you're in a hurry, WP-Prosper will function just fine without changing any of the default values below (although you may want to go ahead and fill in your Subscription Form and Contact Settings). On the other hand, if you're in the mood to tinker, go ahead and change some of the settings just to see what sort of site you can create for yourself.", "wp-prosper"); ?></p>

<p style="width:70%;"><?php _e("Wherever you see 'Save Changes' it will save changes for ALL theme settings.", "wp-prosper"); ?></p>

<ol>
	<li><strong><a target="blank" href="http://wp-prosper.solostreamsites.com/category/tutorials/"><?php _e("Theme Set-Up and Install Tutorials", "wp-prosper"); ?></a></strong></li>
	<li><strong><a target="blank" href="http://www.solostream.com/forum/"><?php _e("Solostream Support Forum", "wp-prosper"); ?></a></strong></li>
	<li><strong><a href="http://wp-prosper.solostreamsites.com/wp-prosper-images.zip"><?php _e("Download Photoshop PSDs", "wp-prosper"); ?></a></strong></li>
	<li><a href="#<?php echo $shortname; ?>_basic_settings"><?php _e("Basic Site Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_subscription_form_settings"><?php _e("Subscription Form and Contact Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_site_title_settings"><?php _e("Site Title Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_home_archive_layout"><?php _e("Home Page and Archive Page Layout", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_home_by_cat"><?php _e("Home Page Posts Arranged by Category", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_ad_settings"><?php _e("Advertisement Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_basic_style_settings"><?php _e("Basic Style Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_topnav_style_settings"><?php _e("Top Navigation Style Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_catnav_style_settings"><?php _e("Category Navigation Style Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_content_style_settings"><?php _e("Main Content Style Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_right_sidebar_style_settings"><?php _e("Sidebar Style Settings", "wp-prosper"); ?></a></li>
	<li><a href="#<?php echo $shortname; ?>_footer_style_settings"><?php _e("Footer Style Settings", "wp-prosper"); ?></a></li>
</ol>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) {

if ($value['type'] == "text") { ?>

<tr valign="top">
    <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
    <td>
        <strong><?php echo $value['pre']; ?></strong><input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] ) ); } else { echo stripslashes($value['std']); } ?>" />
	<div style="font-size:8pt;padding-bottom:15px;width:70%;"><?php echo $value['help']; ?></div>
    </td>
</tr>

<?php } elseif ($value['type'] == "text-color") { ?>

<tr valign="top">
    <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
    <td>
        <input style="background:url(<?php bloginfo('stylesheet_directory'); ?>/images/colorpicker.gif) 5px 5px no-repeat;padding:5px 5px 5px 26px;" class="color {hash:true,caps:false,required:false}" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
	<div style="font-size:8pt;padding-bottom:15px;width:70%;"><?php echo $value['help']; ?></div>
    </td>
</tr>

<?php } elseif ($value['type'] == "header") { ?>
<tr colspan=2><td>
<p class="submit">
	<input class="button-primary" name="save" type="submit" value="<?php _e('Save Changes', "wp-prosper"); ?>" />
	<input type="hidden" name="action" value="save" />
</p>
</td></tr>
<tr colspan=2><td><a href="#backtotop"><?php _e("Go to Top", "wp-prosper"); ?></a></td></tr>
<tr>
	<td colspan=2><h2 id="<?php echo $value['id']; ?>" style="padding-bottom:5px;border-bottom:1px dotted #ccc;margin-bottom:10px;"><?php echo $value['name']; ?></h2></td>
</tr>

<?php } elseif ($value['type'] == "textarea") { ?>

<tr valign="top">
    <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
    <td>
		<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" rows="3" cols="90"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] ) ); } else { echo stripslashes($value['std'] ); } ?></textarea>
		<div style="font-size:8pt;padding-bottom:15px;width:70%;"><?php echo $value['help']; ?></div>
    </td>
</tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="top">
        <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
        <td>
            <select style="font-size:12px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?> style="padding:3px 10px;"><?php echo $option; ?></option>
                <?php } ?>
            </select>
		<div style="font-size:8pt;padding-bottom:25px;width:70%;"><?php echo $value['help']; ?></div>
        </td>
    </tr>

<?php
}
}
?>

</table>

<p class="submit">
	<input class="button-primary" name="save" type="submit" value="<?php _e('Save Changes', "wp-prosper"); ?>" />
	<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
	<p class="submit" style="float:right;">
		<input name="reset" type="submit" value="<?php _e('Delete all Data and Reset to Default Settings', "wp-prosper"); ?>" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>

<?php
}

function mytheme_wp_head() { ?>
<link href="<?php bloginfo('template_directory'); ?>/style.php" rel="stylesheet" type="text/css" />
<?php }

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin');

// Write Post and Write Page Options
$key = $themename;
$meta_boxes = array(

	"remove_thumb" => array(
		"name" => "remove_thumb",
		"type" => "checkbox",
		"title" => __("Suppress Automatic Thumbnail Placement on This Post", "wp-prosper"),
		"description" => __("Check this box to suppress the automatic thumbnail that appears on the home page and archive pages.", "wp-prosper")),

	"video_embed" => array(
		"name" => "video_embed",
		"type" => "textarea",
		"title" => __("Video Embed Code", "wp-prosper"),
		"description" => __("If you'd like to embed a video, paste the embed code here.", "wp-prosper")),
);

function create_meta_box() {
global $key;

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-boxes', ucfirst( $key ) . ' Custom Post Options', 'display_meta_box', 'post', 'normal', 'high' );
}
}

function display_meta_box() {
global $post, $meta_boxes, $key;
?>

<div class="form-wrap">

<?php
wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

foreach($meta_boxes as $meta_box) {
$data = get_post_meta($post->ID, $key, true);
?>

	<?php /* Display for a checkbox type field */ if ($meta_box['type'] == "checkbox") { ?>
		<div class="form-field form-required">
			<div style="font-weight:bold;font-size:12px;">
				<input style="text-align:left;width:30px;float:left;margin:0;padding:0;display:inline;" type="<?php echo $meta_box[ 'type' ]; ?>" name="<?php echo $meta_box[ 'name' ]; ?>" <?php if ($data[ $meta_box[ 'name' ]]) echo "checked=\"1\""; ?>/>
				<?php echo $meta_box[ 'title' ]; ?>
			</div>
			<p><?php echo $meta_box[ 'description' ]; ?></p>
		</div>

	<?php /* Display for a textarea field */  } elseif ($meta_box['type'] == "textarea") { ?>
		<div class="form-field form-required">
			<label style="font-weight:bold;font-size:12px;" for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
			<textarea rows="3" cols="90" name="<?php echo $meta_box[ 'name' ]; ?>"><?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?></textarea>
			<p><?php echo $meta_box[ 'description' ]; ?></p>
		</div>

	<?php /* Display for a text field */  } else { ?>
		<div class="form-field form-required">
			<label style="font-weight:bold;font-size:12px;" for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
			<input type="<?php echo $meta_box[ 'type' ]; ?>" rows="3" cols="90" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?>" />
			<p><?php echo $meta_box[ 'description' ]; ?></p>
		</div>

	<?php } ?>

<?php } ?>

</div>

<?php }

function save_meta_box( $post_id ) {
global $post, $meta_boxes, $key;

foreach( $meta_boxes as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}

if ( !wp_verify_nonce( $_POST[ $key . '_wpnonce' ], plugin_basename(__FILE__) ) )
return $post_id;

if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;

update_post_meta( $post_id, $key, $data );
}

add_action( 'admin_menu', 'create_meta_box' );
add_action( 'save_post', 'save_meta_box' );
?>
