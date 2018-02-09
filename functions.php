<?php

/**
 * Register Custom Navigation Walkers
 */
require_once('inc/wp-bootstrap-navwalker.php');
require_once('inc/sidenav-navwalker.php');

/**
 * Add theme support for customizing
 */
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_theme_support( 'title-tag' );
add_theme_support( 'customize-selective-refresh-widgets' );

/**
 * Disable Wordpress from adding empty paragraph tags
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * Enable shortcodes in text widgets
 */
add_filter('widget_text','do_shortcode');

/**
 * Enqueue styles
 */
function msawheels_theme_styles() {
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'googlefont_css', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600|Oswald:300,400' );

    if ( is_archive( 'gallery' ) || get_post_type() == 'legacy' || get_post_type() == 'monoblock' ) {
        wp_enqueue_style( 'chosen_css', get_template_directory_uri() . '/inc/chosen/chosen.customized.css' );
    }

    wp_enqueue_style( 'slick_css', get_template_directory_uri() . '/inc/slick/slick.css' );
    wp_enqueue_style( 'slick-theme_css', get_template_directory_uri() . '/inc/slick/slick-theme.css' );
    wp_enqueue_style( 'msa-wheels-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'msawheels_theme_styles' );

/**
 * Enqueue scripts
 */
function msawheels_theme_js() {
    global $wp_scripts;

    wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
    wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

    $wp_scripts->add_data( 'html_shiv', 'conditional', 'lt IE 9' );
    $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );

    wp_enqueue_script( 'fontawesome_js', 'https://use.fontawesome.com/94b014e044.js', '', true );

    if ( is_archive( 'gallery' ) || get_post_type() == 'legacy' || get_post_type() == 'monoblock' ) {
        wp_enqueue_script( 'chosen_js', get_template_directory_uri() . '/inc/chosen/chosen.jquery.min.js', array('jquery'), '', true );
    }

    if ( is_archive( 'gallery' ) || is_home() ) {
        wp_enqueue_script( 'masonryimages_js', get_template_directory_uri() . '/inc/masonry/imagesloaded.pkgd.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'masonry_js', get_template_directory_uri() . '/inc/masonry/masonry.pkgd.min.js', array('jquery', 'masonryimages_js'), '', true );
    }

    wp_enqueue_script( 'hammer_js', get_template_directory_uri() . '/inc/hammerjs/hammer.min.js', '', '', true );

    wp_enqueue_script( 'msa_js', get_template_directory_uri() . '/js/msa.min.js', array('jquery', 'bootstrap_js' ), '', true );

    if ( is_post_type_archive( 'gallery' ) ) {
        wp_enqueue_script( 'gallery_js', get_template_directory_uri() . '/js/gallery.min.js', array('jquery', 'bootstrap_js', 'msa_js'), '', true );
    } else if ( is_home() ) {
        wp_enqueue_script( 'blog_js', get_template_directory_uri() . '/js/blog-landing.min.js', array('jquery', 'bootstrap_js', 'msa_js'), '', true );
    } else {
        wp_enqueue_script( 'general_js', get_template_directory_uri() . '/js/general.min.js', array('jquery', 'bootstrap_js', 'msa_js'), '', true );
    }

    if ( get_post_type() == 'legacy' || get_post_type() == 'monoblock' ) {
        wp_enqueue_script( 'product_js', get_template_directory_uri() . '/js/product.min.js', array('jquery', 'chosen_js'), '', true );
    }

}
add_action( 'wp_enqueue_scripts', 'msawheels_theme_js' );

/**
 * Register Menus & Widgets
 */
function register_theme_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu' ),
            'sidenav' => __( 'Side Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus');

function msawheels_widgets_init() {
    // register_sidebar( array(
    //   'name'          => __( 'Social Links' ),
    //   'id'            => 'social-links',
    //   'description'   => 'Widget area below sidebar',
    //   'before_widget' => '<div class="side-nav-social row">',
    //   'after_widget'  => '</div>',
    //   'before_title'  => '',
    //   'after_title'   => '',
    // ) );
}
add_action( 'widgets_init', 'msawheels_widgets_init' );

/**
 * Add Rim Icon next to the Wheel Collection Admin
 */
function rim_dashboard() {
   wp_enqueue_style('rim', get_template_directory_uri() . '/fonts/detailed-rims/font/flaticon.css');
}

add_action('admin_init', 'rim_dashboard');

function rim_icons_dashboard() {
  $monoblock_icon = '\f102';
  $legacy_icon = '\f106';
   echo "<style type='text/css' media='screen'>
   		#menu-posts-monoblock .dashicons-admin-post:before, .dashicons-format-standard:before {
     		font-family: Flaticon !important;
     		content: '".$monoblock_icon."';
      }
      #menu-posts-legacy .dashicons-admin-post:before, .dashicons-format-standard:before {
        font-family: Flaticon !important;
        content: '".$legacy_icon."';
      }
     	</style>";
 }
add_action('admin_head', 'rim_icons_dashboard');

/**
 * Custom function to register sidenav background images
 */
function msawheels_nav_menu_objects( $items, $args ) {
	return $items;
}
add_filter('wp_nav_menu_objects', 'msawheels_nav_menu_objects', 10, 2);


/**
 * Custom function to wrap and output default side menu background and social links for sidenav
 */
function msawheels_nav_menu_items( $items, $args ) {

	// get menu
	$menu = wp_get_nav_menu_object('Side Menu');

	// modify sidenav only
	if ( $args->theme_location == 'sidenav' ) {
  		// vars
  		$default_background = get_field('default_background_image', $menu);
  		$facebook = get_field('facebook_url', $menu);
      $instagram = get_field('instagram_url', $menu);
      $date = date('Y');
      $indent = str_repeat( "\t", 7 );

      // prepend html
  	  $prepend_html =
     '<div class="side-nav-wrap covered-bg" data-bg-img="'.$default_background.'">
          <nav class="side-nav">
              <a href="javascript:void(0);" class="side-nav-close">x</a>
                  <div class="side-nav-overflow">
                      <div class="k-table">
                          <div class="side-nav-links k-table-cell">
                              <ul class="list-unstyled text-uppercase side-nav-main">';

      $append_html =
                   $indent . '</ul>
                          </div>
                      </div>
                  </div>
                  <div class="side-nav-bottom">
                      <div class="side-nav-social row">
                          <div class="col-xs-4"><a class="side-nav-social-link k-gray-link" href="'.$facebook.'">Facebook</a></div>
                          <div class="col-xs-4"><a class="side-nav-social-link k-gray-link" href="'.$instagram.'">Instagram</a></div>
                          <div class="col-xs-4">
                      </div>
                  </div>
                  <div class="col-xs-4"></div><div class="side-nav-copyright">
                      <p class="k-gray-text">Privacy Policy &copy; '.$date.'</p>
                  </div>
              </div>
          </nav>
      </div>';

      // append html
      $items = $prepend_html . "\n" . $items . $append_html;
	}
	// return
	return $items;
}
add_filter('wp_nav_menu_items', 'msawheels_nav_menu_items', 10, 2);

/**
 * Custom function to set uploaded gallery image as the featured image
 */
function acf_set_featured_image( $value, $post_id, $field  ) {
    if ($value != '') {
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	    update_post_meta($post_id, '_thumbnail_id', $value);
    }
    return $value;
}
// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter( 'acf/update_value/name=gallery_image', 'acf_set_featured_image', 10, 3 );


/**
 * ACF to REST API Plugin Settings
 */
// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );

// Enable the custom fields filter for gallery posts
add_filter( 'rest_gallery_query', function( $args ) {
  $args['meta_query'] = array();

  if (!empty($_GET['type_of_wheel'])) {
    array_push($args['meta_query'], array(
      'key'   => 'type_of_wheel',
      'value' => esc_sql( $_GET['type_of_wheel'] ),
    ));
  }

  if (!empty($_GET['wheel_style'])) {
    array_push($args['meta_query'], array(
      'key'   => 'wheel_style',
      'value' => esc_sql( $_GET['wheel_style'] ),
    ));
  }

  return $args;
} );


/**
 * Enable Pagination on Gallery Page
 */
// add_action( 'pre_get_posts', function ( $q ) {
//     if ( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'gallery' ) ) {
//         $q->set( 'posts_per_page', 2 );
//     }
// });


/**
 * Add Location search
 */

/**
 * Calculates the great-circle distance between two points, with
 * the Vincenty formula.
 * @param float $latitudeFrom Latitude of start point in [deg decimal]
 * @param float $longitudeFrom Longitude of start point in [deg decimal]
 * @param float $latitudeTo Latitude of target point in [deg decimal]
 * @param float $longitudeTo Longitude of target point in [deg decimal]
 * @param float $earthRadius Mean earth radius in [mile]
 * @return float Distance between points in [mile] (same as earthRadius)
 */
function vincentyGreatCircleDistance (
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 3959)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  return $angle * $earthRadius;
}

/**
 * Validates a given latitude $lat
 *
 * @param float|int|string $lat Latitude
 * @return bool `true` if $lat is valid, `false` if not
 */
function validateLatitude($lat) {
  return preg_match('/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,32})?))$/', $lat);
}

/**
 * Validates a given longitude $long
 *
 * @param float|int|string $long Longitude
 * @return bool `true` if $long is valid, `false` if not
 */
function validateLongitude($long) {
  return preg_match('/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,32})?))$/', $long);
}

function locations_endpoint_func() {
  $args = array(
      'post_type' => 'locations',
      'posts_per_page' => -1
  );
  $query = new WP_Query($args);
  $posts = $query->posts;

  // Get requested starting lat and lng
  $lat = $_GET['lat'];
  $lng = $_GET['lng'];
  $radius = empty($_GET['radius']) ? 25 : floatval($_GET['radius']);

  if (empty($lat) || empty($lng) || !validateLongitude($lng) || !validateLatitude($lat) || !$radius) {
    return array(
      'error' => 'Missing or invalid parameters.'
    );
  }

  $outPosts = array();

  foreach ($posts as $key => $post) {
    $acfFields = get_fields($post->ID);
    //$posts[$key]->acf = $acfFields;

    $destLat = $acfFields['dealer_lat'];
    $destLng = $acfFields['dealer_lng'];

    $distance = vincentyGreatCircleDistance($lat, $lng, $destLat, $destLng);
    $acfFields['location_distance'] = $distance;
    $acfFields['ID'] = $posts[$key]->ID;
    $acfFields['post_name'] = $posts[$key]->post_name;
    if ($distance <= $radius) {
      array_push($outPosts, $acfFields);
    }
  }

  if ( empty( $outPosts ) ) {
    return array(
      'error' => 'No results returned.'
    );
  }

  return $outPosts;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'msa/v1', '/locations', array(
    'methods' => 'GET',
    'callback' => 'locations_endpoint_func',
  ));
});

function geo_ip_endpoint_func(){
  $thisIp = $_GET['ip'];
  $userInfo = empty($thisIp) ? geoip_detect2_get_info_from_current_ip() : geoip_detect2_get_info_from_ip($thisIp, $locales = array('en'));
  //$city = $userInfo->city;

  return $userInfo;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'msa/v1', '/geo-ip', array(
    'methods' => 'GET',
    'callback' => 'geo_ip_endpoint_func',
  ));
});
