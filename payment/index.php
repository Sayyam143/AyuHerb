<?php
use \PhpPot\Service\StripePayment;

require_once "config.php";
session_start();

if (!empty($_POST["token"])) {
    require_once 'StripePayment.php';
    $stripePayment = new StripePayment();
    
    $stripeResponse = $stripePayment->chargeAmountFromCard($_POST);
    
    require_once "DBController.php";
    $dbController = new DBController();
    
    $amount = $stripeResponse["amount"] /100;
    
    $param_type = 'ssdssss';
    $param_value_array = array(
        $_POST['email'],
        $_POST['item_number'],
        $amount,
        $stripeResponse["currency"],
        $stripeResponse["balance_transaction"],
        $stripeResponse["status"],
        $_POST['order_id'],
        json_encode($stripeResponse),
        $_POST['user_id'],
        $_POST['cake_id']
     
    );

    $con  = mysqli_connect("localhost","root","","cake") or die("Database not connected");
    $ore_num =  $_POST['order_id']; 
    $q = "update checkout set `status`='confirm' where `order_id`='$ore_num'";
    mysqli_query($con,$q);
      

    $query = "INSERT INTO tbl_payment (email, item_number, amount, currency_code, txn_id,order_id, payment_status, payment_response, user_id, cake_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $id = $dbController->insert($query, $param_type, $param_value_array);
    
    if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {
        $successMessage = "Stripe payment is completed successfully. The TXN ID is " . $stripeResponse["balance_transaction"];
    }
}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css"/ >
</head>
<body>
    <?php if(!empty($successMessage)) { ?>
    <div id="success-message"><?php echo $successMessage; ?></div>
    <?php  } ?>
    <div id="error-message"></div>
                
            <form id="frmStripePayment" action=""
                method="post" >
                <div class="field-row">
                    <label>Card Holder Name</label> <span
                        id="card-holder-name-info" class="info"></span><br>
                    <input type="text" id="name" name="name"
                        class="demoInputBox">
                </div>
                <div class="field-row">
                    <label>Email</label> <span id="email-info"
                        class="info"></span><br> <input type="text"
                        id="email" name="email" class="demoInputBox">
                </div>
                <div class="field-row">
                    <label>Card Number</label> <span
                        id="card-number-info" class="info"></span><br> <input
                        type="text" id="card-number" name="card-number"
                        class="demoInputBox">
                </div>

                <div class="field-row">
                    <div class="contact-row column-right">
                        <label>Expiry Month / Year</label> <span
                            id="userEmail-info" class="info"></span><br>
                        <select name="month" id="month"
                            class="demoSelectBox">
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> <select name="year" id="year"
                            class="demoSelectBox">
                           
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                            <option value="27">2027</option>
                            <option value="28">2028</option>
                            <option value="29">2029</option>
                            <option value="30">2030</option>
                        </select>
                    </div>
                    <div class="contact-row cvv-box">
                        <label>CVC</label> <span id="cvv-info"
                            class="info"></span><br> <input type="text"
                            name="cvc" id="cvc"
                            class="demoInputBox cvv-input">
                    </div>
                </div>
                <div>
                    <input type="submit" name="pay_now" value="Submit"
                        id="submit-btn" class="btnAction"
                        onClick="stripePay(event);">

                    <div id="loader">
                        <img alt="loader" src="LoaderIcon.gif">
                    </div>
                </div>
                <input type="hidden" name="order_id"  value="<?php echo @$_SESSION['order_id'];  ?>">
                <input type="hidden" name="user_id"  value="<?php echo $_SESSION['user_id']; ?>">

              
                <input type="hidden" name="cake_id"  value="<?php echo @$_SESSION['cake_id']; ?>">

                <input type='hidden' name='amount' value="<?php echo @$_SESSION['payment']; ?>"> <input
                    type='hidden' name='currency_code' value='inr'> <input
                    type='hidden' name='item_name' value='Test Product'>
                <input type='hidden' name='item_number' value='PHPPOTEG#1'>
            </form>
<?php 
$con  = mysqli_connect("localhost","root","","cake") or die("Database not connected");
            $orde = @$_SESSION['order_id'];
            $user =  @$_SESSION['user_id'];
        $invo =  "select * from tbl_payment where `user_id`='$user' AND `order_id`='$orde' AND `payment_status`='succeeded'";
        $invo1 = mysqli_query($con,$invo);
        $invo2 = mysqli_num_rows($invo1);
        if($invo2 > 0) {
?>
<a href="../invoice.php">Invoice</a>
<?php } ?>
   <!--  <div class="test-data">
        <h3>Test Card Information</h3>
        <p>Use these test card numbers with valid expiration month
            / year and CVC code for testing with this demo.</p>
        <table class="tutorial-table" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <th>CARD NUMBER</th>
                <th>BRAND</th>
            </tr>
            <tr>
                <td>4242424242424242</td>
                <td>Visa</td>
            </tr>
            <tr>
                <td>4000056655665556</td>
                <td>Visa (debit)</td>
            </tr>
            
            <tr>
                <td>5555555555554444</td>
                <td>Mastercard</td>
            </tr>
            
            <tr>
                <td>5200828282828210</td>
                <td>Mastercard (debit)</td>
            </tr>
            
            <tr>
                <td>378282246310005</td>
                <td>American Express</td>
            </tr>
            
            <tr>
                <td>6011111111111117</td>
                <td>Discover</td>
            </tr>
            
            <tr>
                <td>30569309025904</td>
                <td>Diners Club</td>
            </tr>
            
            <tr>
                <td>3566002020360505</td>
                <td>JCB</td>
            </tr>
            <tr>
                <td>6200000000000005</td>
                <td>UnionPay</td>
            </tr>
            
        </table>
    </div> -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
function cardValidation () {
    var valid = true;
    var name = $('#name').val();
    var email = $('#email').val();
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var cvc = $('#cvc').val();

    $("#error-message").html("").hide();

    if (name.trim() == "") {
        valid = false;
    }
    if (email.trim() == "") {
           valid = false;
    }
    if (cardNumber.trim() == "") {
           valid = false;
    }

    if (month.trim() == "") {
            valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }
    if (cvc.trim() == "") {
        valid = false;
    }

    if(valid == false) {
        $("#error-message").html("All Fields are required").show();
    }

    return valid;
}
//set your publishable key
Stripe.setPublishableKey("<?php echo STRIPE_PUBLISHABLE_KEY; ?>");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
        $("#error-message").html(response.error.message).show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
        //submit form to the server
        $("#frmStripePayment").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler);

        //submit from callback
        return false;
    }
}
</script>
</body>
</html>