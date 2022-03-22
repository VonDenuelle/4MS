<?php
session_start();

//checks if already logged in
if (!isset($_SESSION['userid'])) {
      header("Location: /4MS");
}
?>

<!-- Meta Tags -->
<?php include_once 'php/global/head.php'; ?>

<title>4MS Flower Shop</title>

<link rel="stylesheet" href="assets/css/navbar.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/cart.js" charset="utf-8"></script>
<script src="js/items.js" charset="utf-8"></script>

</head>


<body>


    <!-- HEADER -->
    <!-- ============================================================================================================================ -->
    <!-- Navbar -->

    <?php include_once 'php/global/navbar.php'; ?>


    <?php
    require_once 'php/config.php';

    $sql = 'SELECT 
    i.name as itemname,
    i.description as description,
    i.image as image,
    i.price as price,
    i.stock as stock,
    c.quantity,
    c.date_added,
    c.itemid
   FROM cart c
   LEFT JOIN items i on c.itemid = i.id 
   WHERE c.userid = '. $_SESSION['userid'] .' 
   ORDER BY c.date_added DESC';

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
            <h5 class="card-title"><?php echo htmlspecialchars($item['itemname']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox"
                data-itemid="<?php echo htmlspecialchars($item['itemid']); ?>"
                data-quantity="<?php echo htmlspecialchars($item['quantity']) ?>">
            <label class="form-check-label" for="flexCheckDefault">
                check
            </label>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo htmlspecialchars($item['price']); ?></li>
            <li class="list-group-item"><?php echo htmlspecialchars($item['stock']); ?></li>
            <li class="list-group-item">Added on
                <?php 
                        $date=date_create(htmlspecialchars($item['date_added']));
                        $formattedDate = date_format($date, 'D M j-Y, g:i a');
                        echo $formattedDate;
                    ?>
            </li>
            <li class="quantity">Quantity <?php echo htmlspecialchars($item['quantity']); ?></li>
            <button class="add" data-quantity="<?php echo htmlspecialchars($item['quantity']) ?>"
                data-itemid="<?php echo htmlspecialchars($item['itemid']) ?>">
                ADD
            </button>
            <button class="minus" data-quantity="<?php echo htmlspecialchars($item['quantity']) ?>"
                data-itemid="<?php echo htmlspecialchars($item['itemid']) ?>">
                MINUS</button>
            <button class="delete" data-itemid="<?php echo htmlspecialchars($item['itemid']) ?>">
                DELETE</button>
        </ul>
    </div>

    <?php          
        }
    }
    ?>

    <button id="checkout">Checkout</button>

    </div>
</body>

</html>