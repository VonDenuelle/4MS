<?php

require_once '../../config.php';
session_start();

$id = $_POST['id'];
$stock = $_POST['stock'];
$quantity = $_POST['quantity'];
$itemid = $_POST['itemid'];
$eta = $_POST['eta'];
$date_updated = date("Y-m-d H:i:s");
if (isset($_SESSION['adminid'])) {

    // set status of order
    $sql = "UPDATE orders SET status = ?, date_updated= ?, ETA = ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);

    if ($stmt->execute(['To Receive', $date_updated, $eta ,$id])) {
        // update stock from items 
        $updatedStock = (int) $stock - (int) $quantity;

        $sql = "UPDATE items SET stock = ? WHERE id = ?";
        $stmt = $dbh->prepare($sql);

        if ($stmt->execute([$updatedStock, $itemid])) {

            $error = ['success' => 'To Receive'];
            echo json_encode($error);
            exit();
        }
    }
} else {
    header("Location: /4MS"); /* Redirect browser */
}
