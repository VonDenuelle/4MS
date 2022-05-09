<?php

require_once '../../config.php';
session_start();

$sort = htmlspecialchars($_POST['sort']);
$sortCleaned = '';

if ($sort == 'DESC'){
    $sortCleaned = 'DESC';
}else {
    $sortCleaned = 'ASC';
}
if (isset($_SESSION['userid'])) {
    
    $sql = 'SELECT 
    i.name as itemname,
    i.description as description,
    i.image as image,
    i.stock as stock,
    o.quantity,
    o.date_added,
    o.status,
    o.address,
    o.total_price as price
    FROM orders o
    LEFT JOIN items i on o.itemid = i.id 
    WHERE o.userid = ? '.
    'AND o.status = "Pending" ORDER BY o.date_added '. $sortCleaned;

    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_SESSION['userid']]);

    $rowcount=$stmt->rowCount();

    if ($rowcount > 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        exit();
    } else {
        $error = ["noorders" => "No Orders with this status yet"];
        echo json_encode($error);
        exit();
    }
} else {
    header("Location: /4MS"); /* Redirect browser */
}