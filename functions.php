<?php

// ? get variables (globally)
function GV($gv)
{
  if ($gv == 'dev') $gv = true;
  else if ($gv == 'critical') $gv = true;
  else if ($gv == 'ver') $gv = "1.000";
  else if ($gv == 'slug') $gv = "theme-slug";
  else if ($gv == 'home-id') $gv = 2;
  else $gv = 0;
  return $gv;
}

require(get_stylesheet_directory() . '/functions/base.php');
require(get_stylesheet_directory() . '/functions/styles.php');
require(get_stylesheet_directory() . '/functions/scripts.php');
require(get_stylesheet_directory() . '/functions/acf.php');
require(get_stylesheet_directory() . '/functions/get-video.php');
// require(get_stylesheet_directory() . '/functions/woo.php');
// require(get_stylesheet_directory() . '/functions/woo-parts.php');
// require(get_stylesheet_directory() . '/functions/name.php');
