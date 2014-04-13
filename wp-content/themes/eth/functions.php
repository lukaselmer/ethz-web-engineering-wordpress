<?php

function eth_scripts() {
    // Load main stylesheet.
    wp_enqueue_style( 'eth-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'eth_scripts' );
