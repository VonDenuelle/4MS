<!-- for account session check -->
<div id="demo-modal" class="modal-class">
    <div class="modal__content">
        <h1>Account is Required</h1>

        <p>
            You must be signed in to continue. Create an account now or signin to continue with us!
        </p>

        <div class="modal__footer">
            Create an account <i class="fa-solid fa-address-card"></i>
            <a href="/4MS/register" target="_blank" style="font-weight:600;">NOW</a>
            <br>
            Already has an account? Signin
            <a href="/4MS" target="_blank" style="font-weight:600;">here</a>

        </div>

        <a class="modal__close">&times;</a>
    </div>
</div>







<!-- for changing address on profile -->

<div id="modal-edit-address" class="modal-edit-address">
    <div class="modal__content">

        <h1>Edit your address</h1>
        <form id="editAddress">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Address</span>

                <input type="text" id="myAddress" class="form-control" placeholder="Address" aria-label="Address"
                    aria-describedby="basic-addon1">

            </div>

            <div class="modal__footer">
                <input class="btn btn-outline-dark" type="submit" value="Submit">
            </div>
        </form>
        <a class="modal__close">&times;</a>

    </div>
</div>



<!-- for deleting confirmation -->

<div id="modal-delete-confirmation" class="modal-delete-confirmation">
    <div class="modal__content">

        <h1>Are you sure you want to delete?</h1>

            <div class="modal__footer">
                <input class="btn btn-danger delete" type="submit" value="Delete">
            </div>
    
        <a class="modal__close">&times;</a>

    </div>
</div>

<!-- for address selection -->

<div id="modal-address" class="modal-address">
    <div class="modal__content">


        <h1>Select Address</h1>
        <?php 
            require_once 'php/config.php';
            $sql = "SELECT address1, address2 FROM users WHERE id =".$_SESSION['userid'];
            $query = $dbh -> query($sql);
            $results=$query->fetch(PDO::FETCH_ASSOC);
        ?>
        <ul>
            <li class="address-list active-address"><?php echo htmlspecialchars($results['address1']);?>
            </li>
            <li class="address-list"><?php 
                    // check if address2 is set to None, if yes then don't show
                    if ($results['address2'] != 'None') {
                            echo htmlspecialchars($results['address2']);
                        } 
                 ?>
            </li>
        </ul>

        <div class="modal__footer">
            <a id="finalCheckout" target="_blank" style="font-weight:600;">Checkout</a>
        </div>

        <a class="modal__close">&times;</a>

    </div>
</div>