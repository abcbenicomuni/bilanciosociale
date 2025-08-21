<?php
function bs_render_dashboard() {
    if (!is_user_logged_in()) return;

    $indicators = get_user_meta(get_current_user_id(), 'bs_indicators', true);
    echo '<h2>' . __('Indicatori Bilancio Sociale', 'bilanciosociale') . '</h2><table>';
    echo '<tr><th>Codice</th><th>Valore</th><th>Giudizio</th></tr>';
    foreach ($indicators as $key => $value) {
        if (str_ends_with($key, '_judgment')) continue;
        $judgment = $indicators[$key . '_judgment'] ?? 'N/D';
        echo "<tr><td>$key</td><td>" . round($value, 2) . "</td><td>$judgment</td></tr>";
    }
    echo '</table>';

    $scores = bs_get_radar_data();
    echo '<canvas id="radarChart"></canvas>';
    echo '<form method="post"><input type="submit" name="bs_export_csv" value="' . __('Esporta CSV', 'bilanciosociale') . '"></form>';
    echo '<script>
        const ctx = document.getElementById("radarChart").getContext("2d");
        new Chart(ctx, {
            type: "radar",
            data: {
                labels: ["Economia equa", "Democrazia", "Ambiente", "Persone", "Trasparenza", "Cultura", "Comunità", "Innovazione"],
                datasets: [{
                    label: "' . __('Giudizio sintetico per area', 'bilanciosociale') . '",
                    data: ' . json_encode($scores) . ',
                    backgroundColor: "rgba(33, 150, 243, 0.2)",
                    borderColor: "rgba(33, 150, 243, 1)",
                    pointBackgroundColor: "rgba(33, 150, 243, 1)"
                }]
            },
            options: {
                scales: {
                    r: {
                        min: 0,
                        max: 5,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    </script>';
}
add_action('admin_menu', function() {
    add_menu_page('Bilancio Sociale', 'Bilancio Sociale', 'edit_pages', 'bs-dashboard', 'bs_render_dashboard');
});
?>

