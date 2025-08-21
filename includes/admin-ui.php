<?php
if (!defined('ABSPATH')) exit;

function syh_render_questionario_page() {
    if (!is_user_logged_in()) {
        echo '<p>Accesso riservato agli utenti registrati.</p>';
        return;
    }
    include plugin_dir_path(__FILE__) . '../templates/questionario-form.php';
}

