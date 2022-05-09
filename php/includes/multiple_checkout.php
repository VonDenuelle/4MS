<?php
//  in cart
require_once '../config.php';
session_start();

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $itemid = $_POST['itemid'];
    $address = $_POST['address'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];
    $date_added = date("Y-m-d H:i:s");

    $sql = "INSERT INTO orders (userid, itemid, address, date_added, quantity, total_price) VALUES (?,?,?,?,?,?)";
    $stmt = $dbh->prepare($sql);

    $stmt->execute([$userid, $itemid, $address, $date_added,$quantity , $total_price]);
    $error = ['success' => 'success'];
        echo json_encode($error);
        exit();

} else {
    header("Location: /4MS/home/"); /* Redirect browser */
}
