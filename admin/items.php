<?php
   session_start();

   if(!isset($_SESSION['adminid'])){
      header('location: /4ms');
   }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>

    <meta charset="utf-8">
    <meta name=”title” content="4MS Flower Shop" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Products List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/admin/items.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/modal.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../js/item-admin.js" charset="utf-8"></script>
    	<!-- font awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
		integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php include_once '../php/global/sidenav.php'; ?>

    <div class="container-fluid"  style="width: calc(100% - 250px);">
        <div class="row flex-nowrap">
            <!-- SIDE NAV -->
            
            <!-- 2ND COL -->
            <div class="col">
                <div class="container flower-flex">

                    <?php
                    require_once '../php/config.php';

                    $sql ="SELECT * FROM items ORDER BY date_added DESC";
                    $query = $dbh -> query($sql);
                    $results=$query->fetchAll(PDO::FETCH_ASSOC);
                    $rowcount=$query->rowCount();

                    if ($rowcount > 0) {
                        foreach ($results as $item) {
                            # code...?>

                    <a href="/4MS/comments?itemid=<?php echo htmlspecialchars($item['id']); ?>">
                        <div class="card  mx-auto mb-2" style="width: 18rem;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div  class="card-img-top"  style="background-image: url('../images/flowers/<?php echo htmlspecialchars($item['image']); ?>');"></div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                                        <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">₱ <?php echo htmlspecialchars($item['price']); ?></li>
                                        <li class="list-group-item">Stock: <?php echo htmlspecialchars($item['stock']); ?></li>
                                        <li class="list-group-item">
                                            <?php 
                                                $date=date_create(htmlspecialchars($item['date_added']));
                                                $formattedDate = date_format($date, 'D M j-Y, g:i a');
                                                echo $formattedDate;
                                            ?>
                                        </li>

                        
                                            <a class="btn btn-success" href="edit-product?itemid=<?php echo htmlspecialchars($item['id']);?>" id="edit">
                                            Edit</a>
                        
                                            <button class="btn btn-danger deleteButton" data-itemid="<?php echo htmlspecialchars($item['id']);?>"  data-image="<?php echo htmlspecialchars($item['image']);?>" >Delete</button>
    
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
        </div>
    </div>
    
      <!-- =======================MODAL================== -->
  <?php include_once '../php/global/modal.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>