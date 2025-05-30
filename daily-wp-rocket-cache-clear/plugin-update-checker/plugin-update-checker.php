<?php
/**
 * Plugin Update Checker Library (v4)
 * 
 * https://github.com/YahnisElsts/plugin-update-checker
 */

require_once dirname(__FILE__) . '/Puc/v4p10/Factory.php';

if (function_exists('Puc_v4_Factory::addSource')) {
    // Optional: You can register this PUC source globally for convenience.
    Puc_v4_Factory::addSource(__FILE__);
}
