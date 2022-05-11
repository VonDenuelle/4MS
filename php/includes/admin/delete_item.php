<?php
require_once '../../config.php';


if (isset($_POST['itemid']) && isset($_POST['image'])) {
    $sql = "DELETE FROM items WHERE id = ?";
    $stmt = $dbh->prepare($sql);

    $path = "../../../images/flowers/".$_POST['image'];
    
    if ($stmt->execute([$_POST['itemid']]) && unlink($path)) {
        $error = ["success" => "success"];
        echo json_encode($error);

        exit();
    }else{
        $error = ["cantdelete" => "Unable to delete item"];
        echo json_encode($error);


        exit();
    }
} else {
    header("Location: /4ms"); /* Redirect browser */
}
