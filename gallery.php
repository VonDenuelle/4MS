   <!-- Meta Tags -->
   <?php include_once 'php/global/head.php'; ?>

   <title>4MS Flower Shop | Gallery</title>
   <!-- CSS -->

   <link rel="stylesheet" href="css/gallery.css">
   <link rel="stylesheet" href="assets/css/home.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- SCRIPT -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"
       integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="js/gallery.js" charset="utf-8"></script>



   
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
       <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
       <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <!------ Include the above in your HEAD tag ---------->

       <link rel="stylesheet"
           href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
   </head>
   
   <body>
       <!-- ============================================================================================================================ -->
      <!-- Navbar -->
  
      <?php include_once 'php/global/navbar.php'; ?>



       <div class="container">
           <div class="portfolio-item row">

           <?php 
              require_once 'php/config.php';

              $sql ="SELECT * FROM items ORDER BY date_added DESC";
              $query = $dbh -> query($sql);
              $results=$query->fetchAll(PDO::FETCH_ASSOC);
              $rowcount=$query->rowCount();

              if ($rowcount > 0) {
                foreach ($results as $item) {
           ?>

                <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                    <a href="images/flowers/<?php echo htmlspecialchars($item['image']); ?>" class="fancylight popup-btn" data-fancybox-group="light"> 
                    <img class="img-fluid" src="images/flowers/<?php echo htmlspecialchars($item['image']);?>" alt="">
                    <div class="content-text">
                        <p> <?php echo htmlspecialchars($item['name']); ?></p>
                  
                    </div>
                </a>
                   
                </div>
                   
        <?php          
            }
        }
        ?>

           </div>
       </div>




       <?php include_once 'php/global/footer.php'; ?>

       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
           integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
       </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
           integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
       </script>
   </body>

   </html>