<?php
session_start();
$title = 'Update Profile';
$script = '../../scripts/main.js';
require_once '../common/head.php';
require_once '../common/nav.php';
echo    '<h2>Update Profile</h2>';
require_once '../forms/update_profile_form.php';
echo '</body></html>';
