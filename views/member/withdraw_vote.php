<?php
session_start();
if (!isset($_SESSION['access_level'])) {
    http_response_code(401);
    require '../errors/401.php';
    exit;
} else {    
    if (isset($_POST['d_id']) && isset($_POST['u_id'])) {
        require '../../src/connect_db.php';

        $stmt = $db->prepare("DELETE FROM upvotes WHERE discussion_id = ? AND username = ?");
        $stmt->execute([$_POST['d_id'], $_POST['u_id']]);
        $count = $stmt->rowCount();

        if ($count > 0) {
            echo 'Success';
        } else {
            http_response_code(400);
        }
    } else {
        http_response_code(404);
    }
}
