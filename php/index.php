<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Main Page</title>

      <link rel="stylesheet" href="assets/css/index.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   </head>

   <body>
      <!-- HEADER -->
      <!-- ============================================================================================================================ -->
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg">
         <div class="container-fluid">
            <a class="navbar-brand mx-4" href="#"><img class="logo" src="assets/imgs/4M's Logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item mx-3">
                     <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>

                  <li class="nav-item mx-3">
                     <a class="nav-link" href="#">About</a>
                  </li>

                  <li class="nav-item mx-3">
                     <a class="nav-link" href="#">Products</a>
                  </li>
                  
                  <li class="nav-item mx-3">
                     <a class="nav-link" href="#">Delivery</a>
                  </li>
               </ul>
               
               <div class="input-group">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <button type="button" class="btn btn-outline-primary"><img class="icons mx-3" src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png"/></button>
               </div>

               <a href="#">
                  <img class="icons mx-3" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-shopping-cart-miscellaneous-kiranshastry-lineal-kiranshastry.png"/>
               </a>

               <a href="#">
                  <img class="icons mx-3" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-user-interface-kiranshastry-solid-kiranshastry-1.png"/>
               </a> 
            </div>
         </div>
      </nav>

      <!-- ============================================================================================================================ -->
      <!-- Carousel -->
      <div id="carouselExampleIndicators" class="carousel slide mt-2" data-bs-ride="carousel">
         <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
         </div>

         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="slideshow" src="assets/imgs/1.jpg" class="d-block w-100">
            </div>

            <div class="carousel-item">
               <img class="slideshow" src="assets/imgs/2.jpg" class="d-block w-100">
            </div>

            <div class="carousel-item">
               <img class="slideshow" src="assets/imgs/3.jpg" class="d-block w-100">
            </div>

         </div>

         <button class="carousel-control-prev ms-4" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
         </button>

         <button class="carousel-control-next me-4" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
         </button>
      </div>

      <!-- BODY -->
      <!-- ============================================================================================================================ -->
      <!-- Cards -->
      <div class="container mt-4">
         <div class="row mx-5">
            <div class="col mx-2">
               <div class="card" style="width: 18rem;">
                  <img class="card-imgs mx-auto" src="https://img.icons8.com/ios-filled/50/000000/flower.png" class="card-img-top">

                  <div class="card-body">
                     <h5 class="card-title">Pick Your Flowers</h5>
                  </div>
               </div>
            </div>

            <div class="col mx-2">
               <div class="card" style="width: 18rem;">
                  <img class="card-imgs mx-auto" src="https://img.icons8.com/external-itim2101-fill-itim2101/64/000000/external-order-shopping-and-ecommerce-itim2101-fill-itim2101.png" class="card-img-top">
                  
                  <div class="card-body">
                     <h5 class="card-title">Confirm Order</h5>
                  </div>
               </div>
            </div>

            <div class="col mx-2">
               <div class="card" style="width: 18rem;">
                  <img class="card-imgs mx-auto" src="https://img.icons8.com/ios-glyphs/90/000000/flower-delivery.png" class="card-img-top">
                  
                  <div class="card-body">
                     <h5 class="card-title">Flower Delivery</h5>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- ============================================================================================================================ -->
      <!-- Products -->
      <div class="container products mt-4 mb-4">
         <div class="row">
            <div class="col-10">
               <nav class="navbar">
                  <h3 class="ms-3">Flower Picking</h3> 
                  <ul class="pagination mt-2 me-3">
                     <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
               </nav>
            </div>

            <div class="col-1 mt-2">
               <img src="https://img.icons8.com/ios/50/000000/list--v1.png"/>
            </div>

            <div class="col-1 mt-2">
               <img src="https://img.icons8.com/ios/50/000000/grid.png"/>
            </div>

           
         </div>

         <div class="row mt-3">
            <div class="col mx-2">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/a.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>

            <div class="col mx-2">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/b.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>

            <div class="col mx-2">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/c.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>

            <div class="col mx-2">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/d.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>

            <div class="col mx-2">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/e.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col mx-2 mt-3">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/f.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>

            <div class="col mx-2 mt-3">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/g.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>

            <div class="col mx-2 mt-3">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/h.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>
            
            <div class="col mx-2 mt-3">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/i.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>

            <div class="col mx-2 mt-3">
               <div class="card">
                  <img class="prod-display mx-auto" src="assets/imgs/j.jpg" class="w-100" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class=""card-title>*Product Name*</h5>
                     <p class="card-text">*price*</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- FOOTER -->
      <!-- ============================================================================================================================ -->
      <!-- Info -->
      <footer class="bg-dark text-center text-lg-start">
         <!-- Grid container -->
         <div class="container p-4">
            <!--Grid row-->
            <div class="row">
               <!--Grid column-->
               <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                  <h5 class="left">Company</h5>

                  <p class="leftFoot">4M's Flower Shop</p>
                  <p class="leftFoot">31 18 St., East Bajac-Bajac, Olongapo City </p>
               </div>

               <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                  <h5 class="right">Contact</h5>

                  <p class="rightFoot">+639 463 315 653</p>
                  <p class="rightFoot">https://www.facebook.com/4msflowershop</p>
               </div>
               <!--Grid column-->
            </div>
            <!--Grid row-->
         </div>
         <!-- Grid container -->

         <!-- Copyright -->
         <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © Jin-Doe Devs 2022
         </div>
      <!-- Copyright -->
      </footer>



      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>