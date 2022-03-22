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

    <link rel="stylesheet" href="css/register.css">
    <link href="css/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="css/vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body myForm">
                    <h2 class="title">Registration Form</h2>

                    <form id="signupForm">
<!-- Personal Information -->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label inf">Personal Information</label>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" placeholder="First Name" id="firstname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">middle name</label>
                                    <input class="input--style-4" type="text" placeholder="Middle Name" id="middlename">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" placeholder="Last Name" id="lastname">
                                </div>
                            </div>
                        </div>
<!-- Contact Information  -->
<br>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label inf">Contact Information</label>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Age</label>
                                    <input class="input--style-4" type="number" placeholder="Age" id="age">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input name="radioName" type="radio" checked="checked" data-gender="Male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input name="radioName" type="radio" data-gender="Female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="number" id="phone" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="input-group">
                            <label class="label">Subject</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> -->

                        <div class="row row-space addressForm">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" id="address1" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Add Second Address</label>
                                    <button class="form-submit-button" type="Button" id="addAddress"><i
                                            class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
<!-- Credentials -->
<br>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label inf">Credentials</label>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">username</label>
                                    <input class="input--style-4" type="text" placeholder="Username"
                                        id="signupUsername">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">password</label>
                                    <input class="input--style-4" type="password" placeholder="Password"
                                        id="signupPassword">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">retype password</label>
                                    <input class="input--style-4" type="password" placeholder="Retype Password"
                                        id="repassword">
                                </div>
                            </div>
                        </div>

                        <div class="p-t-15">
                            <div class="bar error">Error message</div>
                            <input class="btn btn--radius-2 btn--blue" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="css/vendor/select2/select2.min.js"></script>
    <script src="js/register.js" charset="utf-8"></script>
</body>

</html>