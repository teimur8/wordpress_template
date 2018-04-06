<?php
$mts_options = get_option('clock');
/*------------[ Meta ]-------------*/
if ( ! function_exists( 'mts_meta' ) ) {
	function mts_meta(){
	global $mts_options
?>
<?php if ($mts_options['mts_favicon'] != ''){ ?>
	<link rel="icon" href="<?php echo $mts_options['mts_favicon']; ?>" type="image/x-icon" />
<?php } ?>
<!--iOS/android/handheld specific -->
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php if($mts_options['mts_prefetching'] == '1') { ?>
<?php if (is_front_page()) { ?>
	<?php $my_query = new WP_Query('posts_per_page=1'); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<link rel="prefetch" href="<?php the_permalink(); ?>">
	<link rel="prerender" href="<?php the_permalink(); ?>">
	<?php endwhile; wp_reset_query(); ?>
<?php } elseif (is_singular()) { ?>
	<link rel="prefetch" href="<?php echo home_url(); ?>">
	<link rel="prerender" href="<?php echo home_url(); ?>">
<?php } ?>
<?php } ?>
<?php }
}

/*------------[ Head ]-------------*/
if ( ! function_exists( 'mts_head' ) ){
	function mts_head() {
	global $mts_options
?>
<?php echo $mts_options['mts_header_code']; ?>
<?php }
}
add_action('wp_head', 'mts_head');

/*------------[ Copyrights ]-------------*/
if ( ! function_exists( 'mts_copyrights_credit' ) ) {
	function mts_copyrights_credit() { 
	global $mts_options
?>
<!--start copyrights-->
<div class="row" id="copyright-note">
<span><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> Copyright &copy; <?php echo date("Y") ?>.</span>
<div class="top"><?php echo $mts_options['mts_copyrights']; ?>&nbsp;<a href="#top" class="toplink"></a></div>
</div>
<!--end copyrights-->
<?php }
}

/*------------[ Social Media ]-------------*/
if ( ! function_exists( 'mts_social_media' ) ) {
	function mts_social_media() { 
	global $mts_options
?>
<div class="social-media">
	<ul>
		<?php if($mts_options['mts_twitter_username'] != '') { ?>
			<li class="twitter"><a href="http://twitter.com/<?php echo $mts_options['mts_twitter_username']; ?>" target="_blank" class="social-ic social-icon-c-1"><i class="icon-twitter"></i></a></li>
		<?php } ?>
		<?php if($mts_options['mts_facebook_username'] != '') { ?>
			<li class="facebook"><a href="<?php echo $mts_options['mts_facebook_username']; ?>" target="_blank" class="social-ic social-icon-c-2"><i class="icon-facebook"></i></a></li>
		<?php } ?>
		<?php if($mts_options['mts_google_username'] != '') { ?>
			<li class="google"><a href="<?php echo $mts_options['mts_google_username']; ?>" target="_blank" class="social-ic social-icon-c-4"><i class="icon-google-plus"></i></a></li>
		<?php } ?>
		<?php if($mts_options['mts_youtube_user'] != '') { ?>
			<li class="youtube"><a href="<?php echo $mts_options['mts_youtube_user']; ?>" target="_blank" class="social-ic social-icon-c-3"><i class="icon-youtube"></i></a></li>
		<?php } ?>
		<?php if($mts_options['mts_printerest_username'] != '') { ?>
			<li class="pinterest"><a href="<?php echo $mts_options['mts_printerest_username']; ?>" target="_blank" class="social-ic social-icon-c-5"><i class="icon-pinterest"></i></a></li>
		<?php } ?>
		<?php if($mts_options['mts_feedburner'] != '') { ?>
			<li class="feedburner"><a href="<?php echo $mts_options['mts_feedburner']; ?>" target="_blank" class="social-ic social-icon-c-6"><i class="icon-rss"></i></a></li>
		<?php } ?>    
	</ul>
</div>
<?php }
}

/*------------[ footer ]-------------*/
if ( ! function_exists( 'mts_footer' ) ) {
	function mts_footer() { 
	global $mts_options
?>
<?php if ($mts_options['mts_analytics_code'] != '') { ?>
<!--start footer code-->
<?php echo $mts_options['mts_analytics_code']; ?>
<!--end footer code-->
<?php } ?>
<?php }
}
?>