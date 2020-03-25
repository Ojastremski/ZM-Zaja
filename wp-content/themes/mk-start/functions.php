<?php
function bootstrap_jquery_scripts() {
    // Rejestracja skryptu
    wp_register_script( 'mój-skrypt', get_template_directory_uri() .
        './bootstrap-3.3.7-dist/js/bootstrap.min.js', array( 'jquery' ) );
    // Umieszczenie skryptu w kolejce:
    wp_enqueue_script( 'mój-skrypt' );
}
add_action( 'wp_enqueue_scripts', 'bootstrap_jquery_scripts' );

add_action('init', function() {
    register_nav_menus(array(
        'main-menu' => 'Main menu'
    ));
});

function jquery_scripts() {
    wp_register_script( 'iten-script', get_template_directory_uri()  . '/js/script.js', array( 'jquery' ) );
    wp_enqueue_script( 'iten-script' );
}
add_action( 'wp_enqueue_scripts', 'jquery_scripts' );

function jquery_cssslider_scripts() {
    wp_register_script( 'iten-slider', get_template_directory_uri()  . '/js/jquery.cssslider.js', array( 'jquery' ) );
    wp_enqueue_script( 'iten-slider' );
}
add_action( 'wp_enqueue_scripts', 'jquery_cssslider_scripts' );

//enqueues our locally supplied font awesome stylesheet
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('footerStyle', get_template_directory_uri() . './css/footerStyle.css');
	wp_enqueue_style('contactStyle', get_template_directory_uri() . './css/contactStyle.css');
	wp_enqueue_style('newsStyle', get_template_directory_uri() . './css/newsStyle.css');
	wp_enqueue_style('styleOffer', get_template_directory_uri() . './css/styleOffer.css');	
	wp_enqueue_style('sliderAnimated', get_template_directory_uri() . './css/animated-slider.css');
	wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');	
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

/**
 * Włączenie wspierania miniaturek postów
 */
add_theme_support( 'post-thumbnails');

// [slider]
function slider($atts, $content = null)
{
	global $wpdb;
	$offer = shortcode_atts( array(
        'offer_id' => null,
    ), $atts );

    $sliders = $wpdb->get_results("SELECT * FROM offer_slider WHERE offer_id = ".$offer['offer_id']);

?>
    <div class="container-fluid">
        <div class="choose_slider">
            <div class="choose_slider_items">
                <ul id="mySlider1">
                <?php foreach ($sliders as $slider) : ?>
                    <?php if ($slider->active == 'tak') : ?>
                        <li class="current_item">
                            <a href="<?php echo $slider->link_to_page; ?>">
                                <img src="<?php echo $slider->upload_link_photo; ?>" />
                            </a>
                            <div class="name-jacht"><?php echo $slider->product_name; ?></div>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
                </ul>
            </div>
            <div>
                <a id="btn_next1" class="btn-slider" href="#"></a>
                <a id="btn_prev1" class="btn-slider" href="#"></a>
            </div>
            <div id="border-left" class="border-slider"></div>
            <div id="border-right" class="border-slider"></div>
        </div>
    </div>
<?php
}
add_shortcode('slider', 'slider');

/**
 * Add Bootstrap form styling to WooCommerce fields
 *
 * @since  1.0
 * @refer  http://bit.ly/2zWFMiq
 */
function iap_wc_bootstrap_form_field_args ($args, $key, $value) {

    $args['input_class'][] = 'form-control';
    return $args;
}
add_filter('woocommerce_form_field_args','iap_wc_bootstrap_form_field_args', 10, 3);