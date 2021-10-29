<?php
session_start();

if (!isset($_SESSION['access_level']) || $_SESSION['access_level'] !== 'admin') {
    require '../errors/401.php';
    exit;
}

require '../../src/connect_db.php';
// Select details of all forums
$result = $db->query("SELECT * FROM logs ORDER BY log_date DESC LIMIT 10");

$title = 'Logs Movie';
$script = '/flick-yak/scripts/main.js';
$css = '/flick-yak/css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
echo '<h1>Event Log</h1>';

// Loop through each forum to generate an option of the drop-down list
echo '<table>';
foreach ($result as $row) {
    echo '<tr>';
    echo '<td>' . $row['log_date'] . '</td>';
    echo '<td>' . $row['ip_address'] . '</td>';
    echo '<td><b>' . $row['event_type'].'</b> - ';
    echo $row['event_details'] . '</td>';
    echo '</tr>';
}
echo '</table>';

echo '</div></body></html>';