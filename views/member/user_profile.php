<?php
session_start();

if (!isset($_SESSION['access_level']) ||
 !($_SESSION['access_level'] == 'admin' || $_SESSION['access_level'] == 'member')) {
    require '../errors/401.php';
    exit;
}

require '../../src/connect_db.php';

if (!isset($_GET['id'])) {
    echo 'Invalid User ID.';
    exit;
}

$stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
$stmt->execute([$_GET['id']]);
$user = $stmt->fetch();

if (!$user) { 
    echo 'Invalid User ID.';
    exit;
}

$title = 'Profile';
$script = '/flick-yak/scripts/main.js';
$css = '/flick-yak/css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
echo '<h1>Details of "' . $user['username'] . '"</h1>';
echo '<img src="../images/'.$user['profile_image'].'" width="200" >';
echo '<table><tbody>';
echo '<tr><th>Real Name:</th><td>' . $user['real_name'] . '</td></tr>';
echo '<tr><th>Email Address:</th><td>' . $user['email'] . '</td></tr>';
echo '<tr><th>Year of Birth:</th><td>' . $user['dob'] . '</td></tr>'; //TODO: Show Year
echo '<tr><th>Access Level:</th><td>' . $user['access_level'] . '</td></tr>';
echo '</tbody></table>';

echo '</div></body></html>';
