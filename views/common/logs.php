<?php

function update_logs(PDO $db, $ip, $event_type, $event_details)
{
    $sql = "INSERT INTO `logs`(
        `ip_address`,
        `event_type`,
        `event_details`
    ) VALUES (?,?,?)";

    $stmt = $db->prepare($sql);
    $stmt->execute([$ip, $event_type, $event_details]);
    $count = $stmt->rowCount();
    return $count > 0;
};
