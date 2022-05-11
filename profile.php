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
<link rel="stylesheet" href="css/profile.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- MOMENT JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/items.js" charset="utf-8"></script>
    <script src="js/profile.js" charset="utf-8"></script>
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
                <div class="col-md-8">
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

                        <p class="card-text edit_first_address">Address:
                            <?php echo htmlspecialchars($results['address1'])?>
                            <i id="firstAddress" class="fa-solid fa-pen-to-square"></i>
                        </p>
                        <p class="card-text edit_second_address">Secondary Address:
                            <?php echo htmlspecialchars($results['address2'])?>
                            <i id="secondAddress" class="fa-solid fa-pen-to-square"></i>
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
            <button type="button" id="all" class="btn btn-outline-primary active">All Orders</button>
            <button type="button" id="pending" class="btn btn-outline-primary">Pending Orders</button>
            <button type="button" id="receive" class="btn btn-outline-primary">To Receive Orders</button>
            <button type="button" id="finish" class="btn btn-outline-primary">Finished Orders</button>
            <button type="button" id="cancel" class="btn btn-outline-primary">Canceled Orders</button>
            <button type="button"  id="icon-sort" class="btn sort">
                <i class="fa-solid fa-arrow-down-wide-short"></i></button>
            <button type="button" id="text-sort" class="btn sort">
                <p class="card-text"><small class="text-muted">Sort by Date: Descending</small></p>
            </button>
        </div>


    <div id="item-holder">
        
   </div>

        <div class="load"></div>
        <h1 id="h1" style="margin: 50px 0;"></h1>
    </div>

    <?php include_once 'php/global/modal.php'; ?>   

    <?php include_once 'php/global/footer.php'; ?>   

</body>

</html>