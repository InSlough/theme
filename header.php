<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <!-- <meta name="description" content="Mary's simple recipe for maple bacon donuts makes a sticky, sweet treat with just a hint of salt that you'll keep coming back for."> -->
  <link rel="shortcut icon" href="<?php tUrl(); ?>/img/favicon.png" />

  <?php wp_head(); ?>
</head>

<body>

  <div class="i-body">
    <?php
    // body_class();
    get_template_part('template-parts/header');
    ?>

    <div class="content-wrapper">

      <?php

