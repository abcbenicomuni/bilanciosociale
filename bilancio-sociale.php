<?php
/**
 * Plugin Name: Bilancio Sociale
 * Description: WP Plugin per la raccolta e analisi del Bilancio Sociale
 * Version: 1.1
 * Author: Marco Giustini
 * Organization: Associazione Beni Comuni Stefano Rodotà
 * License: AGPL-3.0
 */

define('BS_PLUGIN_DIR', plugin_dir_path(__FILE__));

add_action('plugins_loaded', function() {
    load_plugin_textdomain('bilanciosociale', false, dirname(plugin_basename(__FILE__)) . '/languages');
});

function bs_enqueue_assets() {
    wp_enqueue_script('chartjs', 'https://cdn.jsdelivr.net/npm/chart.js', [], null, true);
}
add_action('admin_enqueue_scripts', 'bs_enqueue_assets');

require_once BS_PLUGIN_DIR . 'includes/form-render.php';
require_once BS_PLUGIN_DIR . 'includes/data-handler.php';
require_once BS_PLUGIN_DIR . 'includes/indicator-calculator.php';
require_once BS_PLUGIN_DIR . 'includes/api-client.php';
require_once BS_PLUGIN_DIR . 'includes/export.php';
require_once BS_PLUGIN_DIR . 'includes/radar-logic.php';
require_once BS_PLUGIN_DIR . 'admin/dashboard.php';

add_shortcode('bilancio_sociale_form', 'bs_render_form');
?>
