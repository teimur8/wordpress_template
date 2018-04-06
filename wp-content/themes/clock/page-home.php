<?php
/**
 * Template Name: HomePage
 */
?>
<?php $mts_options = get_option('clock'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
				<?php if (is_page_template('page-home.php') & !is_paged()) { ?>
					<?php if($mts_options['mts_featured_slider'] == '1') { ?>
						<div id="sliderBox">
                        	<section class="slider">
                            	<div class="flexslider">
                                	<ul class="slides">
										<?php $slider_cat = implode(",", $mts_options['mts_featured_slider_cat']);
											$my_query = new WP_Query('cat='.$slider_cat.'&posts_per_page=5');
											if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); 
											$image_id = get_post_thumbnail_id(); 
											$image_url = wp_get_attachment_image_src($image_id,'slider_thumb'); 
											$image_url = $image_url[0]; ?>
											<li data-thumb="<?php echo $image_url; ?>">
												<a href="<?php the_permalink() ?>">
													<?php the_post_thumbnail('slider',array('title' => '')); ?>
													<div class="flex-caption">
														<h2 class="slidertitle"><?php the_title(); ?></h2>
														<span class="slidertext"><?php echo excerpt(32); ?></span>
													</div>
												</a>
											</li>
										<?php endwhile; wp_reset_query(); endif; ?>
									</ul>
								</div>
							</section>
						</div>
					<?php } ?>
				<?php } ?>
				<?php if (is_page_template('page-home.php') & !is_paged()) { ?>
					<div id="home_post_cont">
						<div class="cat-posts">
							<?php $i = 1; $my_query = new wp_query( 'cat='.$mts_options['mts_first_section_cat'].'&posts_per_page=1' ); ?>
							<h4 class="frontTitle"><i class="icon-pushpin"></i>&nbsp;&nbsp;<span class="feature"><?php $first_cat = $mts_options['mts_first_section_cat']; echo get_cat_name( $first_cat ); ?></span></h4>
							<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<div class="frontPost excerpt <?php if($i % 2 == 0){echo 'last';} ?>">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="bigfeatured-thumbnail">
									<?php if ( has_post_thumbnail() ) { ?>
										<?php echo '<div class="bigfeatured-thumbnail">'; the_post_thumbnail('bigfeatured',array('title' => '')); echo '</div>'; ?>
									<?php } else { ?>
										<div class="featured-thumbnail">
											<img width="447" height="332" src="<?php echo get_template_directory_uri(); ?>/images/big-featured-thumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
										</div>
									<?php } ?>
								</a>
								<?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
									<div class="post-info">
										<span class="theauthor"><i class="icon-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?></span>
										<span class="thecategory"><i class="icon-file"></i>&nbsp;&nbsp;<?php the_category(', ') ?></span>
									</div>
								<?php } ?>
								<h2 class="title">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="front-view-content">
									<?php echo excerpt(20); ?>
								</div>
								<div class="readMore"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow"><?php _e('Read More','mythemeshop'); ?></a></div>
							</div>
							<?php $i++; endwhile; wp_reset_query(); endif; ?>
						</div><!-- end .cat-posts -->
						<div class="cat-posts-trending">
							<?php $i = 1; $my_query = new wp_query( 'cat='.$mts_options['mts_second_section_cat'].'&posts_per_page='.$mts_options['mts_trending_posts'] ); ?>
							<h4 class="trending"><i class="icon-star"></i> <?php _e('Trending Stories','mythemeshop'); ?></h4>
							<div class="cat_post">
								<div class="cat_post_inner">
									<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<div class="cat_trending">
										<div class="frontPost excerpt <?php if($i % 2 == 0){echo 'last';} ?>">
											<h2 class="title">
												<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
											</h2>
										</div>
										<?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
											<div class="post-info">
												<span class="theauthor"><?php _e('by ','mythemeshop'); the_author_posts_link(); ?></span> /
												<span class="thetime"><?php the_time('j M Y'); ?></span>
											</div>
										<?php } ?>
									</div>
									<?php $i++; endwhile; wp_reset_query(); endif; ?>
								</div>
							</div>
						</div><!-- end .cat-posts -->
						<div class="small-cat-posts">
							<?php $i = 1; $my_query = new wp_query( 'cat='.$mts_options['mts_first_section_cat'].'&posts_per_page=2&offset=1' ); ?>
							<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
								<div class="frontPost excerpt <?php if($i % 2 == 0){echo 'last';} ?>">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="bigfeatured-thumbnail">
										<?php if ( has_post_thumbnail() ) { ?>
											<?php echo '<div class="bigfeatured-thumbnail">'; the_post_thumbnail('smallfeatured',array('title' => '')); echo '</div>'; ?>
										<?php } else { ?>
											<div class="featured-thumbnail">
												<img width="228" height="150" src="<?php echo get_template_directory_uri(); ?>/images/small-featured-nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
											</div>
										<?php } ?>
									</a>
									<h2 class="title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
								</div>
							<?php $i++; endwhile; wp_reset_query(); endif; ?>
						</div><!-- end .cat-posts -->
					</div>
				<?php } ?>
				<div class="latest-cat-post <?php if(is_page_template('page-home.php') & !is_paged()){  } else{ echo 'pagenaRemovBord';}?>">
					<?php if(is_page_template('page-home.php') & !is_paged()){ ?>
						<h4 class="latesttitle"><i class="icon-th"></i>&nbsp;&nbsp;<span class="latest_post"><?php _e('Latest','mythemeshop'); ?></span></h4>
					<?php }?>
					<?php $j = 0; if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } else { $paged = 1; }
						if($mts_options['mts_latest_section'] == '1') { 
							$latestsection = implode(",", $mts_options['mts_latest_section_cat']);
							query_posts('cat='.$latestsection.'&paged='.$paged);
						} else {
							query_posts( array( 'post_type' => 'post', 'paged' => $paged ) ); 
						}
						if (have_posts()) : while (have_posts()) : the_post();
						?>
						<div class="latestPost excerpt  <?php echo (++$j % 3 == 0) ? 'last' : ''; ?>">
							<header>
								<h2 class="title front-view-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							</header>
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
								<?php if ( has_post_thumbnail() ) { ?>
									<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured',array('title' => '')); echo '</div>'; ?>
								<?php } else { ?>
									<div class="featured-thumbnail">
										<img width="223" height="137" src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
									</div>
								<?php } ?>
							</a>
							<div class="front-view-content"><?php echo excerpt(12);?></div>
							<?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
								<div class="post-info">
									<span class="theauthor"><i class="icon-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?></span> /
									<span class="thetime"><i class="icon-time"></i>&nbsp;&nbsp;<?php the_time('d M Y'); ?></span>
								</div>
							<?php } ?>
						</div><!--.post excerpt-->
					<?php endwhile; endif; ?>
				</div>
				<!--Start Pagination-->
				<?php if ($mts_options['mts_pagenavigation'] == '1' ) { ?>
					<?php  $additional_loop = 0; pagination($additional_loop['max_num_pages']); ?>           
				<?php } else { ?>
					<div class="pagination">
						<ul>
							<li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
							<li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
						</ul>
					</div>
				<?php } ?>
				<!--End Pagination-->
			</div>
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>