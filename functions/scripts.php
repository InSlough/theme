<?php

add_action('wp_enqueue_scripts', function () {
  // ?? Scripts for Site (Header)
  // f_add_script('script_file_name', 0||1, false);

  // ?? Scripts for Site (Footer)
  wp_enqueue_script("libs", getUrl() . "/dist/js/libs/libs" . (gV('dev') ? "" : ".min") . ".js", array('jquery'), gV('ver'), true);
  // f_add_script('current-device', 0, false);
  // f_add_script('simplebar', 0, true);

  global $wp_query;
  wp_register_script("main", getUrl() . "/dist/js/main" . (gV('dev') ? "" : ".min") . ".js", array('jquery', 'libs'), gV('ver'), true);
  wp_enqueue_script('main');
  // ?? свои параметры для файла "main-script"
  wp_localize_script('main', 'siteVars', array(
    // 'query' => array(
    // 'raw' => $wp_query->query_vars,
    // 'vars' => json_encode($wp_query->query_vars), // everything about your loop is here
    // 'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
    // 'max_page' => $wp_query->max_num_pages,
    // ),
    'site' => array(
      'url' => site_url(),
      'ajax' => admin_url('admin-ajax.php'),
    ),
    // 'translate' => array(
    // 'wl_add_text' => __("Добавлено в список желаний", gV('slug')),
    // ),
  ));
  //
}, 50);

add_action('ac_js', function ($slug = '', $url = '', $min = 0) {
  // ?? add_custom_javascript
  wp_enqueue_script("$slug-", getUrl() . $url . ((!gV('dev') && !$min) ? ".min" : "") . ($min ? ".min" : "") . ".js", array('jquery'), gV('ver'), true);
}, 50, 3);

if (!is_admin()) add_filter('script_loader_tag', function ($tag) {
  return str_replace(' src', ' defer src', $tag);
}, 60);
