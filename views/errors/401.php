<?php
session_start();
$title = 'New Movie';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
echo '<div>
        <h1>401 Unauthorized</h1>
        <p>Access is denied due to invalid credentials.</p>
        <a href="' . $root_dir . '">Return home</a>
    </div>';
echo '</div></body></html>';
