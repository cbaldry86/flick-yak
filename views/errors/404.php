<?php
session_start();
$title = 'New Movie';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
echo '<div>
        <h1>404 Not Found</h1>
        <p>Couldn\'t find what you were looking for sorry!</p>
        <a href="' . $root_dir . '">Return home</a>
    </div>';
echo '</div></body></html>';
