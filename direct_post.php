<?php
  $url = "http://localhost/dime_auction/direct_post.php";
  $api_login_id = '88ABcUqU6A';
  $transaction_key = 'YOUR_TRANSACTION_KEY';
  $md5_setting = 'YOUR_API_LOGIN_ID'; // Your MD5 Setting
  $amount = "5.99";

  AuthorizeNetDPM::directPostDemo($url, $api_login_id, $transaction_key, $amount, 
$md5_setting);
?>