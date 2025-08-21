<?php
function bs_send_to_api($data) {
    $payload = [
        'user_id' => get_current_user_id(),
        'year' => date('Y'),
        'responses' => $data
    ];

    $response = wp_remote_post('https://api.showyourheart.org/submit', [
        'body' => wp_json_encode($payload),
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer YOUR_API_KEY'
        ],
        'timeout' => 10
    ]);

    if (is_wp_error($response)) {
        error_log('Errore API Bilancio Sociale: ' . $response->get_error_message());
    }
}
?>



