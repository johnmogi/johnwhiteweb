<?php
$path = $_SERVER['DOCUMENT_ROOT'];

include_once $path . '/wp-config.php';
include_once $path . '/wp-load.php';
include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';

$print_id = $_POST['prod_id'];
$action = $_POST['action'];

$product = wc_get_product($print_id);

switch ( $action ) {
    case 'details':
        $details = array();
        $details['image'] = wp_get_attachment_image_src( get_post_thumbnail_id( $product->id ), 'single-post-thumbnail' )[0];
        $details['desc'] = $product->get_short_description();
        $details['name'] = $product->get_title();
        echo json_encode($details);
    break;
    case 'variations':
        $dsign = $_POST['david_sign'] == 'true' ? 'yes' : 'no';
        $args = array(
            'post_type'     => 'product_variation',
            'post_status'   => array( 'private', 'publish' ),
            'numberposts'   => -1,
            'orderby'       => 'menu_order',
            'order'         => 'asc',
            'post_parent'   => $print_id // get parent post-ID
        );
        $variations = get_posts( $args );
        $var_string = "Paper: ".$_POST['paper'].", Size: ".$_POST['print_size'].", David Signature: ".$dsign;
        foreach ( $variations as $variation ) {
            if ( $variation->post_excerpt === $var_string ) {
                $product_variation = new WC_Product_Variation( $variation->ID );
                $details = array(
                    'v_id' => $variation->ID,
                    'price' => $product_variation->get_price_html()
                );
                echo json_encode($details);
            }
        }
    break;
}