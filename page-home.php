<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();
?>
<section class="home-hero">
  <div class="container">
    <?php if (have_rows('hero')) : ?>
      <?php while (have_rows('hero')) : the_row(); ?>
        <div class="row">
          <div class="col-lg-6 col-12">
            <h1><?php the_sub_field('tittle'); ?></h1>
            <h5><?php the_sub_field('text'); ?></h5>
            <!-- <h1>Your free virtual assistant in streaming</h1> -->
            <!-- <h5>Focus on your mental health, social experience with fans and earnings</h5> -->
            <a href="/join-club/" class="btn-jc">🌟 Join Club</a>
            <a href="#" class="btn-su">Sign up</a>
          </div>
          <?php if (get_sub_field('gif')) : ?>
            <div class="col-lg-6 col-12 col-bg" style="background-image:url('<?php the_sub_field('gif'); ?>')">

            </div>
          <?php endif ?>
        <?php endwhile; ?>
      <?php endif; ?>
        </div>
        <div class="row">
          <div class="col">
            <?php if (have_rows('platforms')) : ?>
              <?php while (have_rows('platforms')) : the_row(); ?>
                <?php $platform = get_sub_field('platform'); ?>
                <?php if ($platform) : ?>
                  <img src="<?php echo esc_url($platform['url']); ?>" alt="<?php echo esc_attr($platform['alt']); ?>" />
                <?php endif; ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
  </div>
</section>
<section class="greeting">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-12">
        <div class="w50">
          <?php if (have_rows('hi')) : ?>
            <?php while (have_rows('hi')) : the_row(); ?>
              <h5><?php the_sub_field('title'); ?></h5>
              <h6><?php the_sub_field('signature'); ?></h6>
              <p><?php the_sub_field('text'); ?></p>
              <span><?php the_sub_field('ps'); ?></span>
        </div>
      </div>
      <div class="col-md-6 col-12 col-bg" style="background-image:url('<?php the_sub_field('img'); ?>')"></div>
    <?php endwhile; ?>
  <?php endif; ?>
    </div>
  </div>
</section>

<section class="b4">
  <?php if (have_rows('news')) : ?>
    <?php while (have_rows('news')) : the_row(); ?>
      <div class="con-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-12 col-bg" style="background-image:url('<?php the_sub_field('img'); ?>')"></div>
            <div class="col-md-6 col-12">
              <div>
                <h2><?php the_sub_field('title'); ?></h2>
                <ul>
                  <?php if (have_rows('ul')) : ?>
                    <?php while (have_rows('ul')) : the_row(); ?>
                      <li><?php the_sub_field('li'); ?></li>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </ul>
                <p><?php the_sub_field('text'); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</section>

<section class="bestb">
  <div class="container">
    <div class="row">
      <?php if (have_rows('bb')) : ?>
        <?php while (have_rows('bb')) : the_row(); ?>
          <div class="col">
            <h2><?php the_sub_field('title'); ?></h2>
          </div>
    </div>
    <div class="row">
      <?php if (have_rows('advantages')) : ?>
        <?php while (have_rows('advantages')) : the_row(); ?>
          <div class="col-md-auto col-6">
            <?php if (get_sub_field('img')) : ?>
              <img class="style-svg" src="<?php the_sub_field('img'); ?>" />
            <?php endif ?>
            <h4><?php the_sub_field('text'); ?></h4>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>
    </div>

  </div>
</section>

<section class="salesb">
  <div class="container">
    <?php if (have_rows('its_free')) : ?>
      <?php while (have_rows('its_free')) : the_row(); ?>
        <div class="row">
          <div class="col">
            <div class="first">
              <?php if (get_sub_field('dollar')) : ?>
                <img src="<?php the_sub_field('dollar'); ?>" />
              <?php endif ?>
              <h2><?php the_sub_field('title'); ?></h2>
            </div>
            <h3><?php the_sub_field('text'); ?></h3>
          </div>
        </div>


        <div class="row">
          <div class="col-md-6 col-12">
            <div class="col-bg">
              <div>
                <?php if (get_sub_field('gif')) : ?>
                  <img src="<?php the_sub_field('gif'); ?>" />
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <ul>
              <?php if (have_rows('ul')) : ?>
                <?php while (have_rows('ul')) : the_row(); ?>
                  <li><?php the_sub_field('li'); ?></li>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
<?
get_footer();
