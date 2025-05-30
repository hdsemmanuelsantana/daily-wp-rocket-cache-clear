<?php
/**
 * Plugin Name: Daily WP Rocket Cache Clear
 * Description: Clears WP Rocket cache daily at 11 PM and lets you clear it manually. Displays clear history and shows a one-time notice per user per day.
 * Version: 1.2
 * Author: Emmanuel Santana
 * Author URI: https://github.com/hdsemmanuelsantana
 * Tested up to: 6.5
 */

require plugin_dir_path(__FILE__) . 'plugin-update-checker/plugin-update-checker.php';

$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/hdsemmanuelsantana/daily-wp-rocket-cache-clear/',
    __FILE__,
    'daily-wp-rocket-cache-clear'
);
$updateChecker->getVcsApi()->enableReleaseAssets();
?>
