<?php get_header(); ?>
<?php $mts_options = get_option('clock'); ?>
<div id="page" class="single">
	<div class="content">
		<article class="article">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<div class="single_post">
							<?php if ($mts_options['mts_breadcrumb'] == '1') { ?>
								<div class="breadcrumb" itemprop="breadcrumb"><?php mts_the_breadcrumb(); ?></div>
							<?php } ?>
							<header>
								<h1 class="title single-title"><?php the_title(); ?></h1>
								<?php if($mts_options['mts_headline_meta'] == '1') { ?>
									<div class="post-info">
										<span class="theauthor"> <?php _e('by ','mythemeshop'); the_author_posts_link(); ?></span> /
										<span class="thecategory"><?php the_category(', ') ?></span> /
										<span class="thetime"><?php the_time('d M Y'); ?></span>
									</div>
								<?php } ?>
							</header><!--.headline_area-->
							<div class="post-single-content box mark-links">
								<?php if($mts_options['mts_social_buttons'] == '1' && $mts_options['mts_social_buttons_position'] == '0') { ?>
									<!-- Start Share Buttons -->
									<div class="shareit">
										<?php if($mts_options['mts_twitter'] == '1') { ?>
											<!-- Twitter -->
											<span class="share-item twitterbtn">
												<a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo $mts_options['mts_twitter_username']; ?>">Tweet</a>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_gplus'] == '1') { ?>
											<!-- GPlus -->
											<span class="share-item gplusbtn">
												<g:plusone size="medium"></g:plusone>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_facebook'] == '1') { ?>
											<!-- Facebook -->
											<span class="share-item facebookbtn">
												<div id="fb-root"></div>
												<div class="fb-like" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_linkedin'] == '1') { ?>
											<!--Linkedin -->
											<span class="share-item linkedinbtn">
												<script type="IN/Share" data-url="<?php get_permalink(); ?>"></script>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_stumble'] == '1') { ?>
											<!-- Stumble -->
											<span class="share-item stumblebtn">
												<su:badge layout="1"></su:badge>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_pinterest'] == '1') { ?>
											<!-- Pinterest -->
											<span class="share-item pinbtn">
												<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); echo $thumb['0']; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
											</span>
										<?php } ?>
									</div>
									<!-- end Share Buttons -->
								<?php } ?>
								<?php if ($mts_options['mts_posttop_adcode'] != '') { ?>
									<?php $toptime = $mts_options['mts_posttop_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$toptime day")), get_the_time("Y-m-d") ) >= 0) { ?>
										<div class="topad">
											<?php echo $mts_options['mts_posttop_adcode']; ?>
										</div>
									<?php } ?>
								<?php } ?>
								<?php the_content(); ?>
								<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
								<?php if ($mts_options['mts_postend_adcode'] != '') { ?>
									<?php $endtime = $mts_options['mts_postend_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$endtime day")), get_the_time("Y-m-d") ) >= 0) { ?>
										<div class="bottomad">
											<?php echo $mts_options['mts_postend_adcode'];?>
										</div>
									<?php } ?>
								<?php } ?> 
								<?php if($mts_options['mts_social_buttons'] == '1' && $mts_options['mts_social_buttons_position'] == '1') { ?>
									<!-- Start Share Buttons -->
									<div class="shareit">
										<?php if($mts_options['mts_twitter'] == '1') { ?>
											<!-- Twitter -->
											<span class="share-item twitterbtn">
												<a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo $mts_options['mts_twitter_username']; ?>">Tweet</a>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_gplus'] == '1') { ?>
											<!-- GPlus -->
											<span class="share-item gplusbtn">
												<g:plusone size="medium"></g:plusone>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_facebook'] == '1') { ?>
											<!-- Facebook -->
											<span class="share-item facebookbtn">
												<div id="fb-root"></div>
												<div class="fb-like" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_linkedin'] == '1') { ?>
											<!--Linkedin -->
											<span class="share-item linkedinbtn">
												<script type="IN/Share" data-url="<?php get_permalink(); ?>"></script>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_stumble'] == '1') { ?>
											<!-- Stumble -->
											<span class="share-item stumblebtn">
												<su:badge layout="1"></su:badge>
											</span>
										<?php } ?>
										<?php if($mts_options['mts_pinterest'] == '1') { ?>
											<!-- Pinterest -->
											<span class="share-item pinbtn">
												<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); echo $thumb['0']; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
											</span>
										<?php } ?>
									</div>
									<!-- end Share Buttons -->
								<?php } ?>
								<?php if($mts_options['mts_tags'] == '1') { ?>
									<div class="tags"><?php the_tags('<span class="tagtext">'.__('Tags','mythemeshop').':</span>',', ') ?></div>
								<?php } ?>
							</div>
						</div><!--.post-content box mark-links-->
						<?php if($mts_options['mts_related_posts'] == '1') { ?>	
							<?php if($mts_options['mts_single_layout'] == 'scslayout' || $mts_options['mts_single_layout'] == 'ssclayout') { ?>	
								<!-- Start Related Posts -->
								<?php $categories = get_the_category($post->ID); if ($categories) { $category_ids = array(); foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id; $args=array( 'category__in' => $category_ids, 'post__not_in' => array($post->ID), 'showposts'=>4, 'ignore_sticky_posts' => 1, 'orderby' => 'rand' );
								$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
									echo '<div class="related-posts related-posts-right"><div class="postauthor-top"><h3>'.__('Related Posts','mythemeshop').'</h3></div><ul>';
									$counter = '0'; while( $my_query->have_posts() ) { ++$counter; if($counter == 4) { $postclass = 'last'; $counter = 0; } else { $postclass = ''; } $my_query->the_post(); $li = 1; ?>
									<li class="<?php echo $postclass; ?> relatepostli<?php echo $li+$counter; ?>">
										<a rel="nofollow" class="relatedthumb" href="<?php the_permalink()?>" title="<?php the_title(); ?>">
											<span class="rthumb">
												<?php if(has_post_thumbnail()): ?>
													<?php the_post_thumbnail('slider_thumb', 'title='); ?>
												<?php else: ?>
													<img src="<?php echo get_template_directory_uri(); ?>/images/relthumb.png" alt="<?php the_title(); ?>"  width='180' height='120' class="wp-post-image" />
												<?php endif; ?>
											</span>
										</a>
										<span>
											<a class="relatedthumb" href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
											<?php if($mts_options['mts_headline_meta'] == '1') { ?>
												<div class="post-info">
													<span class="theauthor"> <?php _e('by ','mythemeshop'); the_author_posts_link(); ?> </span> 
													<span style="display:none" class="thetime"><?php the_time('j M Y'); ?></span>
												</div>
											<?php } ?>
										</span>
									</li>
									<?php } echo '</ul></div>'; }} wp_reset_query(); ?>
								<!-- .related-posts -->
							<?php } else {?>  
								<!-- Start Related Posts -->
								<?php $categories = get_the_category($post->ID); if ($categories) { $category_ids = array(); foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id; $args=array( 'category__in' => $category_ids, 'post__not_in' => array($post->ID), 'showposts'=>4, 'ignore_sticky_posts' => 1, 'orderby' => 'rand' );
								$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
									echo '<div class="related-posts"><div class="postauthor-top"><h3>'.__('Related Posts','mythemeshop').'</h3></div><ul>';
									$counter = '0'; while( $my_query->have_posts() ) { ++$counter; if($counter == 4) { $postclass = 'last'; $counter = 0; } else { $postclass = ''; } $my_query->the_post(); $li = 1; ?>
									<li class="<?php echo $postclass; ?> relatepostli<?php echo $li+$counter; ?>">
										<a rel="nofollow" class="relatedthumb" href="<?php the_permalink()?>" title="<?php the_title(); ?>">
											<span class="rthumb">
												<?php if(has_post_thumbnail()): ?>
													<?php the_post_thumbnail('related', 'title='); ?>
												<?php else: ?>
													<img src="<?php echo get_template_directory_uri(); ?>/images/relthumb.png" alt="<?php the_title(); ?>"  width='180' height='120' class="wp-post-image" />
												<?php endif; ?>
											</span>
										</a>
										<span>
											<a class="relatedthumb" href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
											<?php if($mts_options['mts_headline_meta'] == '1') { ?>
												<div class="post-info">
													<span class="theauthor"> <?php _e('by ','mythemeshop'); the_author_posts_link(); ?> </span> 
													<span style="display:none" class="thetime"><?php the_time('j M Y'); ?></span>
												</div>
											<?php } ?>
										</span>
									</li>
									<?php } echo '</ul></div>'; }} wp_reset_query(); ?>
								<!-- .related-posts -->
							<?php }?> 
						<?php }?> 					
						<?php if($mts_options['mts_author_box'] == '1') { ?>
							<div class="postauthor">
								<h4><?php _e('About The Author', 'mythemeshop'); ?></h4>
								<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' );  } ?>
								<h5><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="nofollow"><?php the_author_meta( 'nickname' ); ?></a></h5>
								<p><?php the_author_meta('description') ?></p>
							</div>
						<?php }?>  
					</div><!--.g post-->
					<?php comments_template( '', true ); ?>
				<?php endwhile; /* end loop */ ?>
			</div>
		</article>
		<?php get_sidebar(); ?>
	<?php get_footer(); ?>