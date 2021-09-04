<?php
session_start();

if (!isset($_SESSION['access_level']) || !$_SESSION['access_level'] == 'admin') {
    require '../errors/401.php';
    exit;
}

require '../../src/connect_db.php';
// Select details of all forums
$result = $db->query("SELECT * FROM user ORDER BY username");

$title = 'New Movie';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
require_once '../common/nav.php';
echo '<h2>User List</h2>';

// Loop through each forum to generate an option of the drop-down list
foreach ($result as $row) {
    echo '<p><a href="../member/user_profile.php?id=' . $row['username'] . '">'
        . $row['username'] . '</a>';
    echo '</p>';
}

echo '</div></body></html>';
