<?php
function bs_export_csv() {
    if (isset($_POST['bs_export_csv'])) {
        $indicators = get_user_meta(get_current_user_id(), 'bs_indicators', true);
        if (empty($indicators)) return;

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="indicatori.csv"');
        echo "\xEF\xBB\xBF"; // BOM UTF-8 per Excel

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Codice', 'Valore', 'Giudizio']);

        foreach ($indicators as $key => $value) {
            if (str_ends_with($key, '_judgment')) continue;
            $judgment = $indicators[$key . '_judgment'] ?? 'N/D';
            fputcsv($output, [$key, round($value, 2), $judgment]);
        }

        fclose($output);
        exit;
    }
}
add_action('admin_init', 'bs_export_csv');
?>





