<?php

require_once '../../config.php';
session_start();

$id = $_POST['id'];
$date_updated = date("Y-m-d H:i:s");
if (isset($_SESSION['userid'])) {

    $sql = "UPDATE orders SET status = ?, date_updated= ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);

    $stmt->execute(['Canceled', $date_updated, $id]);
    $error = ['success' => 'Order Canceled'];
        echo json_encode($error);
        exit();
} else {
    header("Location: /4MS/home/"); /* Redirect browser */
}