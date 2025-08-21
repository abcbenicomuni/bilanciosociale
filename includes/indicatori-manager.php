<?php
if (!defined('ABSPATH')) exit;

function syh_load_indicatori_json() {
    $locale = substr(get_locale(), 0, 2);
    $path = plugin_dir_path(__FILE__) . "../data/$locale/indicatori.json";
    if (!file_exists($path)) $path = plugin_dir_path(__FILE__) . "../data/it/indicatori.json";
    return json_decode(file_get_contents($path), true);
}

