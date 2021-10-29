<?php
session_start();
if (!isset($_SESSION['access_level'])) {
    http_response_code(401);
    require '../errors/401.php';
    exit;
} else {
    if (isset($_POST['u_id']) && isset($_POST['m_id'])) {
        require '../../src/connect_db.php';

        $stmt = $db->prepare("UPDATE user SET fav_movie_id= ? WHERE username = ?");
        $stmt->execute([$_POST['m_id'], $_POST['u_id']]);
        $count = $stmt->rowCount();

        if ($count > 0) {
            echo 'Success';
        } else {
            http_response_code(500);
        }
    } else {
        http_response_code(404);
    }
}
