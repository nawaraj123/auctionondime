<?php

       include_once('common/session.php');

       include_once('../Dbconnection/db_conn.php');
	
	  // include_once('classes/news.php');
	   	include_once('classes/subcategory.php');

	
	  $news=new News();
	  
	  
	
	if(isset($_POST['submit'])){
		
$District_id=$_POST['District_id'];
$Yojana_Id=$_POST['total_aayojana'];
$District_Yojana_SN=$_POST['districtwisediv'];
$District_name=$_POST['District_name'];


   

//echo $District_name ; die();
$Yojana_Name=$_POST['Yojana_Name'];
$Subject_Name=$_POST['Subject_Name'];
$vdc_name=$_POST['vdc'];
$Ward_no=$_POST['Ward_no'];
$Yojana_Address=$_POST['Yojana_Address'];
$District_PrathimktaKram=$_POST['District_PrathimktaKram'];
$Karyadal_Report = (isset($_POST['Karyadal_Report'])) ? "Yes" : "No";
$Report_5560 = (isset($_POST['Report_5560'])) ? "Yes" : "No";
$Thap_Mag = (isset($_POST['Thap_Mag'])) ? "Yes" : "No";
$Sifaris_Jipunisa = (isset($_POST['Sifaris_Jipunisa'])) ?"Yes" : "No";
$Sifaris_Jipunisa_Date=$_POST['Sifaris_Jipunisa_Date'];
$SIfaris_CDO = (isset($_POST['SIfaris_CDO'])) ? "Yes" : "No";
$Sifaris_cdo_Date=$_POST['Sifaris_cdo_Date'];
$Sifaris_cdo_Chalani=$_POST['Sifaris_cdo_Chalani'];
$Sifaris_DDC = (isset($_POST['Sifaris_DDC'])) ? "Yes" : "No";
$DDC_Sifaris_Date=$_POST['DDC_Sifaris_Date'];
$ifaris_DDC_Chalani=$_POST['ifaris_DDC_Chalani'];
$Other_Sifaris = (isset($_POST['Other_Sifaris'])) ?"Yes" : "No";
$Other_Sifaris_Karta=$_POST['Other_Sifaris_Karta'];
$Other_Sifaris_Date=$_POST['Other_Sifaris_Date'];
$Other_Sifaris_Chalani=$_POST['Other_Sifaris_Chalani'];
$Demanded_amount=$_POST['Demanded_amount'];
$Mag_Bibaran=$_POST['Mag_Bibaran'];
$Remarks=$_POST['Remarks'];
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

$conn->query("SET NAMES 'utf8'");
// Check connectio


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO yojana_details (District_id,Yojana_Id,District_Yojana_SN,Yojana_Name,Subject_Name,
vdc_name,Ward_no,Yojana_Address,District_PrathimktaKram,Karyadal_Report,Report_5560,Thap_Mag,Sifaris_Jipunisa,
Sifaris_Jipunisa_Date,SIfaris_CDO,Sifaris_cdo_Date,Sifaris_cdo_Chalani,Sifaris_DDC
,DDC_Sifaris_Date,ifaris_DDC_Chalani,Other_Sifaris,Other_Sifaris_Karta,Other_Sifaris_Date,Other_Sifaris_Chalani,Demanded_amount,
Mag_Bibaran,destruction_type,reconstruction_type,tok_aadesh_karkta,tok_aadesh_miti,tok_aadesh_bibaran)
VALUES ('$District_id','$Yojana_Id','$District_Yojana_SN','$Yojana_Name','$Subject_Name','$vdc_name','$Ward_no','$Yojana_Address',
'$District_PrathimktaKram','$Karyadal_Report','$Report_5560','$Thap_Mag','$Sifaris_Jipunisa','$Sifaris_Jipunisa_Date','$SIfaris_CDO','$Sifaris_cdo_Date','$Sifaris_cdo_Chalani','$Sifaris_DDC','$DDC_Sifaris_Date','$ifaris_DDC_Chalani','$Other_Sifaris','$Other_Sifaris_Karta','$Other_Sifaris_Date','$Other_Sifaris_Chalani','$Demanded_amount','$Mag_Bibaran','$destruction_type','$reconstruction_type','$tok_aadesh_karkta','$tok_aadesh_miti','$tok_aadesh_bibaran')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
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
<title>Form</title>
<link href="css/styleadmin.css" rel="stylesheet" type="text/css" />



<script>
function myFunction() {
    var yojana_name = document.getElementById("yojana_name").value;
    var District_id = document.getElementById("citydiv").value;
	var Subject_Name = document.getElementById("Subject_Name").value;
	var vdc_name = document.getElementById("vdcdiv").value;
	var Ward_no = document.getElementById("Ward_no").value;
	var Yojana_Address = document.getElementById("Yojana_Address").value;
	var District_PrathimktaKram = document.getElementById("District_PrathimktaKram").value;
	
	//alert(vdc_name);

	
	

	
	
	
	//alert(yojana_name);
	//alert(District_id);
	
    
// Returns successful data submission message when the entered information is stored in database.
    var dataString = 'yojana_name=' + yojana_name + '&District_id=' + District_id + '&Subject_Name=' + Subject_Name + '&vdc_name=' + vdc_name + '&Ward_no=' + Ward_no + '&Yojana_Address=' + Yojana_Address + '&District_PrathimktaKram=' + District_PrathimktaKram ;
    
//AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "ajaxjs.php",
            data: dataString,
            cache: false,
            success: function(html) {
                alert(html);
            }
        });
    
    return false;
}
</script>


<script language="JavaScript">


function enable_text1(status)
{
status=!status;	
document.frm.Sifaris_Jipunisa_Date.disabled = status;
}
</script>

<script language="JavaScript">


function enable_text2(status)
{
status=!status;	
document.frm.Sifaris_cdo_Date.disabled = status;
document.frm.Sifaris_cdo_Chalani.disabled = status;

}
</script>


<script language="JavaScript">


function enable_text3(status)
{
status=!status;	
document.frm.DDC_Sifaris_Date.disabled = status;
document.frm.ifaris_DDC_Chalani.disabled = status;

}
</script>


<script language="JavaScript">


function enable_text4(status)
{
status=!status;	
document.frm.Other_Sifaris_Karta.disabled = status;
document.frm.Other_Sifaris_Date.disabled = status;
document.frm.Other_Sifaris_Chalani.disabled = status;


}
</script>






<script type="text/javascript">


  $(document).ready(function() {
        
		
		//the min chars for username
		var min_chars = 1;
		
		//result texts
		var characters_error = 'Minimum amount of chars is 1';
		var checking_html = '<img src="images/loading.gif" /> Checking...';
		
		//when button is clicked
		$('#check_username_availability').click(function(){
			//alert($('#yojana_name').val());
			//alert($('#yojana_name'.val()));
			//run the character number check
			if($('#citydiv').val().length < min_chars){
				//if it's bellow the minimum show characters_error text
				$('#username_availability_result').html(characters_error);
			}else{			
				//else show the cheking_text and run the function to check
				$('#username_availability_result').html(checking_html);
				check_availability();
			}
		});
		
		
  });

//function to check username availability	
function check_availability(){
		
		//get the username
		var username = $('#citydiv').val();
		var yojana_name=$('#yojana_name').val();
		
			//use ajax to run the check
		$.post("check_username.php", { username: username },
		
			function(result){
				//if the result is 1
				
				//alert(yojana_name);
				if(result == 1){
					//show that the username is available
					$('#username_availability_result').html('<span class="is_available"><b></b> Record Doesnt Exists</span>');
				}else{
					//show that the username is NOT available
					$('#username_availability_result').html('<span class="is_not_available"><b></b> Record is  Already Exists</span>');
				}
		});

}  
</script>
<style type='text/css'>
#submit{
	background: #225384;
	border:1px solid black;
	color:white;
}
body{
	font-family: 'tahoma';
}
input{
	padding:5px;
	font-family: 'tahoma';
}
.is_available{
	color:green;
}
.is_not_available{
	color:red;
}
</style>

<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
	function getVdc(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('vdcdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
	
	function getDistrictwise(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('districtwisediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
		function getTotalaayojana(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('total_aayojana').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
	
	
	
</script>


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
#second_table {
    float: right;
    margin-right: -195px;
    margin-top: -550px;
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
                
               <td> जिल्लाको नाम:</td>
                 
                    <td>
                    
                    <select  name="District_name[]" onChange="getCity('findcity.php?district_name='+this.value),getVdc('findvdc.php?district_name='+this.value),getTotalaayojana('findtotalaayojana.php?district_id='+this.value),getDistrictwise('finddistrictwiseaayojana.php?district_id='+this.value)">
						                    <option>Select District Name</option>
											<?php 
											   $subcatObj=SubCategory::listDistrict();
											   
											   foreach($subcatObj as $newsub){
												   
											  ?>
                                              
        						 <option value="<?php echo $newsub->getId() ?>">
		         				 <?php echo $newsub->getSubName() ?>
        						 </option>
											<?php }?>  
											 
						
						              </select>
                                      </td>
                                      
                                     
               </tr>
                <tr>
                
               <td> जिल्लाको कोड नं:</td>
                 <td><div><select id="citydiv" name="District_id">
						                   
                                            	
					</select></div>   </td>          
               </tr>
               
                <tr>
                
               <td>  आयोजनाको क्र सं : </td>
                 <td><div id="total_aayojana"><select name="Yojana_Id">
						                    	
					</select> </div>  </td>          
               </tr>
               
               <tr>
                
               <td> जिल्लागत आयोजनाको क्र सं :</td>
                 <td><div id="districtwisediv"><select name="District_Yojana_SN">
						                    	
					</select> </div>  </td>          
               </tr>
                <tr>
                
               <td>आयोजनाको नाम:</td>
                 <td  ><input type="text" id="yojana_name" name="Yojana_Name"  size="30"/></td>          
               </tr>
                <tr>
                
               <td>बिषयगत नाम:</td>
               <td>
                    
                    <select  id="Subject_Name" name="Subject_Name" >
						                    <option>Select Subject </option>
											<?php 
											   $subcatObj=SubCategory::listSubjectname();
											   
											   foreach($subcatObj as $newsub){
												   
											  ?>
                                              
        						 <option value="<?php echo $newsub->getSubjectname() ?>">
		         				 <?php echo $newsub->getSubjectname() ?>
        						 </option>
											<?php }?>  
											 
						
						              </select>
                                      </td>  
               </tr>
                <tr>
                
               <td>गा वि स / न पा:</td>
                 <td><div><select   id="vdcdiv" name="vdc_name">
						                    	
					</select></div></td>          
               </tr>
                <tr>
                
               <td>वार्ड नं:</td>
                 <td><input type="text" id="Ward_no" name="Ward_no"  size="5"/></td>          
               </tr>
               
              
                
                
               <tr>
                <td>स्थान:</td>
                 <td><input type="text" id="Yojana_Address" name="Yojana_Address"  size="30"/></td>          
               </tr>
               <tr>
                <td>प्राथमिकता क्रम:</td>
                 <td><input type="text" id="District_PrathimktaKram" name="District_PrathimktaKram"  size="5"/></td>          
               </tr>
               
               
               
             <tr>
             <td>
                 <input type="button" id="submit" onClick="myFunction()" value="Check Duplicate"/>

			<div id='username_availability_result'></div>
            
            
            </td>
            </tr>
				
                <tr>
                <td>कार्यदलको रिपोर्टमा:</td>
                 <td><input type="checkbox" name="Karyadal_Report"></td>
                  
                      
               </tr>
                <tr>
                <td>५५६० मा:</td>
                 <td><input type="checkbox" name="Report_5560"></td>          
               </tr>
                <tr>
                <td>थप मागमा:</td>
                 <td><input type="checkbox" name="Thap_Mag"></td>          
               </tr>
                <tr>
                <td>जिपुनिस सिफःरिस:</td>
                 <td><input type="checkbox" name="Sifaris_Jipunisa" id="Sifaris_Jipunisa" onclick="enable_text1(this.checked)" ></td>          
               </tr>
                <tr>
                <td>जिपुनिस निर्णय मिति:</td>
               
                 <td>
                 <input type="text" id="datepicker"  name="Sifaris_Jipunisa_Date" disabled=""/>                 </td>
                         
               </tr>
                <tr>
                <td>जिल्ला प्रसाशन सिफारिस:</td>
                 <td><input type="checkbox" name="SIfaris_CDO" onclick="enable_text2(this.checked)"></td>          
               </tr>
                <tr>
                <td>जिल्ला प्रसाशन सिफारिस मिति:</td>
                 <td> <input type="text" id="datepicker1" name="Sifaris_cdo_Date" disabled=""></td>          
               </tr>
                <tr>
                <td>जिल्ला प्रसाशन  पत्रको चनं:</td>
                 <td><input type="text" id="ward" name="Sifaris_cdo_Chalani"  size="20" disabled=""/></td>          
               </tr>
               
                </table>
                <table id="second_table">
                
                
                
                <tr>
                
               <td> जिविस सिफारिस:</td>
                 <td><input type="checkbox" name="Sifaris_DDC" onclick="enable_text3(this.checked)">  </td>          
               </tr>
               <tr>
                
               <td> जिविस पत्रको मिति:</td>
                  <td> <input type="text" id="datepicker2" name="DDC_Sifaris_Date" disabled=""></td>           
               </tr>
                <tr>
                
               <td> जिविस पत्रको चनं: </td>
                 <td> <input type="text" id="chalani_no" name="ifaris_DDC_Chalani" disabled=""></td>       
               </tr>
               
             
                <tr>
                
               <td>अन्य सिफारिस:</td>
                  <td><input type="checkbox" name="Other_Sifaris" onclick="enable_text4(this.checked)">  </td>    
               </tr>
                <tr>
                
               <td>अन्य सिफारिस कर्तां:</td>
                 <td><input type="text" id="ward" name="Other_Sifaris_Karta" disabled=""/></td> 
                      
               </tr>
               
               <tr>
                
               <td>अन्य सिफारिस मिति:</td>
                 <td> <input type="text" id="datepicker3" name="Other_Sifaris_Date" disabled=""></td>           
               </tr>
                
                
                <tr>
                
               <td>अन्य सिफारिसको चनं:</td>
                 <td><input type="text" id="ward" name="Other_Sifaris_Chalani"  size="30" disabled=""/></td>          
               </tr>
              
               
                <tr>
                <td>मागको विवरण:</td>
                 <td><input type="text" id="ward" name="Mag_Bibaran"  size="30"/></td>  
               </tr>
                <tr>
                <td>माग गरेको रकम:</td>
                 <td><input type="text" id="ward" name="Demanded_amount"  size="30"/></td>          
               </tr>
                <tr>
                <td>क्षतिको प्रकार:</td>
                <td><select name="destruction_type">
						                    <option>Type Of Distory</option>
                                             <option value="पुर्णरुपमा क्षति">पुर्णरुपमा क्षति</option>
                                             <option value="मध्यम क्षति">मध्यम क्षति</option>		
                                             <option value="सामान्य क्षाति">सामान्य क्षाति</option>	
                                             <option value="द्वन्द्वको कारण मर्मत हुन नसकेको">द्वन्द्वको कारण मर्मत हुन नसकेको</option>
                                              <option value="अन्य">अन्य</option>		
					</select>   </td>      
               </tr>
                <tr>
                <td>पुनर्निर्माणको प्रकार:</td>
               
                  <td><select name="reconstruction_type">
						                    <option>Reconstruction Type</option>
                                             <option value="नयां निर्माण">नयां निर्माण</option>
                                             <option value="मर्मत सुधार">मर्मत सुधार</option>		
                                               <option value="पुनर्निर्माण">पुनर्निर्माण</option>	
                                                <option value="अन्य">अन्य</option>			
					</select>   </td>     
                         
               </tr>
                <tr>
                <td>तोक आदेश कर्ता:</td>
                 <td><select name="tok_aadesh_karkta">
						                    <option>Tok Karta</option>
                                             <option value="मन्त्री ज्यु">मन्त्री ज्यु</option>
                                             <option value="सचिव ज्यु">सचिव ज्यु</option>		
                                               <option vallue="परियोजना प्रमुख ज्यु">परियोजना प्रमुख ज्यु</option>	
                                                <option value="अन्य">अन्य</option>		
					</select>   </td>       
               </tr>
                <tr>
                <td>तोकआदेश मिति:</td>
                 <td> <input type="text" name="tok_aadesh_miti" id="datepicker4"></td>          
               </tr>
                <tr>
                <td>तोकआदेश विवरण:</td>
                 <td><input type="text" id="ward" name="tok_aadesh_bibaran"  size="20"/></td>          
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