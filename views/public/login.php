<?php
    if (isset($_POST['login_submit'])) {
        require '../../src/connect_db.php';

        $stmt = $db->prepare("SELECT username, access_level FROM user WHERE username = ? AND password = ?");
        $success = $stmt->execute([$_POST['username_login'], $_POST['pass_login']]);
        $user = $stmt->fetch();

        if (!$user){
            echo '<h3>Failed To Sign In</h3>';
            echo '<p>Username or password was wrong please try again </p>';
            echo '<a href="javascript: window.history.back()">Return to form</a>';
        }else{
            session_start();
            // Set session variables
            $_SESSION["username"] = $user['username'];
            $_SESSION["access_level"] = $user['access_level'];
            header('Location: ../../../index.php');
        }
    }
?>