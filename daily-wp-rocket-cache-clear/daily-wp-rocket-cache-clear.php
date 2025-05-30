<?php
/**
 * Plugin Name: Daily WP Rocket Cache Clear
 * Description: Clears WP Rocket cache daily at 11 PM and checks for plugin updates at 10 PM. Includes a cache clear log.
 * Version: 1.2.1
 * Author: Emmanuel Santana
 * Author URI: https://github.com/hdsemmanuelsantana
 */

if (!defined('ABSPATH')) exit;

// Include log handler
require_once plugin_dir_path(__FILE__) . 'log.php';

// Schedule cache clear at 11 PM
register_activation_hook(__FILE__, function () {
    if (!wp_next_scheduled('dwpr_daily_cache_clear')) {
        wp_schedule_event(strtotime('23:00:00'), 'daily', 'dwpr_daily_cache_clear');
    }

    if (!wp_next_scheduled('dwpr_daily_update_check')) {
        wp_schedule_event(strtotime('22:00:00'), 'daily', 'dwpr_daily_update_check');
    }
});

add_action('dwpr_daily_cache_clear', function () {
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
        update_option('last_cache_clear_time', current_time('timestamp'));
        dwpr_log_cache_clear('scheduled', 'system');
    }
});

add_action('dwpr_daily_update_check', function () {
    do_action('wp_update_plugins');
});

// Clear scheduled hooks on deactivation
register_deactivation_hook(__FILE__, function () {
    wp_clear_scheduled_hook('dwpr_daily_cache_clear');
    wp_clear_scheduled_hook('dwpr_daily_update_check');
});

// Admin notice once per user per day
add_action('admin_notices', function () {
    if (!current_user_can('manage_options')) return;

    $last_run = get_option('last_cache_clear_time');
    if (!$last_run) return;

    $last_shown = get_user_meta(get_current_user_id(), 'dwpr_last_notice_shown', true);
    $today = date('Y-m-d');

    if ($last_shown === $today) return;

    echo '<div class="notice notice-success is-dismissible">
        <p>WP Rocket cache was cleared at ' . date('g:i A, M j', $last_run) . '.</p>
    </div>';

    update_user_meta(get_current_user_id(), 'dwpr_last_notice_shown', $today);
});

// Add admin page for log
add_action('admin_menu', function () {
    add_menu_page(
        'Daily Cache Clear Log',
        'Scheduled Tasks (Daily Clear)',
        'manage_options',
        'dwpr-cache-log',
        function () {
            include plugin_dir_path(__FILE__) . 'admin-page.php';
        },
        'dashicons-clock',
        99
    );
});

// GitHub-based update checker (Yahnis Elsts PUC)
if (!class_exists('Puc_v4_Factory') && file_exists(plugin_dir_path(__FILE__) . 'plugin-update-checker/plugin-update-checker.php')) {
    require plugin_dir_path(__FILE__) . 'plugin-update-checker/plugin-update-checker.php';

    $updateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/hdsemmanuelsantana/daily-wp-rocket-cache-clear/',
        __FILE__,
        'daily-wp-rocket-cache-clear'
    );

    $updateChecker->getVcsApi()->enableReleaseAssets();
}
