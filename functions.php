<?php
//Load css
function load_css() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false , 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false , 'all');
    wp_enqueue_style('main');

    wp_register_style('font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), false , 'all');
    wp_enqueue_style('font_awesome');
}
add_action('wp_enqueue_scripts', 'load_css');

//Load js
function load_js() {
    wp_enqueue_script('jquery');

    wp_register_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), NULL , false);
    wp_enqueue_script('bootstrapjs');
    
    wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery') , NULL , false);
    wp_enqueue_script('custom');
}
add_action('wp_enqueue_scripts', 'load_js');


//To load menu options
add_theme_support("menus");
add_theme_support("post-thumbnails");
add_theme_support("widgets");

//Theme location setting
register_nav_menus(
    array(
        'top_bar' => 'Top nav',
        'mobile_bar' => 'Mobile menu',
    )
);

//Add image dimensions for a post
add_image_size('post-large', 800, 400, true);
add_image_size('post-small', 400, 200, false);

//Load side bar widget
function load_sidebar() {
    register_sidebar(
        array(
            'name' => 'page-sidebar',
            'id' => 'page-sidebar',
            'before-title' => '<h3>',
            'after-title' => '</h3>',
        )
        );
}
add_action("widgets_init", "load_sidebar");

//Custom post type
function first_custom_post(){
    $args = array(
        'labels' => array(
            'name' => 'Cars',
            'name_singular' => 'Car',
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor', 'thumbnail','custom-fields'),
    );
    register_post_type('cars', $args);
}
add_action("init", "first_custom_post");


//Creating taxonomy => Categories
function first_custom_taxononmy(){
    $args = array(
        'labels' => array(
            'name' => 'Brands',
            'name_singular' => 'Brand',
        ),
        'hierarchical' => true,
        'public' => true,
    );
    register_taxonomy('brands', array('cars'), $args);
}
add_action("init", "first_custom_taxononmy");

//For making the form submit
add_action("wp_ajax_enquiry", 'submit_enquiry_form');
add_action("wp_ajax_nopriv_enquiry", 'submit_enquiry_form');
function submit_enquiry_form(){
    $data = [];
    wp_parse_str($_POST['enquiry'], $data);
    $to = get_option('admin_email');
    $subject = 'Enquiry details from ' . $data['name'];
    $header[] = "Content-type:text/html; Charset:UTF-8";
    $header[] = "From:contact@atselectrical.in";
    $header[] = "Reply-to:" . $data['email'];

    $message = '';
    foreach ($data as $index => $field) {
        $message .= '<strong>' . $index . ':</strong>' . $field . '<br>';   
    }
    try {
        if(wp_mail($to, $subject, $message, $header)) {
            wp_send_json_success('Your mail has been sent successfully');
        }
    } catch (Exception $e) {
        wp_send_json_error($e);
    }
}

//Over ride the normal nav with bootstrap
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

//Add short code
function add_licence_number(){
    return 'ESB2603';
}
add_shortcode("license",'add_licence_number');

//Add map
function add_google_map(){
    ob_start();
    get_template_part( 'includes/section', 'google_map' );
    return ob_get_clean();
}
add_shortcode("google_map",'add_google_map');

//Contact us page
function get_contact_us_form(){
    echo get_template_part( 'includes/form', 'contact_us' );
}
add_shortcode("contact_us_form",'get_contact_us_form');