<?php
session_start();
if (!isset($_SESSION['access_level']) || !$_SESSION['access_level'] == 'admin'){
    require '../errors/401.php';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="../../scripts/validate_registration.js"></script>
</head>

<body>
    <?php require_once '../common/nav.php' ?>
    <h2>Member Registration</h2>
    <a href="../../index.php">Back Home</a>
    <?php require_once '../forms/add_new_movie_form.php'?>
</body>

</html>