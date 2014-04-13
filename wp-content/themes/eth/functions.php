<?php

function eth_scripts() {
    // Load main stylesheet.
    wp_enqueue_style( 'eth-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'eth_scripts' );

register_nav_menu( 'top', 'Top Menu' );
register_nav_menu( 'left', 'Left Menu' );
add_theme_support( 'post-thumbnails' );
