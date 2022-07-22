<?php

require_once "../../Dristi_ad_test/classes/Image.class.php";
require_once "../classes/Uploadimage.class.php";
include("../../Dbconnection/db_conn.php");

$file = $_FILES['file']['name'];
if(isset($_POST['submit'])&&$file!=""){
$uploadObj=new Uploadimage();
$uploadObj->image=$file;
$ext=$uploadObj->getExtension();
$ImageObj=new Image();
if(strtolower($ext)=='gif'||strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'){
$uploadObj->upload('../uploadedimage/big');
$small=$uploadObj->image;
$uploadObj->resize_both($small,'../uploadedimage/crop/',150,150);
$uploadObj->createthumb($small,'../uploadedimage/bigthumb/',400,400);
$ImageObj->setImage($file);
$ImageObj->setAlbumid($_POST['aid']);
$ImageObj->setImagecode($uploadObj->code);
$ImageObj->setTime(time());
$file=$file.' File uploaded Sucessfully';
$get=$ImageObj->insert();

			 }
else
      {
		$file=$file.' Error cannot upload invalid image format'; 
	  }
	  

  echo '<script>alert("Image uploaded successfully."); window.location="../manage_gallery.php?id='.$_POST['aid'].'";</script>';

	    }

?>