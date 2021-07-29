<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<main class="site-main archive-section" role="main">

  <header class="page-header">

  </header>
  <div class="page-content">
    <div class="container">
      <div class="row">
        <?php
        $args = array(
          'posts_per_page' => 10
        );

        $query = new WP_Query($args);

        // Цикл
        if ($query->have_posts()) {
          $index = 0;
          while ($query->have_posts()) {
            $index++;
            $query->the_post();
            if ($index == 1) {
        ?>
              <div class="col-12">
                <div class="f-post">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <div class="block-col-bg">
                        <div class="col-bg">
                          <div>
                            <img src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="content">
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read the story</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php

            } else {
            ?>
              <div class="col-lg-4 col-12">
                <div class="post-block">
                  <img class="lazy" data-src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>" alt="">
                  <div class="content">
                    <h4><?php the_title(); ?></h4>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read the story</a>
                  </div>
                </div>
              </div>
            <?php

            } ?>

        <?php
          }
        } else {
          // Постов не найдено
        }
        // Возвращаем оригинальные данные поста. Сбрасываем $post.
        wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>

  <?php wp_link_pages(); ?>

  <?php
  global $wp_query;
  if ($wp_query->max_num_pages > 1) :
  ?>
    <nav class="pagination" role="navigation">
      <?php /* Translators: HTML arrow */ ?>
      <div class="nav-previous"><?php next_posts_link(sprintf(__('%s older', gV('slug')), '<span class="meta-nav">&larr;</span>')); ?></div>
      <?php /* Translators: HTML arrow */ ?>
      <div class="nav-next"><?php previous_posts_link(sprintf(__('newer %s', gV('slug')), '<span class="meta-nav">&rarr;</span>')); ?></div>
    </nav>
  <?php endif; ?>
</main>
