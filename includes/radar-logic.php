<?php
function bs_get_radar_data() {
    $judgments = get_user_meta(get_current_user_id(), 'bs_indicators', true);
    $areas = [
        "Economia equa", "Democrazia", "Ambiente", "Persone",
        "Trasparenza", "Cultura", "Comunità", "Innovazione"
    ];
    $scores = [];
    foreach ($areas as $area) {
        $scores[] = rand(1, 5); // simulazione, da calcolare realmente
    }
    return $scores;
}
?>

