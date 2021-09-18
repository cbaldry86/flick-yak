<?php
session_start();
if (!isset($_SESSION['access_level']) || !$_SESSION['access_level'] == 'admin') {
    require '../errors/401.php';
    exit;
}

$title = 'All Movies';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
echo    '<h1>Add New Movie</h1>';
require_once '../forms/add_new_movie_form.php';
echo '</div></body></html>';
