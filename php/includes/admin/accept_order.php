<?php

require_once '../../config.php';
session_start();

$id = $_POST['id'];
$date_updated = date("Y-m-d H:i:s");
if (isset($_SESSION['adminid'])) {

    $sql = "UPDATE orders SET status = ?, date_updated= ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);

    $stmt->execute(['To Receive', $date_updated, $id]);
    $error = ['success' => 'To Receive'];
        echo json_encode($error);
        exit();
} else {
    header("Location: /4MS"); /* Redirect browser */
}