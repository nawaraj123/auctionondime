<?Php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
require "config.php";  // database connection
//////////
//////////////////////////////// Main Code sarts /////////////////////////////////////////////


$in=$_GET['txt'];
if(!ctype_alnum($in)){
echo "कृपया आयोजना को कोड हाल्नु होला";
exit;
}

$msg="";

if(strlen($in)>0 and strlen($in) <20 ){
$sql="select Yojana_Name,District_name,Subject_Name,vdc_name,Yojana_Address,Ward_no,District_Yojana_SN from yojana_details where Yojana_Id = '$in'";
$dbo->query("SET NAMES utf8");
foreach ($dbo->query($sql) as $nt)
{		

//$msg.=$nt[name]."->$nt[id]<br>";
$msg .="<input value= $nt[Yojana_Name]  />";
$msg1 .="<input value= $nt[District_name]  />";
$msg2 .="<input value= $nt[Subject_Name]  />";
$msg3 .="<input value= $nt[vdc_name]  />";
$msg4 .="<input value= $nt[Yojana_Address]  />";
$msg5 .="<input value= $nt[Ward_no]  />";
$msg6 .="<input value= $nt[District_Yojana_SN]  />";






//$msg .="<option value='$nt[name]'>";

}
}

echo 'आयोजनाको नाम:'."".$msg.'</br>';
echo 'जिल्ला को  नाम:'.$msg1.'</br>';
echo 'जिल्लागत आयोजनाको क्र सं :'.$msg6.'</br>';

echo 'बिषयगत नाम:'.$msg2.'</br>';
echo 'गा वि स / न पा:'.$msg3.'</br>';
echo 'स्थान:'.$msg4.'</br>';
echo 'वार्ड नं:'.$msg5.'</br>';

?>