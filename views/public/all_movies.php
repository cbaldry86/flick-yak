<?php
session_start();
require '../../src/connect_db.php';
$results = $db->query("SELECT * FROM movie ORDER BY movie_name");

$title = 'All Movies';
$script = '/flick-yak/scripts/main.js';
$css = '/flick-yak/css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';

echo '<h1>Search Results</h1>';
if ($results -> rowCount() > 0) {

foreach ($results as $row) {
    echo '<p><a href="../public/movie_details.php?id=' . $row['movie_id'] . '">'
        . $row['movie_name'] . ' (' . $row['release_year'] . ')</a>';
    if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 'admin') {
        echo ' <a onclick="return confirmDelete();" href="../admin/delete_movie.php?id=' . $row['movie_id'] . '">delete</a>';
    } else {
        echo '</p>';
    }
}
}else {
    echo 'No Movies';
}
echo '</div></body></html>';
