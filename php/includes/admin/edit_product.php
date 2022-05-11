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
    $itemid = $_POST['itemid'];
    $image = $_POST['myimage'];
    $date_added = date("Y-m-d H:i:s");


    // name based on id = original
    $sql = "SELECT name FROM items WHERE id=?"; //checks if name is taken
    $stmt = $dbh->prepare($sql);

    $stmt->execute([$itemid]);
    $id = $stmt->fetch();



  //name base on what was typed
    $sql = "SELECT name FROM items WHERE name=?"; //checks if name is taken
    $stmt = $dbh->prepare($sql);

    $stmt->execute([$name]);
    $row = $stmt->fetch();
    $rowCount = $stmt->rowCount(); //get row count

    if ($rowCount > 0 ) {
      if ($row['name'] == $id['name']) { // if same name with previous proceed
        if ($_FILES["file"]["name"]) {
          // delete image first 
          // $path = "../../../images/flowers/" . $image;
          // unlink($path);
  
  
          // add new upadted image file
          $file = $_FILES["file"]["name"];
          $location = '../../../images/flowers/' . $file;
          move_uploaded_file($_FILES["file"]["tmp_name"], $location);
  
          $query = "UPDATE items SET name =? , description= ?, image=?, price=?, stock=?, date_added=? WHERE id = ?";
  
          $stmt = $dbh->prepare($query);
          $stmt->execute([$name, $description, $file, $price, $stock, $date_added, $itemid]);
          exit();
        } else {
          header("Location: /4ms"); /* Redirect browser */
        }
      } else { 
        echo 'itemexisting';
        exit();
      }
    }  else{  // no same name proceed
      if ($_FILES["file"]["name"]) {
        // delete image first 
        // $path = "../../../images/flowers/" . $image;
        // unlink($path);


        // add new upadted image file
        $file = $_FILES["file"]["name"];
        $location = '../../../images/flowers/' . $file;
        move_uploaded_file($_FILES["file"]["tmp_name"], $location);

        $query = "UPDATE items SET name =? , description= ?, image=?, price=?, stock=?, date_added=? WHERE id = ?";

        $stmt = $dbh->prepare($query);
        $stmt->execute([$name, $description, $file, $price, $stock, $date_added, $itemid]);
        exit();
      } else {
        header("Location: /4ms"); /* Redirect browser */
      }
    }

  
}
