<?php
session_start();

if (!isset($_SESSION['access_level'])) {
    require '../errors/401.php';
    exit;
}
require '../../src/connect_db.php';

if (!isset($_GET['id'])) {
    echo 'Invalid User ID.';
    exit;
}

// Select details of specified thread
// Since the user could tamper with the URL data, a prepared statement is used
$stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
$stmt->execute([$_GET['id']]);
$user = $stmt->fetch();

if (!$user) { // If no data (no thread with that ID in the database)
    echo 'Invalid User ID.';
    exit;
}

$title = 'Profile';
$script = '../../scripts/main.js';
require_once '../common/head.php';
require_once '../common/nav.php';
echo '<h2>Details of "' . $user['username'] . '"</h2>';

echo '<table>';
echo '<tr><th>Real Name:</th><td>' . $user['real_name'] . '</td></tr>';
echo '<tr><th>Email Address:</th><td>' . $user['email'] . '</td></tr>';
echo '<tr><th>Year of Birth:</th><td>' . $user['dob'] . '</td></tr>'; //TODO: Show Year
echo '<tr><th>Access Level:</th><td>' . $user['real_name'] . '</td></tr>';
echo '</table>';

echo '</body></html>';
