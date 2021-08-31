<?php
if (!defined('ABSPATH')) {
  exit;
}

$p = getUrl('/dist/img/');

do_action('ac_js', 'home', "/dist/js/extra/home");

?>
<div class="page <?php echo $post->post_name; ?>">




</div>
