<?php
session_start();
if (!isset($_SESSION['access_level']) || $_SESSION['access_level'] !== 'admin') {
    http_response_code(401);
    require '../errors/401.php';
    exit;
} else {
    if (isset($_POST['u_id'])) {
        require '../../src/connect_db.php';

        $stmt = $db->prepare("UPDATE user SET access_level = 'admin' WHERE username = ?");
        $stmt->execute([$_POST['u_id']]);
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
