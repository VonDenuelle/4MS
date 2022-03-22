<?php
session_start();

//checks if itemid is present (clicked on an item)
if (!isset($_GET['itemid'])) {
      header("Location: /4MS/home");
}
?>

<!-- Meta Tags -->
<?php include_once 'php/global/head.php'; ?>

<title>4MS Flower Shop</title>

<!--  navbar-->
<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="css/comments.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/comments.js" charset="utf-8"></script>
<script src="js/cart.js" charset="utf-8"></script>
<script src="js/checkout.js" charset="utf-8"></script>
<script src="js/items.js" charset="utf-8"></script>
</head>

<body>

  <?php
        require_once 'php/config.php';

        $sql ="SELECT * FROM items WHERE id =".$_GET['itemid'];
        $query = $dbh -> query($sql);
        $results=$query->fetchAll(PDO::FETCH_ASSOC);
        $rowcount=$query->rowCount();

        if ($rowcount > 0) {
            foreach ($results as $item) {
                # code...?>

  <!-- Meta Tags -->
  <?php include_once 'php/global/head.php'; ?>
  <!-- HEADER -->
  <!-- ============================================================================================================================ -->
  <!-- Navbar -->

  <?php include_once 'php/global/navbar.php'; ?>
  <div class="">

  </div>
  <div class="container">
    <div class="row">
      <div class="col mx-5">
        <div class="card" style="width: 18rem;">
          <img class="prodImg" src="images/flowers/<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top"
            alt="...">
        </div>
      </div>

      <div class="col me-5" style="margin-top: 1in">
        <h5><?php echo htmlspecialchars($item['name']); ?></h5>
        <p><?php echo htmlspecialchars($item['description']); ?></p>
        <a href="#" id="addToCart" class="btn btn-danger" style="background: #d58b8b">Add to Cart</a>
        <a href="#" id="checkoutSingle" class="btn btn-primary">Buy Now</a>
      </div>
    </div>


    <?php          
          }
      }
      ?>

    <button type="button" id="writeComment" class="btn btn-outline-primary" style="margin-left: 1.1in">Write a
      Comment</button>
    <div class="list-group">
      <!-- 

          LIST COMMENTS FROM AJAX

        -->
    </div> <!-- end of list-group-->

  </div> <!-- end of container -->
  <!-- Info -->


  <br>
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
          <p class="rightFoot"><a target="_blank" href="https://www.facebook.com/4msflowershop">4MS Flower Shop Facebook
              Page</a></p>
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
</body>

</html>