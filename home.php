<?php get_header(); ?>


<div id="index" class="file">

    <div class="container">

        <?php if(have_posts()): ?>


        <div class="content">
            <?php get_sidebar(); ?>

            <div class="post-content">
                <?php while(have_posts()): the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <h1><?php the_title(); ?></h1>
                </a>
                <?php the_excerpt(); ?>
                <?php endwhile; ?>
            </div>
        </div>


        <?php endif; ?>

    </div>

</div>


<?php get_footer(); ?>