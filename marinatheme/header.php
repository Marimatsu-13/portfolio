<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body>
<!-- Création de nav bar -->

<nav id="menu">
<?php
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
            
        wp_nav_menu(array(
            'theme_location' => 'header',
            'menu_id' => 'Navigation', 
            'container' => false,
        ));}
        ?>
<div class="menu-toggle">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
</div>
</nav>
