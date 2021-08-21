<?php
session_start();
$title = 'home';
$script = './scripts/main.js';
require_once 'views/common/head.php';
require_once 'views/common/nav.php';
echo '<div><h1>Welcome</h1><p>home page..</p></div>';
echo '</body></html>';
