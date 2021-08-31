<?php if (!defined('ABSPATH')) exit; ?>

<h1 class="v-hide"><?php the_title(); ?></h1>
<div class="post-single <?php echo $post->post_name; ?>">
  <section>
    <?php the_content(); ?>
  </section>
  <section>
    <div style="display: flex; flex-direction: column; justify-content: space-between; height: 2000px;">
      <div>POST POST POST - START (height 2000px)
        <br>
        <br>
        <img src="https://stereoimage.de/360/girls.jpg" alt="#">
      </div>
      <div>POST POST POST - MIDDLE (height 2000px)</div>
      <div>POST POST POST - END (height 2000px)</div>
    </div>
  </section>
</div>
<?php
