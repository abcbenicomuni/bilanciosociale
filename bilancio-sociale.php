<?php
/**
 * Plugin Name: Bilancio Sociale
 * Description: WP Plugin per la raccolta e analisi del Bilancio Sociale
 * Version: 1.0
 * Author: Marco Giustini
 * Organization: Associazione Beni Comuni Stefano Rodotà
 * License: AGPL-3.0
 */

if (!defined('ABSPATH')) exit;

require_once plugin_dir_path(__FILE__) . 'includes/api-handler.php';
require_once plugin_dir_path(__FILE__) . 'includes/inventory-manager.php';
require_once plugin_dir_path(__FILE__) . 'includes/indicatori-manager.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin-ui.php';
require_once plugin_dir_path(__FILE__) . 'includes/buddypress-integration.php';

add_action('admin_menu', 'bilancio_sociale_menu');

function bilancio_sociale_menu() {
    add_menu_page('Bilancio Sociale', 'Bilancio Sociale', 'read', 'bilancio-sociale', 'syh_dashboard', 'dashicons-chart-area', 25);
    add_submenu_page('bilancio-sociale', 'Compila Questionario', 'Compila Questionario', 'read', 'syh-questionario', 'syh_render_questionario_page');
}

function syh_dashboard() {
    include plugin_dir_path(__FILE__) . 'templates/dashboard.php';
}


