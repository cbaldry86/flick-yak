<?php
require '../../src/connect_db.php';
$id;
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    require '../errors/404.php';
    exit;
} else {
    $id = $_GET['id'];
}

session_start();
if (!isset($_SESSION['access_level']) || $_SESSION['access_level'] !== 'admin') {
    require '../errors/401.php';
    exit;
}

$title = 'Delete Movie';
$script = '/flick-yak/scripts/main.js';
$css = '/flick-yak/css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';
require '../common/logs.php';

if (isset($id)) {
    $del = $db->prepare("DELETE FROM movie WHERE movie_id = ?");
    $del->execute([$id]);
    $count = $del->rowCount();
}

if ($count > 0){
    update_logs(
        $db,
        $_SERVER['REMOTE_ADDR'],
        "Movie Deleted",
        $_POST['movie_name']."(".$_POST['year'].") deleted by".$_POST['username']
    );
    echo '<h3>Movie deleted successfully!</h3>';
}else{
    echo '<h3>Movie not deleted!</h3>';    
}
echo '<a href="../../index.php">Return home</a>.';

echo '</div></body></html>';
