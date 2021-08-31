<?php
if (!defined('ABSPATH')) exit;

get_header();

if (is_404()) {
  //
  get_template_part('template-parts/404');
  //
} elseif (is_page('wishlist')) {
  //
  // get_template_part('template-parts/wishlist');
  //
} elseif (is_page('discounts')) {
  //
  // get_template_part('template-parts/discounts');
  //
} elseif (is_page('checkout')) {
  //
  // get_template_part('template-parts/checkout');
  //
} elseif (is_page('home') || is_home()) {
  //
  get_template_part('template-parts/home');
  //
  /* } elseif (is_page('for-page')) {
    //
    get_template_part('template-parts/for-page');
    //
  } elseif (is_singular('products')) {
    //
    get_template_part('template-parts/products/single');
    //
  */
} elseif (is_singular()) {
  //
  get_template_part('template-parts/single');
  //
  /* } elseif (is_post_type_archive('products')) {
    //
    get_template_part('template-parts/products/archive');
    //
  */
} elseif (is_archive()) {
  //
  get_template_part('template-parts/archive');
  // get_template_part('template-parts/404');
  //
} elseif (is_search()) {
  //
  // get_template_part('template-parts/search');
  get_template_part('template-parts/404');
  //
} else {
  get_template_part('template-parts/404');
}

get_footer();
