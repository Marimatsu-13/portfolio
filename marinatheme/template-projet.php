<?php
/**
 * Template Name: Projets
 */
?>
<div id="preloader"></div>
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
);?>

<?php 
 $my_query = new WP_Query($args);

if ($my_query->have_posts()) : ?>
<div class= "publication-list">

<?php
    while ($my_query->have_posts()) : $my_query->the_post();
        // Obtenir l'URL de la miniature
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'miniature-personnalisee2');
        $post_url = get_permalink();

        // Afficher la miniature avec un lien vers l'article
        echo '<a href="' . esc_url($post_url) . '"><img src="' . esc_url($thumbnail_url) . '"></a>';
        ?>

<?php endwhile;?>
</div>
<?php endif;
wp_reset_postdata();
?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php endwhile; ?>
<?php endif; 


?>
</div>
<?php get_footer(); ?>