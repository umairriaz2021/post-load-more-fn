<?php
add_filter( 'rest_endpoints', 'disable_default_endpoints' );
function disable_default_endpoints( $endpoints ) {
    $endpoints_to_remove = array(
        '/wp/v2/users'
 
    );

    if ( ! is_user_logged_in() ) {
        foreach ( $endpoints_to_remove as $rem_endpoint ) {
            // $base_endpoint = "/wp/v2/{$rem_endpoint}";
            foreach ( $endpoints as $maybe_endpoint => $object ) {
                if ( stripos( $maybe_endpoint, $rem_endpoint ) !== false ) {
                    unset( $endpoints[ $maybe_endpoint ] );
                }
            }
        }
    }
    return $endpoints;
}