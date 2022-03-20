<?php
session_start();

//checks if itemid is present (clicked on an item)
if (!isset($_GET['itemid'])) {
      header("Location: /4MS/home");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name=”title” content="Geo Tag Generator" />
  <meta name="description" content="This is meta description Sample. We can add up to 158.">

  <meta name="geo.region" content="PH-ZMB" />
  <meta name="geo.placename" content="Olongapo" />
  <meta name="geo.position" content="14.831468;120.283521" />
  <meta name="ICBM" content="14.831468, 120.283521" />

  <meta name=”keywords” content=”tag, generator, geo, web, tags, meta, site, create, html, editor, geocoding,
    geotagging” />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>4MS Flower Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/comments.js" charset="utf-8"></script>
  <script src="js/cart.js" charset="utf-8"></script>
  <script src="js/checkout.js" charset="utf-8"></script>
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

  <div class="container">
    <div class="card" style="width: 18rem;">
      <img src="images/flowers/<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
        <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
        <a href="#" id="addToCart" class="btn btn-primary">Add to Cart</a>
        <a href="#" id="checkout" class="btn btn-primary">Buy Now</a>
      </div>
    </div>

  <?php          
        }
    }
    ?>

    <button type="button" id="writeComment" class="btn btn-outline-primary">Write a Comment</button>
    <div class="list-group">
      <!-- 

        LIST COMMENTS FROM AJAX

      -->
    </div> <!-- end of list-group-->

  </div> <!-- end of container -->
</body>

</html>