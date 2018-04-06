<?php get_header(); ?>

    <main class="clearfix">
        <?php if(have_posts()){ ?>
            <?php while (have_posts()): the_post(); ?>
                <section>
                    <a href="<?= the_permalink() ?>">
                        <img src="<?= PATH_THEME_IMG ?>1st_Design.jpg" alt="1st Design">
                    </a>
                    <h2><?= the_title() ?></h2>
                    <span>This work description goes here. Just simple and short text about this work.</span>
                </section>
            <?php endwhile ?>
        <?php }else{ ?>
            Записей нет!
        <?php } ?>


<!--        <section>-->
<!--            <a href="#"><img src="--><?//= PATH_THEME_IMG ?><!--1st_Design.jpg" alt="1st Design"></a>-->
<!--            <h2>Fictional Design Studio Layout</h2>-->
<!--            <span>This work description goes here. Just-->
<!--simple and short text about this work.</span>-->
<!--        </section>-->
<!--        <section>-->
<!--            <a href="#"><img src="--><?//= PATH_THEME_IMG ?><!--2nd_Design.png" alt="2nd Design"></a>-->
<!--            <h2>Creative Mouse Design</h2>-->
<!--            <span>This work description goes here. Just-->
<!--simple and short text about this work.</span>-->
<!--        </section>-->
<!--        <section>-->
<!--            <a href="#"><img src="--><?//= PATH_THEME_IMG ?><!--3rd_Design.png" alt="3rd Design"></a>-->
<!--            <h2>Real Estate Company Layout</h2>-->
<!--            <span>This work description goes here. Just-->
<!--simple and short text about this work.</span>-->
<!--        </section>-->
<!--        <section>-->
<!--            <a href="#"><img src="--><?//= PATH_THEME_IMG ?><!--4th_Design.png" alt="4th Design"></a>-->
<!--            <h2>Web Design Fan - Blog for designers</h2>-->
<!--            <span>This work description goes here. Just-->
<!--simple and short text about this work.</span>-->
<!--        </section>-->
<!--        <div class="main-footer clearfix">-->
<!--            <a href="#">Our Blog</a>-->
<!--            <a href="#">See Portfolio</a>-->
<!--        </div>-->
    </main>
    <?php get_sidebar() ?>

<?php get_footer(); ?>