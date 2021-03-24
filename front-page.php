<?php get_header(); ?>

<?php if(has_header_image()): ?>
<div id="hero" style="background-image: url(<?php header_image(); ?>);">
    <?php else: ?>
    <div id="hero">
        <?php endif; ?>
        <div class="container">
            <h1>Welcome to my shop</h1>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>

            <?php the_content(); ?>

            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>


    <?php get_footer(); ?>