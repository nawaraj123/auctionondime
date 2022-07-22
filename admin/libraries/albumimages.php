<?php

    include("../../Dbconnection/db_conn.php");
   require_once "../classes/Uploadimage.class.php";
   require_once "../classes/Image.class.php";

$Imageobj=new Image();
$Imageobj->setAlbumid($_GET['aid']);
if(isset($_GET['image'])&&isset($_GET['id']))
 { 
$Imageobj->setImagecode($_GET['image']);
$Imageobj->setId($_GET['id']);
$delete=$Imageobj->delete();
if($delete)
   {
     $uploadObj=new Uploadimage();
	 $uploadObj->removepic('../uploadedimage/crop/'.$Imageobj->getImagecode().'',$Imageobj->getImagecode());
     $uploadObj->removepic('../uploadedimage/big/'.$Imageobj->getImagecode().'',$Imageobj->getImagecode());
	 $uploadObj->removepic('../uploadedimage/bigthumb/'.$Imageobj->getImagecode().'',$Imageobj->getImagecode());
   }
 }

 if(isset($_GET['profile'])&&isset($_GET['aid'])&&isset($_GET['id']))
       {
		 $Imageobj->setAlbumid($_GET['aid']);
		 $Imageobj->setId($_GET['id']);
		 if($Imageobj->removeprofilepicallsql())
		    {
				$Imageobj->setprofilepicsql();
				
			}
		      
	   }
 
 $Imageobjs=$Imageobj->selectByAlbumid();

?>
<script>
function callremove(id)
    {
	document.getElementById("remove"+id).style.display="block";
	
		
	}
	function removeblock(id)
    {
	document.getElementById("remove"+id).style.display="none";
	
	}
</script>
<body>
<fieldset >
<legend>Album Images("Click Image to make Album Cover");</legend>
<table  border="0" cellspacing="0" cellspacing="0" >
<tr>
<?php 
  $i=0;
  $j=0;
  foreach($Imageobjs as $Imageobj)
  {
  if($Imageobj->getProfilepic()==1)
       {
		$border='4px solid red' ;
		 
	  }
	else
	$border='none' ;
	
   $j++;
   if($i==7) 
       { $i=0; 
	      echo '</tr><tr>'; 
	}
	
    echo '<td onMouseOver="callremove('.$j.')" onMouseOut="removeblock('.$j.')" ><a  href="albumimages.php?profile='.$Imageobj->getImagecode().'&id='.$Imageobj->getId().'&aid='.$Imageobj->getalbumid().'" onclick=\'return confirm("Are you sure you want to make this Album Cover?")\';><img style="border:'.$border.'"     src="../uploadedimage/crop/'.$Imageobj->getImagecode().'" width="100"></a><div id="remove'.$j.'" style="display:none"><a href="albumimages.php?image='.$Imageobj->getImagecode().'&id='.$Imageobj->getId().'&aid='.$Imageobj->getAlbumid().'" onclick=\'return confirm("Are you sure you want to delete this image from your server ?")\';>Remove</div></td>'; 
	$i++;
	}
    ?>
 </tr>
 <?php if($j==0)
    {
		echo '<tr><Td>Cannot Found Images</td></tr>';
	}
	?>
	
</table >
</fieldset>
</body>

