<?php

function Fetch_user_last_activity($user_id, $conn)
{
    $stmt = $conn->prepare("SELECT * FROM login_details WHERE user_id = ? ORDER BY last_activity DESC LIMIT 1;");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $resultData = $stmt->get_result();
    $stmt->free_result();
    $stmt->close();

    while ($row = $resultData->fetch_assoc())
    {
        return $row['last_activity'];
    }
}
