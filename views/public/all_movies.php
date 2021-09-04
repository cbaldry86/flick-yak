<?php
session_start();
require '../../src/connect_db.php';
$results = $db->query("SELECT * FROM movie ORDER BY movie_name");

$title = 'All Movies';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';

echo '<h2>Search Results</h2>';
foreach ($results as $row) {
    echo '<p><a href="../public/movie_details.php?id=' . $row['movie_id'] . '">'
        . $row['movie_name'] . ' (' . $row['release_year'] . ')</a>';
    if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 'admin') {
        echo ' <a href="../admin/delete_movie.php?id=' . $row['movie_id'] . '">delete</a>';
    } else {
        echo '</p>';
    }
}
echo '</div></body></html>';
