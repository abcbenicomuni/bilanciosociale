<?php
function bs_send_to_api($data) {
    $payload = [
        'user_id' => get_current_user_id(),
        'year' => 2024,
        'responses' => $data
    ];

    $response = wp_remote_post('https://api.showyourheart.org/submit', [
        'body' => json_encode($payload),
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer YOUR_API_KEY'
        ]
    ]);
}
?>

