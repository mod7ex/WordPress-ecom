<?php get_header(); ?>


<div id="page" class="file">

    <div class="container">

        <?php if(have_posts()): ?>

        <?php while(have_posts()): the_post(); ?>

        <img src="<?php the_post_thumbnail_url('post_image') ?>" class="img">


        <div class="content">
            <div class="post-content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>

        <?php endwhile; ?>

        <?php endif; ?>

    </div>

</div>


<?php get_footer(); ?>