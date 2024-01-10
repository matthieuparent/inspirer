<?php
//Enlève des trucs inutile de WordPress
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

// Initialisation des CPTs
include('functions/post_type.php');
// include('functions/pagination.php');
// include('functions/breadcrumb.php');

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    $manifest = json_decode(file_get_contents('dist/assets.json', true));
    $main = $manifest->main;
    wp_enqueue_style('theme', get_template_directory_uri() . "/dist/" . $main->css, false, null);
    wp_register_script( 'theme-js', get_template_directory_uri() . "/dist/" . $main->js, null, true, true);
    wp_enqueue_script('theme-js');
    $translation_array = array( 'templateUrl' => get_template_directory_uri() );
    //after wp_enqueue_script
    wp_localize_script( 'theme-js', 'config', $translation_array );
}, 100);

function change_excerpt_length( $length ) {
    return 80;
}
add_filter( 'excerpt_length', 'change_excerpt_length', 999 );

function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

function default_heading_mce($args) {
	// Just omit h1 from the list
    $args['block_formats'] = 'Titre avec soulignement=h3;Titre h3=h4';
	return $args;
}
add_filter('tiny_mce_before_init', 'default_heading_mce' );

// Removes width/height attributes from the_post_thumbnail
function cw4_img_no_attributes($html, $post_id, $post_image_id)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('post_thumbnail_html', 'cw4_img_no_attributes', 10, 3);
/* 
function my_login_logo() { ?>
<style type="text/css">
#login h1 a,
.login h1 a {
    background-image: url(<?php echo get_stylesheet_directory_uri();
    ?>/dist/images/logo.png);
    height: 80px;
    width: 244px;
    background-size: 244px 80px;
    background-repeat: no-repeat;
    padding-bottom: 30px;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' ); */
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAEqh984Zu_Y--7_P1ctL5JIABKdeGkNKs';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/**

 * Add textdomain support to the theme

 */

add_action('after_setup_theme', 'load_textdomain_func');

function load_textdomain_func()

{

    load_theme_textdomain('gbi_inspire', get_template_directory() . '/languages');

}

add_filter( 'gform_required_legend', function( $legend, $form ) {
    return '<span class="gfield_required">*</span> ces champs sont obligatoire';
}, 10, 2 );