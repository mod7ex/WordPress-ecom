<?php get_header(); ?>


<div id="woo" class="file">

    <div class="container">

        <?php get_product_search_form(); ?>

        <?php if(have_posts()): ?>

        <div class="content">
            <?php get_sidebar(); ?>

            <div class="post-content">
                <?php woocommerce_content(); ?>
            </div>
        </div>

        <?php endif; ?>

    </div>

</div>


<?php get_footer(); ?>