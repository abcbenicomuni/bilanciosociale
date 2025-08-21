<?php
function bs_calculate_indicators($data) {
    $indicators = [];

    if (!empty($data['q1202']) && !empty($data['q1201'])) {
        $indicators['ind5'] = ($data['q1202'] / $data['q1201']) * 100;
    }

    foreach ($indicators as $code => $value) {
        if ($value > 80) {
            $indicators[$code . '_judgment'] = 'Ottimo';
        } elseif ($value > 50) {
            $indicators[$code . '_judgment'] = 'Buono';
        } else {
            $indicators[$code . '_judgment'] = 'Critico';
        }
    }

    update_user_meta(get_current_user_id(), 'bs_indicators', $indicators);
}
?>

