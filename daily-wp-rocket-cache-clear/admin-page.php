<?php
// Daily WP Rocket Cache Clear - Admin Log Page

if (!current_user_can('manage_options')) {
    return;
}

$log = get_option('_dwpr_cache_log', []);
$log = array_reverse($log); // Show most recent first

?>

<div class="wrap">
    <h1>Cache Clear History</h1>
    <p>This log displays the last 20 cache clear events — whether triggered automatically or manually.</p>

    <?php if (empty($log)) : ?>
        <p>No log entries found.</p>
    <?php else : ?>
        <table class="widefat fixed striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Triggered By</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($log as $entry) : ?>
                    <tr>
                        <td><?php echo esc_html(date('F j, Y g:i A', $entry['time'])); ?></td>
                        <td><?php echo esc_html(ucfirst($entry['type'])); ?></td>
                        <td>
                            <?php
                            if ($entry['user'] === 'system') {
                                echo 'System (Scheduled)';
                            } else {
                                $user = get_userdata($entry['user']);
                                echo $user ? esc_html($user->user_login) : 'Unknown User';
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
