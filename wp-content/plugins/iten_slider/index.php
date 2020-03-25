<?php
/*
Plugin Name: Slider
Plugin URI: http://iten.com.pl
Description: Wtyczka Slider.
Author: IT Engennering
*/




function load_custom_wp_admin_style($hook) {
    // Load only on ?page=mypluginname
    if($hook != 'toplevel_page_slider') {
        return;
    }
    wp_enqueue_style( 'custom_wp_admin_css', plugins_url('bootstrap.min.css', __FILE__) );
    wp_enqueue_style('iten_style', plugin_dir_url( __FILE__ ) . '/style.css');
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


// Dodaje funkcję strony ustawień do menu
add_action( 'admin_menu', 'slider_admin_menu' );

function slider_admin_menu()
{
    add_menu_page (
        'Slider',
        'Slider',
        'manage_options',
        'slider',
        'slider_admin_page'
    );
}

function slider_admin_page()
{
    include 'router.php';
}