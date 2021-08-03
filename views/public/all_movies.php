<?php
session_start();
require '../../src/connect_db.php';
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
    $results = $db->query("SELECT * FROM movie ORDER BY movie_name");

    foreach ($results as $row) {
        echo '<p><a href="../public/movie_details.php?id='.$row['movie_id'].'">'
        .$row['movie_name'].' ('.$row['release_year'].')</a>';
        if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 'admin'){
            echo ' <a href="../admin/delete_movie.php?id='.$row['movie_id'].'">delete</a>';
        }else {
           echo '</p>';             
        }
    }
    ?>
</body>

</html>