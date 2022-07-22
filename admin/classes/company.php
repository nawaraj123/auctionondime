<?php

   include('category.php');
   

  class Company{
      
	   private $id;
	   
	   private $name;
	   
	   private $detail;
	   
	   private $logo;
	   
	   private $description;
	   
	   private $partnerid;
	   
	   
	    public function getId()
			{
				return $this->id;
			}
		public function setId($id)
			{
				$this->id=$id;
			}
		public function getName()
			{
				return $this->name;
			}
		public function setName($name)
			{
				$this->name=$name;
			}
		public function getDetail()
			{
				return $this->detail;
			}
		public function setDetail($detail)
			{
				$this->detail=$detail;
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
        public function getPartnerId()
			{
				return $this->partnerid;
			}
		public function setPartnerId($partnerid)
			{
				$this->partnerid=$partnerid;
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
				$destination="gallery/".$name;
				
				$ran=rand(1000,9999);
				$a=explode(".",$destination);
				$destination=$a[0].$ran.".".$a[1];
	            $thumbarray=explode("/",$destination);
				move_uploaded_file($source,$destination);
				$thumb="gallery/thumb/".$thumbarray[1];
				$this->resize_both($destination,$thumb,60,121);
				return $destination;
			      }else
			    echo "file type must be only jpg,gif and png";
			  return false;	
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
	  
	  
	  public function addCompany(){
		  
	            $destination=$this->createDestination();
				
				if($destination){
					
			   $query="insert into tbl_company set name='$this->name', detail='$this->detail' , description='$this->description',  
				  
				  partner_id='$this->partnerid', position='$this->position', image='$destination' ";
				
		              mysql_query($query) or die("error on insert");	
					  
			   }else{
			
			      $query="insert into tbl_company set name='$this->name', detail='$this->detail' ,description='$this->description', partner_id='$this->partnerid', position='$this->position' ";
		             mysql_query($query) or die("error on insert");
			
			        }
			   
			   echo "<script> alert('Added successfully') </script>";
	
	         }
			
		
				  
		public function getCompany($id){
		        
			//	$query="select c.*, p.name as pname, p.id as pid from tbl_company c, tbl_category p where c.partner_id=p.id and c.id=$id";
							$query="select c.*, p.name as pname, p.id as pid from tbl_company c, tbl_category p where  c.id=$id";	
			    $resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
			  $row = mysql_fetch_array($resultSearch);
				  
		        $compObj=new Company();
		
		        $compObj->setId($row['id']);
		
		        $compObj->setName($row['name']);
				
			    $compObj->setDetail($row['detail']);
				
				$compObj->setPosition($row['position']);
		
		        $compObj->setImage($row['image']);
		 
		        $compObj->setDescription($row['description']);
		
		        $partner=new Category();
				
				$partner->setId($row['pid']);
				
				$partner->setName($row['pname']);
		
		        $compObj->setPartnerId($partner);
				
		           }
				   
		       return $compObj;
		
		  }
		  
		  
		  public function getComp($id){
		        
				$query="select * from tbl_company where id=$id";
				
			    $resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
			  $row = mysql_fetch_array($resultSearch);
				  
		        $compObj=new Company();
		
		        $compObj->setId($row['id']);
		
		        $compObj->setName($row['name']);
				
			    $compObj->setDetail($row['detail']);
				
				$compObj->setPosition($row['position']);
		
		        $compObj->setImage($row['image']);
		 
		        $compObj->setDescription($row['description']);
		        
		           }
				   
		       return $compObj;
		
		  }
		  
		  
		  
		  
		  
		public function getFrontComp($id){
			
		        
			$query="select * from tbl_company where partner_id=$id order by position";
				
		    $compList= array();
			 
			$resultSearch= mysql_query($query);
			   
	      if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
		        $compObj=new Company();
		
		        $compObj->setId($row['id']);
		
		        $compObj->setName($row['name']);
				
			    $compObj->setDetail($row['detail']);
				
				$compObj->setPosition($row['position']);
		
		        $compObj->setImage($row['image']);
		 
		        $compObj->setDescription($row['description']);
		
		        $compObj->setPartnerId($row['partner_id']);
				
				   array_push($compList,$compObj);
					 
					    }
					 
				  return $compList;
					}
					return array();
				
		  }
		  
		  
		  
		  
	public function updateCompany($id){
	
	   $destination=$this->createDestination();
	   
		 if($destination){
				
			$sel="select image from tbl_company where id=$id";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="update tbl_company set name='$this->name', description='$this->description', detail='$this->detail', image='$destination', 
			            partner_id='$this->partnerid', position='$this->position' where id=$id";
			
	       mysql_query($query) or die("error on update");
			
			if($data['image']!=""){
			
			unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="gallery/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				   }
		    }else{
		   
		  $query="update tbl_company set name='$this->name', description='$this->description', detail='$this->detail', partner_id='$this->partnerid', position='$this->position' where id=$id";
		  
			
	               mysql_query($query) or die("error on update");
				  
		         }
				 
		          echo "<script> alert('Company detail updated successfully') </script>";
		   
	
	       }
		   
		   
		   
	public function getImages($id){
	
	      $query="select image from tbl_company where id=$id";
		  
	      $resultSearch= mysql_query($query);
	 
			 if($resultSearch){
			
					$row = mysql_fetch_array($resultSearch);
					
					return $row['image'];
	
	              }else{
				   
	                  return 0;	
		              }
				  
               } 
		  
		
				   
		public function listCompany(){
		
		     $query="select * from tbl_company  ";
			 
			 $compList= array();
			 
			 $resultSearch= mysql_query($query);
			   
	         if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
				$compObj= new Company();
				
				$compObj->setId($row['id']);
				
				$compObj->setName($row['name']);
				
				$compObj->setDetail($row['detail']);
				
				$compObj->setPosition($row['position']);
		
		        $compObj->setImage($row['image']);
		 
		        $compObj->setDescription($row['description']);
				
				$partner=new Category();
				
				//$partner->setId($row['pid']);
				
				//$partner->setName($row['pname']);
		
		        $compObj->setPartnerId($partner);
		
		             array_push($compList,$compObj);
					 
					 }
					 
				return $compList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					     }
		
		         }
				 
				 
				 
	 public function delete(){
	
			$del_id=$_GET['delete_id'];
			
			$sel="select image from tbl_company where id='$del_id'";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="delete from tbl_company where id='$del_id'";
			
			mysql_query($query);
			
			if($data['image']!=""){
				
			   unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="gallery/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				      }
					 
				    echo "<script> alert('selected item is Deleted successfully') </script>";
				   
			   }	
			
			
  
     }
	
	


?>