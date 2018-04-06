<?php $mts_options = get_option('clock'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
				<h1 class="postsby">
					<?php if (is_category()) { ?>
						<span><?php single_cat_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
					<?php } elseif (is_tag()) { ?> 
						<span><?php single_tag_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
					<?php } elseif (is_author()) { ?>
						<span><?php _e("Author Archive", "mythemeshop"); ?></span> 
					<?php } elseif (is_day()) { ?>
						<span><?php _e("Daily Archive:", "mythemeshop"); ?></span> <?php the_time('l, F j, Y'); ?>
					<?php } elseif (is_month()) { ?>
						<span><?php _e("Monthly Archive:", "mythemeshop"); ?>:</span> <?php the_time('F Y'); ?>
					<?php } elseif (is_year()) { ?>
						<span><?php _e("Yearly Archive:", "mythemeshop"); ?>:</span> <?php the_time('Y'); ?>
					<?php } ?>
				</h1>
				<div class="latest-cat-post <?php if(is_home() & !is_paged()){  } else{ echo 'pagenaRemovBord';}?>">
					<?php $j = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="latestPost excerpt  <?php echo (++$j % 3 == 0) ? 'last' : ''; ?>">
							<header>
								<h2 class="title front-view-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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
							<?php if($mts_options['mts_headline_meta'] == '1') { ?>
								<div class="post-info">
									<span class="theauthor"><i class="icon-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?></span> /
									<span class="thetime"><i class="icon-time"></i>&nbsp;&nbsp;<?php the_time('d M Y'); ?></span>
								</div>
							<?php } ?>
						</div><!--.post excerpt-->
					<?php endwhile; endif; ?>
				</div>
								<!--Start Pagination-->
				<?php if (isset($mts_options['mts_pagenavigation']) == '1' ) { ?>
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