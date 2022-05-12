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
      <link rel="stylesheet" href="../../css/admin/print.css" media=print>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   </head>

   <body>

      <div class="container-fluid">
			<div class="row flex-nowrap">
				<!-- 2ND COL -->
				<div class="col">
               
					<h1>Print Sales Today</h1><hr>
               <?php
               date_default_timezone_set('Asia/Manila');
               $dateToday = date("F j, Y");
               $dateQuery = date('Y-m-d');

                  $query = 'SELECT 
				  o.quantity,
				  o.date_updated,
				  o.date_of_day,
				  o.total_price as total_price
				  FROM orders o
				  WHERE o.status = "Finished" AND o.date_of_day = "'. $dateQuery.'" ORDER BY o.date_updated DESC';

                  $data = $dbh->query($query);

                    $totalSales = 0;
                    $totalSold = 0;
                    foreach ($data as $res) {
                        $totalSales+= $res['total_price'];
                        $totalSold += $res['quantity'];
                    }
               ?>
               <table class="table table-hover">
                  <thead>
                  
                     <tr>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Quantity Purchased</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Date Ordered</th>
                        <th scope="col">Date Delivered</th>
                     </tr>
                  </thead>

                  <tbody>
                  <?php 
                        $query = 'SELECT 
                        i.name as itemname,
                        i.description as description,
                        i.image as image,
                        i.stock as stock,
                        i.price as price,
                        u.username as username,
                        u.phone as phone,
                        u.email as email,
                        o.id,
                        o.quantity,
                        o.date_added,
                        o.date_updated,
                        o.date_of_day,
                        o.status,
                        o.address,	
                        o.itemid,
                        o.total_price as total_price
                        FROM orders o
                        LEFT JOIN items i on o.itemid = i.id    
                        LEFT JOIN users u on o.userid = u.id
                        WHERE o.status = "Finished" AND o.date_of_day = "'. $dateQuery.'" ORDER BY o.date_updated DESC';

                        $data = $dbh->query($query);
                  foreach($data as $row)
                  {
                  ?> 
                  <tr>
                     <td><?php echo $row['itemname']; ?></td>
                     <td><?php echo $row['price']; ?></td>
                     <td><?php echo $row['username']; ?></td>
                     <td><?php echo $row['email']; ?></td>
                     <td><?php echo $row['phone']; ?></td>
                     <td><?php echo $row['address']; ?></td>
                     <td><?php echo $row['quantity']; ?></td>
                     <td><?php echo $row['total_price']; ?></td>
                     <td><?php 
                                $date=date_create(htmlspecialchars($row['date_added']));
                                $formattedDate = date_format($date, 'D M j-Y, g:i a');
                                echo $formattedDate;
                            ?></td>
                     <td><?php 
                                $date=date_create(htmlspecialchars($row['date_updated']));
                                $formattedDate = date_format($date, 'D M j-Y, g:i a');
                                echo $formattedDate;
                            ?></td>
                  </tr>
                  <?php
                  }
                  ?> 
                  </tbody>
               </table>
                
               <div style="margin-top:20px ;">
                   <h4>As of <?php echo $dateToday; ?></h4>
                  <h2 style="font-weight: 700;">Total Sold Items : <span style="font-weight: 500;"><?php echo $totalSold; ?></span></h2>
                  <h2 style="font-weight: 900;">Total Sales : <span style="font-weight: 500;">₱<?php echo $totalSales; ?></span></h2>
               </div>
                  
               <button onclick="window.print();" href="sample.php" class="btn btn-success" id="print-btn" style="width: 300px;"><img src="https://img.icons8.com/material-outlined/24/000000/print.png"/>Print</button>
               <a href="../dashboard.php" class="btn btn-primary" style="width: 300px;"  id="print-btn"><img src="https://img.icons8.com/material-outlined/24/000000/back--v1.png"/>Back</a>
                  <br>
                  <br>
            </div>
			</div>
		</div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>