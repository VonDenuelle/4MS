<?php
   session_start();

   if(!isset($_SESSION['adminid'])){
      header('location: /4ms');
   }
?>
<html>

<head>
	<title>Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/admin/sidenav.css">
	<link rel="stylesheet" href="../css/admin/dashboard.css">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
		integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
	<!-- SIDE NAV -->
	<?php include_once '../php/global/sidenav.php'; ?>

	<div class="container-fluid" style="width: calc(100% - 250px); margin-left: 250px;">
		<div class="row flex-nowrap">

			<!-- 2ND COL -->
			<div class="col">
				<h1>Dashboard</h1>
				<hr>
			</div>
		</div>

		
		<?php
			require '../php/config.php';
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
			   
		<div class="card border-success mb-3" style="max-width: 100%;">
			<div class="card-header bg-transparent border-success">
				<h4>Total Sales as of <?php echo $dateToday;?></h4>
			</div>
			<div class="card-body text-success ">
				<div class="text-flex">
					<h5 class="card-title" style="font-weight: 600;">Total Sales: </h5>
					<p class="card-text">&#8369;<?php echo $totalSales; ?></p>
				</div>
				<div class="text-flex">
					<h5 class="card-title" style="font-weight: 600;">Total Number of Sold Items: </h5>
					<p class="card-text"><?php echo $totalSold; ?></p>
				</div>
			</div>
		</div>


		<?php
$sql ="SELECT * from users "; 
$query = $dbh -> query($sql);
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>


		<?php
$sql ="SELECT * from orders WHERE status = 'Finished' "; 
$query = $dbh -> query($sql);
$results=$query->fetchAll(PDO::FETCH_OBJ);
$orders=$query->rowCount();
?>


		<?php
$sql ="SELECT * from items "; 
$query = $dbh -> query($sql);
$results=$query->fetchAll(PDO::FETCH_OBJ);
$items=$query->rowCount();
?>
		<div class="cards">
                <a class="card-single" id="v-employees" href="#">
                    <div>
                        <h1><?php echo htmlspecialchars($regusers);?></h1>
                        <span>TOTAL OF ACTIVE USERS</span>
                    </div>
                    <div>
                        <span class="bx bx-user-pin"></span>
                    </div>
                </a>
                <a class="card-single" id="v-category" href="pending-orders">
                    <div>
                        <h1><?php echo htmlspecialchars($orders);?></h1>
                        <span>OVERALL TOTAL OF ORDERS MADE</span>
                    </div>
                    <div>
                        <span class="bx bx-cart"></span>
                    </div>
                </a>

                <a class="card-single" id="v-items" href="items">
                    <div>
                        <h1><?php echo htmlspecialchars($items);?></h1>
                        <span>TOTAL NUMBER OF ITEMS</span>
                    </div>
                    <div>
                        <span class="bx bx-food-menu"></span>
                    </div>
                </a>
            </div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
		integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
		integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>


</body>

</html>