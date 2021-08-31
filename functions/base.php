<?php

// add_action('after_setup_theme', function () {
//   add_theme_support('woocommerce');
// });

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// ? add localization for this child theme
load_theme_textdomain(GV('slug'), get_stylesheet_directory() . '/lang');

add_action('after_setup_theme', function () {
  // ?? Register Navigation Menus
  register_nav_menus(array(
    'main_menu' => __('Главное меню', GV('slug')),
    'second_menu' => __('Второе меню (подвал сайта)', GV('slug')),
    // 'main_menu' => __('Main menu', GV('slug')),
    // 'link_menu' => __('Link menu', GV('slug')),
  ));
});

add_filter('get_the_archive_title', function ($title) {
  // ?? Change Archive Title
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_tax()) { // for custom post types
    $title = sprintf(__('%1$s'), single_term_title('', false));
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  }
  return $title;
});

/**
 * @return echo get_stylesheet_directory_uri + extra_url
 */
function tUrl($extra_url = '')
{
  echo get_stylesheet_directory_uri() . ($extra_url ? $extra_url : '');
}
/**
 * @return string get_stylesheet_directory_uri + extra_url
 */
function getUrl($extra_url = '')
{
  // OLD = function get_tUrl()
  return get_stylesheet_directory_uri() . ($extra_url ? $extra_url : '');
}

/**
 * @param string  $name  File name
 * @param integer $dev   File has [.min] true/false
 * @return wp_enqueue_style("$name-style",getUrl()."/css/$name".($dev?"":".min").".css",NULL,gV('ver'));
 */
function f_add_style($name = '', $dev = false)
{
  wp_enqueue_style("$name-", getUrl() . "/dist/css/$name" . ($dev ? "" : ".min") . ".css", NULL, gV('ver'));
}

/**
 * @param string  $name  File name
 * @param string  $url   File url
 * @return wp_enqueue_style("$name-style", getUrl() . $url, NULL, gV('ver'));
 */
function f_add_c_style($name = '', $url = '')
{
  wp_enqueue_style("$name-", getUrl() . $url, NULL, gV('ver'));
}
/**
 * @param string  $name    File name
 * @param integer $dev     File has [.min] true/false
 * @param integer $footer  Insert into Footer true/false
 * @return wp_enqueue_script("$name-script",getUrl()."/js/$name".($dev?"":".min").".css",NULL,gV('ver'),$footer);
 */
function f_add_script($name = '', $dev = false, $footer = false)
{
  wp_enqueue_script("$name-", getUrl() . "/dist/js/$name" . ($dev ? "" : ".min") . ".js", NULL, gV('ver'), $footer);
}
/**
 * @param string  $name    File name
 * @param string  $url     File link
 * @param integer $footer  Insert into Footer true/false
 * @return wp_enqueue_script("$name-script", getUrl() . $url, NULL, gV('ver'), $footer);
 */
function f_add_c_script($name = '', $url = '', $footer = false)
{
  wp_enqueue_script("$name-", getUrl() . $url, NULL, gV('ver'), $footer);
}

//

function get_id_by_slug($page_slug = '')
{
  $page = get_page_by_path($page_slug);
  if ($page) return $page->ID;
  return null;
}

//

/**
 * Only ( jpg jpeg png webp ) formats.
 * @return void or echo '\<picture>...';
 */
function thePicture($file = '', $params = [])
{
  $url = strtolower($file);
  if ($url) {
    $webp = $params['webp'] ?? 0;
    $class = $params['class'] ?? '';
    $img_attr = $params['img-attr'] ?? '';
    $pic_attr = $params['picture-attr'] ?? '';
    $alt = $params['alt'] ?? '#';
    // $lazy = $params['lazy'] === false ? false : true; // (default: true)
    $lazy = $params['lazy'] ?? false; // (default: false)
    preg_match('/^.*\.(jpg|jpeg|png|webp)$/s', $url, $matches, PREG_OFFSET_CAPTURE, 0); // var_dump($matches);
    $t = $matches[1][0] ? $matches[1][0] : ''; // file extension
    if ($t) {
      $webpUrl = preg_replace('/\.[^.]+$/s', '.webp', $url);
      $tw = ($t == "webp" || $webp);
      $is = ' src="' . $url . '" ' . $img_attr . ' alt="' . $alt . '"' . ($tw ? ' onerror="this.parentNode.children[0].remove();"' : '');
      $sw = ' srcset="' . $webpUrl . '" type="image/webp"';
      $si = ' srcset="' . $url . '" type="image/' . ($t == "png" ? 'png' : '') . ($t == "jpg" || $t == "jpeg" ? 'jpeg' : '') . '"';
      echo '<picture class="' . ($lazy === true ? 'i-lazy ' : '') . $class . '" ' . $pic_attr . '>' . ($lazy === true ? (($tw ? '<data-src' . $sw . '></data-src>' : '') . '<data-src' . $si . '></data-src><data-img' . $is . '></data-img>') : (($tw ? '<source' . $sw . '>' : '') . '<source' . $si . '><img' . $is . '>') . '</picture>');
    }
  }
}/* // EXAMPLE:
thePicture($p . '1.png', [
  'webp' => true (default: false), 'class' => 'custom_classes',
  'img-attr' => 'data-name="example"', 'picture-attr' => 'data-name="example"',
  'lazy' => false (default: true)
]);
*/

//

// add_action('admin_enqueue_scripts', function ($hook) {
// Only add to the edit.php admin page.
// if ('edit.php' !== $hook) return;
// wp_enqueue_script('hide_extra_panels', getUrl() . '/assets/hide_extra_panels.js', array('jquery'), NULL, true);
// });
add_action('admin_print_footer_scripts', function () {
  // ? close opened panels
  echo '<script defer src="' . getUrl() . '/assets/hide_extra_panels.js"></script>';
});
