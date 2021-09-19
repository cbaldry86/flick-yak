<?php
session_start();
$title = 'home';
$script = './scripts/main.js';
$css = './css/main.css';
require_once 'views/common/head.php';
require_once 'views/common/nav.php';
echo '<div><h1>Welcome To Flick Yak</h1>';
echo '<p>Flick Yak is an online community where people like yourself come together to discuss Movies of all genres.</p>';
echo '<p>To begin please start by searching for your favorite movie.</p></div>';
echo '</div></body></html>';