<?Php
///////// Database Details , add  here  ////
$dbhost_name = "localhost";
$database = "pcprpgov_peace";  // Your database name
$username = "root";                  //  Login user id 
$password = "";                  //   Login password
/////////// End of Database Details //////

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

?> 