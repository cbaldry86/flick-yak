<?php
session_start();

if (!isset($_SESSION['access_level'])) {
    require '../errors/401.php';
    exit;
}
require 'db_connect.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    echo 'Invalid User ID.';
    exit;
}

// Select details of specified thread
// Since the user could tamper with the URL data, a prepared statement is used
$stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
$stmt->execute([$_GET['id']]);
$user = $stmt->fetch();

if (!$user) { // If no data (no thread with that ID in the database)
    echo 'Invalid User ID.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>
    <?php

    require_once '../common/nav.php';
    echo '<h2>Details of "'.$user['username'].'"</h2>';

    // Loop through each forum to generate an option of the drop-down list

    echo '<p><a href="../member/user_profile.php?id=' . $row['username'] . '">'
        . $row['username'] . '</a>';
    echo '</p>';


    ?>

    <table>
        <tr><th>Real Name:</th><td>.$user['real_name'].</td></tr>
        <tr><th>Email Address:</th><td>.$user['real_name'].</td></tr>
        <tr><th>Year of Birth:</th><td>.$user['real_name'].</td></tr>
        <tr><th>Access Level:</th><td>.$user['real_name'].</td></tr>
    </table>
</body>

</html>