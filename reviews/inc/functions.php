<?php 

define("PLUGIN_FOLDER","reviews"); 


add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
add_action( 'admin_menu', 'register_reviews_menu_list' );
function register_reviews_menu_list(){
    add_menu_page( 'top 10 ocr', 'Top 10 OCR', 'manage_options', 'top10onlinecasinoreviews', 'register_reviews_page', plugins_url( 'reviews/assets/images/logo.png' ), 99 );
    add_menu_page( 'clickouts', 'Clickouts', 'manage_options', 'clickouts', 'register_reviews_page', plugins_url( 'reviews/assets/images/statistics.png' ), 99 );
}


function register_reviews_page(){
    include_once('review_settings_page.php');
}



add_action( 'init', 'create_reviews_vendors' );
function create_reviews_vendors() {
 
    register_post_type( 'vendors',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Vendors' ),
                'singular_name' => __( 'Vendor' ),
                'add_new_item' => __('Add New Vendor'),

            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'vendor'),
			'menu_icon' => plugins_url( 'reviews/assets/images/logo.png' ),
            'show_in_rest' => true,
            //'supports' => array('title', 'editor', 'thumbnail', 'comments', 'page-attributes')
            'featured_image' => __('Foo'),
            'supports' => array('title', 'editor', 'thumbnail')
            
 
        )
    );
}

/* Register Vendor Taxonomy */
register_taxonomy("types", array("vendors"), 

array(
    "hierarchical" => true,
    "label" => "Types",
    "singular_label" => "Types",
    'show_admin_column' => true,
    "rewrite" => false 
    )
);


//Action hook to register metaboxes for post types
add_action('add_meta_boxes','searchin_property_metaboxes');

function searchin_property_metaboxes($post) {

    $terms = get_terms( array(
        'taxonomy' => 'types',
        'hide_empty' => false,
    ) );
    foreach($terms as $term){
  
        add_meta_box($term->slug, $term->name, 'vendor_type_meta_data', 'vendors', 'normal', 'default');

    }


}





add_action('admin_menu' , 'tradmin_page_settings');
function tradmin_page_settings() {

    $terms = get_terms( array(
        'taxonomy' => 'types',
        'hide_empty' => false,
    ) );
    foreach($terms as $term){

        add_submenu_page('edit.php?post_type=vendors', 'Order Vendors '.$term->name.'',   'Reorder '.$term->name.'', 'edit_posts', $term->term_id, 'reorderSpecificVendorType');
        
    }


}

function reorderSpecificVendorType(){
    if(!is_numeric($_GET['page'])){
        exit();
    }
    include( plugin_dir_path( __FILE__ ) . 'vendor_order_page.php');
}



add_filter( 'manage_vendors_posts_columns', 'vendors_filter_posts_columns' );
function vendors_filter_posts_columns( $columns ) {


  unset($columns['date']);
  unset($columns['categories']);


  $columns['featured-thumbnail'] = __( 'Image' );
  $columns['types'] = __( 'Types' );
  $columns['score'] = __( 'Score' );
  $columns['rating'] = __( 'Rating' );
  $columns['order'] = __( 'Order' );
  $columns['date'] = __( 'Date' );

  return $columns;
}


add_action( 'add_meta_boxes_food', 'food_add_meta_boxes' );
function food_add_meta_boxes( $post ){
	add_meta_box( 'food_meta_box', __( 'Nutrition facts', 'food_example_plugin' ), 'food_build_meta_box', 'vendors', 'side', 'low' );
}




function bootstrapHeader() {
  echo '
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap.css.map">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap.min.css.map">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap-grid.css">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap-grid.css.map">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap-grid.min.css.map">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap-reboot.css">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap-reboot.css.map">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/css/bootstrap-reboot.min.css.map">
<link rel="stylesheet" href="'.plugins_url(PLUGIN_FOLDER).'/assets/css/style.css">

';
}



function bootstrapFooter() {
  echo '
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/js/bootstrap.bundle.js.map"></script>
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/js/bootstrap.bundle.min.js.map"></script>
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/js/bootstrap.js"></script>
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/js/bootstrap.js.map"></script>
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/bootstrap/js/bootstrap.min.js.map"></script>
<script src="'.plugins_url(PLUGIN_FOLDER).'/assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>


';
}


//if(isset($_GET['page']) && ($_GET['page']=="top10onlinecasinoreviews")) {
    add_filter('admin_head', 'bootstrapHeader');
    add_filter('admin_footer', 'bootstrapFooter');
//}
