<?php
    $args = array(
    'taxonomy' => "product_cat",
    'hide_empty' => false,
    );
    $product_categories = get_terms($args);
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