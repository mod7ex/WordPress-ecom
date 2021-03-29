<?php get_header(); ?>

<?php if(has_header_image()): ?>
<div id="hero" style="background-image: url(<?php header_image(); ?>);">
    <?php else: ?>
    <div id="hero">
        <?php endif; ?>
        <div class="container-content">
            <div>
                <h4>SUMMER SALE</h4>
                <h1>SAVE UP TO 70%</h1>
                <button>Explore Now</button>
            </div>
        </div>
    </div>

    <div class="container-content">
        <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; ?>
        <?php endif; ?>
    </div>


    <?php get_footer(); ?>