<?php
session_start();

//checks if already logged in
if (!isset($_SESSION['userid'])) {
      header("Location: /4MS/items");
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
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/cart.js" charset="utf-8"></script>
</head>

<body>

    <div class="container">


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

                        <h5 class="card-title">
                            <?php echo htmlspecialchars($results['firstname']). ' ' .
                            htmlspecialchars($results['middlename']). ' '.
                            htmlspecialchars($results['lastname']) ?>
                        </h5>
                        <p class="card-text">
                            <small class="text-muted">
                                <?php echo htmlspecialchars($results['username'])?>
                            </small>
                        </p>
                        <p class="card-text">
                            <?php echo htmlspecialchars($results['gender']). ', ' .
                            htmlspecialchars($results['age']) ?>
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
            <button type="button" class="btn btn-outline-primary">Accepted Orders</button>
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
                    <img src="images/flowers/<?php echo htmlspecialchars($item['image'])?>" class="img-fluid rounded-start" alt="...">
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($item['itemname'])?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($item['description'])?></p>
                        <p class="card-text">Price to pay : <?php echo htmlspecialchars($item['price'])?></p>
                        <p class="card-text">Address to be delivered : <?php echo htmlspecialchars($item['address'])?></p>
                        
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

</body>

</html>