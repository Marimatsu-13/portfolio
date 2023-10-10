<?php get_header(); ?>
<div class="main single">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<h1 class="post-title"><?php the_title(); ?></h1>
<div class="post-content">
<div class="thumbnail">
<?php if (has_post_thumbnail()) {
    the_post_thumbnail();}
?>
</div>
<div class="content">
<?php the_content(); ?>
</div>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>