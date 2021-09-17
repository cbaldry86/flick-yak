<?php
session_start();

if (!isset($_SESSION['access_level']) ||
 !($_SESSION['access_level'] == 'admin' || $_SESSION['access_level'] == 'member')) {
    require '../errors/401.php';
    exit;
}

$title = 'Update Profile';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
echo    '<h2>Update Profile</h2>';
require_once '../forms/update_profile_form.php';
echo '</div></body></html>';
