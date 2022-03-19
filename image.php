<html>

<head>
	<title>Image Upload with AJAX, PHP and MYSQL</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="js/image.js"></script>

 
</head>

<body>
	<form enctype="multipart/form-data" id="uploadForm">
		<img id="image" src="images/200.png" width="100px" class="img-thumbnail" alt="...">
		<input type="file" oninput="image.src=window.URL.createObjectURL(this.files[0])" name="file" id="file">
		<input  name="name" value="name"/>
		<input name="description" value="description"/>
		<input name="price" value="10"/>
		<input  name="color" value="color"/>
		<input  name="custom" value="true"/>
		<input  name="stock" value="101"/>

      
		<input type="submit" name="submit" value="Upload Image">
	</form>


</body>

</html>