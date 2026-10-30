<?php
function roast_aroma_scripts() {
    wp_enqueue_style('roast-aroma-tailwind', get_template_directory_uri() . '/css/output.css', array(), '1.0.0');
    wp_enqueue_script('roast-aroma-main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'roast_aroma_scripts');

function roast_aroma_theme_setup() {
    add_theme_support('title-tag');

    // Включаем поддержку картинок к постам
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary-menu' => 'Primary Navigation'
    ));
}
add_action('after_setup_theme', 'roast_aroma_theme_setup');

// Добавляем классы Tailwind к ссылкам меню WordPress
function roast_aroma_menu_link_class($atts) {
    $atts['class'] = 'text-[#1f1a17] hover:text-coffee-accent font-medium text-sm transition-colors duration-200';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'roast_aroma_menu_link_class');

