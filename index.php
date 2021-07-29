<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

if (is_page('for-page')) {
  //
  get_template_part('template-parts/for-page');
  //
// } elseif (is_singular('products')) {
//   //
//   get_template_part('template-parts/products/single');
//   //
//
} elseif (is_page('blog')) {
  //
  get_template_part('template-parts/archive');
} elseif (is_single()) {
  //
  get_template_part('template-parts/single');
} elseif (is_singular()) {
  //
  get_template_part('template-parts/page');
  //
// } elseif (is_post_type_archive('products')) {
//   //
//   get_template_part('template-parts/products/archive');
//   //
} else {
  get_template_part('template-parts/404');
}

get_footer();
