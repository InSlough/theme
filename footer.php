<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_template_part('template-parts/footer');
?>
<!-- <div class="copyright"><?php /*the_field('copyright', 'options');*/ ?></div> -->

<!-- .content-wrapper END -->
</div>

<!-- .i-body END -->
</div>

<!-- Modal -->
<?php // get_template_part('template-parts/modals');
?>

<div class="sources">
  <?php wp_footer(); ?>

  <!-- <div id="toast-wrapper" aria-live="polite" aria-atomic="true"></div> -->
</div>


</body>

</html>
