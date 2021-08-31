<?php if (!defined('ABSPATH')) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?> <?php echo gV('dev') ? 'class="dev"' : ''; ?>>

<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php if (0) : ?>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <?php if (0) : ?>
      <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-touch-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-touch-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-touch-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-touch-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-touch-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-touch-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-touch-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-touch-icon-152x152.png">
    <?php endif; ?>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="256x256" href="/android-chrome-256x256.png">
    <link rel="manifest" href="/favicons/site.webmanifest">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
  <?php endif; ?>

  <?php if (0) : ?>
    <meta name="description" content="Mary's simple recipe for maple bacon donuts makes a sticky, sweet treat with just a hint of salt that you'll keep coming back for.">
  <?php endif; ?>

  <?php if (gV('critical')) : ?>
    <link rel="preload" href="<?php tUrl('/assets/critical.css?ver=' . gV('ver')); ?>" as="style" />
  <?php endif; ?>

  <?php if (1) : ?>
    <link rel="preload" href="<?php tUrl('/dist/img/bb.svg'); ?>" as="image" type="image/svg+xml" />
  <?php endif; ?>


  <?php wp_head(); ?>

</head>

<body <?php
      $extra_classes = '';
      if (is_page('home')) $extra_classes .= " page-home";
      // if (is_page('contacts')) $extra_classes .= " page-contacts";
      if (is_404()) $extra_classes .= " page-404";
      if ($extra_classes) echo ' class="' . $extra_classes . '" ';

      $site_name = esc_html(get_bloginfo('name'));
      ?>>

  <div id="site-loader" data-nosnippet style="display: none;">
    <?php if (1) : ?>
      <img class="l" src="<?php tUrl('/dist/img/bb.svg'); ?>" alt="<?php echo $site_name; ?>" />
    <?php endif; ?>
    <div class="sl-progress">
      <span></span>
    </div>
    <noscript>
      <div>Ваш браузер не поддерживает или блокирует работу скриптов, загрузка невозможна.</div>
    </noscript>
  </div>

  <header class="site-header" role="banner" style="display: none;">
    <div class="container">
      <div class="row">
        <div class="col-auto">
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
        <div class="col-auto">
          <nav role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
          </nav>
        </div>
        <div class="col-auto">
          <button aria-label="Меню" class="menu-icon">
            <div class="lines"></div>
            <div class="lines"></div>
            <div class="lines"></div>
          </button>
        </div>
      </div>
    </div>

    <nav class="nav">
      <div class="nav__content">
        <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>

        <?php if (0) : ?>
          <ul class="">
            <li class=" active-nav"><a href="#" class="">home</a></li>
            <li class=""><a href="#" class="">studio</a></li>
            <li class=""><a href="#" class="">news</a></li>
            <li class=""><a href="#" class="">contact</a></li>
          </ul>
        <?php endif; ?>
      </div>
    </nav>
  </header>

  <div class="viewport">
    <div class="scroll-container">

      <main id="main-content" role="main" data-page-slug="<?php echo $post->post_name; ?>">
