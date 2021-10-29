<?php
if (isset($_POST['login_submit'])) {
    require '../../src/connect_db.php';
    require 'logs.php';

    $stmt = $db->prepare("SELECT username, access_level, password FROM user WHERE username = ?");
    $success = $stmt->execute([$_POST['username_login']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['pass_login'], $user['password'])) {
        session_start();
        // Set session variables
        $_SESSION["username"] = $user['username'];
        $_SESSION["access_level"] = $user['access_level'];
        update_logs(
            $db,
            $_SERVER['REMOTE_ADDR'],
            "Login",
            $_POST['username'] . " logged in"
        );
        header('Location: ../../index.php');
    } else {
        update_logs(
            $db,
            $_SERVER['REMOTE_ADDR'],
            "Login Attempt",
            "Failed login attempt with username of " . $_POST['username']
        );
        $title = 'Login';
        $script = '../../scripts/main.js';
        $css = '../../css/main.css';
        require_once 'head.php';
        require_once 'nav.php';
        echo '<h3>Failed To Sign In</h3>';
        echo '<p>Username or password was wrong please try again </p>';
        echo '</div></body></html>';
    }
} else {
    header('Location: ../../index.php');
}
