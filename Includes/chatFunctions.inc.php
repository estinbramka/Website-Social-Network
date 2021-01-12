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

function Fetch_user_chat_history($from_user_id, $to_user_id, $conn)
{
    $stmt = $conn->prepare("SELECT * FROM chat_message WHERE (from_user_id = ? AND to_user_id = ?) OR (from_user_id = ? AND to_user_id = ?) ORDER BY timestamp DESC;");
    $stmt->bind_param("ssss", $from_user_id, $to_user_id, $to_user_id, $from_user_id);
    $stmt->execute();
    $resultData = $stmt->get_result();
    $stmt->free_result();
    $stmt->close();

    $output = '<ul class="list-unstyled">';
    while ($row = $resultData->fetch_assoc())
    {
        $user_name = '';
        if($row["from_user_id"] == $from_user_id)
        {
            $user_name = '<b class="text-success">You</b>';
        }
        else
        {
            $user_name = '<b class="text-danger">'.Get_user_name($row['from_user_id'], $conn).'</b>';
        }
        $output .= '
        <li style="border-bottom:1px dotted #ccc">
        <p>'.$user_name.' - '.$row["chat_message"].'
            <div align="right">
            - <small><em>'.$row['timestamp'].'</em></small>
            </div>
        </p>
        </li>
        ';
    }
    $output .= '</ul>';

    $stmt = $conn->prepare("UPDATE chat_message SET status = '0' WHERE from_user_id = ? AND to_user_id = ? AND status = '1';");
    $stmt->bind_param("ss", $to_user_id, $from_user_id);
    $stmt->execute();
    $stmt->free_result();
    $stmt->close();
    
    return $output;
}

function Get_user_name($user_id, $conn)
{
    $stmt = $conn->prepare("SELECT user_firstname, user_lastname FROM users WHERE user_id = ?;");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $resultData = $stmt->get_result();
    $stmt->free_result();
    $stmt->close();
    while ($row = $resultData->fetch_assoc())
    {
        return $row['user_firstname'] . " " . $row['user_lastname'];
    }
}

function Count_unseen_message($from_user_id, $to_user_id, $conn)
{
    $stmt = $conn->prepare("SELECT * FROM chat_message WHERE from_user_id = ? AND to_user_id = ? AND status = '1';");
    $stmt->bind_param("ss", $from_user_id, $to_user_id);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    $stmt->free_result();
    $stmt->close();

    $output = '';
    if($count > 0)
    {
        $output = '<span class="badge badge-pill badge-success" style="position: absolute;right: 30px;top: 11px;">'.$count.'</span>';
    }
    return $output;
}