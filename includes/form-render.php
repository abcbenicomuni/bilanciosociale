<?php
function bs_render_form() {
    if (!is_user_logged_in()) {
        return '<p>Devi essere autenticato per compilare il Bilancio Sociale.</p>';
    }
    ob_start();
    include BS_PLUGIN_DIR . 'templates/form-template.php';
    return ob_get_clean();
}
?>

