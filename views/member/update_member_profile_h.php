<?php
session_start();

if (!isset($_SESSION['access_level'])) {
    require '../errors/401.php';
    exit;
}

$title = 'Update Profile';
$script = '/flick-yak/scripts/main.js';
$css = '/flick-yak/css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';

if (isset($_POST['submit'])) {

    $errorMessages = [];

    if (strlen($_POST['pass']) < 5) {
        $errorMessages[] = 'Password must be at least 6 characters long.';
    }

    if ($_POST['pass'] != $_POST['confirm_pass']) {
        $errorMessages[] = 'Password does not match confirmation.';
    }

    if (strlen($_POST['real_name']) > 100) {
        $errorMessages[] = 'Real name is too long. A maximum of 100 characters.';
    }

    $sanitized_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (empty($_POST['email'] && $sanitized_email == $_POST['email'])) {
        $errorMessages[] = 'Email is not a valid email address';
    }

    if (strlen($_POST['email']) > 40) {
        $errorMessages[] = 'Email is too long. A maximum of 40 characters allowed';
    }

    if ($errorMessages) {
        echo '<h1>Failed to validate data</h1><p> Please review the following:</p>';
        foreach ($errorMessages as $item) {
            echo '<p>' . $item . '</p>';
        }

        echo '<a href="javascript: window.history.back()">Return to form</a>';
    } else {
        require '../../src/connect_db.php';

        $stmt = $db->prepare("UPDATE user SET real_name= ?, email=?, password=? WHERE username =  ?");
        $success = $stmt->execute([$_POST['real_name'], $_POST['email'], $_POST['pass'], $_SESSION['username']]);
        $results = $stmt->fetch();

        echo '<h3>Form Submitted successfully!</h3>';
    }
} else {
    echo 'Please submit the <a href="update_member_profile.php">form</a>.';
}
echo '</div></body></html>';
