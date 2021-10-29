<?php
session_start();
require '../../src/connect_db.php';
require 'logs.php';
update_logs(
    $db,
    $_SERVER['REMOTE_ADDR'],
    "Logout",
    $_SESSION['username'] . " logged out"
);
session_unset();
session_destroy();
header('Location: ../../index.php');
