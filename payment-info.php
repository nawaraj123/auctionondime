<?php
    session_start();

    $states = array('AL'=>"Alabama",'AK'=>"Alaska",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut"
                   ,'DE'=>"Delaware",'DC'=>"District Of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'HI'=>"Hawaii",'ID'=>"Idaho",'IL'=>"Illinois"
                   ,'IN'=>"Indiana",'IA'=>"Iowa",'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland"
                   ,'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana"
                   ,'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York"
                   ,'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma",'OR'=>"Oregon",'PA'=>"Pennsylvania"
                   ,'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah"
                   ,'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");
    $errors = array();

    if ('POST' === $_SERVER['REQUEST_METHOD'])
    {
        require('./payment-functions.php');

        $credit_card           = sanitize($_POST['credit_card']);
        $expiration_month      = (int) sanitize($_POST['expiration_month']);
        $expiration_year       = (int) sanitize($_POST['expiration_year']);
        $cvv                   = sanitize($_POST['cvv']);
        $cardholder_first_name = sanitize($_POST['cardholder_first_name']);
        $cardholder_last_name  = sanitize($_POST['cardholder_last_name']);
        $billing_address       = sanitize($_POST['billing_address']);
        $billing_address2      = sanitize($_POST['billing_address2']);
        $billing_city          = sanitize($_POST['billing_city']);
        $billing_state         = sanitize($_POST['billing_state']);
        $billing_zip           = sanitize($_POST['billing_zip']);
        $telephone             = sanitize($_POST['telephone']);
        $email                 = sanitize($_POST['email']);
        $recipient_first_name  = sanitize($_POST['recipient_first_name']);
        $recipient_last_name   = sanitize($_POST['recipient_last_name']);
        $shipping_address      = sanitize($_POST['shipping_address']);
        $shipping_address2     = sanitize($_POST['shipping_address2']);
        $shipping_city         = sanitize($_POST['shipping_city']);
        $shipping_state        = sanitize($_POST['shipping_state']);
        $shipping_zip          = sanitize($_POST['shipping_zip']);
//        $honeypot              = sanitize($_POST['ssn']);
        $token                 = sanitize($_POST['token']);

        if ($token !== $_SESSION['token'])
        {
            $errors['token'] = "This form submission is invalid. Please try again or contact support for additional assistance.";
        }
        if (!empty($honeypot))
        {
            $errors['hp'] = "This form submission is invalid. Please try again or contact support for additional assistance.";
        }
        if (!validateCreditcard_number($credit_card))
        {
            $errors['credit_card'] = "Please enter a valid credit card number";
        }
        if (!validateCreditCardExpirationDate($expiration_month, $expiration_year))
        {
            $errors['expiration_month'] = "Please enter a valid expiration date for your credit card";
        }
        if (!validateCVV($credit_card, $cvv))
        {
            $errors['cvv'] = "Please enter the security code (CVV number) for your credit card";
        }
        if (empty($cardholder_first_name))
        {
            $errors['cardholder_first_name'] = "Please provide the card holder's first name";
        }
        if (empty($cardholder_last_name))
        {
            $errors['cardholder_last_name'] = "Please provide the card holder's last name";
        }
        if (empty($billing_address))
        {
            $errors['billing_address'] = 'Please provide your billing address.';
        }
        if (empty($billing_city))
        {
            $errors['billing_city'] = 'Please provide the city of your billing address.';
        }
        if (empty($billing_state))
        {
            $errors['billing_state'] = 'Please provide the state for your billing address.';
        }
        if (!preg_match("/^\d{5}$/", $billing_zip))
        {
            $errors['billing_zip'] = 'Make sure your billing zip code is 5 digits.';
        }
        if (empty($telephone) || strlen($telephone) > 20)
        {
            $errors['billing_city'] = 'Please provide a telephone number where we can reach you if necessary.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = "Please provide a valid email address";
        }
        if (empty($recipient_first_name))
        {
            $errors['recipient_first_name'] = "Please provide the recipient's first name";
        }
        if (empty($recipient_last_name))
        {
            $errors['recipient_last_name'] = "Please provide the recipient's last name";
        }
        if (empty($shipping_address))
        {
            $errors['shipping_address'] = 'Please provide your shipping address.';
        }
        if (empty($shipping_city))
        {
            $errors['shipping_city'] = 'Please provide the city of your shipping address.';
        }
        if (empty($shipping_state))
        {
            $errors['shipping_state'] = 'Please provide the state for your shipping address.';
        }
        if (!preg_match("/^\d{5}$/", $shipping_zip))
        {
            $errors['shipping_zip'] = 'Make sure your shipping zip code is 5 digits.';
        }

        // If there are no errors let's process the payment
        if (count($errors) === 0)
        {
            // Format the expiration date
            $expiration_date = sprintf("%04d-%02d", $expiration_year, $expiration_month);

            // Include the SDK
            //echo 'nawaraj';
			echo 'validaton complete';

            // Process the transaction using the AIM API
		}
	}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Member payment Info | Auction on A Dime</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Custom CSS -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- slider -->
<!-- Demo CSS -->
<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!-- login form css -->
<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

<!-- Modernizr -->
<script src="js/modernizr.js"></script>
<style>
#errormessage
{
    background-color: #FFE7E7;
    border: 3px solid #CC0033;
    color: #000000;
    margin: 20px auto;
    padding: 10px;
    width: 890px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -moz-box-shadow: 5px 5px 5px #ccc;
    -webkit-box-shadow: 5px 5px 5px #ccc;
    box-shadow: 5px 5px 5px #ccc;
    background: -webkit-gradient(linear, 0 0, 0 bottom, from(#FFEAEA), to(#FFB3B3));
    background: -moz-linear-gradient(#FFEAEA, #FFB3B3);
    background: linear-gradient(#FFEAEA, #FFB3B3);
}
</style>
<!--<style>body
{
    font-family: verdana, arial, helvetica, sans-serif;
    font-size: .8em;
}
label
{
    display: block;
    font-family: arial, helvetica, sans-serif;
    font-weight: bold;
}
input[type="text"]
{
    width: 300px;
}
#cvv, #billing_zip, #shipping_zip
{
    width: 80px;
}
fieldset
{
    margin-bottom: 20px;
}
legend
{
    font-weight: bold;
}
#errormessage
{
    background-color: #FFE7E7;
    border: 3px solid #CC0033;
    color: #000000;
    margin: 20px auto;
    padding: 10px;
    width: 890px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -moz-box-shadow: 5px 5px 5px #ccc;
    -webkit-box-shadow: 5px 5px 5px #ccc;
    box-shadow: 5px 5px 5px #ccc;
    background: -webkit-gradient(linear, 0 0, 0 bottom, from(#FFEAEA), to(#FFB3B3));
    background: -moz-linear-gradient(#FFEAEA, #FFB3B3);
    background: linear-gradient(#FFEAEA, #FFB3B3);
}
.labelerror
{
    color: #ff0000;
    font-weight: bold;
}
.hp
{
    display: none !important;
}
.labelerror
{
    color: #ff0000;
}
.labelvalid
{
    color: #00ff00;
}
</style>-->
</head>

<body>
<!-- header part -->
<header>
  <div class="container">
    <div class="col-md-3 logo">
      <h1>Auction on <br>
        A Dime</h1>
    </div>
    <div class="col-md-3 log-box"><a href="sign.php">Log In</a> <a href="sign.php">Sign Up</a>
      <p><a href="#"><i class="fa fa-facebook-square"></i></a> <a href="#"><i class="fa fa-twitter-square"></i></a> <a href="#"><i class="fa fa-google-plus-square"></i></a> <a href="#"><i class="fa fa-instagram"></i> </i></a> <a href="#"><i class="fa fa-youtube-square"></i></a> <a href="#"><i class="fa fa-pinterest-square"></i></a> </p>
    </div>
  </div>
</header>

<!-- end of header part --> 

<!-- navigation menu part -->
<div class="menu">
  <div class="container">
    <nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
        <li><a href="index.php">Home</a></li>
        <li> <a href="#" aria-haspopup="true"><span>Categories</span></a>
          <ul>
            <li><a href="#">Mobiles</a></li>
            <li><a href="#">Laptops</a></li>
            <li><a href="#">Desktops</a></li>
            <li><a href="#">Home Theater</a></li>
            <li><a href="#">Home Appliance</a></li>
            <li><a href="#">Electronics</a></li>
          </ul>
        </li>
        <li><a href="work.php">How it Works</a></li>
        <li><a href="buy-bids.php">Buy Bids</a></li>
        <li><a href="help.php">Help</a></li>
        <li><a href="account.php"><span>My Account</span></a>
          <ul>
            <li><a href="myboard.php">My Board</a></li>
            <li><a href="payment-info.php">My Payment Info</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="clearfix"></div>
<!-- end of navigation part --> 

<!-- products part -->
<div class="container cont-box">
  <div class="col-md-6">
    <h3>Customer Shipping</h3>
    <section>
      <div id="container_demo" >
        <div id="wrapper">
          <div id="login">
          <?php
    if (count($errors))
    {
?>
        <div id="errormessage">
            <h2>
                There was an error with your submission. Please make the necessary corrections and try again.
            </h2>
            <ul>
<?php
            foreach ($errors as $error)
            {
?>
                <li><?php echo $error; ?></li>
<?php
            }
?>
            </ul>
        </div>
<?php
    }
?>
<form action="" method="post">
            <!--<p class="hp">
                <input type="text" name="ssn" id="ssn" value="">
            </p>-->
            <fieldset>
                <legend>Payment Information</legend>
                <p>
                    <label for="credit_card"<?php if (array_key_exists('credit_card', $errors)) echo ' class="labelerror"'; ?>>Credit Card Number</label>
                    <input type="text" name="credit_card" id="credit_card" autocomplete="off" maxlength="19" value="">
                </p>
                <p>
                    <label for="expiration_month"<?php if (array_key_exists('expiration_month', $errors)) echo ' class="labelerror"'; ?>>Expiration Date</label>
                    <select name="expiration_month" id="expiration_month">
                        <option value="0"> </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select name="expiration_year" id="expiration_year">
                        <option value="0"> </option>
<?php
    $current_year = date("Y");
    $stop_year = $current_year + 12;
    for ($year = $current_year; $year <= $stop_year; $year++)
    {
?>
                        <option value="<?php echo $year ?>"><?php echo $year ?></option>
<?php
    }
?>
                    </select>
                </p>
                <p>
                    <label for="cvv"<?php if (array_key_exists('cvv', $errors)) echo ' class="labelerror"'; ?>>Security Code</label>
                    <input type="text" name="cvv" id="cvv" autocomplete="off" value="" maxlength="4">
                </p>
                <p>
                    <img src="/images/3digit.png" width="180" height="113" alt="Three digit CVV number on the back of the credit card">
                    <img src="/images/4digit.png" width="180" height="113" alt="Four digit CVV number on the front of the credit card">
                </p>
            </fieldset>
            <fieldset>
                <legend>Billing Information</legend>
                <p>
                    <label for="cardholder_first_name"<?php if (array_key_exists('cardholder_first_name', $errors)) echo ' class="labelerror"'; ?>>Cardholder's First Name</label>
                    <input type="text" name="cardholder_first_name" id="cardholder_first_name" maxlength="30" value="<?php if (isset($cardholder_first_name)) echo $cardholder_first_name; ?>">
                </p>
                <p>
                    <label for="cardholder_last_name"<?php if (array_key_exists('cardholder_last_name', $errors)) echo ' class="labelerror"'; ?>>Cardholder's Last Name</label>
                    <input type="text" name="cardholder_last_name" id="cardholder_last_name" maxlength="30" value="<?php if (isset($cardholder_last_name)) echo $cardholder_last_name; ?>">
                </p>
                <p>
                    <label for="billing_address"<?php if (array_key_exists('billing_address', $errors)) echo ' class="labelerror"'; ?>>Billing Address</label>
                    <input type="text" name="billing_address" id="billing_address" maxlength="45" value="<?php if (isset($billing_address)) echo $billing_address; ?>">
                </p>
                <p>
                    <label for="billing_address2"<?php if (array_key_exists('billing_address2', $errors)) echo ' class="labelerror"'; ?>>Suite/Apt #</label>
                    <input type="text" name="billing_address2" id="billing_address2" maxlength="45" value="<?php if (isset($billing_address2)) echo $billing_address2; ?>">
                </p>
                <p>
                    <label for="billing_city"<?php if (array_key_exists('billing_city', $errors)) echo ' class="labelerror"'; ?>>City</label>
                    <input type="text" name="billing_city" id="billing_city" maxlength="25" value="<?php if (isset($billing_city)) echo $billing_city; ?>">
                </p>
                <p>
                    <label for="billing_state"<?php if (array_key_exists('billing_state', $errors)) echo ' class="labelerror"'; ?>>State</label>
                    <select id="billing_state" name="billing_state">
                        <option value="0"> </option>
<?php
    foreach ($states as $state_abbr => $state_name)
    {
        $selected = (isset($billing_state) && $billing_state === $state_abbr) ? ' selected="selected"' : '';
?>
                        <option value="<?php echo $state_abbr; ?>"<?php echo $selected; ?>><?php echo $state_name; ?></option>
<?php
    }
?>
                    </select>
                </p>
                <p>
                    <label for="billing_zip"<?php if (array_key_exists('billing_zip', $errors)) echo ' class="labelerror"'; ?>>Zip Code</label>
                    <input type="text" name="billing_zip" id="billing_zip" maxlength="5" value="<?php if (isset($billing_zip)) echo $billing_zip; ?>">
                </p>
                <p>
                    <label for="telephone"<?php if (array_key_exists('telephone', $errors)) echo ' class="labelerror"'; ?>>Telephone Number</label>
                    <input type="text" name="telephone" id="telephone" maxlength="20" value="<?php if (isset($telephone)) echo $telephone; ?>">
                </p>
                <p>
                    <label for="email"<?php if (array_key_exists('email', $errors)) echo ' class="labelerror"'; ?>>Email Address</label>
                    <input type="text" name="email" id="email" maxlength="20" value="<?php if (isset($email)) echo $email; ?>">
                </p>
            </fieldset>
            <fieldset>
                <legend>Shipping Information</legend>
                <p>
                    <label for="recipient_first_name"<?php if (array_key_exists('recipient_first_name', $errors)) echo ' class="labelerror"'; ?>>Recipient's First Name</label>
                    <input type="text" name="recipient_first_name" id="recipient_first_name" maxlength="30" value="<?php if (isset($recipient_first_name)) echo $recipient_first_name; ?>">
                </p>
                <p>
                    <label for="recipient_last_name"<?php if (array_key_exists('recipient_last_name', $errors)) echo ' class="labelerror"'; ?>>Recipient's Last Name</label>
                    <input type="text" name="recipient_last_name" id="recipient_last_name" maxlength="30" value="<?php if (isset($recipient_last_name)) echo $recipient_last_name; ?>">
                </p>
                <p>
                    <label for="shipping_address"<?php if (array_key_exists('shipping_address', $errors)) echo ' class="labelerror"'; ?>>Shipping Address</label>
                    <input type="text" name="shipping_address" id="shipping_address" maxlength="45" value="<?php if (isset($shipping_address)) echo $shipping_address; ?>">
                </p>
                <p>
                    <label for="shipping_address2"<?php if (array_key_exists('shipping_address2', $errors)) echo ' class="labelerror"'; ?>>Suite/Apt #</label>
                    <input type="text" name="shipping_address2" id="shipping_address2" maxlength="45" value="<?php if (isset($shipping_address2)) echo $shipping_address2; ?>">
                </p>
                <p>
                    <label for="shipping_city"<?php if (array_key_exists('shipping_city', $errors)) echo ' class="labelerror"'; ?>>City</label>
                    <input type="text" name="shipping_city" id="shipping_city" maxlength="30" value="<?php if (isset($shipping_city)) echo $shipping_city; ?>">
                </p>
                <p>
                    <label for="shipping_state"<?php if (array_key_exists('shipping_state', $errors)) echo ' class="labelerror"'; ?>>State</label>
                    <select id="shipping_state" name="shipping_state">
                        <option value="0"> </option>
<?php
    foreach ($states as $state_abbr => $state_name)
    {
        $selected = (isset($shipping_state) && $shipping_state === $state_abbr) ? ' selected="selected"' : '';
?>
                        <option value="<?php echo $state_abbr; ?>"<?php echo $selected; ?>><?php echo $state_name; ?></option>
<?php
    }
?>
                    </select>
                </p>
                <p>
                    <label for="shipping_zip"<?php if (array_key_exists('shipping_zip', $errors)) echo ' class="labelerror"'; ?>>Zip Code</label>
                    <input type="text" name="shipping_zip" id="shipping_zip" maxlength="5" value="<?php if (isset($shipping_zip)) echo $shipping_zip; ?>">
                </p>
            </fieldset>
            <p>
                <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>">
                <input type="submit" value="Checkout">
            </p>
        </form>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js"></script>
        <script type="text/javascript" src="/javascripts/payment-form.js"></script>
        <script type="text/javascript" src="/javascripts/validation.js"></script>
            <!--<form autocomplete="on" action="">
              <p>
                <input id="firstname" name="" required type="text" placeholder="First Name"/>
              </p>
              <p>
                <input id="lastname" name="" required type="text" placeholder="Last Name"/>
              </p>
              <p>
                <input id="company" name="" required type="text" placeholder="First Name"/>
              </p>
              <p>
                <input id="address" name="" required type="text" placeholder="Address"/>
              </p>
              <p>
                <input id="city" name="" required type="text" placeholder="City"/>
              </p>
              <p>
                <input id="state/province" name="" required type="text" placeholder="State/Province"/>
              </p>
              <p>
                <input id="zipcode" name="Zip Code" required type="text" placeholder="Zip/Postal Code"/>
              </p>
              <p>
                <input id="country" name="" required type="text" placeholder="Country"/>
              </p>
              <p class="login button">
                <input type="submit" value="Submit" />
              </p>
            </form>
          </div>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
  </div>
  <div class="col-md-6">
    <h3>Credit Card Information</h3>
    
    <section>
      <div id="container_demo" >
        <div id="wrapper">
          <div id="login" >
            <form >
			<p>Exp Date
			<br>
			<div class="clearfix"></div>
			<select class="dba" title="Month" id="month" name="expiration_month" aria-label="Month"><option selected="1" value="0">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select><select class="dba" name="expiration_year" id="expdate_year"><option selected="" value="">--Year--</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option></select><p/>
		
              <p><input id="ccv" name="cvv" required type="text" placeholder="Card Verification Value - CCV"/></p>               <p><input id="ccv" name="credit_card" required type="text" placeholder="Card Card Number"/></p>
			  <p>
                <input id="firstname" name="" required type="text" placeholder="First Name"/>
              </p>
			  <p>
                <input id="lastname" name="" required type="text" placeholder="Last Name"/>
              </p>
			  <p>
                <input id="address" name="" required type="text" placeholder="Address"/>
              </p>
			  <p>
                <input id="city" name="" required type="text" placeholder="City"/>
              </p>
			  <p>
                <input id="state" name="" required type="text" placeholder="State/Province"/>
              </p>
			  <p>
                <input id="zipcode" name="Zip Code" required type="text" placeholder="Zip/Postal Code"/>
              </p>
			  <p>
                <input id="country" name="" required type="text" placeholder="Country"/>
              </p>
              <p class="signin button">
                <input type="submit" value="Submit"/>
              </p>
            </form>-->
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- footer -->
<footer>
<div class="bgtop"></div>
  <div class="container foot">
	<div class="col-md-2">
    <h4>About us</h4>
<ul>
<li><a href="#">Register</a></li>
<li><a href="#">My Account</a></li>
<li><a href="#">Media</a></li>
<li><a href="#">Contact Us</a></li>
<li><a href="#">Contests & Giveaways</a></li>
<li><a href="#">Official Blog</a></li>
</ul>
</div>


    <div class="col-md-2">
<h4>Help</h4>
<ul>
<li><a href="#">How Does A Dime Work?</a></li>
<li><a href="#">Terms & Conditions</a></li>
<li><a href="#">Privacy</a></li>
<li><a href="#">Site Map</a></li>
<li><a href="#">Affiliates</a></li>
<li><a href="#">Suppliers</a></li>
</ul>
</div>


    <div class="col-md-2">
    <h4>Auctions</h4>
    <ul>
<li><a href="#">Live Auctions</a></li>
<li><a href="#">Closed Auctions</a></li>
<li><a href="#">Winners Circle</a></li>
</ul>
</div>


    <div class="col-md-2">
<h4>My Board</h4>
<ul>
<li><a href="#">View </a></li>
<li><a href="#">Manage </a></li>

</ul>
</div>


    <div class="col-md-1 socn">
    <h4>find us</h4>
<ul>
<li><a href="#"><img src="images/fb.png" /></a></li>
<li><a href="#"><img src="images/linkd.png" /></a></li>
<li><a href="#"><img src="images/youtube.png" /></a></li>
<li><a href="#"><img src="images/twitter.png" /></a></li>
<li><a href="#"><img src="images/googleplus.png" /></a></li>
</ul>
</div>


    <div class="col-md-3">
    <div class="sharing">
    <img src="images/know.png" class="fl-left" /><br />

    <div class="clearfix"></div>

<iframe src="//www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button_count" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowTransparency="true"></iframe>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<div class="g-plus" data-action="share" data-annotation="bubble"></div>

<p><a class="twitter-share-button"
  href="https://twitter.com/share"
  data-via="twitterdev">
Tweet
</a>
<script>
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script></p>
</div>
</div>
  </div>
</footer>
<!-- end of footer --> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 


<!-- FlexSlider --> 
<script defer src="js/jquery.flexslider.js"></script> 
<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script></html>