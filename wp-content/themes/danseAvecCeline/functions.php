<?php   

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap', false );

    wp_enqueue_style('style-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
    wp_enqueue_style('firstPart-style', get_stylesheet_directory_uri() . '/assets/css/firstPart.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/firstPart.css'));
    wp_enqueue_style('information-style', get_stylesheet_directory_uri() . '/assets/css/information.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/information.css'));
    wp_enqueue_style('equipe-style', get_stylesheet_directory_uri() . '/assets/css/equipe.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/equipe.css'));

    wp_enqueue_script('information-script', get_stylesheet_directory_uri() . '/assets/js/information.js', array('jquery'), filemtime(get_stylesheet_directory() . '/assets/js/information.js'), true);
    wp_enqueue_script('siderbarButton-script', get_stylesheet_directory_uri() . '/assets/js/siderbarButton.js', array('jquery'), filemtime(get_stylesheet_directory() . '/assets/js/siderbarButton.js'), true);
}

