<?php

require_once '../config.php';
session_start();

$address = $_POST['address'];

if (isset($_SESSION['userid'])) {

    $sql = "UPDATE users SET address1 = ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);

    $stmt->execute([$address, $_SESSION['userid']]);
    $error = ['success' => $address];
        echo json_encode($error);
        exit();
} else {
    header("Location: /4MS/home/"); /* Redirect browser */
}