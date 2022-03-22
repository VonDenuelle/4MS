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
</head>

<body>

    <!-- HEADER -->
    <!-- ============================================================================================================================ -->
    <!-- Navbar -->

    <?php include_once 'php/global/navbar.php'; ?>
    <div class="container">
        <br>

        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/200.png" class="img-fluid rounded-start" alt="Profile Image" width="250px;">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 style="font-weight:bold;">Personal Details</h5>
                        <br>
                        <?php
            require_once 'php/config.php';
                $sql ="SELECT * FROM users WHERE id =".$_SESSION['userid'];
                $query = $dbh -> query($sql);
                $results=$query->fetch(PDO::FETCH_ASSOC);
            ?>

                        <h5 class="card-text">Name:
                            <?php echo htmlspecialchars($results['firstname']). ' ' .
                            htmlspecialchars($results['middlename']). ' '.
                            htmlspecialchars($results['lastname']) ?>
                        </h5>
                        <p class="card-text">Username:
                            <small class="text-muted">
                                <?php echo htmlspecialchars($results['username'])?>
                            </small>
                        </p>
                        <p class="card-text">Age:
                            <small class="text-muted">
                                <?php echo htmlspecialchars($results['gender']). ', ' .
                                htmlspecialchars($results['age']) ?>
                            </small>
                        </p>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">

                        <h5 style="font-weight:bold;">Contact Details</h5>
                        <br>

                        <p class="card-text">Address:
                            <?php echo htmlspecialchars($results['address1'])?>
                        </p>
                        <p class="card-text">Secondary Address:
                            <?php echo htmlspecialchars($results['address2'])?>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Email:
                                <?php echo htmlspecialchars($results['email'])?>
                            </small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Phone:
                                <?php echo htmlspecialchars($results['phone'])?>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-primary active">All Orders</button>
            <button type="button" class="btn btn-outline-primary">Pending Orders</button>
            <button type="button" class="btn btn-outline-primary">To Recieve Orders</button>
            <button type="button" class="btn btn-outline-primary">Declined Orders</button>
            <button type="button" class="btn btn-outline-primary">Canceled Orders</button>
            <button type="button" class="btn"><i class="fa-solid fa-arrow-down-wide-short"></i></button>
            <button type="button" class="btn">
                <p class="card-text"><small class="text-muted">Sort by: Descending</small></p>
            </button>
        </div>


        <?php
                $sql = 'SELECT 
                  i.name as itemname,
                  i.description as description,
                  i.image as image,
                  i.price as price,
                  i.stock as stock,
                  o.quantity,
                  o.date_added,
                  o.status,
                  o.address
                 FROM orders o
                 LEFT JOIN items i on o.itemid = i.id 
                 WHERE o.userid = '. $_SESSION['userid'] .' 
                 ORDER BY o.date_added DESC';

                $query = $dbh -> query($sql);
                $results=$query->fetchAll(PDO::FETCH_ASSOC);
                $rowcount=$query->rowCount();
                if ($rowcount > 0) {
                    foreach ($results as $item) {
            
            ?>

        <div class="card mb-3" style="max-width: 740px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/flowers/<?php echo htmlspecialchars($item['image'])?>"
                        class="img-fluid rounded-start" alt="...">
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($item['itemname'])?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($item['description'])?></p>
                        <p class="card-text">Price to pay : <?php echo htmlspecialchars($item['price'])?></p>
                        <p class="card-text">Quantity : <?php echo htmlspecialchars($item['quantity'])?></p>
                        <p class="card-text">Address to be delivered : <?php echo htmlspecialchars($item['address'])?>
                        </p>

                        <br>
                        <p class="card-text"><small class="text-muted">
                                <?php 
                                $date=date_create(htmlspecialchars($item['date_added']));
                                $formattedDate = date_format($date, 'D M j-Y, g:i a');
                                echo $formattedDate;
                            ?>
                            </small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Status:
                                <?php echo htmlspecialchars($item['status'])?>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php          
         } 
        } else{ ?>

        <h1>No Orders Yet</h1>
        <?php
        }
    ?>


    </div>

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
                    <p class="rightFoot"><a target="_blank" href="https://www.facebook.com/4msflowershop">4MS Flower
                            Shop Facebook Page</a></p>
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