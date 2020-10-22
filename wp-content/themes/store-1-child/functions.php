<?php
/**
 * Enqueue script and styles for child theme
 */
// echo get_template_directory_uri();exit;

// global $wp;
// $current_slug = add_query_arg( array(), $wp->request );
// echo $current_slug . "this is the current slug"; 



// this below function for getting the current url
///////////////////////////////
// function current_url()
// {
//     $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//     $validURL = str_replace("&", "&amp;", $url);

//     return $validURL;
// }
// echo "page url is : ".current_url();exit;

function woodmart_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'woodmart-style' ), woodmart_get_theme_info( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 1000 );


// function custom_theme_enqueue_rtl_style(){
//     if (qtranxf_getLanguage() == 'ar'){
//         wp_enqueue_style('rtl_style', get_theme_root_uri(). '/store-1-child/rtl.css');
//     }
// }
// add_action('wp_enqueue_scripts', 'custom_theme_enqueue_rtl_style');


function custom_theme_enqueue_rtl_style(){
    if (qtranxf_getLanguage() == 'ar'){
        wp_enqueue_style('rtl_style', get_template_directory_uri() . '/css/style-rtl.css');
    }
}
add_action('wp_enqueue_scripts', 'custom_theme_enqueue_rtl_style', 9999999999999999);