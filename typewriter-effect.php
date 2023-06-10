<?php
/**
 * Plugin Name: Pandaa Typewriter Effect
 * Plugin URI: https://pandaasoft.com/
 * Description: Adds a typewriter effect to your text content.
 * Version: 1.2.1
 * Author: PandaaSoft
 * Author URI: https://pandaasoft.com/
 */

// Enqueue CSS and JavaScript files
function typewriter_enqueue_scripts() {
    wp_enqueue_style( 'typewriter-effect', plugin_dir_url( __FILE__ ) . 'css/typewriter.css' );
    wp_enqueue_script( 'jquery' ); // Enqueue jQuery
    wp_enqueue_script( 'typewriter-effect', plugin_dir_url( __FILE__ ) . 'js/typewriter.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'typewriter_enqueue_scripts' );

// Create shortcode for typewriter effect
function typewriter_shortcode( $atts, $content = null ) {
    $atts = shortcode_atts( array(
        'speed' => '100',
    ), $atts );

    ob_start(); // Start output buffering
    ?>
    <span class="typewriter" data-speed="<?php echo esc_attr( $atts['speed'] ); ?>"><?php echo esc_html( $content ); ?></span>
    <?php
    return ob_get_clean(); // Return the buffered content
}
add_shortcode( 'typewriter', 'typewriter_shortcode' );


// Create shortcode for typewriter effect
function mytype_shortcode( $atts, $content = null ) {
    $atts = shortcode_atts( array(
        'speed' => '150',
    ), $atts );

    $output = '<p class="mytype" data-speed="' . esc_attr( $atts['speed'] ) . '">' . esc_html( $content ) . '</p>';
    return $output;
}
add_shortcode( 'mytype', 'mytype_shortcode' );

