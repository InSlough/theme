<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();
?>

<?php if (have_rows('support')) : ?>
  <?php while (have_rows('support')) : the_row(); ?>

    <section class="support-hero">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-12">
            <h1><?php the_sub_field('title'); ?></h1>
            <a href="<?php the_sub_field('link'); ?>">Sign up</a>
          </div>
          <div class="col-md-6 col-12">
            <div class="col-bg">
              <div>
                <img src="<?php the_sub_field('gif'); ?>" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="banners">
      <?php if (have_rows('post')) : ?>
        <?php while (have_rows('post')) : the_row(); ?>
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-12">
                <h3><?php the_sub_field('title'); ?></h3>
                <h6><?php the_sub_field('text'); ?></h6>
              </div>
              <div class="col-md-6 col-12">
                <div class="col-bg">
                  <div>
                    <img src="<?php the_sub_field('gif'); ?>" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </section>
  <?php endwhile; ?>
<?php endif; ?>

<?
get_footer();
