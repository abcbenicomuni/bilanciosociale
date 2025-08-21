<?php
function bs_calculate_indicators($data) {
    $indicators = [];

    if (!empty($data['q1203']) && !empty($data['q1101'])) {
        $indicators['ind1'] = ($data['q1203'] / $data['q1101']);
    }

    foreach ($indicators as $code => $value) {
        $indicators[$code . '_judgment'] = match (true) {
            $value > 100000 => 'Ottimo',
            $value > 50000 => 'Buono',
            default => 'Critico',
        };
    }

    update_user_meta(get_current_user_id(), 'bs_indicators', $indicators);
}
?>



