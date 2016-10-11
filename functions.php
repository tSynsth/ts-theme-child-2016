<?php
/** ----------------------------
 *
 *  Define Constant
 *
 ** ----------------------------*/
$parent_theme = wp_get_theme(get_template());
if ($parent_theme) {
    define('PARENT_TOKEN', $parent_theme->get( 'TextDomain' ));
    define('PARENT_VERSION', $parent_theme->get( 'Version' ));
}
$child_theme = wp_get_theme();
if ($child_theme) {
    define('CHILD_TOKEN', $child_theme->get( 'TextDomain' ));
    define('CHILD_VERSION', $child_theme->get( 'Version' ));
}
/** ----------------------------
 *
 *  Child Styles and Scripts
 *
 ** ----------------------------*/
function child_enqueue_scripts() {
    wp_enqueue_script(CHILD_TOKEN . '-script-front', get_stylesheet_directory_uri() . '/assets/js/front.min.js', array( 'jquery' ), CHILD_VERSION);
}
function child_enqueue_styles() {
    $parent_style = PARENT_TOKEN . '-style';
    $child_style = CHILD_TOKEN . '-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style($child_style, get_stylesheet_directory_uri() . '/style.css', array($parent_style), CHILD_VERSION);
}
add_action('wp_enqueue_scripts', 'child_enqueue_scripts');
add_action('wp_enqueue_scripts', 'child_enqueue_styles', 100);


/** ----------------------------
 *
 *  Thim Child Function Name
 *
 ** ----------------------------*/