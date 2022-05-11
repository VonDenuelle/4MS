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
<script src="js/checkout.js" charset="utf-8"></script>
<script src="js/items.js" charset="utf-8"></script>
</head>

<body>

  <!-- ============================================================================================================================ -->
  <!-- Navbar -->

  <?php include_once 'php/global/navbar.php'; ?>


  <?php
        require_once 'php/config.php';

        $sql ="SELECT * FROM items WHERE id =".$_GET['itemid'];
        $query = $dbh -> query($sql);
        $results=$query->fetchAll(PDO::FETCH_ASSOC);
        $rowcount=$query->rowCount();

        if ($rowcount > 0) {
            foreach ($results as $item) {
                # code...?>

  <div class="container">
    <div class="row">
      <div class="col mx-5">
        <div class="card" style="width: 18rem;">
          <img class="prodImg" src="images/flowers/<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top"
            alt="...">
        </div>
      </div>

      <div class="col me-5" style="margin-top: 1in">
        <h3 style="font-weight: 800;"><?php echo htmlspecialchars($item['name']); ?></h3>
        <p style="font-size: 18px;"><span style="font-weight: 700;">Price: </span>₱<?php echo htmlspecialchars($item['price']); ?>.00</p>
        <p>Stock left: <?php echo htmlspecialchars($item['stock']); ?></p>

        <a id="addToCart" class="btn btn-danger" style="background: #d58b8b">Add to Cart</a>
        <a id="checkoutSingle" 
        data-price="<?php echo htmlspecialchars($item['price']);?>" 
        class="btn btn-primary">Buy Now</a>
      </div>
    </div>

    <?php          
          }
      }
      ?>

    <button type="button" id="writeComment" class="btn btn-outline-primary" style="margin:10px 0 10px 1.1in;">Write a
      Comment</button>
    <div class="list-group">
      <!-- 

          LIST COMMENTS FROM AJAX

        -->
    </div> <!-- end of list-group-->

  </div> <!-- end of container -->
  <!-- Info -->


  <br>
  <?php include_once 'php/global/footer.php'; ?>  


  <!-- =======================MODAL================== -->
  <?php include_once 'php/global/modal.php';?>
</body>

</html>