<?php


// ! Product Elements
// ? Product Main (main product info) [remove]
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
// ? Product Tabs (Description) [reposition]
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 70);
// ? Product Archive Page [remove]
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
// remove_action('hook_name', 'func_name', 10);
// ? Product Archive Page [add]
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);
add_action('woocommerce_shop_loop_item_title', function () {
?>
  <p class="woocommerce-loop-product__short-desc"><?php the_field('prod-short-desc', $post->ID); ?></p>
<?php
}, 20);
// add_action('woocommerce_before_shop_loop', function () {
//   if (function_exists('dynamic_sidebar')) dynamic_sidebar('top-shop-sidebar');
// }, 20);
// ?
// remove_action('hook_name', 'func_name', 10);
// add_action('hook_name', 'func_name', 70);

// !
// ?

add_action('add_meta_boxes_product', function () {
  // ? remove short description
  // remove_meta_box('postexcerpt', 'product', 'normal');
  // ? remove product default gallery
  remove_meta_box('woocommerce-product-images', 'product', 'side');
}, 9999);

add_theme_support('widgets');
add_action('widgets_init', function () {
  register_sidebar(array(
    // 'name' => __("Panel for product Filters", GV('slug')),
    'name' => __("Панель для Фильтров товаров", GV('slug')),
    'id' => 'top-shop-sidebar',
    // 'description' => __('These widgets will be displayed on the Store page at the top', GV('slug')),
    'description' => __('Эти виджеты будут показаны на странице Магазина в верхней части', GV('slug')),
    // 'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
});


// ? Product Filters cache
// * Clear cache results of heavy queries to database (product counts query)
// * [wcpf_clear_cache]
add_action('wp', function () {
  // if (!wp_next_scheduled('wcpf_clear_cache')) {
  //   wp_schedule_event(time(), 'hourly', 'wcpf_clear_cache');
  // }
  if (!wp_next_scheduled('clear_cache_tool')) {
    wp_schedule_event(time(), 'hourly', 'clear_cache_tool');
  }
});

// ?
add_action('wp_enqueue_scripts', function () {
  if (is_checkout()) {
    if (wp_script_is('wc-cart', 'registered') && !wp_script_is('wc-cart', 'enqueued')) {
      wp_enqueue_script('wc-cart');
    }
  }
});
