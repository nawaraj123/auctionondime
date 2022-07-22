<?php
//include_once("define/define.php");
if(! function_exists("__autoload")){
function __autoload($class)
	{
	
	$url = $_SERVER['REQUEST_URI'];
	$arr = explode("/",$url);
//	if(in_array("CMS_motor",$arr))
  //   {
 /* echo '<pre>';
 print_r($arr);
  echo '</pre>';*/
 // die();
  if($arr[2] == "admin"){
		require_once "classes/".$class.".class.php";
		//BaseDAO.class
		//require_once "classes/BaseDAO.class.php";
		}
		else{
		require_once "admin/classes/".$class.".class.php";
		//require_once "Dristi_ad_test/classes/BaseDAO.class.php";
		}
	// }
	// else
	// die("URL NOT FOUND");
	}
	}//declqare this function only if there is no previous decleration
	if(! function_exists("check_required_fields")){
function check_required_fields($required_array)
{
    $field_errors=array();
    foreach($required_array as $fieldname)
    {
        if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])) ||
      ($_POST[$fieldname] !=0))
        {
            $field_errors[]=$fieldname;
        }
    }
    return $field_errors;
}
}////declqare this function only if there is no previous decleration
if(! function_exists("check_max_field_lengths")){
function check_max_field_lengths($field_length_array)
{
         $field_errors=array();
    foreach($field_length_array as $fieldname => $maxlength)
    {
        if(strlen(trim($_POST[$fieldname])) > $maxlength)
        {
            $field_errors[] = $fieldname;
        }
    }
    return $field_errors;
}
}
if(! function_exists("display_errors")){
function display_errors($error_array)
{
    echo "<p class=\"errors\">";
    echo "Please review the following fields:<br/>";
    foreach($error_array as $error)
    {
        echo " - " . $error . "<br />";
    }
    echo "</p>";
}
}
if(! function_exists("mysql_prep")){
	function mysql_prep($value)
{
   $magic_quotes_active = get_magic_quotes_gpc();
   $new_enough_php=function_exists("mysql_real_escape_string" );
   if( $new_enough_php)
   {
        if($magic_quotes_active)
        {
            $value = stripslashes( $value );
        }
        $value=mysql_real_escape_string( $value );
        
   }   else
        {
            if(!$magic_quotes_active){ $value=addslashes( $value );}
        }
    
        return $value;
}
}
	
$server_type = "web";

if($server_type == "live"){
	$SERVER	="localhost";
	$DB_USER = "root";
	$DB_PASS ="";	
	
	$DB_DATABASE="dime_auction";
}
else{	
	$SERVER = "localhost";
	$DB_USER	=	"root";
	$DB_PASS	=	"";	
	$DB_DATABASE	=	"dime_auction";
}
	
$ado=new BaseDAO($SERVER="$SERVER", $DB_USER="$DB_USER", $DB_PASS="$DB_PASS", $DB_DATABASE="$DB_DATABASE");

	try{		
		$ado->dbConnect();
	}
	catch(Exception $e){
			if($e->getCode() == BaseDAO::CONNECTION_ERROR)
				die($e->getMessage());
		}
?>