<?php
$options = get_option('clock');
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header('shop'); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<?php do_action('woocommerce_before_main_content'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>
				<?php endwhile; // end of the loop. ?>
			<?php do_action('woocommerce_after_main_content'); ?>
		</article>
		<?php /*do_action('woocommerce_sidebar');*/ ?>
		<?php get_sidebar('product'); ?>
<?php get_footer(); ?>