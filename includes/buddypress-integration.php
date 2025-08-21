<?php
if (!defined('ABSPATH')) exit;

if (function_exists('bp_core_new_nav_item')) {
    add_action('bp_setup_nav', 'syh_add_profile_tab', 100);
}

function syh_add_profile_tab() {
    bp_core_new_nav_item([
        'name' => 'Bilancio Sociale',
        'slug' => 'bilancio-sociale',
        'screen_function' => 'syh_profile_screen',
        'position' => 40,
    ]);
}

function syh_profile_screen() {
    add_action('bp_template_content', 'syh_profile_content');
    bp_core_load_template('members/single/plugins');
}

function syh_profile_content() {
    $user_id = bp_displayed_user_id();
    $org_id = get_user_meta($user_id, 'syh_organization_id', true);
    if (!$org_id) {
        echo '<p>Nessuna organizzazione associata.</p>';
        return;
    }
    $indicators = syh_get_indicators($org_id);
    echo '<h3>Indicatori ESG</h3>';
    foreach ($indicators as $ind) {
        echo '<p><strong>' . esc_html($ind['label']) . ':</strong> ' . esc_html($ind['value']) . ' ' . esc_html($ind['unit']) . '</p>';
    }
}
