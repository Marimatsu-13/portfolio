<?php 

// Enregistre les styles et scripts du thème
function theme_scripts()
{
    wp_enqueue_style('parent-style',  get_template_directory_uri() . '/style.css'  );
	wp_enqueue_style('theme-style', get_stylesheet_uri(). '/style.css'  );

    wp_enqueue_script( 'script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true );
	
}
add_action('wp_enqueue_scripts', 'theme_scripts');

// Configuration personnalisée de l'en-tête
function custom_header_setup() {
	$args = array(
		'default-text-color' => '000',
		'width'              => 1440,
		'height'             => 250,
		'flex-width'         => true,
		'flex-height'        => true,
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'custom_header_setup' );

// Configuration personnalisée du logo
function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// Prise en charge des fonctionnalités du thème
function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('menus');
}

add_action('after_setup_theme','montheme_supports');

// Enregistre les menus
function register_my_menu()
{
    register_nav_menu( 'header', 'En tête du menu' );
    register_nav_menu( 'footer', 'Pied de page' );
}
  add_action( 'after_setup_theme', 'register_my_menu' );

// Custom taille image 

function custom_image_sizes() 
{
	add_image_size('miniature-personnalisee2', 594, 495, true);

}

add_action('after_setup_theme', 'custom_image_sizes');

// Filtre

function filter_posts() 
{
	$category = $_POST['category'];

	
	if(($category == '')){
        $args = array(
			'post_type' => 'projets',
			'posts_per_page' => 12,
		);

	}
	else{
	$args = array(
	  'post_type' => 'projets',
	  'posts_per_page' => 12,
	  'tax_query' => array(
		'relation' => 'OR',
		array(
		  'taxonomy' => 'categorie', 
		  'field' => 'term_id',
		  'terms' => $category,
		  'operator' => 'IN'
		)
	),
	);}
	
  
	$posts = new WP_Query($args);

	ob_start();
  
	if ($posts->have_posts()) {
	  while ($posts->have_posts()) {
		$posts->the_post();
		// Obtenez l'URL de la miniature
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'miniature-personnalisee2');
        $post_url = get_permalink();

        // Affichez la miniature avec un lien vers l'article
        echo '<a href="' . esc_url($post_url) . '"><img src="' . esc_url($thumbnail_url) . '"></a>';
	  }
	} else {
	  echo 'No posts found.';
	}
  
	wp_reset_postdata();
  
	$response = array('html' => ob_get_clean());

	wp_send_json($response);
echo('toto');
    echo $response;
	wp_die();

}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');

