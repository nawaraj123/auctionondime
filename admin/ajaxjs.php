<?php

//Fetching Values from URL  
$Yojana_Name = $_POST['yojana_name'];
$District_id = $_POST['District_id'];
$Subject_Name = $_POST['Subject_Name'];
$vdc_name = $_POST['vdc_name'];
$Ward_no = $_POST['Ward_no'];
$Yojana_Address = $_POST['Yojana_Address'];
$District_PrathimktaKram = $_POST['District_PrathimktaKram'];








// Establishing connection with server..
$connection = mysql_connect("localhost", "root", "");
// Selecting Database 
$db = mysql_select_db("pcprpgov_peace", $connection);

//Insert query 
	$query = mysql_query("SET NAMES utf8");
    $query = mysql_query('select Yojana_Name  from  yojana_details where Yojana_Name= "'. $Yojana_Name .'" and District_id="'. $District_id .'" and Subject_Name="'. $Subject_Name .'" and vdc_name="'. $vdc_name .'" and Ward_no="'. $Ward_no .'" and Yojana_Address="'. $Yojana_Address .'" and District_PrathimktaKram="'. $District_PrathimktaKram .'" ');

	if(mysql_num_rows($query)>0){
	//and we send 0 to the ajax request
	
	echo " AAyojana is alredy exist";
	//echo 0;
}else{
	//else if it's not bigger then 0, then it's available '
	//and we send 1 to the ajax request
echo "Ayojana is available";}
	
	
	
	

//connection closed
mysql_close($connection);
?>