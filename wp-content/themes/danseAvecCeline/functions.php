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



// Hook pour la validation du champ de nom
add_filter('wpcf7_validate_text', 'custom_validate_fields', 10, 2);
add_filter('wpcf7_validate_text*', 'custom_validate_fields', 10, 2);

// Hook pour la validation du champ de date
add_filter('wpcf7_validate_date', 'custom_validate_fields', 10, 2);
add_filter('wpcf7_validate_date*', 'custom_validate_fields', 10, 2);

function custom_validate_fields($result, $tag) {
    $tag = new WPCF7_Shortcode($tag);

    // Validation pour le champ "your-name"
    if ('your-name' == $tag->name) {
        $name = isset($_POST['your-name']) ? trim($_POST['your-name']) : '';

        // Vérifie que le champ n'est pas vide et contient uniquement des lettres et des espaces
        if (empty($name) || !preg_match('/^[a-zA-Z\s]+$/', $name) || !preg_match('/\S/', $name)) {
            $result->invalidate($tag, "Veuillez entrer un nom valide.");
        }
    }

    // Validation pour le champ "your-date"
    if ('your-date' == $tag->name) {
        $event_date = isset($_POST['your-date']) ? trim($_POST['your-date']) : '';

        // Vérifie que la date n'est pas vide
        if (empty($event_date)) {
            $result->invalidate($tag, "Veuillez sélectionner une date pour l'événement.");
        } else {
            // Compare la date saisie avec la date actuelle
            $current_date = date('Y-m-d');
            if ($event_date < $current_date) {
                $result->invalidate($tag, "La date de l'événement ne peut pas être antérieure à la date actuelle.");
            }
        }
    }

    return $result;
}