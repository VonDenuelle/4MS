<?php
require_once '../config.php';
session_start();
if (isset($_GET['itemid'])){
    $sql  = 'SELECT * FROM cart WHERE itemid = '. $_GET['itemid'] .' AND userid = '. $_SESSION['userid'];
        $query = $dbh -> query($sql);
        $rowCount = $query -> rowCount();

    if ($rowCount > 0) {
        /* if item is present then instead of adding item, add quantity instead */


        // get present quantity value then add 1
        $sql  = 'SELECT quantity FROM cart WHERE itemid = '. $_GET['itemid'] .' AND userid = '. $_SESSION['userid'];
        $query = $dbh -> query($sql);
        $result = $query -> fetch();

        $quantity = (int) $result['quantity']  + 1;
        
        $sql = 'UPDATE cart SET quantity = ? WHERE itemid = ? AND userid = ?';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$quantity,  $_GET['itemid'], $_SESSION['userid']]);

        $error = ["itemcartstatus" => "Item is already present"];
        echo json_encode($error);
        exit();
    } else{
        $error = ["itemcartstatus" => "Item is not yet present"];
        echo json_encode($error);
        exit();
    }
} else {
    header("Location: /4MS"); /* Redirect browser */
}
