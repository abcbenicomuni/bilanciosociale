<?php
if (!defined('ABSPATH')) exit;

define('SYH_API_BASE_URL', 'https://api.showyourheart.org/v1');

function syh_send_questionario_to_api($data) {
    $response = wp_remote_post(SYH_API_BASE_URL . '/submit', [
        'headers' => ['Content-Type' => 'application/json'],
        'body' => json_encode($data),
    ]);
    return is_wp_error($response) ? false : json_decode(wp_remote_retrieve_body($response), true);
}

function syh_get_indicators($org_id) {
    $response = wp_remote_get(SYH_API_BASE_URL . "/indicators/" . $org_id);
    return is_wp_error($response) ? false : json_decode(wp_remote_retrieve_body($response), true);
}





