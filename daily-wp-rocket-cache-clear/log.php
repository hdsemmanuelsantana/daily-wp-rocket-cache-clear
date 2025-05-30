<?php
// Daily WP Rocket Cache Clear – Log Handler

/**
 * Adds a new entry to the cache clear log.
 *
 * @param string $type 'manual' or 'scheduled'
 * @param int|string $user_id User ID or 'system'
 */
function dwpr_log_cache_clear($type, $user_id) {
    $log = get_option('_dwpr_cache_log', []);
    
    $log[] = [
        'time' => current_time('timestamp'),
        'type' => $type,
        'user' => $user_id,
    ];

    // Keep only the last 20 entries
    if (count($log) > 20) {
        $log = array_slice($log, -20);
    }

    update_option('_dwpr_cache_log', $log);
}
