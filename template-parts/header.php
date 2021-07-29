<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
?>
<header class="site-header" role="banner">
  <div class="container">

    <nav class="site-navigation row" role="navigation">
      <div class="site-branding col-auto">
        <?php
        if (has_custom_logo()) {
          the_custom_logo();
        } elseif ($site_name) {
        ?>
          <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr_e('Home', gV('slug')); ?>" rel="home">
              <?php echo esc_html($site_name); ?>
            </a>
          </h1>
        <?php } ?>
      </div>
      <div class="nav-pc col">
      <?php if (has_nav_menu('main_menu')) : ?>
        <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
      <?php endif; ?>
      </div>
      <div class="nav">
      <?php if (has_nav_menu('main_menu')) : ?>
        <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
      <?php endif; ?>
      </div>
      <?php if (has_nav_menu('link_menu')) : ?>
        <?php wp_nav_menu(array('theme_location' => 'link_menu')); ?>
      <?php endif; ?>
      <div class="nav-but-wrap col-auto">
        <div class="menu-icon hover-target">
          <span class="menu-icon__line menu-icon__line-left"></span>
          <span class="menu-icon__line"></span>
          <span class="menu-icon__line menu-icon__line-right"></span>
        </div>
      </div>
    </nav>

  </div>



</header>
