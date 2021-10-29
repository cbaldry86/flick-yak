<?php
session_start();
if (!isset($_SESSION['access_level']) || $_SESSION['access_level'] !== 'admin') {
    http_response_code(401);
    require '../errors/401.php';
    exit;
} else {
    if (isset($_POST['u_id'])) {
        require '../../src/connect_db.php';

        //Validate as it is possible to bypass frontend
        $admin_sql = "SELECT 
            COUNT(*) AS total_admins
        FROM
            user
        WHERE
            access_level = 'admin'";

        $stmt = $db->query($admin_sql);
        $admins = $stmt->fetch();

        if ($admins <= 1) {
            http_response_code(400);
            echo 'Need more than 1 Admin user';
            exit;
        }

        $stmt = $db->prepare("UPDATE user SET access_level = 'member' WHERE username = ?");
        $stmt->execute([$_POST['u_id']]);
        $count = $stmt->rowCount();

        if ($count > 0) {
            //Use case: if user is the admin in context to demote then update session level to member
            if ($_POST['u_id'] == $_SESSION['username']) {
                $_SESSION['access_level'] = 'member';
            }
            echo 'success';
            exit;
        } else {
            http_response_code(500);
            echo 'failed to update';
            exit;
        }
    } else {
        http_response_code(404);
        echo 'not found';
        exit;
    }
}
