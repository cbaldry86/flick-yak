<?php
session_start();
$title = 'Update Profile';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
echo    '<h2>Update Profile</h2>';
require_once '../forms/update_profile_form.php';
echo '</div></body></html>';
