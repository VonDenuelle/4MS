<?php
session_start();

//checks if already logged in
if (isset($_SESSION['userid'])) {
      header("Location: /4MS/home");
}

//checks if admin is  logged in
if (isset($_SESSION['adminid'])) {
    header("Location: /4MS/admin");
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
  <!-- CSS -->
  <link rel="stylesheet" href="css/vendor/bootstrap.min.css">

  <link rel="stylesheet" href="css/index.css">

  <!-- script -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/index.js" charset="utf-8"></script>

</head>

<body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/login.jpg');"></div>
    <div class="contents order-2 order-md-1" style="background-color: rgb(30, 39, 46)">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 myForm">
            <img class="logo d-block mb-4" src="assets/imgs/4M's Logo.png" style="height: 150px; margin-left: auto; margin-right: auto">
            <h3 style="color: #b3b3b3; text-decoration: underline; text-align: center"><strong>LOGIN</strong></h3>
          
            <form id="signinForm">
              <div class="form-group first">
                <label style="color: #b3b3b3" for="username">Username</label>
                <input type="text" class="form-control" placeholder="Your Username" id="signinUsername">
              </div>
              <div class="form-group last mb-3">
                <label style="color: #b3b3b3" for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="signinPassword">
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-danger" style="background: #d58b8b">
              
              <div class="bar error">Error message</div>
              <div class="btn" style="color: #b3b3b3">Dont have an account?
                <span class="btn-link"
                  onclick="window.open('/4MS/register', '_blank')"> Create here
                </span>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>


  </div>


  <footer>
    <p style="background-color: rgba(0, 0, 0, 0.2)">
      Located at #31 18th St., East Bajac-Bajac Olongapo
      <a target="_blank" href="https://www.facebook.com/4msflowershop">4MS Flower Shop</a>
      - Check their reviews
      <a target="_blank" href="https://www.facebook.com/4msflowershop/reviews/?ref=page_internal">here</a>.
    </p>
  </footer>
</body>

</html>