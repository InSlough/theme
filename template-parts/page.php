<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
get_header();
?>
<?php
while (have_posts()) : the_post();
?>

  <!-- Content -->
  <main class="post-page info-page" role="main">

    <div class="section-wrapper">
      <div class="wrapper">
        <section class="section post-title container-fluid">
          <div class="row">
            <div class="col-12">
              <h2>
                <?php the_title(); ?>
              </h2>
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <img class="lazy" data-src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>">

                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>
      </div>
    </div>
    <div class="section-wrapper">
      <div class="wrapper">
        <section class="section post-content container">
          <div class="row">
            <div class="col">
              <div class="post-info">
                <span><?php the_author(); ?></span>
                <p><?php echo get_the_date(); ?></p>
              </div>
            </div>
            <?php $permalink = get_the_permalink() ?>
            <div class="col post-share">
              <span> Share </span>
              <a href="https://facebook.com/sharer/sharer.php?u=<?php echo $permalink ?>">
                <img src="<?php tUrl(); ?>/img/f.svg" alt="">
              </a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink ?>">
                <img src="<?php tUrl(); ?>/img/in.svg" alt="">
              </a>
              <a href="https://twitter.com/intent/tweet/?url=<?php echo $permalink ?>">
                <img src="<?php tUrl(); ?>/img/tv.svg" alt="">
              </a>
            </div>
            <div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 col-12">
              <div class="post-content">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-12 sidebar-block"><?php
                                                                    if (function_exists('dynamic_sidebar'))
                                                                      dynamic_sidebar('right-sidebar');
                                                                    ?>
              <div class="col post-share">
                <a href="https://facebook.com/sharer/sharer.php?u=<?php echo $permalink ?>">
                  <img src="<?php tUrl(); ?>/img/f.svg" alt="">
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink ?>">
                  <img src="<?php tUrl(); ?>/img/in.svg" alt="">
                </a>
                <a href="https://twitter.com/intent/tweet/?url=<?php echo $permalink ?>">
                  <img src="<?php tUrl(); ?>/img/tv.svg" alt="">
                </a>
              </div>
            </div>
          </div>


        </section>
      </div>
    </div>

    <?php
    // if ('' != locate_template('template-parts/contact_form_wrapper.php')) {
    //   get_template_part('template-parts/contact_form_wrapper');
    // }
    ?>

  </main>

<?php
endwhile;

get_footer();
