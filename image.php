<html>
	<head>
		<title>Image Upload with AJAX, PHP and MYSQL</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="css/image.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="js/image.js"></script>
	</head>

	<body>

		<div class="container-fluid">
			<div class="row flex-nowrap">
				<!-- SIDE NAV -->
				<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white" style="width: 250px;"><img class="logo" src="assets/imgs/logo.png"><h3 class="mt-2">Admin</h3>
					<hr>
					<ul class="nav nav-pills flex-column mb-auto">
						<li> <a href="#" class="nav-link text-white" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> </li>
						<li> <a href="#" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Orders</span> </a> </li>
						<li> <a href="#" class="nav-link text-white"> <i class="fa fa-cog"></i><span class="ms-2">Add Product</span> </a> </li>
						<li> <a href="#" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Product List</span> </a> </li>
						<li> <a href="#" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Sales</span> </a> </li>
					</ul>
					<hr>
					<a href="#" class="btn btn-danger">Logout</a>
				</div>
				
				<!-- 2ND COL -->
				<div class="col">
					<h1>Add Product</h1><hr>
					<form enctype="multipart/form-data" id="uploadForm">
						
						<div class="mx-auto my-auto">
							
							<div class="g-col mt-3">
								<label>Product Name:</label>
								<input  name="name" value="name"/>

								<label>Product Description:</label>
								<input name="description" value="description"/>
							</div>
		

							<div class="g-col mt-3">
								<label>Product Price:</label>
								<input name="price" value="10"/>

								<label>Product Color:</label>
								<input  name="color" value="color"/>
							</div>

							<div class="g-col mt-3">
								<label>Product Custom:</label>
								<input  name="custom" value="true"/>

								<label>Product Quantity:</label>
								<input  name="stock" value="101"/>
							</div>
						</div> <br>

						<img id="image" src="images/200.png" width="100px" class="img-thumbnail" alt="..."><br>
						<input type="file" oninput="image.src=window.URL.createObjectURL(this.files[0])" name="file" id="file"> <br>
						<input class="mt-3" type="submit" name="submit" value="Input Product">

					</form>
				</div>
			</div>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


	</body>

</html>