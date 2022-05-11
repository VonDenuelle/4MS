<?php
   session_start();

   if(!isset($_SESSION['adminid'])){
      header('location: /4ms');
   }
?>

<html>
	<head>
		<title>Finished Orders</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/admin/sidenav.css">
		<!-- <link rel="stylesheet" href="../css/admin/orders.css"> -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
				<!-- font awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
		integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>

	<body>
	<!-- SIDE NAV -->
	<?php include_once '../php/global/sidenav.php'; ?>


		<div class="container-fluid" style="width: calc(100% - 250px); margin-left: 250px;">
			<div class="row flex-nowrap">			
				<!-- 2ND COL -->
				<div class="col">
					<h1>Finished Orders</h1><hr>
				</div>
			</div>


			<a href="pending-orders" class="btn btn-outline-primary">Pending Orders</a>
			<a href="waiting-orders" class="btn btn-outline-primary">Waiting Orders</a>
			<a href="finished-orders" class="btn btn-primary">Finished Orders</a>
			<br>
			<br>
			<?php
				  require_once '../php/config.php';
		
				  $sql = 'SELECT 
				  i.name as itemname,
				  i.description as description,
				  i.image as image,
				  i.stock as stock,
				  u.username as username,
				  u.phone as phone,
				  u.email as email,
				  o.quantity,
				  o.date_added,
				  o.date_updated,
				  o.status,
				  o.address,	
				  o.total_price as price
				  FROM orders o
				  LEFT JOIN items i on o.itemid = i.id    
				  LEFT JOIN users u on o.userid = u.id
				  WHERE o.status = "Finished" ORDER BY o.date_added DESC';
			  
				   $stmt = $dbh->prepare($sql);
				   $stmt->execute();
			  
				  $rowcount=$stmt->rowCount();
				  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			  
				  if ($rowcount > 0) {
					  foreach ($rows as $item) {
					
			?>
				 <div class="card mb-3" style="max-width: 1040px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../images/flowers/<?php echo htmlspecialchars($item['image'])?>"
                        class="img-fluid rounded-start" alt="...">
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($item['itemname'])?></h5>
                        <p class="card-text">Stock Left: <?php echo htmlspecialchars($item['stock'])?></p>
                        <p class="card-text">Price to pay : <?php echo htmlspecialchars($item['price'])?></p>
                        <p class="card-text">Quantity : <?php echo htmlspecialchars($item['quantity'])?></p>

						<br>
						<div style="border-top: 1px solid #d2d2d2; padding-top:6px;">
						<h4 >Customer Information</h4>
						</div>
						
                        <p class="card-text">Username : <?php echo htmlspecialchars($item['username'])?></p>
                        <p class="card-text">Phone : <?php echo htmlspecialchars($item['phone'])?></p>
                        <p class="card-text">Email : <?php echo htmlspecialchars($item['email'])?></p>
                        <p class="card-text">Address to be delivered : <?php echo htmlspecialchars($item['address'])?>
                        </p>

                        <br>
                        <p class="card-text"><small class="text-muted">Date ordered: 
                                <?php 
                                $date=date_create(htmlspecialchars($item['date_added']));
                                $formattedDate = date_format($date, 'D M j-Y, g:i a');
                                echo $formattedDate;
                            ?>
                            </small>
                        </p>
						<p class="card-text"><small class="text-muted">Date Delivered: 
                                <?php 
                                $date=date_create(htmlspecialchars($item['date_updated']));
                                $formattedDate = date_format($date, 'D M j-Y, g:i a');
                                echo $formattedDate;
                            ?>
                            </small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Status:
                                <?php echo htmlspecialchars($item['status'])?>
                            </small>
                        </p>

                    </div>
                </div>
            </div>
        </div>

			<?php } }  else { ?>
			
			<h3 class="btn btn-danger" style="width:100% ;">No Orders Yet</h3>

			<?php }  ?>
		</div>
		
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


	</body>

</html>