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
$sql="select Yojana_Name,District_name,Subject_Name,vdc_name,Yojana_Address,Ward_no,District_PrathimktaKram,Karyadal_Report,
Report_5560,Thap_Mag,Sifaris_Jipunisa,Sifaris_Jipunisa_Date,SIfaris_CDO,Sifaris_cdo_Date,Sifaris_cdo_Chalani,Sifaris_DDC,DDC_Sifaris_Date,ifaris_DDC_Chalani,
Other_Sifaris,Other_Sifaris_Karta,Other_Sifaris_Date,Other_Sifaris_Chalani,Demanded_amount,Mag_Bibaran,destruction_type,reconstruction_type,
tok_aadesh_karkta,tok_aadesh_miti,tok_aadesh_bibaran from yojana_details where Yojana_Id = '$in'";
$dbo->query("SET NAMES utf8");
foreach ($dbo->query($sql) as $nt)
{		
$msg .="<input  value= $nt[Yojana_Name] name=Yojana_Name  />";
$msg1 .="<input value= $nt[District_name] name=District_name  />";
$msg2 .="<input value= $nt[Subject_Name] name=Subject_Name />";
$msg3 .="<input value= $nt[vdc_name] name=vdc_name />";
$msg4 .="<input value= $nt[Yojana_Address] name=Yojana_Address />";
$msg5 .="<input value= $nt[Ward_no] name=Ward_no  />";

$msg6 .="<input value= $nt[Karyadal_Report]  name=Karyadal_Report />";
$msg7 .="<input value= $nt[Report_5560] name=Report_5560  />";
$msg8 .="<input value= $nt[Thap_Mag]  name=Thap_Mag />";
$msg9 .="<input value= $nt[Sifaris_Jipunisa] name=Sifaris_Jipunisa />";
$msg10 .="<input value= $nt[Sifaris_Jipunisa_Date] name=Sifaris_Jipunisa_Date />";
$msg11.="<input value= $nt[SIfaris_CDO] name=SIfaris_CDO  />";
$msg12.="<input value= $nt[Sifaris_cdo_Date]  name=Sifaris_cdo_Date />";
$msg13.="<input value= $nt[Sifaris_cdo_Chalani]  name=Sifaris_cdo_Chalani />";
$msg14.="<input value= $nt[Sifaris_DDC]  name=Sifaris_DDC />";
$msg15.="<input value= $nt[DDC_Sifaris_Date] name=DDC_Sifaris_Date />";
$msg16.="<input value= $nt[ifaris_DDC_Chalani] name=ifaris_DDC_Chalani />";
$msg17.="<input value= $nt[Other_Sifaris] name=Other_Sifaris />";
$msg18.="<input value= $nt[Other_Sifaris_Karta] name=Other_Sifaris_Karta />";
$msg19.="<input value= $nt[Other_Sifaris_Date] name=Other_Sifaris_Date  />";
$msg20.="<input value= $nt[Other_Sifaris_Chalani] name=Other_Sifaris_Chalani  />";
$msg21 .="<input value= $nt[Demanded_amount] name=Demanded_amount />";
$msg22 .="<input value= $nt[Mag_Bibaran] name=Mag_Bibaran  />";
$msg23 .="<input value= $nt[destruction_type] name=destruction_type />";
$msg24 .="<input value= $nt[reconstruction_type] name=reconstruction_type />";
$msg25 .="<input value= $nt[tok_aadesh_karkta] name=tok_aadesh_karkta  />";
$msg26 .="<input value= $nt[tok_aadesh_miti] name=tok_aadesh_miti  />";
$msg27 .="<input value= $nt[tok_aadesh_bibaran] name=tok_aadesh_bibaran />";
$msg28 .="<input value= $nt[District_PrathimktaKram] name=District_PrathimktaKram />";


//$msg .="<option value='$nt[name]'>";

}
}

echo 'आयोजनाको नाम:'."".$msg.'</br>';
echo 'जिल्ला को  नाम:'.$msg1.'</br>';
echo 'बिषयगत नाम:'.$msg2.'</br>';
echo 'गा वि स / न पा:'.$msg3.'</br>';
echo 'स्थान:'.$msg4.'</br>';
echo 'वार्ड नं:'.$msg5.'</br>';
echo 'प्राथमिकता क्रम::'.$msg28.'</br>';
echo 'कार्यदलको रिपोर्टमा::'.$msg6.'</br>';
echo '५५६० मा::'.$msg7.'</br>';
echo 'थप मागमा::'.$msg8.'</br>';
echo 'जिपुनिस सिफःरिस:'.$msg9.'</br>';
echo 'जिपुनिस निर्णय मिति:'.$msg10.'</br>';
echo 'जिल्ला प्रसाशन सिफारिस:'.$msg11.'</br>';
echo 'जिल्ला प्रसाशन सिफारिस मिति:'.$msg12.'</br>';
echo 'जिल्ला प्रसाशन  पत्रको चनं:'.$msg13.'</br>';
echo 'जिविस सिफारिस:'.$msg14.'</br>';
echo 'जिविस पत्रको मिति:'.$msg15.'</br>';
echo 'जिविस पत्रको चनं:'.$msg16.'</br>';
echo 'अन्य सिफारिस:'.$msg17.'</br>';
echo 'अन्य सिफारिस कर्तां:'.$msg18.'</br>';
echo 'अन्य सिफारिस मिति:'.$msg19.'</br>';
echo 'अन्य सिफारिसको चनं::'.$msg20.'</br>';
echo 'मागको विवरण:'.$msg21.'</br>';
echo 'माग गरेको रकम:'.$msg22.'</br>';
echo 'क्षतिको प्रकार:'.$msg23.'</br>';
echo 'पुनर्निर्माणको प्रकार:'.$msg24.'</br>';
echo 'तोक आदेश कर्ता:'.$msg25.'</br>';
echo 'तोकआदेश मिति:'.$msg26.'</br>';
echo 'तोकआदेश विवरण:'.$msg27.'</br>';



?>