<?php   

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap', false );

    wp_enqueue_style('style-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
    wp_enqueue_style('firstPart-style', get_stylesheet_directory_uri() . '/assets/css/firstPart.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/firstPart.css'));
}

