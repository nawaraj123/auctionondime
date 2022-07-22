<?php

       include_once('common/session.php');

       include_once('../Dbconnection/db_conn.php');
	
	   include_once('classes/news.php');
	
	  $news=new News();		
		
		
if(isset($_POST['submit'])){

$Yojana_Id=$_POST['Yojana_Id'];
$Yojana_Name=$_POST['Yojana_Name,'];
$District_name=$_POST['District_name'];
$Subject_Name=$_POST['Subject_Name'];
$vdc_name=$_POST['vdc_name'];
$Yojana_Address=$_POST['Yojana_Address'];
$Ward_no=$_POST['Ward_no'];
$District_PrathimktaKram=$_POST['District_PrathimktaKram'];
$Karyadal_Report=$_POST['Karyadal_Report'];
$Report_5560=$_POST['Report_5560'];
$Thap_Mag=$_POST['Thap_Mag'];
$Sifaris_Jipunisa=$_POST['Sifaris_Jipunisa'];
$Sifaris_Jipunisa_Date=$_POST['Sifaris_Jipunisa_Date'];
$SIfaris_CDO=$_POST['SIfaris_CDO'];
$Sifaris_cdo_Date=$_POST['Sifaris_cdo_Date'];
$Sifaris_cdo_Chalani=$_POST['Sifaris_cdo_Chalani'];
$Sifaris_DDC=$_POST['Sifaris_DDC'];
$DDC_Sifaris_Date=$_POST['DDC_Sifaris_Date'];
$ifaris_DDC_Chalani=$_POST['ifaris_DDC_Chalani'];
$Other_Sifaris=$_POST['Other_Sifaris'];
$Other_Sifaris_Karta=$_POST['Other_Sifaris_Karta'];
$Other_Sifaris_Date=$_POST['Other_Sifaris_Date'];
$Other_Sifaris_Chalani=$_POST['Other_Sifaris_Chalani'];
$Demanded_amount=$_POST['Demanded_amount'];
$Mag_Bibaran=$_POST['Mag_Bibaran'];
$destruction_type=$_POST['destruction_type'];
$reconstruction_type=$_POST['reconstruction_type'];
$tok_aadesh_karkta=$_POST['tok_aadesh_karkta'];
$tok_aadesh_miti=$_POST['tok_aadesh_miti'];
$tok_aadesh_bibaran=$_POST['tok_aadesh_bibaran'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pcprpgov_peace";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES utf8");

$sql = "update yojana_details set Yojana_Name=N'$Yojana_Name',
District_name=N'$District_name',
Subject_Name=N'$Subject_Name',
vdc_name=N'$vdc_name',
Yojana_Address=N'$Yojana_Address',
Ward_no=N'$Ward_no',
District_PrathimktaKram=N'$District_PrathimktaKram',
Karyadal_Report=N'$Karyadal_Report',
Report_5560=N'$Report_5560',
Thap_Mag=N'$Thap_Mag',
 	Sifaris_Jipunisa=N'$Sifaris_Jipunisa',
Sifaris_Jipunisa_Date='$Sifaris_Jipunisa_Date',
SIfaris_CDO='$SIfaris_CDO',
Sifaris_cdo_Date='$Sifaris_cdo_Date',
Sifaris_cdo_Chalani='$Sifaris_cdo_Chalani',
Sifaris_DDC='$Sifaris_DDC',
 	DDC_Sifaris_Date='$DDC_Sifaris_Date',
 	ifaris_DDC_Chalani='$ifaris_DDC_Chalani',
Other_Sifaris='$Other_Sifaris',
Other_Sifaris_Karta='$Other_Sifaris_Karta',
Other_Sifaris_Date='$Other_Sifaris_Date',
Other_Sifaris_Chalani='$Other_Sifaris_Chalani',
Demanded_amount='$Demanded_amount',
Mag_Bibaran='$Mag_Bibaran',
destruction_type='$destruction_type',
 	reconstruction_type='$reconstruction_type',
tok_aadesh_karkta='$tok_aadesh_karkta',
 	tok_aadesh_miti='$tok_aadesh_miti',
tok_aadesh_bibaran='$tok_aadesh_bibaran' where Yojana_Id='$Yojana_Id'";
$conn->query("SET NAMES utf8");

if ($conn->query($sql) === TRUE) {
    echo "record Updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();			
		
		
		
	     
		$news->setHeading($_POST['heading']); 
		$news->setDetail($_POST['detail']);
		
		$news->setDescription($_POST['description']);
	
			if(isset($_POST['fnews']))
		
			$news->setFnews(1);
		else
			$news->setFnews(0);
		
	if(isset($_GET['id']))
			{
				$news->updateNews($_GET['id']);
			}
		else
			{	
				$news->add();
			}
			
	    }
		
		
	 if(isset($_GET['delete_id']))
			{
				$news->delete();
			}
			
	 if(isset($_GET['id']))
			{
				$newnewsObj=$news->getNews($_GET['id']);
			}
			
	 if(isset($_GET['delimage'])){
			 
			 $news->deleteImage($_GET['delimage']);
			 
			 }		
		
		
	
			   
		$newsObj=$news->listNews();   
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Yojana Info</title>
<link href="css/styleadmin.css" rel="stylesheet" type="text/css" />
<style>
#displayDiv
{
	float: right;
    margin-left: 144px;
    margin-right: -252px;
}
#displayDiv > input {
    float: left;
    margin-left: 38px;
    padding-left: 20px;
}
</style>
<script type="text/javascript">
function ajaxFunction(str)
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }
function stateChanged() 
    {
    if(httpxml.readyState==4)
      {
document.getElementById("displayDiv").innerHTML=httpxml.responseText; 

document.getElementById("msg").style.display='none';
document.getElementById("msg1").style.display='none';


      }
    }
	var url="ajax-search-demock1.php";
url=url+"?txt="+str;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);
document.getElementById("msg").innerHTML="Please Wait ...";
document.getElementById("msg").style.display='inline';



  }
</script>

<style type="text/css">
	
	
	#searchid
	{
		width:500px;
		border:solid 1px #000;
		padding:10px;
		font-size:14px;
	}
	#result
	{
		position:absolute;
		width:500px;
		padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
	}
	.show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
</style>
<script>
function ConfirmDelete()
{
 var ab=confirm("Are you sure you wish to delete this record permanantly?");
 if(ab)
 return true;
 else
 return false;
}
</script>
<script type="text/javascript">
	    function validate_required(field,alerttxt)
	      {
		  
	       if(document.getElementById('heading').value=="")
		       {
			   alert("Please Enter main heading of the news");
			   document.getElementById('heading').focus();
			   return false
			  	}
				
			else
			return true;   
	      
		  }
</script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<script>
$(function() {
$( "#datepicker1" ).datepicker();
});
</script>


<script>
$(function() {
$( "#datepicker2" ).datepicker();
});
</script>
<script>
$(function() {
$( "#datepicker3" ).datepicker();
});
</script>

<script>
$(function() {
$( "#datepicker4" ).datepicker();
});
</script>

<script>
$(function() {
$( "#datepicker5" ).datepicker();
});
</script>
<style>
#second_table{
	float: right;
    margin-right: -102px;
    margin-top: -492px;
	
	
}
#btn
{
	width:70px;
	height:40px;
	color:red;
}
#first_table{
width:
}
</style>
</head>

<body>
	<div id="wrapper"><!--wrapper open-->
	<?php include_once("common/header.php") ?>
	<div class="content"><!--content open-->
			
			<?php include("common/nav.php") ?>
			
			<div class="right-content"><!-- right-content open -->
			<div class="banner"><!--banner open-->
			<br/>
			
				<!--<fieldset>
				<legend><a href="manage_news.php"><input type="button" name="" value="NEWS MANAGEMENT"/></a></legend>
				<br/>
				 
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  						<tr bgcolor="#ABABAB">
    					<td width="4%" align="center"><strong class="p7">S.NO</strong></td>
						<td width="30%" align="center"><strong class="p7">HEADING</strong></td>
						<td align="center" colspan="1"><strong class="p7">IMAGE</strong></td>	
						<td align="center" colspan="4"><strong class="p7">OPERATION</strong></td>		
					  </tr>
					  
					    <?php 
					  
					  	   $sn=0;
						
						   foreach($newsObj as $news){
						   
						      $sn++;
							  
					    ?>
                        				  
					  <tr bgcolor="#C0C0C0">
						<td align="center"><?php echo $sn?></td>
						<td align="center"><?php echo $news->getHeading()?></td>
					
                         <?php  if($news->getImage()==""){ ?>
                         
                           <td align="center"> <img src="image/no_profile.jpg" height="80"/></td>
                         
                         <?php }else{ ?>
                        
						<td align="center"><img src="../uploadedimages/original/<?php echo $news->getImage() ?>" height="80" /></td>
                        
                        <?php }?>
                        
						<td width="8%" align="center"><a href="manage_news.php?id=<?php echo $news->getId()?>"><img src="../Dristi_ad_test/imaged/edite.png" alt="edit" title="Edit"/></a></td>
						<td width="10%" align="center"><a href="manage_news.php?delete_id=<?php echo $news->getId()?>" onClick="return ConfirmDelete();"><img src="image/delete.png" alt="delete" title="Delete"/></a></td>
					  </tr>
					  
					  <?php 
					  	}
					  ?>
					 
					  
					</table>
				 
				
				<br/>
				
				</fieldset>
				<br/>-->
				
				
			
				<br/>
                
				<form action="" method="post"  name="frm" enctype="multipart/form-data" >
               
				<table id="first_table">          
                 
                
              
               
               
              	<tr>
               <td>आयोजनाको कोड</td>
                 <td><input type="text"  onkeyup="ajaxFunction(this.value);" name="Yojana_Id" /></td>
                 </tr>
                  
				 <tr>
                 
                 
                 <td><div id="displayDiv">
                 
                 </div></td>
                
                 </tr>
               
                
                
               
                
                
               
               
               
               
                </table>
               
               
                 
                 
                 <input type="submit" id="btn" name="submit" value="Update" onclick="return validate_required();" style="margin:0 5px 0 0" />
              
                <input type="reset" id="btn" name="reset" value="Reset"/>
                
					
																											 
				</form>
                
                
				
			
				
			
			
			</div><!--banner closed-->
			
			</div><!-- right-content closed -->
							
		</div><!--content closed-->	
		<?php include_once("common/footer.php") ?>
	</div><!--wrapper closed-->
</body>
</html>