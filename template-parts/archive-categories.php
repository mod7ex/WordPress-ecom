<?php
    $args = array(
        'taxonomy' => "product_cat",
        'hide_empty' => false,
    );
    $product_categories = get_terms($args);

    $image = get_theme_file_uri('assets/img/category.svg');
    if ( is_product_category() ) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $img = wp_get_attachment_url( $thumbnail_id );
        if($img){
            $image = $img;
        }

        $output = '<div><h1>' . $cat->name . '</h1>' . '<h3>' . $cat->description . '</h3>' . '</div>';
    } else {
        $output = '<div><h1>SHOP</h1><h3>The e-commerce leaders</h3></div>';
    }

?>

<div id="categories">

    <ul>
        <?php foreach ($product_categories as $key => $cat): ?>
        <li>
            <a href="<?php echo get_term_link( $cat->term_id, 'product_cat' ); ?>">
                <small><?php echo $cat->name; ?> (<?php echo $cat->count; ?>)</small>
            </a>
        </li>
        <?php endforeach ?>
    </ul>

</div>

<div id="category-desc" style="background-image: url(<?php echo $image; ?>);">
    <div class="overlay">
        <?php echo $output; ?>
    </div>
</div>