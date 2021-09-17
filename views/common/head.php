<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('Location: ../errors/404.php');
    exit();
};

echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Craig Baldry, 10494962">
    <meta name="description" content="Movie Forum">
    <script src="' . $script . '"></script>
    <link rel="stylesheet" href="'.$css.'">
    <title>' . $title . '</title>
</head>

<body>';
