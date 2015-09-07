<?php
// styles of child theme
function uni_child_theme_style() {
    wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.1.2', 'all' );
    wp_enqueue_style( 'style' );
    if ( !ot_get_option( 'uni_color_schemes' ) ) {
        wp_register_style( 'uni-theme-francoise-scheme', get_template_directory_uri() . '/css/scheme-default.css', array('style'), '1.1.2', 'screen' );
        wp_enqueue_style( 'uni-theme-francoise-scheme' );
    } else {
        $sColourScheme = ot_get_option( 'uni_color_schemes' );
        wp_register_style( 'uni-theme-francoise-scheme', get_template_directory_uri() . '/css/scheme-'.$sColourScheme.'.css', array('style'), '1.1.2', 'screen' );
        wp_enqueue_style( 'uni-theme-francoise-scheme' );
    }
    wp_register_style( 'uni-theme-francoise-custom-scheme', get_stylesheet_directory_uri() . '/css/scheme-custom.css', array('style'), '1.1.2', 'screen' );
    wp_enqueue_style( 'uni-theme-francoise-custom-scheme' );
    wp_register_style( 'adaptive', get_template_directory_uri() . '/css/adaptive.css', array('style'), '1.1.2', 'screen' );
    wp_enqueue_style( 'adaptive' );

    wp_register_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'style' ), '1.1.2', 'screen' );
    wp_enqueue_style( 'child-style' );
}
add_action( 'wp_enqueue_scripts', 'uni_child_theme_style' );

?>