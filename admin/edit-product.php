
<?php
   session_start();

   if(!isset($_SESSION['adminid'])){
      header('location: /4ms');
   }
?>
<html>
	<head>
		<title>Edit Product</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/admin/image.css">
		<link rel="stylesheet" href="../css/admin/sidenav.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="../js/image.js"></script>
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
					<h1>Edit Item</h1><hr>
					<form enctype="multipart/form-data" id="editProduct">

					<?php 
							 require_once '../php/config.php';

							 $sql ="SELECT * FROM items WHERE id = ". $_GET['itemid'];
							 $query = $dbh -> query($sql);
							 $results=$query->fetch(PDO::FETCH_ASSOC);
				
						?>

						<img id="image" src="../images/flowers/<?php echo htmlspecialchars($results['image'])?>" width="100px" class="img-thumbnail" alt="..."><br>
						<input type="file" oninput="image.src=window.URL.createObjectURL(this.files[0])" name="file" id="file"> <br>
						
						<div class="row mt-3">

							<div class="col">
								<label>Product Name:</label>
								<input  name="name" value="<?php echo htmlspecialchars($results['name']); ?>"/>
							</div>
		
							<div class="col">
								<label>Product Description:</label>
								<textarea name="description"><?php echo htmlspecialchars($results['description'])?></textarea>
							</div>

							<div class="col">
								<label>Product Price ₱:</label>
								<input name="price" type="number" value="<?php echo htmlspecialchars($results['price'])?>"/>
							</div>
				

							<div class="col">
								<label>Product Quantity:</label>
								<input type="number" name="stock" value="<?php echo htmlspecialchars($results['stock'])?>"/>
							</div>

							<input style="display: none;" name="myimage" value="<?php echo htmlspecialchars($results['image'])?>">
							<input style="display: none;" name="itemid" value="<?php echo htmlspecialchars($results['id'])?>">

							</div>

						<input class="mt-3 btn btn-success" type="submit" name="submit" value="Edit Product">
						<div class="bar error"></div>
					</form>
				</div>
			</div>
		</div>
		
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


	</body>

</html>