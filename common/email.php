<?php

function send
$to = "beam_prabin10@yahoo.com";

$from_name=$_POST['name'];
$from_phone=$_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];
$subject = 'Contact from website for place demand: '.$email;
$body = '<table><tr><td>Full Name: </td> <td>'.$from_name.'</td></tr><tr><td>Phone</td><td>'.$from_phone.'</td></tr></table>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: Space Oversees <beam_prabin10@yahoo.com>' . "\r\n";
$headers .= 'From: '.$email.'notification' . "\r\n";
  $body = '<table border="0" width="200" border="1"><tr>
    <td colspan="2">Contact from website: '. $email.'</td>
  </tr>
  <tr>
    <td>Name:</td>
    <td>'.$from_name.'</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td>'.$email.'</td>
  </tr>
  <tr>
    <td>Phone:</td>
    <td>'.$from_phone.'</td>
  </tr>
   <tr>
    <td>Information:</td>
    <td>'.$message.'</td>
  </tr>
  
  
</table> ';


 if (mail($to, $subject, $body, $headers )) {
	 
	 
	 echo '<script>alert("Thanks for your feedback."); window.location="index.php";</script>';
   
  }else{
	  
	  echo '<script>alert("Feedback has been send has been failed! Please Check and try again . "); window.location="order_main.php";</script>';
   
  }
  ?>