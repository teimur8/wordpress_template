<?php
/*-----------------------------------------------------------------------------------*/
/*	Do not remove these lines, sky will fall on your head.
/*-----------------------------------------------------------------------------------*/
require_once( dirname( __FILE__ ) . '/theme-options.php' );
if ( ! isset( $content_width ) ) $content_width = 1060;

/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'mythemeshop', get_template_directory().'/lang' );
if ( function_exists('add_theme_support') ) add_theme_support('automatic-feed-links');

/*-----------------------------------------------------------------------------------*/
/*	Post Thumbnail Support
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 223, 223, true );
	add_image_size( 'featured', 223, 137, true ); //featured
	add_image_size( 'bigfeatured', 477, 232, true ); //bigfeatured	
	add_image_size( 'smallfeatured', 228, 150, true ); //smallfeatured
	add_image_size( 'related', 50, 42, true ); //related
	add_image_size( 'widgetthumb', 50, 42, true ); //widget
	add_image_size( 'slider', 730, 350, true ); //slider
	add_image_size( 'slider_thumb', 130, 90, true ); //sliderthumb
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Menu Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'primary-menu' => 'Primary Menu'
		)
	);
}

/*-----------------------------------------------------------------------------------*/
/*	Javascsript
/*-----------------------------------------------------------------------------------*/
function mts_add_scripts() {
	$mts_options = get_option('clock');

	wp_enqueue_script('jquery');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Site wide js
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.min.js');
	wp_enqueue_script('customscript', get_template_directory_uri() . '/js/customscript.js');

	//Slider
	if($mts_options['mts_featured_slider'] == '1') {
		wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
	}	
	//Lightbox
	if($mts_options['mts_lightbox'] == '1') {
		wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
	}
	
	if($mts_options['mts_sticky_nav'] == '1') {
		wp_enqueue_script('StickyNav', get_template_directory_uri() . '/js/sticky.js');
	}
	
	global $is_IE;
    if ($is_IE) {
        wp_register_script ('html5shim', "http://html5shim.googlecode.com/svn/trunk/html5.js");
        wp_enqueue_script ('html5shim');
	}
}
add_action('wp_enqueue_scripts','mts_add_scripts');

/*-----------------------------------------------------------------------------------*/
/* Enqueue CSS
/*-----------------------------------------------------------------------------------*/
function mts_enqueue_css() {
	$mts_options = get_option('clock');

	//slider
	if($mts_options['mts_featured_slider'] == '1') {
		wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', 'style');
	}
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		//WooCommerce
		wp_register_style('woocommerce', get_template_directory_uri() . '/css/woocommerce2.css', 'style');
		wp_enqueue_style('woocommerce');
	}

	//lightbox
	if($mts_options['mts_lightbox'] == '1') {
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', 'style');
	}
	
	//Font Awesome
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', 'style');
	global $is_IE;
    if ($is_IE) {
       wp_enqueue_style('ie7-fontawesome', get_template_directory_uri() . '/css/font-awesome-ie7.min.css', 'style');
        wp_enqueue_script ('ie7-fontawesome');
	}
	
	wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css', 'style');
	
	//Responsive
	if($mts_options['mts_responsive'] == '1') {
        wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css', 'style');
	}
	
	if ($mts_options['mts_bg_pattern_upload'] != '') {
		$mts_bg = $mts_options['mts_bg_pattern_upload'];
	} else {
		if($mts_options['mts_bg_pattern'] != '') {
			$mts_bg = get_template_directory_uri().'/images/'.$mts_options['mts_bg_pattern'].'.png';
		} 
	}
	$mts_sclayout = '';
	$mts_hsclayout = '';
	$mts_ssclayout = '';
	$mts_shareit_left = '';
	$mts_shareit_related_left = '';
	$mts_shareit_related_right = '';
	$mts_shareit_right = '';
	$mts_author = '';
	$mts_header_section = '';
	$mts_footer_padding = '';
	$mts_h_meta = '';
	$mts_s_layout = '';
	if($mts_options['mts_related_posts'] == '1') {
		if($mts_options['mts_single_layout'] == 'scslayout') {
			$mts_s_layout = '.single_post { float: left; width: 75%; }';
		} elseif ($mts_options['mts_single_layout'] == 'ssclayout') {
			$mts_s_layout = '.single_post { float: right; width: 75%; }
			.related-posts-right { float: left; }';
			if($mts_options['mts_floating_social'] == '1' && $mts_options['mts_layout'] == 'cslayout') {
				$mts_shareit_related_left = '.shareit { margin: 0 0 0 -300px; }';
			}
			if($mts_options['mts_floating_social'] == '1' && $mts_options['mts_layout'] == 'sclayout') {
				$mts_shareit_related_right = '.shareit { margin: 0 580px 0; }';
			}
		}
	}
	if($mts_options['mts_home_headline_meta'] == '0') {
		$mts_h_meta = '.latestPost { min-height: 300px; }';
	}
	if ($mts_options['mts_layout'] == 'sclayout') {
		$mts_sclayout = '.article { float: right;}
		.sidebar.c-4-12 { float: left; padding-right: 0; }';
		if($mts_options['mts_floating_social'] == '1') {
			$mts_shareit_right = '.shareit { margin: 0 760px 0; border-left: 0; }';
		}
	}
	if ($mts_options['mts_home_layout'] == 'hsclayout') {
		$mts_hsclayout = '.cat-posts-trending {float: left;}
		.cat-posts {float: right;}
		.small-cat-posts {float: right;}';
	}
	if ($mts_options['mts_header_section2'] == '0') {
		$mts_header_section = '.logo-wrap { display: none; }
		#navigation { border-top: 0; }
		#header { min-height: 47px; }';
	}
	if($mts_options['mts_floating_social'] == '1') {
		$mts_shareit_left = '.shareit { top: 282px; left: auto; z-index: 0; margin: 0 0 0 -130px; width: 90px; position: fixed; overflow: hidden; padding: 5px; border:none; border-right: 0;}
		.share-item {margin: 2px;}';
	}
	if($mts_options['mts_author_comment'] == '1') {
		$mts_author = '.bypostauthor {padding: 3%!important; background: #FAFAFA; width: 94%!important;}
		.bypostauthor:after { content: "'.__('Author','mythemeshop').'"; position: absolute; right: -1px; top: -1px; padding: 1px 10px; background: #818181; color: #FFF; }';
	}
	if($mts_options['mts_bg_color'] != '#ffffff' && $mts_options['mts_bg_color'] != '#FFFFFF') {
		$mts_footer_padding = 'footer .container { padding: 0 2%; }';
	}
	$custom_css = "
		body {background-color:{$mts_options['mts_bg_color']}; }
		body {background-image: url({$mts_bg});}
		.latestPost:hover,.latestPost:hover > header, #navigation ul .sfHover a, #navigation ul .sfHover ul li { border-color:{$mts_options['mts_color_scheme']};}
		.postauthor h5, .copyrights a, .latestPost:hover > header a, .single_post a, .textwidget a, #logo a, .pnavigation2 a, .sidebar.c-4-12 a:hover, .copyrights a:hover, footer .widget li a:hover, .sidebar.c-4-12 a:hover, .related-posts a:hover, .reply a, .title a:hover, .post-info a,.comm, #tabber .inside li a:hover { color:{$mts_options['mts_color_scheme']}; }	
		.trending, #commentform input#submit, .mts-subscribe input[type='submit'],#move-to-top:hover, #searchform .icon-search, #navigation ul .current-menu-item a, .flex-direction-nav li:hover .flex-prev, .flex-direction-nav li .flex-next:hover, #navigation ul li:hover, .pagination a, .pagination2, .slidertitle, #tabber ul.tabs li a.selected, .tagcloud a:hover, #navigation ul .sfHover a, #navigation ul .sfHover ul li, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce-page nav.woocommerce-pagination ul li a, .woocommerce #content nav.woocommerce-pagination ul li a, .woocommerce-page #content nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce-page nav.woocommerce-pagination ul li span, .woocommerce #content nav.woocommerce-pagination ul li span, .woocommerce-page #content nav.woocommerce-pagination ul li span { background-color:{$mts_options['mts_color_scheme']}; color: #fff!important; }
		.flex-control-thumbs .flex-active{ border-top:3px solid {$mts_options['mts_color_scheme']};}
		{$mts_sclayout}
		{$mts_hsclayout}
		{$mts_ssclayout}
		{$mts_shareit_left}
		{$mts_shareit_right}
		{$mts_shareit_related_left}
		{$mts_shareit_related_right}
		{$mts_footer_padding}
		{$mts_author}
		{$mts_header_section}
		{$mts_h_meta}
		{$mts_s_layout}
		{$mts_options['mts_custom_css']}
			";
	wp_add_inline_style( 'stylesheet', $custom_css );
}
add_action('wp_enqueue_scripts', 'mts_enqueue_css', 99);

/*-----------------------------------------------------------------------------------*/
/*	Enable Widgetized sidebar and Footer
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name'=>'Sidebar',
		'description'   => __( 'Appears on homepage, posts and pages', 'mythemeshop' ),
		'before_widget' => '<li id="%1$s" class="widget widget-sidebar %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-wrap"><h3>',
		'after_title' => '</h3></div>',
	));
	register_sidebar(array(
		'name' => 'Left Footer',
		'description'   => __( 'Appears in left side of footer.', 'mythemeshop' ),
		'id' => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-wrap"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	register_sidebar(array(
		'name' => 'Center Footer',
		'description'   => __( 'Appears in center of footer.', 'mythemeshop' ),
		'id' => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-wrap"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	register_sidebar(array(
		'name' => 'Right Footer',
		'description'   => __( 'Appears in right side of footer.', 'mythemeshop' ),
		'id' => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-wrap"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

/*-----------------------------------------------------------------------------------*/
/*  Load Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/
// Add the 125x125 Ad Block Custom Widget
include("functions/widget-ad125.php");

// Add the 300x250 Ad Block Custom Widget
include("functions/widget-ad300.php");

// Add the Tabbed Custom Widget
include("functions/widget-tabs.php");

// Add the Latest Tweets Custom Widget
include("functions/widget-tweets.php");

// Add Recent Posts Widget
include("functions/widget-recentposts.php");

// Add Related Posts Widget
include("functions/widget-relatedposts.php");

// Add Popular Posts Widget
include("functions/widget-popular.php");

// Add Facebook Like box Widget
include("functions/widget-fblikebox.php");

// Add Subscribe Widget
include("functions/widget-subscribe.php");

// Add Social Profile Widget
include("functions/widget-social.php");

// Add Category Posts Widget
include("functions/widget-catposts.php");

// Add Welcome message
include("functions/welcome-message.php");

// Theme Functions
include("functions/theme-actions.php");

// TGM Plugin Activation
include( "functions/plugin-activation.php" );

/*-----------------------------------------------------------------------------------*/
/*	Thumbnail Quality
/*-----------------------------------------------------------------------------------*/
if(isset($mts_options['mts_thumb_quality_on']) == '1') {
	function mts_thumbnail_quality( $quality ) {
		$mts_options = get_option('clock');
	    return $mts_options['mts_thumb_quality'];
	}
	add_filter( 'jpeg_quality', 'mts_thumbnail_quality' );
	add_filter( 'wp_editor_set_quality', 'mts_thumbnail_quality' );
}

/*-----------------------------------------------------------------------------------*/
/*	Filters customize wp_title
/*-----------------------------------------------------------------------------------*/
function mts_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mythemeshop' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'mts_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/*	Filters that allow shortcodes in Text Widgets
/*-----------------------------------------------------------------------------------*/
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
add_filter('the_content_rss', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	Custom Comments template
/*-----------------------------------------------------------------------------------*/
function mts_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" style="position:relative;">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment->comment_author_email, 50 ); ?>
				<?php printf(__('<span class="fn">%s</span>', 'mythemeshop'), get_comment_author_link()) ?> 
				<?php $mts_options = get_option('clock'); if($mts_options['mts_comment_date'] == '1') { ?>
					<span class="ago"><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
				<?php } ?>
				<span class="comment-meta">
					<?php edit_comment_link(__('(Edit)', 'mythemeshop'),'  ','') ?>
				</span>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.', 'mythemeshop') ?></em>
				<br />
			<?php endif; ?>
			<div class="commentmetadata">
			<?php comment_text() ?>
            <div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
			</div>
		</div>
	</li>
<?php }

/*-----------------------------------------------------------------------------------*/
/*	excerpt
/*-----------------------------------------------------------------------------------*/
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/*-----------------------------------------------------------------------------------*/
/* nofollow to next/previous links
/*-----------------------------------------------------------------------------------*/
function pagination_add_nofollow($content) {
    return 'rel="nofollow"';
}
add_filter('next_posts_link_attributes', 'pagination_add_nofollow' );
add_filter('previous_posts_link_attributes', 'pagination_add_nofollow' );

/*-----------------------------------------------------------------------------------*/
/* Nofollow to category links
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_category', 'add_nofollow_cat' ); 
function add_nofollow_cat( $text ) {
$text = str_replace('rel="category tag"', 'rel="nofollow"', $text); return $text;
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow post author link
/*-----------------------------------------------------------------------------------*/
add_filter('the_author_posts_link', 'mts_nofollow_the_author_posts_link');
function mts_nofollow_the_author_posts_link ($link) {
return str_replace('<a href=', '<a rel="nofollow" href=',$link); 
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow to reply links
/*-----------------------------------------------------------------------------------*/
function add_nofollow_to_reply_link( $link ) {
return str_replace( '")\'>', '")\' rel=\'nofollow\'>', $link );
}
add_filter( 'comment_reply_link', 'add_nofollow_to_reply_link' );

/*-----------------------------------------------------------------------------------*/
/* removes detailed login error information for security
/*-----------------------------------------------------------------------------------*/
add_filter('login_errors',create_function('$a', "return null;"));
	
/*-----------------------------------------------------------------------------------*/
/* removes the WordPress version from your header for security
/*-----------------------------------------------------------------------------------*/
function wb_remove_version() {
	return '<!--Theme by MyThemeShop.com-->';
}
add_filter('the_generator', 'wb_remove_version');
	
/*-----------------------------------------------------------------------------------*/
/* Removes Trackbacks from the comment count
/*-----------------------------------------------------------------------------------*/
add_filter('get_comments_number', 'mts_comment_count', 0);
function mts_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}

/*-----------------------------------------------------------------------------------*/
/* adds a class to the post if there is a thumbnail
/*-----------------------------------------------------------------------------------*/
function has_thumb_class($classes) {
	global $post;
	if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }
		return $classes;
}
add_filter('post_class', 'has_thumb_class');

/*-----------------------------------------------------------------------------------*/	
/* Breadcrumb
/*-----------------------------------------------------------------------------------*/
function mts_the_breadcrumb() {
	echo '<a href="';
	echo home_url();
	echo '" rel="nofollow"><i class="icon-home"></i>&nbsp;'.__('Home','mythemeshop');
	echo "</a>";
	if (is_category() || is_single()) {
		echo "&nbsp;/&nbsp;";
		the_category(' &bull; ');
			if (is_single()) {
				echo "&nbsp;/&nbsp;";
				the_title();
			}
	} elseif (is_page()) {
		echo "&nbsp;/&nbsp;";
		echo the_title();
	} elseif (is_search()) {
		echo "&nbsp;/&nbsp;".__('Search Results for','mythemeshop')."... ";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}

/*-----------------------------------------------------------------------------------*/	
/* Pagination
/*-----------------------------------------------------------------------------------*/
function pagination($pages = '', $range = 3) { 
	$showitems = ($range * 3)+1;
	global $paged; if(empty($paged)) $paged = 1;
	if($pages == '') {
		global $wp_query; $pages = $wp_query->max_num_pages; 
		if(!$pages){ $pages = 1; } 
	}
	if(1 != $pages) { 
		echo "<div class='pagination'><ul>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link(1)."'>&laquo; ".__('First','mythemeshop')."</a></li>";
		if($paged > 1 && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link($paged - 1)."' class='inactive'>&lsaquo; ".__('Previous','mythemeshop')."</a></li>";
		for ($i=1; $i <= $pages; $i++){ 
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) { 
				echo ($paged == $i)? "<li class='current'><span class='currenttext'>".$i."</span></li>":"<li><a rel='nofollow' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
			} 
		} 
		if ($paged < $pages && $showitems < $pages) 
			echo "<li><a rel='nofollow' href='".get_pagenum_link($paged + 1)."' class='inactive'>".__('Next','mythemeshop')." &rsaquo;</a></li>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo "<a rel='nofollow' class='inactive' href='".get_pagenum_link($pages)."'>".__('Last','mythemeshop')." &raquo;</a>";
			echo "</ul></div>"; 
	}
}

/*-----------------------------------------------------------------------------------*/
/* Redirect feed to feedburner
/*-----------------------------------------------------------------------------------*/
$mts_options = get_option('clock');
if ( $mts_options['mts_feedburner'] != '') {
function mts_rss_feed_redirect() {
    $mts_options = get_option('clock');
    global $feed;
    $new_feed = $mts_options['mts_feedburner'];
    if (!is_feed()) {
            return;
    }
    if (preg_match('/feedburner/i', $_SERVER['HTTP_USER_AGENT'])){
            return;
    }
    if ($feed != 'comments-rss2') {
            if (function_exists('status_header')) status_header( 302 );
            header("Location:" . $new_feed);
            header("HTTP/1.1 302 Temporary Redirect");
            exit();
    }
}
add_action('template_redirect', 'mts_rss_feed_redirect');
}

/*-----------------------------------------------------------------------------------*/
/* Single Post Pagination
/*-----------------------------------------------------------------------------------*/
function wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;
    if (!$args['next_or_number'] == 'next_and_number')
        return $args; 
    $args['next_or_number'] = 'number'; 
    if (!$more)
        return $args; 
    if($page-1) 
        $args['before'] .= _wp_link_page($page-1)
        . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
    ;
    if ($page<$numpages) 
    
        $args['after'] = _wp_link_page($page+1)
        . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
        . $args['after']
    ;
    return $args;
}
add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');

/*-----------------------------------------------------------------------------------*/
/* WooCommerce
/*-----------------------------------------------------------------------------------*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
add_theme_support('woocommerce');

// Register Shop and Single Product Sidebar
register_sidebar(array(
	'name' => 'Shop Page Sidebar',
	'description'   => __( 'Appears on Shop main page and product archive pages.', 'mythemeshop' ),
	'id' => 'shop-sidebar',
	'before_widget' => '<li id="%1$s" class="widget widget-sidebar %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<div class="widget-wrap"><h3>',
	'after_title' => '</h3></div>',
));
register_sidebar(array(
	'name' => 'Single Product Sidebar',
	'description'   => __( 'Appears on single product pages.', 'mythemeshop' ),
	'id' => 'product-sidebar',
	'before_widget' => '<li id="%1$s" class="widget widget-sidebar %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<div class="widget-wrap"><h3>',
	'after_title' => '</h3></div>',
));

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
woocommerce_related_products(3,1); // Display 3 products in rows of 1
}

/*** Hook in on activation */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'mythemeshop_woocommerce_image_dimensions', 1 );
 
/*** Define image sizes */
function mythemeshop_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '228',	// px
		'height'	=> '312',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '440',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
	$thumbnail = array(
		'width' 	=> '75',	// px
		'height'	=> '100',	// px
		'crop'		=> 0 		// false
	); 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

add_filter ( 'woocommerce_product_thumbnails_columns', 'mts_thumb_cols' );
 function mts_thumb_cols() {
     return 4; // .last class applied to every 4th thumbnail
 }

// Display 24 products per page. Goes in functions.php
$mts_home_producst = $mts_options['mts_shop_products'];
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$mts_home_producst.';' ), 20 );

}
/*------------[ Cart ]-------------*/
if ( ! function_exists( 'mts_cart' ) ) {
	function mts_cart() { 
	global $mts_options;
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
?>
<div class="mts-cart">
	<?php global $woocommerce; ?>
	<span>
		<i class="icon-user"></i> 
		<?php if ( is_user_logged_in() ) { ?>
			<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','mythemeshop'); ?>"><?php _e('My Account','mythemeshop'); ?></a>
		<?php } 
		else { ?>
			<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','mythemeshop'); ?>"><?php _e('Login ','mythemeshop'); ?></a>
		<?php } ?>
	</span>
	<span>
		<i class="icon-shopping-cart"></i> <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'mythemeshop'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'mythemeshop'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	</span>
</div>
<?php } }
}

?>