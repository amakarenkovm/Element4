<?php
/**
 * Plugin Name: Auto Alt
*/

add_filter('wp_prepare_attachment_for_js', 'change_alt');

function change_alt($response)
{
    if ( ! $response['alt'])
    {
        $response['alt'] = $response['title'];
    }
    return $response;
}