<?php
session_start();
require '../../src/connect_db.php';
$title = 'Search Movies';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';

if (isset($_GET['search_movies'])) {
        $search_value = '%' . $_GET['search_movies'] . '%';
        $stmt = $db->prepare("SELECT * FROM movie WHERE movie_name LIKE ? ORDER BY movie_name");
        $stmt->execute([$search_value]);
        $results = $stmt->fetchAll();        
    if (count($results) > 0){
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
    }else{
      echo '<h2>Found Nothing</h2>';
      echo '<p>We searched really hard to find what you were looking for and found nothing.';
    }
}
echo '</div></body></html>';
