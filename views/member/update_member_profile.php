<?php
session_start();

if (!isset($_SESSION['access_level']))  {
    require '../errors/401.php';
    exit;
}

$title = 'Update Profile';
$script = '/flick-yak/scripts/main.js';
$css = '/flick-yak/css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
echo    '<h1>Update Profile</h1>';
require_once '../forms/update_profile_form.php';
echo '</div></body></html>';
