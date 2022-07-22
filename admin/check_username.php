<?php
//connect to database
 include_once('../Dbconnection/db_conn.php');

//get the username
$username = mysql_real_escape_string($_POST['username']);
$yojana_name=mysql_real_escape_string($_POST['yojana_name']);

//echo $yojana_name; die(); 



//mysql query to select field username if it's equal to the username that we check '
$result = mysql_query('select District_id,Yojana_Name from  yojana_details where  District_id = "'. $username .'" ');
//echo $result;








//print_r($result) ;die();

//if number of rows fields is bigger them 0 that means it's NOT available '
if(mysql_num_rows($result)>1){
	//and we send 0 to the ajax request
	echo 0;
}else{
	//else if it's not bigger then 0, then it's available '
	//and we send 1 to the ajax request
	echo 1;
}

?>