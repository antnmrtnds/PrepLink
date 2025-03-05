<?php

function preplink_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','preplink_theme_support');


function preplink_menus(){

    $location = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Iteam"
    );

    register_nav_menus($location);
}

add_action('init','preplink_menus');



function preplink_register_styles() {

    $version = wp_get_theme()->get( 'Version' );
    // Enqueue Bootstrap first
    wp_enqueue_style('preplink-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    
    // Enqueue FontAwesome
    wp_enqueue_style('preplink-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    
    // Enqueue local style.css AFTER Bootstrap
    wp_enqueue_style('preplink-style', get_stylesheet_uri(), array('preplink-bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'preplink_register_styles');


function preplink_register_scripts() {

    // Load WordPress' default jQuery
    wp_enqueue_script('jquery');

    wp_enqueue_script('preplink_popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0',true);
    wp_enqueue_script('preplink_bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery', 'preplink_popper'), '4.4.1',true);
    wp_enqueue_script('preplink_main', get_template_directory_uri() . "/assets/javascript/main.js", array('jquery'), '1.0',true);


}

add_action('wp_enqueue_scripts', 'preplink_register_scripts');


function theme_setup() {
}

add_action('after_setup_theme', 'theme_setup');


?>  