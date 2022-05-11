<?php

require '../../php/config.php';
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Daily Sales</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="../../css/admin/sidenav.css">

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   </head>

   <body>
<!-- SIDE NAV -->
<?php include_once '../../php/global/sidenavtb_page.php'; ?>
      <div class="container-fluid" style="width: calc(100% - 250px); margin-left: 250px;">
			<div class="row flex-nowrap">
				
				
				<!-- 2ND COL -->
				<div class="col">
               
					<h1>Sample Print</h1><hr>
               <?php
                  $query = "SELECT * FROM items";
                  $data = $dbh->query($query);
               ?>
               <table class="table table-hover">
                  <thead>
                  
                     <tr>
                        <th scope="col">Id</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">image</th>
                        <th scope="col">price</th>
                        <th scope="col">stock</th>
                        <th scope="col">date_added</th>
                     </tr>
                  </thead>

                  <tbody>
                  <?php foreach($data as $row)
                  {
                  ?> 
                  <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['description']; ?></td>
                     <td><?php echo $row['image']; ?></td>
                     <td><?php echo $row['price']; ?></td>
                     <td><?php echo $row['stock']; ?></td>
                     <td><?php echo $row['date_added']; ?></td>
                  </tr>
                  <?php
                  }
                  ?> 
                  </tbody>
               </table>
               <div class="text-center">
                  <a href="print.php" class="btn btn-primary">Print</a>
               </div>
				</div>
			</div>
		</div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>