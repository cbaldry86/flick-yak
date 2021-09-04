<?php
session_start();
require '../../src/connect_db.php';
$id;
$is_post_Message_empty = false;
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    echo 'Invalid movie ID.';
    exit;
}else {
    $id = $_GET['id'];
}

if (isset($_POST['rate_submit'])) {
    //check if user has rating
    $stmt = $db->prepare("SELECT * FROM rating WHERE movie_id= ? AND username= ?");
    $stmt->execute([$id, $_SESSION['username']]);
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
        $stmt = $db->prepare("INSERT INTO discussion(movie_id, username, content) VALUES (?,?,?)");
        $stmt->execute([$id, $_SESSION['username'], $_POST['post_message']]);
    } else {
        header('Location: movie_details.php?id=' . $id);
        echo "<script type=\"text/javascript\">"
            . "window.alert('Discussion should not be empty.');"
            . "</script>";
    }
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

$title = 'Movie Details';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';

echo '<div class="rating-container">';
echo '<h1>' . $movie['movie_name'] . ' (' . $movie['release_year'] . ')</h1>';
echo '<table></tbody>';
echo '<tr><th>Director:</th><td>' . $movie['director'] . '</td></tr>';
echo '<tr><th>Writers:</th><td>' . $movie['writers'] . '</td></tr>';
echo '<tr><th>Duration:</th><td>' . $movie['duration'] . ' minutes</td></tr>';
echo '<tr><th>Plot Summary:</th><td>' . $movie['summary'] . '</td></tr></tbody></table>';
echo '<h2>Member Rating</h2><p>Average Rating: <b>' . number_format($rating['average_rating'], 1, '.', ',') . '</b></p>';

if (isset($_SESSION['username'])) {
    require_once '../forms/rating_form.php';
}
echo "<table><tbody>";
foreach ($discussion as $row) {
    echo '<tr><td><b>' . date("d/m/Y g:ia", strtotime($row['post_date']));

    if (isset($_SESSION['username'])) {
        echo ' <a href="../member/user_profile.php?id=' . $row['username'] . '">('
            . $row['username'] . ')</a>';
    } else {
        echo ' ' . $row['username'] . ' </b>';
    }

    echo '<p>' . $row['content'] . '</p></td></tr>';
}
echo "</tbody></table>";

if (isset($_SESSION['username'])) {
    require_once '../forms/discussion_form.php';
}

echo '</div></div></body></html>';