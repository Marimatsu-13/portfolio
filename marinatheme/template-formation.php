<?php
/**
 * Template Name: Formation
 */
?>
<div id="preloader"></div>
<?php get_header(); ?>
<div class="main page">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<div class="post-content">
    <div class="timeline">
<?php the_content(); ?>
    </div>

</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>