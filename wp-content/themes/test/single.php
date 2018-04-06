<?php get_header(); ?>

    <main class="clearfix">
        <div class="div">
			<?php the_post(); ?>
            <article>
    			<?php the_post_thumbnail( 'thumbnail' ) ?>
                <h2><?= the_title() ?></h2>
                <span><?php the_content() ?></span>
            </article>
        </div>

    </main>
<?php //get_sidebar() ?>

<?php get_footer(); ?>++++++