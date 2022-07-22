<?php
include_once('Uploadimage.class.php');
 
  class Front{
    
    private $id;
    public $conxn;
    private $heading;
	
    private $image;
    
    private $position;
	
	private $description;
	
	private $detail;
    
       
      
        public function getId()
	    {
		return $this->id;
	    }
        public function setId($id)
	    {
		$this->id=$id;
	    }
            
        public function getHeading()
	    {
		return $this->heading;
	    }
        public function setHeading($heading)
	    {
		$this->heading=$heading;
	    } 
       
            
        public function getImage()
	    {
		return $this->image;
	    }
        public function setImage($image)
	    {
		$this->image=$image;
	    }
          
		public function getDescription()
			{
		   return $this->description;
			}
		public function setDescription($description)
			{
		  $this->description=$description;
			}
			
	public function getDetail()
			{
		   return $this->detail;
			}
		public function setDetail($detail)
			{
		  $this->detail=$detail;
			}	
		  
        public function getPosition()
	    {
		return $this->position;
	    }
     	public function setPosition($position)
	    {
		$this->position=$position;
	    }  
		
		
		
		
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
	  
	  
	  
	  
	  
	  public function addFront(){
		  
	            $destination=$this->createDestination();
				
				if($destination){
					
			 $query="insert into tbl_front set heading='$this->heading', position='$this->position', description='$this->description',detail='$this->detail', image='$destination' ";
				
		              mysql_query($query) or die("error on insert");	
			   }else{
			
		 $query="insert into tbl_front set heading='$this->heading', position='$this->position', description='$this->description', detail='$this->detail' ";
			  
		             mysql_query($query) or die("error on insert");
			
			        }
			   
			   echo "<script> alert('Added successfully') </script>";
	
	    }
          
		  
		  
	 public function getFront($id){
	
	      $query="select * from tbl_front where id=$id";
		  
	      $resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
			    $row = mysql_fetch_array($resultSearch);
					
					$fObj=new Front();
					
					$fObj->setId($row['id']);
		
		            $fObj->setHeading($row['heading']);
                        
                    $fObj->setImage($row['image']);
                        
                    $fObj->setPosition($row['position']);
					
					$fObj->setDetail($row['detail']);
					
					$fObj->setDescription($row['description']);
	
	                    }
					
					return $fObj;
	
	           }
			   
			   
	 public function getImages($id){
	
	      $query="select image from tbl_front where id=$id";
		  
	      $resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
					$row = mysql_fetch_array($resultSearch);
					
					return $row['image'];
	
	           }else{
				   
	               return 0;	
		          }
				  
				  
        }	   
			    
			   
		  
public function frontbyposition($position)
{
 $query="select * from tbl_front where position='$position'";
 $resultSearch= mysql_query($query);
 	if($resultSearch){
			
			    $row = mysql_fetch_array($resultSearch);
					
					$fObj=new Front();
					
					$fObj->setId($row['id']);
		
		            $fObj->setHeading($row['heading']);
                        
                    $fObj->setImage($row['image']);
                        
                    $fObj->setPosition($row['position']);
					
					$fObj->setDetail($row['detail']);
					
					$fObj->setDescription($row['description']);
	
	                    }
					
					return $fObj;
	
}         
                  
                  
          public function listFront(){
		
		    $query="select * from tbl_front order by position desc";
			 
		      $fList= array();
			 
		      $resultSearch= mysql_query($query);
			   
	        if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
		    for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
				   $fObj= new Front();
				
				     $fObj->setId($row['id']);
		
		             $fObj->setHeading($row['heading']);
                        
                     $fObj->setImage($row['image']);
                                
                     $fObj->setPosition($row['position']);
					 
					 $fObj->setDescription($row['description']);
					 
					 $fObj->setDetail($row['detail']);
		
		                  array_push($fList,$fObj);
					 
					 }
					 
				return $fList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		           }
				   
				   
				   
				   
	public function updateFront($id){
	
	    $destination=$this->createDestination();
	   
		 if($destination){
				
			$sel="select image from tbl_front where id=$id";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="update  tbl_front set  heading='$this->heading', position='$this->position', description='$this->description', detail='$this->detail',  image='$destination' where id=$id";
			
			
	        mysql_query($query) or die("error on update");
			
			if($data['image']!=""){
			
			unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			        $thumb="../uploadedimages/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				   }
		    }else{
		   
		       $query="update  tbl_front set  heading='$this->heading', position='$this->position', description='$this->description', detail='$this->detail' where id=$id";
			
	               mysql_query($query) or die("error on update");
				  
		         }
				 
		          echo "<script> alert('Updated successfully') </script>";
		   
	
	       }
				   
			
		public function delete(){
	
			$del_id=$_GET['delete_id'];
			
			$sel="select image from tbl_front where id='$del_id'";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="delete from tbl_front where id='$del_id'";
			
			    mysql_query($query);
			
			if($data['image']!=""){
				
			  unlink('../uploadedimages/original/'.$data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="../uploadedimages/thumb/".$data['image'];
					 
			         unlink($thumb);
				      }
					 
				    echo "<script> alert('selected item is Deleted successfully') </script>";
				   
			         }
					 
					 
					 
		public function deleteImage($id){
			
			$sel="select image from tbl_front where id=$id";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			if($data['image']!=""){
				
			   unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			          $thumb="../uploadedimages/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				      }
					  
			      $query="update tbl_front set image='' where id=$id";
			
			    mysql_query($query);
				
					 
				    echo "<script> alert('Image is Deleted successfully') </script>";
				   
			         }			 
				   
				   
				 
     
          }
  
  
  ?>