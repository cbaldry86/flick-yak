<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized</title>
</head>

<body>
    <?php require_once '../common/nav.php'?>
    <div>
        <h1>401 Unauthorized</h1>
        <p>Access is denied due to invalid credentials.</p>
        <?php  echo '<a href="'.$root_dir.'">Return home</a>.';?>
       
    </div>

</body>

</html>