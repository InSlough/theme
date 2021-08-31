<?php

add_action('admin_enqueue_scripts', function () {
  // ?? Styles for WP Admin panel
  f_add_c_style("admin-style", "/assets/admin-style.css");
});

// add_filter('nav_menu_css_class', function ($classes, $item) {
//   // ?? add extra css class for nav li
//   $classes[] = "header-menu--base-item";
//   // if (is_single() && $item->title == "Blog") {
//   // }
//   return $classes;
// }, 10, 2);


add_action('wp_enqueue_scripts', function () {
  // ?? Add to Site Header
  // f_add_style('file_name', 0);
  if (GV('critical') == true) f_add_c_style("critical", "/assets/critical.css");
});

add_action('get_footer', function () {
  // ?? Add to Site Footer
  // f_add_style('file_name', 0);

  f_add_style('libs', 0);

  // wp_enqueue_style('wp-block-library', get_site_url() . '/wp-includes/css/dist/block-library/style.min.css', NULL);

  f_add_style('main', GV('dev'));

  // wp_enqueue_style('jquery-scrollbar', get_tUrl() . '/css/jquery.scrollbar.css', NULL, GV('ver'));
  // wp_enqueue_script('jquery-scrollbar', get_tUrl() . '/js/jquery.scrollbar.min.js', NULL, GV('ver'), true);
});

add_action('wp_enqueue_scripts', function () {
  wp_dequeue_style('wp-block-library'); // WordPress core
  wp_dequeue_style('wp-block-library-theme'); // WordPress core
  wp_dequeue_style('wc-block-style'); // WooCommerce
  wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
}, 100);

add_action('ac_css', function ($slug = '', $url = '', $min = 0) {
  // ?? add_custom_styles
  wp_enqueue_style("$slug-", getUrl() . $url . ((!GV('dev') && !$min) ? ".min" : "") . ($min ? ".min" : "") . ".css", NULL, GV('ver'));
}, 50, 3);

add_action('wp_head', function () {
  if (is_admin_bar_showing()) :
?>
    <style type="text/css">
      #wpadminbar {
        top: 70px;
        left: 5px;
        min-width: auto;
        max-width: 280px;
      }

      @media (max-width: 1024px) {
        #wpadminbar {
          display: none !important;
        }
      }

      #wp-admin-bar-customize {
        display: none;
      }

      #wpadminbar:not(:hover) {
        opacity: 0.15;
      }

      #wpadminbar .quicklinks>ul>li>a {
        font-size: 0;
        padding-right: 1px;
      }

      #wpadminbar .quicklinks>ul>li#wp-admin-bar-my-account>a {
        padding-right: 7px;
        padding-left: 1px;
      }

      #wp-admin-bar-search,
      #wp-admin-bar-wp-logo,
      #wp-admin-bar-my-account .display-name,
      #wp-admin-bar-new-content .ab-label {
        display: none;
      }

      #wp-admin-bar-clearfy-menu .wbcr-clearfy-admin-bar-menu-title {
        display: none !important;
      }
    </style>
<?php endif;
});
// add_action('admin_head', 'override_admin_bar_css_function'); // on backend area

add_action('get_header', function () {
  remove_action('wp_head', '_admin_bar_bump_cb');
});
