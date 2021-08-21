<?php
session_start();
if (!isset($_SESSION['access_level']) || !$_SESSION['access_level'] == 'admin') {
    require '../errors/401.php';
    exit;
}

$title = 'All Movies';
$script = '../../scripts/main.js';
require_once '../common/head.php';
require_once '../common/nav.php';

echo    '<h2>Add New Movie</h2><a href="../../index.php">Back Home</a>';
require_once '../forms/add_new_movie_form.php';
echo '</body></html>';