<?php
$settings = $this->get_settings_for_display();
$product_type       = $this->get_settings_for_display('woolentor_product_grid_product_filter');
$per_page           = $this->get_settings_for_display('woolentor_product_grid_products_count');
$custom_order_ck    = $this->get_settings_for_display('custom_order');
$orderby            = $this->get_settings_for_display('orderby');
$order              = $this->get_settings_for_display('order');
$columns            = $this->get_settings_for_display('woolentor_product_grid_column');
$rows               = $this->get_settings_for_display('woolentor_product_grid_row');
$tabuniqid          = $this->get_id();
$proslider          = $this->get_settings_for_display('proslider');
$producttab          = $this->get_settings_for_display('producttab');

$is_rtl = is_rtl();
$direction = $is_rtl ? 'rtl' : 'ltr';



// WooCommerce Category
$args = array(
    'post_type'             => 'product',
    'post_status'           => 'publish',
    'ignore_sticky_posts'   => 1,
    'posts_per_page'        => $per_page,
);

switch( $product_type ){

    case 'sale':
        $args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
    break;

    case 'featured':
        $args['tax_query'][] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN',
        );
    break;

    case 'best_selling':
        $args['meta_key']   = 'total_sales';
        $args['orderby']    = 'meta_value_num';
        $args['order']      = 'desc';
    break;

    case 'top_rated': 
        $args['meta_key']   = '_wc_average_rating';
        $args['orderby']    = 'meta_value_num';
        $args['order']      = 'desc';          
    break;

    case 'mixed_order':
        $args['orderby']    = 'rand';
    break;

    default: /* Recent */
        $args['orderby']    = 'date';
        $args['order']      = 'desc';
    break;
}

// Custom Order
if( $custom_order_ck == 'yes' ){
    $args['orderby'] = $orderby;
    $args['order'] = $order;
}

$get_product_categories = $settings['woolentor_product_grid_categories']; // get custom field value
$product_cats = str_replace(' ', '', $get_product_categories);

if ( "0" != $get_product_categories) {
    if( is_array($product_cats) && count($product_cats) > 0 ){
        $field_name = is_numeric($product_cats[0])?'term_id':'slug';
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'terms' => $product_cats,
                'field' => $field_name,
                'include_children' => false
            )
        );
    }
}

?>

<?php
                $j=0;
                foreach( $product_cats as $cats ):
                    $j++;
                    $field_name = is_numeric($product_cats[0])?'term_id':'slug';
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_cat',
                            'terms' => $cats,
                            'field' => $field_name,
                            'include_children' => false
                        )
                    );
                    $products = new \WP_Query( $args );
                    ?>
                    <div class="ht-tab-pane <?php if($j==1){echo 'htactive';} ?>" id="<?php echo 'woolentortab'.$tabuniqid.$j;?>">
                        
                        <div class="row">
                            <div class="<?php echo esc_attr( $columns );?> col-md-4">
                                <?php
                                    $k=1;
                                    if( $products->have_posts() ):
                                        while( $products->have_posts() ): $products->the_post();
                                ?>

                                <div class="product-item">

                                    <div class="product-inner">
                                        <div class="image-wrap">
                                            <a href="<?php the_permalink();?>" class="image">
                                                <?php 
                                                    woocommerce_show_product_loop_sale_flash();
                                                    woocommerce_template_loop_product_thumbnail();
                                                ?>
                                            </a>
                                            <?php
                                                if( $settings['woolentor_product_style'] == 1){
                                                    if ( class_exists( 'YITH_WCWL' ) ) {
                                                        echo woolentor_add_to_wishlist_button();
                                                    }
                                                }
                                            ?>
                                            <?php if( $settings['woolentor_product_style'] == 3):?>
                                                <div class="product_information_area">

                                                    <?php
                                                        global $product; 
                                                        $attributes = $product->get_attributes();
                                                        if($attributes):
                                                            echo '<div class="product_attribute">';
                                                            foreach ( $attributes as $attribute ) :
                                                                $name = $attribute->get_name();
                                                            ?>
                                                            <ul>
                                                                <?php
                                                                    echo '<li class="attribute_label">'.wc_attribute_label( $attribute->get_name() ).esc_html__(':','woolentor').'</li>';
                                                                    if ( $attribute->is_taxonomy() ) {
                                                                        global $wc_product_attributes;
                                                                        $product_terms = wc_get_product_terms( $product->get_id(), $name, array( 'fields' => 'all' ) );
                                                                        foreach ( $product_terms as $product_term ) {
                                                                            $product_term_name = esc_html( $product_term->name );
                                                                            $link = get_term_link( $product_term->term_id, $name );
                                                                            $color = get_term_meta( $product_term->term_id, 'color', true );
                                                                            if ( ! empty ( $wc_product_attributes[ $name ]->attribute_public ) ) {
                                                                                echo '<li><a href="' . esc_url( $link  ) . '" rel="tag">' . $product_term_name . '</a></li>';
                                                                            } else {
                                                                                if(!empty($color)){
                                                                                    echo '<li class="color_attribute" style="background-color: '.$color.';">&nbsp;</li>';
                                                                                }else{
                                                                                    echo '<li>' . $product_term_name . '</li>';
                                                                                }
                                                                                
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </ul>
                                                    <?php endforeach; echo '</div>'; endif;?>

                                                    <div class="actions style_two">
                                                        <?php
                                                            woocommerce_template_loop_add_to_cart();
                                                            if ( class_exists( 'YITH_WCWL' ) ) {
                                                                echo woolentor_add_to_wishlist_button();
                                                            }
                                                        ?>
                                                    </div>

                                                    <div class="content">
                                                        <h4 class="title"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
                                                        <?php woocommerce_template_loop_price();?>
                                                    </div>

                                                </div>

                                            <?php else:?>
                                               
                                            <?php endif;?>

                                            
                                        </div>
                                        
                                        <div class="content">
                                            <h4 class="title"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
                                            <?php woocommerce_template_loop_price();?>
                                        </div>
                                    </div>

                                </div>

                           <?php if ($k % $rows == 0 && ($products->post_count != $k)) { ?>
                            </div>
                            <div class="<?php echo esc_attr($columns );?> col-md-4">
                                <?php } $k++; endwhile; wp_reset_postdata();  endif; ?>
                            </div>
                        </div>

                    </div>
                <?php endforeach;?>