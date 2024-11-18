<link href="<?php echo get_template_directory_uri() . '/assets/css/minified/bootstrap.min.css'; ?>" rel="stylesheet">


<script src="<?php echo get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js';?>"></script>


    <h1 class="entry-title" itemprop="name">All</h1>
<div id="category-buttons" class="button-container">

    <div class="category-btn-wrapper">
        <!-- "All" Button -->
        <button class="category-btn" data-category="">All</button>
    </div>

    <?php
    // Get WooCommerce categories dynamically
    $categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ));

    // Loop through the categories and create buttons
    foreach ($categories as $category) {
        echo '<div class="category-btn-wrapper">';
        echo '<button class="category-btn" data-name="' . esc_attr($category->name) . '" data-category="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</button>';
        echo '</div>';
    }
    ?>
</div>
<div class="col-sm-12">
<div id="spinner" class="spinner-border text-primary" role="status" style="display:none; position: absolute; top: 50%; left: 50%; z-index: 1000;">
    <span class="sr-only">Loading...</span>
</div>
    <div id="products-area" class="row">
        <?php 
        // Define the query arguments to get WooCommerce products
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1, // Show all products
            'orderby' => 'title', 
            'order' => 'ASC',
        );

        // Start the WooCommerce product loop
        $loop = new WP_Query($args);
     
        if ($loop->have_posts()) : 
            while ($loop->have_posts()) : $loop->the_post(); ?>
             <div class="col-sm-4 mb-4">
             <a href="<?php the_permalink(); ?>"> <!-- Ensures proper spacing and alignment -->
                    <div class="ht-product">
                        <div class="ht-product-inner">
                            <div class="ht-product-image-wrap">
                                <div class="ht-product-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php woocommerce_template_loop_product_thumbnail(); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="ht-product-content">
                                <div class="ht-product-content-inner">
                                    <h4 class="ht-product-titles">
                                    <a href="<?php the_permalink(); ?>" class="title_product" style="text-decoration:none"><?php the_title(); ?></a>
                                    </h4>
                                    <div class="ht-product-price">
                                        <span class="price"><?php echo wc_price(get_post_meta(get_the_ID(), '_price', true)); ?></span>
                                    </div>
                                    <!-- Short Description -->
                                    <div class="ht-product-description">
                                        <p><?php the_excerpt(); ?></p> <!-- Displays short description -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </a> </div>
            <?php endwhile; 
        else: ?>
            <p><?php esc_html_e('No products found'); ?></p>
        <?php endif; 
        wp_reset_postdata(); ?>
    </div> <!-- Close the row -->
</div>
