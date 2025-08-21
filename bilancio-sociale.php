<?php
/**
 * Plugin Name: Bilancio Sociale
 * Description: Plugin per la raccolta e analisi del Bilancio Sociale 2024.
 * Version: 1.0
 * Author: Marco Giustini
 */

define('BS_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once BS_PLUGIN_DIR . 'includes/form-render.php';
require_once BS_PLUGIN_DIR . 'includes/data-handler.php';
require_once BS_PLUGIN_DIR . 'includes/indicator-calculator.php';
require_once BS_PLUGIN_DIR . 'includes/api-client.php';
require_once BS_PLUGIN_DIR . 'includes/export.php';
require_once BS_PLUGIN_DIR . 'includes/radar-logic.php';
require_once BS_PLUGIN_DIR . 'admin/dashboard.php';
require_once BS_PLUGIN_DIR . 'admin/organization-card.php';

add_shortcode('bilancio_sociale_form', 'bs_render_form');
?>

