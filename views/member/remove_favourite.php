<?php
session_start();
if (!isset($_SESSION['access_level'])) {
    http_response_code(401);
    require '../errors/401.php';
    exit;
} else {
    if (isset($_POST['u_id'])) {
        require '../../src/connect_db.php';

        $stmt = $db->prepare("UPDATE user SET fav_movie_id= NULL WHERE username = ?");
        $stmt->execute([$_POST['u_id']]);
        $count = $stmt->rowCount();

        if ($count > 0) {
            http_response_code();
        } else {
            http_response_code(500);
        }
    } else {
        http_response_code(404);
    }
}
