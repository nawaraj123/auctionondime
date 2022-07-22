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
        $honeypot              = sanitize($_POST['ssn']);
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
            require_once('./config.php');

            // Process the transaction using the AIM API
            $transaction = new AuthorizeNetAIM;
            $transaction->setSandbox(AUTHORIZENET_SANDBOX);
            $transaction->setFields(
                array(
                'amount' => '1.00',
                'card_num' => $credit_card,
                'exp_date' => $expiration_date,
                'first_name' => $cardholder_first_name,
                'last_name' => $cardholder_last_name,
                'address' => $billing_address,
                'city' => $billing_city,
                'state' => $billing_state,
                'zip' => $billing_zip,
                'email' => $email,
                'card_code' => $cvv,
                'ship_to_first_name' => $recipient_first_name,
                'ship_to_last_name' => $recipient_last_name,
                'ship_to_address' => $shipping_address,
                'ship_to_city' => $shipping_city,
                'ship_to_state' => $shipping_state,
                'ship_to_zip' => $shipping_zip,
                )
            );
            $response = $transaction->authorizeAndCapture();
            if ($response->approved)
            {
                // Transaction approved. Collect pertinent transaction information for saving in the database.
                $transaction_id     = $response->transaction_id;
                $authorization_code = $response->authorization_code;
                $avs_response       = $response->avs_response;
                $cavv_response      = $response->cavv_response;

                // Put everything in a database for later review and order processing
                // How you do this depends on how your application is designed
                // and your business needs.

                //unset our PRG session variable if it exists
                if (isset($_SESSION['prg']))
                {
                    unset($_SESSION['prg']);
                }

                // Once we're finished let's redirect the user to a receipt page
                header('Location: thank-you-page.php');
                exit;
            }
            else if ($response->declined)
            {
                // Transaction declined. Set our error message.
                $errors['declined'] = 'Your credit card was declined by your bank. Please try another form of payment.';
            }
            else
            {
                // And error has occurred. Set our error message.
                $errors['error'] = 'We encountered an error while processing your payment. Your credit card was not charged. Please try again or contact customer service to place your order.';

                // Collect transaction response information for possible troubleshooting
                // Since our application won't be doing this we'll comment this out for now.
                //
                // $response_subcode     = $response->response_subcode;
                // $response_reason_code = $response->response_reason_code;
            }
        }
        else
        {
            // Create an array in our session for use to store their variables
            $_SESSION['prg'] = array();

            // Put their information into the array
            //$_SESSION['prg']['credit_card']           = $credit_card;
            //$_SESSION['prg']['expiration_month']      = $expiration_month;
            //$_SESSION['prg']['expiration_year']       = $expiration_year;
            $_SESSION['prg']['cvv']                   = $cvv;
            $_SESSION['prg']['cardholder_first_name'] = $cardholder_first_name;
            $_SESSION['prg']['cardholder_last_name']  = $cardholder_last_name;
            $_SESSION['prg']['billing_address']       = $billing_address;
            $_SESSION['prg']['billing_address2']      = $billing_address2;
            $_SESSION['prg']['billing_city']          = $billing_city;
            $_SESSION['prg']['billing_state']         = $billing_state;
            $_SESSION['prg']['billing_zip']           = $billing_zip;
            $_SESSION['prg']['telephone']             = $telephone;
            $_SESSION['prg']['email']                 = $email;
            $_SESSION['prg']['recipient_first_name']  = $recipient_first_name;
            $_SESSION['prg']['recipient_last_name']   = $recipient_last_name;
            $_SESSION['prg']['shipping_address']      = $shipping_address;
            $_SESSION['prg']['shipping_address2']     = $shipping_address2;
            $_SESSION['prg']['shipping_city']         = $shipping_city;
            $_SESSION['prg']['shipping_state']        = $shipping_state;
            $_SESSION['prg']['shipping_zip']          = $shipping_zip;

            // Don't forget the $errors array!
            $_SESSION['prg']['errors']                = $errors;

            // Do our redirect. Make sure it sends the 303 header
            header('Location: payment-form.php', true, 303);
            exit;
        }
    }
    else if (isset($_SESSION['prg']) && is_array($_SESSION['prg']))
    {
        // Retreive the user's information and our error messages
        // Don't store the credit card information unless you are 100% sure your
        // server and website is PCI compliant!
        // $credit_card           = $_SESSION['prg']['credit_card'];
        // $expiration_month      = $_SESSION['prg']['expiration_month'];
        // $expiration_year       = $_SESSION['prg']['expiration_year'];
        $cvv                   = $_SESSION['prg']['cvv'];
        $cardholder_first_name = $_SESSION['prg']['cardholder_first_name'];
        $cardholder_last_name  = $_SESSION['prg']['cardholder_last_name'];
        $billing_address       = $_SESSION['prg']['billing_address'];
        $billing_address2      = $_SESSION['prg']['billing_address2'];
        $billing_city          = $_SESSION['prg']['billing_city'];
        $billing_state         = $_SESSION['prg']['billing_state'];
        $billing_zip           = $_SESSION['prg']['billing_zip'];
        $telephone             = $_SESSION['prg']['telephone'];
        $email                 = $_SESSION['prg']['email'];
        $recipient_first_name  = $_SESSION['prg']['recipient_first_name'];
        $recipient_last_name   = $_SESSION['prg']['recipient_last_name'];
        $shipping_address      = $_SESSION['prg']['shipping_address'];
        $shipping_address2     = $_SESSION['prg']['shipping_address2'];
        $shipping_city         = $_SESSION['prg']['shipping_city'];
        $shipping_state        = $_SESSION['prg']['shipping_state'];
        $shipping_zip          = $_SESSION['prg']['shipping_zip'];
        $errors                = $_SESSION['prg']['errors'];
    }

    $_SESSION['token'] = md5(uniqid(rand(), true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Payment Form</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta http-equiv="Content-Language" content="en-us">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
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
            <p class="hp">
                <input type="text" name="ssn" id="ssn" value="">
            </p>
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
    </body>
</html>