<?php 
include_once('Uploadimage.class.php');
require "constants.php";
  class Alliance {
 
        private $id;
		public $conxn;
		private $image;
		private $heading;
		private $link;
		private $position;
		private $description;
			
		function __construct(){
		$this->conxn=$this->connectdatabase(SERVER,DB_USER,DB_PASS,DB_DATABASE);
		}	
		function __destruct(){
			//echo "Alliance end";
		//mysql_close($this->conxn);
		}
			
		public function getHeading()
	    {
		return $this->heading;
	    }
        public function setHeading($heading)
	    {
		$this->heading=$heading;
	    }
		public function getId()
			{
				return $this->id;
			}
		public function setId($id)
			{
				$this->id=$id;
			}
		public function getImage()
			{
				return $this->image;
			}
			public function getDescription()
			{
		   return $this->description;
			}
		public function setDescription($description)
			{
		  $this->description=$description;
			}
		public function setImage($image)
			{
				$this->image=$image;
			}
			
		public function getLink()
			{
				return $this->link;
			}
		public function setLink($link)
			{
				$this->link=$link;
			}
			
		public function getPosition()
			{
				return $this->position;
			}
		public function setPosition($position)
			{
				$this->position=$position;
			}
			
	/* 	private function createDestination(){
		        $uploadimageObj=new Uploadimage();
				$uploadimageObj->upload("../uploadedimages/original",true);
				if($this->setImage($uploadimageObj->code)){
				return true;
				}
		}
			*/
			
		private function createDestination(){
	   
	      error_reporting(E_ALL ^ E_NOTICE); 
		 
			$error=$_FILES['userfile']['error'];
			$n=explode(".",".jpg");
			$ext=strtolower($n[1]);
			   if($ext=="jpg"|| $ext=="gif"|| $ext=="png"){
				$source=$_FILES['userfile']['tmp_name'];
				$name=$_FILES['userfile']['name'];
				
				if ($name=="" or $name==null){
					return false;
				     }
				//$destination="gallery/".$name;
				$ran=date('y_m_d_h_i_s_');
				$destination="../uploadedimages/original/".$ran.$name;
				
				
				//$a=explode(".",$destination);
				//$destination=$a[0].$ran.".".$a[1];
	           //$thumbarray=explode("/",$destination);
				
				move_uploaded_file($source,$destination);
				
				
			//	$thumb="gallery/thumb/".$thumbarray[1];//change
			$thumb="../uploadedimages/thumb/".$ran.$name;//change
			
			//write your function to resize
			$this->createthumb($destination,$thumb,100,120);
			
			//$this->resize_both($destination,$thumb,100,120);
				/*$this->upload("../uploadedimages/original",true);
				$this->setImage($uploadimageObj->code);*/

				return 	$ran.$name;
			//	return $thumb;
			      }else
			    echo "file type must be only jpg,gif and png";
			  return false;	
		    }
	
	function createthumb($name1,$location,$new_w,$new_h)
	{
	
		$name = $name1;
		$filename = $location.$this->code;
		$ext=explode('.',$this->code);
		if(strtolower($ext[1])=='jpg'||strtolower($ext[1])=='jpeg')
		$src_img=imagecreatefromjpeg($name);
		else if(strtolower($ext[1])=='gif')
		$src_img=imagecreatefromgif($name);
		else if(strtolower($ext[1])=='png')
		$src_img=imagecreatefrompng($name);
		else
		$src_img=imagecreatefromjpeg($name);
		$old_x=imageSX($src_img);
		$old_y=imageSY($src_img);
		$ratio1=$old_x/$new_w;
        $ratio2=$old_y/$new_h;
		if($ratio1>$ratio2) 
		         {
                 $thumb_w=$new_w;
                 $thumb_h=$old_y/$ratio1;
                 }
        else     {
                 $thumb_h=$new_h;
                 $thumb_w=$old_x/$ratio2;
                 }
		$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
		imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
		imagejpeg($dst_img,$filename);
		imagedestroy($dst_img); 
		imagedestroy($src_img); 
	} 
  function resize_both($name1,$location,$new_w,$new_h){
	
    $newname = $location;
    $thumbh = $new_w;
    $thumbw = $new_h;
    $nh = $thumbh;
    $nw = $thumbw;
    $size = getImageSize($name1);
    $w = $size[0];
    $h = $size[1];
    $ratio = $h / $w;
	//$ext=split('[.]',$newname);
	$ext=explode('.',$newname);
    $nratio = $thumbh / $thumbw; 
    if($ratio > $nratio)
      {
      $x = intval($w * $nh / $h);
      if ($x < $nw)
       {
        $nh = intval($h * $nw / $w);
       } 
     else
       {
        $nw = $x;
       }
     }
   else
     {
      $x = intval($h * $nw / $w);
      if ($x < $nh)
       {
       $nw = intval($w * $nh / $h);
       } 
       else
        {
         $nh = $x;
        }
      } 
       if($ext[1]=='jpg'||$ext[1]=='jpeg')
        {    
        $resimage = imagecreatefromjpeg($name1); 
	    }
	   else if($ext[1]=='gif')
	     {
		 $resimage = imagecreatefromgif($name1); 
	    }
	  else if($ext[1]=='png')
	     {
			$resimage = imagecreatefrompng($name1); 
           
		 }
		    $newimage = imagecreatetruecolor($nw, $nh);  // use alternate function if not installed
            imageCopyResampled($newimage, $resimage,0,0,0,0,$nw, $nh, $w, $h); 
            $viewimage = imagecreatetruecolor($thumbw, $thumbh);
            imagecopy($viewimage, $newimage, 0, 0, 0, 0, $nw, $nh);
            imageJpeg($viewimage, $newname, 85);  
      }	
	  
	  
	  public function add(){
		  
	            $destination=$this->createDestination();
				
				if($destination){
				
	       $query="insert into tbl_alliance(link, position, image, description, heading) values('$this->link', $this->position, '$destination','$this->description','$this->heading')";
		   
		              mysql_query($query) or die($query."error on insert");	
			}else{
			
			$query="insert into tbl_alliance(link, position, description, heading) values('$this->link', $this->position, '$this->description','$this->heading')";
			  
		             mysql_query($query) or die("error on insert");
			
			     }
			   
			     echo "<script> alert('Added successfully') </script>";
	
	    }
		  
		
		
	  public function getAdd($id){
	
	      $query="select * from tbl_alliance where id=$id";
		  
	      $resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
					$row = mysql_fetch_array($resultSearch);
					
					$adds=new Alliance();
					
					$adds->setId($row['id']);
					
					$adds->setLink($row['link']);
					
					$adds->setPosition($row['position']);
					
					$adds->setImage($row['image']);
					$adds->setDescription($row['description']);
						            $adds->setHeading($row['heading']);
	
	                   }
					 return $adds;
	
	           }
			   
			 
    public function updateAdds($id){
	
	    $destination=$this->createDestination();
	   
		 if($destination){
				
			$sel="select image from tbl_alliance where id=$id";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="update tbl_alliance set heading='$this->heading',link='$this->link', position='$this->position', image='$destination', description='$this->description' where id=$id";
			
	        mysql_query($query) or die("error on update");
			
			/*if($data['image']!=""){
			
			unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="../uploadedimages/thumb/".$thumbarray[1];
					 
					 
			         unlink($thumb);
					
				   }*/
				   if($data['image']!=""){
				
			   if(file_exists('../uploadedimages/original/'.$data['image'])){
				     unlink('../uploadedimages/original/'.$data['image']);
					}
			
		        	//$thumbarray=explode("/",$data['image']);
					
			         $thumb="../uploadedimages/thumb/".$data['image'];
if(file_exists('../uploadedimages/original/'.$data['image'])){
					 unlink($thumb);
					  }
			
				      }
				   
		      }else{
		   
		       $query="update tbl_alliance set heading='$this->heading',link='$this->link', position='$this->position', description='$this->description' where id=$id ";
			
	                 mysql_query($query) or die("error on update");
		            }
				 
		          echo "<script> alert('Updated successfully') </script>";
		   
	
	        }
			
			
			
	public function getImages($id){
	
	      $query="select image from tbl_alliance where id=$id";
		  
	      $resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
					$row = mysql_fetch_array($resultSearch);
					
					return $row['image'];
	
	           }else{
				   
	               return 0;	
		          }
				  
				  
        }
		function connectdatabase($host , $user , $pwd, $db){
		$this->conxn = mysql_connect($host, $user, $pwd ) or die("Some error with the database server " . mysql_error() );
		@mysql_select_db($db) or die("database not found");
		return $this->conxn;
		}//function connectiondatabase ends
		
	public function listAdds(){
	
	    $query="select * from tbl_alliance order by position asc";
		
	    $resultSearch= mysql_query($query);
		
		$addsList=array();
		
			if($resultSearch){
			
				$numrows=mysql_num_rows($resultSearch);
				
				for( $i=0;$i<$numrows;$i++){
				
					$row = mysql_fetch_array($resultSearch);
					
					$adds=new Alliance();
					
					$adds->setId($row['id']);
					
					$adds->setLink($row['link']);
					
					$adds->setPosition($row['position']);
				
					$adds->setImage($row['image']);
					$adds->setDescription($row['description']);
					$adds->setHeading($row['heading']);
					    array_push($addsList,$adds);
						
					   }
					   
					  return $addsList;
	   
	               }else{
				   
					     echo("<script>alert('".mysql_error()."')</script>");
					
					   }
				 
             }	
	
			 
			 
	  public function delete(){
			
			$del_id=$_GET['delete_id'];
			
			$sel="select image from tbl_alliance where id=$del_id";
			
			$result=mysql_query($sel,$this->conxn) or die(mysql_error());
			
			$data=mysql_fetch_assoc($result);
			
			$query="delete from tbl_alliance where id=$del_id";
			
			     $res=mysql_query($query,$this->conxn)or die(mysql_error());
			
			if($data['image']!=""){
				
			   if(file_exists('../uploadedimages/original/'.$data['image'])){
				     unlink('../uploadedimages/original/'.$data['image']);
					}
			
		        	//$thumbarray=explode("/",$data['image']);
					
			         $thumb="../uploadedimages/thumb/".$data['image'];
if(file_exists('../uploadedimages/original/'.$data['image'])){
					 unlink($thumb);
					  }
			
				      }
					 if($res){
						 
				    echo "<script> alert('selected item is Deleted successfully') </script>";
					 }
					 else
					 {echo "<script> alert('selected item is couldnot be  Deleted ') </script>";
						 }
				   
			   }
			   
		public function deleteImage($id){
			
			$sel="select image from tbl_alliance where id=$id";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			if($data['image']!=""){
				
			   unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="../uploadedimages/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				      }
					  
			      $query="update tbl_alliance set image='' where id=$id";
			
			    mysql_query($query);
				
					 
				    echo "<script> alert('Image is Deleted successfully') </script>";
				   
			         }	   
			   
			   
  
  
  
  }
  

?>