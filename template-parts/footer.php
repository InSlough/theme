<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<footer id="site-footer" class="site-footer" role="contentinfo" style="<?php if (is_single() && 'post' == get_post_type()) {
                                                                          echo "background:#fff;";
                                                                        } ?>">
  <div class="container not-full">
    <div class="row">
      <div class="col">
        <?php if (have_rows('footer', 'option')) : ?>
          <?php while (have_rows('footer', 'option')) : the_row(); ?>
            <h6><?php the_sub_field('text'); ?></h6>
            <h2><?php the_sub_field('title'); ?></h2>
            <a href="<?php the_sub_field('link'); ?>">Sign up</a>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php // footer.
  ?>
  <div class="w-100">
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
        <?php if (has_nav_menu('footer_menu')) : ?>
          <?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
        <?php endif; ?>
        <?php if (has_nav_menu('copyright_menu')) : ?>
          <?php wp_nav_menu(array('theme_location' => 'copyright_menu')); ?>
        <?php endif; ?>
      </nav>

    </div>
  </div>
</footer>
