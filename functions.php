<?php 
/**
 * PixelSquare functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 */
if( ! function_exists('pixelsquare_setup') ) : 

function pixelsquare_setup() 
{
	// Make theme available for translation
	// load_theme_textdomain('pixelsquare');

	// Add default posts and comments RSS feed links to head
	add_theme_support('automatic-feed-links');

	// Add supprt for post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Thumbnail size for index page
	add_image_size( 'px_thumb', 410, 410, array( 'center', 'center' ) );
	// Thumbnail size for single page
	add_image_size( 'px_single', 1230, 400, array( 'center', 'center' ) );


	// Let WordPress manage the document title
	add_theme_support('title-tag');

	// Enable support fro custom logo
	add_theme_support('custom-logo', array(
		'height'	  => 240,
		'width'		  => 240,
		'flex-height' => true,
	));

	// Enable support for Post Thumbnails on posts and pages
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 1200, 1900 );

	// This theme uses wp_nav_menu() in two location
	register_nav_menus( array( 
		'primary'	=> __('Primary Menu', 'pixelsquare'),
		'secondary'	=> __('Sub Menu', 'pixelsquare'),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for Post Formats
	add_theme_support('post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	));


}
endif; 
add_action('after_setup_theme', 'pixelsquare_setup');

function pixelsquare_scripts() {
	// Bootstrap
	wp_enqueue_style('pixelsquare-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');

	// Font-Awesome
	wp_enqueue_style('pixelsquare-font-awesome', get_template_directory_uri() .'/css/all.min.css');

	// Theme stylesheet
	wp_enqueue_style('pixelsquare-style', get_stylesheet_uri());

	// Theme script
	wp_enqueue_script('pixelsquare-script', get_template_directory_uri() .'/js/pixelsquare.js');

}
add_action('wp_enqueue_scripts', 'pixelsquare_scripts');

// Remove the 28px Push Down from the Admin Bar 
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'my_filter_head');


/**
 * Download Link Metabox
 */
 function pixelsquare_download_metabox(){

 	//add_meta_box(html_id, meatbox_heading, callback_fun, post_type_where_its_diasplayed, position(normal,side), priority)
 	add_meta_box(
 		'download_metabox', 
 		'Download Link', 
 		'display_download_metabox', 
 		'post', 
 		'side', 
 		'high'
 	);

 }
 add_action('admin_init', 'pixelsquare_download_metabox');


//Callback/Display function for download metabox
 function display_download_metabox( $post ){

 	$values = get_post_meta( $post->ID );
	// print_r($values);
	$text = isset( $values['download_metaboxu'][0] ) ? $values['download_metaboxu'][0] : '';
	// var_dump($length);	
	// var_dump($_POST);
 	//Retrive download link

	// global $post;

	   // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
 	?>
	<p>
		<label for="download_metaboxu"> Enter download link: </label>	
		<input type="text" class="widefat" name="download_metaboxu" id="download_metaboxu" value="<?php echo $text; ?>"/>
	</p>
	<?php
 }


add_action('save_post', 'download_metabox_save');

function download_metabox_save($post_id){

    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

	if(isset($_POST['download_metaboxu'])){
		update_post_meta($post_id, 'download_metaboxu', wp_kses( $_POST['download_metaboxu'], $allowed ));
	}

}

