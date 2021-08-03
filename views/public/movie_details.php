<?php
session_start();
require '../../src/connect_db.php';
$id;
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    echo 'Invalid movie ID.';
    exit;
}

if (isset($_POST['rate_submit'])) {
    //check if user has rating
    $id = $_POST['movie_id'];
    $stmt = $db->prepare("SELECT * FROM rating WHERE movie_id= ? AND username= ?");
    $stmt->execute([$id]);
    $rating = $stmt->fetch();
    if ($rating) {
        $stmt = $db->prepare("UPDATE rating SET rating=? WHERE movie_id= ? AND username= ?");
        $stmt->execute([$_POST['rating'], $id, $_SESSION['username']]);
    } else {
        $stmt = $db->prepare("INSERT INTO rating(movie_id, username, rating) VALUES (?,?,?)");
        $stmt->execute([$id, $_SESSION['username'], $_POST['rating']]);
    }
}

if (isset($_POST['discussion_submit'])) {
    //check if empty
    if (!empty($_POST['post_message'])) {
        //insert into discussion table with user and movie id
        $id = $_POST['movie_id'];
    } else {
        echo "<script type=\"text/javascript\">"
            . "window.alert('Discussion should not be empty.');"
            . "</script>";
        header('Location: movie_details.php?id=' . $_POST['movie_id']);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($id)) {
    $stmt = $db->prepare("SELECT * FROM movie WHERE movie_id = ?");
    $stmt->execute([$id]);
    $movie = $stmt->fetch();

    $stmt = $db->prepare("SELECT AVG(rating) AS 'average_rating' FROM rating WHERE movie_id = ?");
    $stmt->execute([$id]);
    $rating = $stmt->fetch();

    $stmt = $db->prepare("SELECT * FROM discussion WHERE movie_id = ? ORDER BY post_date DESC");
    $stmt->execute([$id]);
    $discussion = $stmt->fetchAll();
} else {
    echo 'Invalid movie ID.';
    exit;
}

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

    echo '<div>';
    echo '<h1>' . $movie['movie_name'] . ' (' . $movie['release_year'] . ')</h1>';
    echo '<table>';
    echo '<tr><th>Director:</th><td>' . $movie['director'] . '</td></tr>';
    echo '<tr><th>Writers:</th><td>' . $movie['writers'] . '</td></tr>';
    echo '<tr><th>Duration:</th><td>' . $movie['duration'] . ' minutes</td></tr>';
    echo '<tr><th>Plot Summary:</th><td>' . $movie['summary'] . '</td></tr></table>';
    echo '<h2>Member Rating</h2><p>Average Rating: <b>' . number_format($rating['average_rating'], 1, '.', ',') . '</b></p>';

    if (isset($_SESSION['username'])) {
        require_once '../forms/rating_form.php';
    }

    foreach ($discussion as $row) {
        echo '<table><tr><td><p> <b>' . date("d/m/Y g:ia", strtotime($row['post_date']));

        if (isset($_SESSION['username'])) {
            echo '<p><a href="../member/user_profile.php?id=' . $row['username'] . '">'
                . $row['username'] . ')</a>';
        } else {
            echo ' ' . $row['username'] . ' </b> </p>';
        }

        echo '<p>' . $row['content'] . '</p></td></tr></table></div>';
    }

    if (isset($_SESSION['username'])) {
        require_once '../forms/discussion_form.php';
    }
    ?>
</body>

</html>