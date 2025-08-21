<?php
if (!defined('ABSPATH')) exit;

function syh_register_organization_cpt() {
    register_post_type('syh_organization', [
        'label' => 'Organizzazioni Censite',
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'custom-fields'],
        'menu_icon' => 'dashicons-building',
    ]);
}
add_action('init', 'syh_register_organization_cpt');

