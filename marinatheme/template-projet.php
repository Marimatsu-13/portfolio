<?php
/**
 * Template Name: Projets
 */
?>
<div id="preloader"></div>
<div class="transition transition-1 is-active">
</div>
<?php get_header(); ?>
<div class="main page">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<div class="post-content">
<?php the_content(); ?>
<div class="filter-section">
    <select  id="category-select" onfocus='this.size=5;' onblur='this.size=0;' onchange='this.size=1; this.blur();'>
        <option value="">CATEGORIE</option>
    </select>
</div>
<div class="row">
<?php

$args = array(
    'post_type' => 'projets',
    'posts_per_page' => 12,
    'paged' => 1,
);?>

<?php 
 $my_query = new WP_Query($args);

if ($my_query->have_posts()) : ?>
<div class= "publication-list">
<?php
    while ($my_query->have_posts()) : $my_query->the_post();
        if (has_post_thumbnail()) {
            the_post_thumbnail('miniature-personnalisee2');
        }
        
    endwhile;?>
    </div>
<?php endif;
?>
</div>
</div>
</div>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>