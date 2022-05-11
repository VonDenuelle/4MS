<?php
require_once '../../config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
session_start();

if (isset($_SESSION['adminid'])) {
  # code...

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$date_added = date("Y-m-d H:i:s");

$sql = "SELECT name FROM items WHERE name=?"; //checks if name is taken
$stmt = $dbh->prepare($sql);

$stmt->execute([$name]);
$rowCount = $stmt->rowCount(); //get row count

if ($rowCount > 0) {
    $error = ['itemexisting' => 'Item is already existing'];
    echo 'itemexisting';
    exit();
} else {
  if($_FILES["file"]["name"])
  {
    $file = $_FILES["file"]["name"];
     $location = '../../../images/flowers/' . $file;
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);

     $query = "INSERT INTO items (name, description, image, price, stock, date_added) VALUES (?,?,?,?,?,?)";
     $stmt = $dbh->prepare($query);
     $stmt->execute([$name, $description, $file, $price, $stock, $date_added]);
     $error = ['success' => 'success'];
    echo json_encode($error);
     exit();
  } else {
    header("Location: /4ms"); /* Redirect browser */
  }
}
 

}
