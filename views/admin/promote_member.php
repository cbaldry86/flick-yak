<?php
session_start();
if (!isset($_SESSION['access_level']) || $_SESSION['access_level'] !== 'admin') {
    http_response_code(401);
    require '../errors/401.php';
    exit;
} else {
    if (isset($_POST['u_id'])) {
        require '../../src/connect_db.php';
        require '../common/logs.php';
        $stmt = $db->prepare("UPDATE user SET access_level = 'admin' WHERE username = ?");
        $stmt->execute([$_POST['u_id']]);
        $count = $stmt->rowCount();

        if ($count > 0) {
            update_logs(
                $db,
                $_SERVER['REMOTE_ADDR'],
                "Access Level Changed",
                $_SESSION['username'] . " changed access level of " . $_POST['u_id'] . " to admin"
            );
            echo 'Success';
        } else {
            http_response_code(500);
        }
    } else {
        http_response_code(404);
    }
}
