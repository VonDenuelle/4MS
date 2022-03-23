<?php
   session_start();
?>
   <!-- Meta Tags -->
   <?php include_once 'php/global/head.php'; ?>
   
   <title>4MS Flower Shop | Home</title>
      <!-- CSS -->
      <link rel="stylesheet" href="assets/css/index.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
      <!-- SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/items.js" charset="utf-8"></script>
    
   </head>

   <body>
      <!-- HEADER -->
      <!-- ============================================================================================================================ -->
      <!-- Navbar -->
      
      <?php include_once 'php/global/navbar.php'; ?>

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
            <div class="col-12">
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
         </div>

         <br>
      <div class="container flower-flex">
      <?php
    require_once 'php/config.php';

    $sql ="SELECT * FROM items ORDER BY date_added DESC";
    $query = $dbh -> query($sql);
    $results=$query->fetchAll(PDO::FETCH_ASSOC);
    $rowcount=$query->rowCount();

    if ($rowcount > 0) {
        foreach ($results as $item) {
            # code...?>

    <a class="flower-card" href="/4MS/comments?itemid=<?php echo htmlspecialchars($item['id']); ?>">
        <div class="card mb-3" >
         <div class="row g-0">
            <div class="col-md-4">
            <img src="images/flowers/<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top" alt="...">

            </div>

            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item price">₱<?php echo htmlspecialchars($item['price']); ?>.00</li>
                <li class="list-group-item">Stock left: <?php echo htmlspecialchars($item['stock']); ?></li>
                <li class="list-group-item">Added on: 
                    <?php 
                        $date=date_create(htmlspecialchars($item['date_added']));
                        $formattedDate = date_format($date, 'D M j-Y, g:i a');
                        echo $formattedDate;
                    ?>
                </li>
            </ul>
        </div>
        </div>
        </div>
    </a>

    <?php          
        }
    }
    ?>

      </div>
         
      </div>



      <?php include_once 'php/global/footer.php'; ?>   

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>