<?php
function bs_handle_submission() {
    if (isset($_POST['bs_submit'])) {
        $data = [
            'q1101' => intval($_POST['q1101']),
            'q1203' => floatval($_POST['q1203']),
        ];
        update_user_meta(get_current_user_id(), 'bs_questionario', $data);
        bs_send_to_api($data);
        bs_calculate_indicators($data);
    }
}
add_action('init', 'bs_handle_submission');
?>

