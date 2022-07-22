<?php

       include_once('common/session.php');

       include_once('../Dbconnection/db_conn.php');
	
	   include_once('classes/news.php');
	
	  $news=new News();	
		
		
if(isset($_POST['submit'])){
		
$fiscal_year=$_POST['fiscal_year'];
$Yojana_Id=$_POST['Yojana_Id'];
$sukrit_total_investment=$_POST['sukrit_total_investment'];
$sukrit_budget=$_POST['sukrit_budget'];
$kharcha_rakam=$_POST['kharcha_rakam'];
$progress=$_POST['progress'];

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
$sql = "INSERT INTO pragati_info (fiscal_year,Yojana_Id,sukrit_total_investment,sukrit_budget,
kharcha_rakam,progress)
VALUES ('$fiscal_year','$Yojana_Id','$sukrit_total_investment','$sukrit_budget','$kharcha_rakam','$progress')";

if ($conn->query($sql) === TRUE) {
    echo "Pragati Added successfully";
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
<title>Pragati Entry</title>
<link href="css/styleadmin.css" rel="stylesheet" type="text/css" />
<style>
#displayDiv
{
	float: right;
    margin-left: 144px;
    margin-right: -252px;
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
	var url="ajax-search-demock.php";
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
                
               <td> आ. व.</td>
                 <td><select name="fiscal_year">
						                    <option>Select Fiscal Year</option>
                                             <option>2063/064</option>
                                             <option>2064/065</option>		
                                             <option>2065/066</option>
                                             <option>2066/067</option>
                                             <option>2067/068</option>
                                             <option>2068/069</option>
                                             <option>2069/070</option>
                                             <option>2070/071</option>
                                             <option>2071/072</option>
                                             <option>2072/073</option>
                                             <option>2073/074</option>
                                             <option>2074/075</option>
                                             <option>2075/076</option>
                                             <option>2076/077</option>
                                             <option>2077/078</option>
                                             <option>2079/080</option>
                                                   
                                                         		
					</select>   </td>          
               </tr>
               
               
              	<tr>
               <td>आयोजनाको कोड</td>
                 <td><input type="text"  onkeyup="ajaxFunction(this.value);" name="Yojana_Id" /></td>
                 </tr>
                  
				 <tr>
                 
                 
                 <td><div id="displayDiv">
                 
                 </div></td>
                
                 </tr>
               
                
                
               
                
                
                <tr>
                <td>स्वीकृत  कुल लागत रुहजारमा:</td>
                 <td><input type="text" id="ward" name="sukrit_total_investment"  size="30"/></td>          
               </tr>
               
               
               <tr>
                <td>स्वीकृत बजेट रुहजारमा:</td>
                 <td><input type="text" id="ward" name="sukrit_budget"  size="30"/></td>          
               </tr>
               
                <tr>
                <td> खर्च रकम रुहजारमा:</td>
                 <td><input type="text" id="ward" name="kharcha_rakam"  size="30"/></td>          
               </tr>
               
                <tr>
                <td> प्रगति (%)</td>
                 <td><input type="text" id="ward" name="progress"  size="30"/></td>          
               </tr>
               
               
               
                </table>
               
               
                 
                 
                 <input type="submit" id="btn" name="submit" value="Submit" onclick="return validate_required();" style="margin:0 5px 0 0" />
              
                <input type="reset" id="btn" name="reset" value="Reset"/>
                
					
																											 
				</form>
                
                
				
			
				
			
			
			</div><!--banner closed-->
			
			</div><!-- right-content closed -->
							
		</div><!--content closed-->	
		<?php include_once("common/footer.php") ?>
	</div><!--wrapper closed-->
</body>
</html>