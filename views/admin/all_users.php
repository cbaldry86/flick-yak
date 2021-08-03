<?php
session_start();

if (!isset($_SESSION['access_level']) || !$_SESSION['access_level'] == 'admin') {
    require '../errors/401.php';
    exit;
}

require '../../src/connect_db.php';
// Select details of all forums
$result = $db->query("SELECT * FROM user ORDER BY username");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    require_once '../common/nav.php';
    echo '<h2>User List</h2>';

    // Loop through each forum to generate an option of the drop-down list
    foreach ($result as $row) {
        echo '<p><a href="../member/user_profile.php?id=' . $row['username'] . '">'
            . $row['username'].'</a>';
        echo '</p>';
    }

    ?>
</body>

</html>