<?php

    class SubCategory{
	   
	    private $id;
		private $subject_id;
	    private $subject_name;
		
	    private $subname;
		
		private $position;
		
		private $categoryid;
		private $image;
		private $banner_visibility;
		public function getBanner_visibility()
			{
				return $this->banner_visibility;
			}
			public function setBanner_visibility($banner)
			{
				$this->banner_visibility=$banner;
				//echo $this->banner_visibility."<br/>";
			}
					public function getImage()
	       {
	        return $this->image;
	       }
	public function setImage($image)
			{
				$this->image=$image;
			}
		public function getId()
			{
				return $this->id;
			}
		public function setId($id)
			{
				$this->id=$id;
			}
			
		public function getSubName()
			{
				return $this->subname;
			}
		public function setSubName($subname)
			{
				$this->subname=$subname;
			}
			
			
			public function getSubjectid()
			{
				return $this->subject_id;
			}
		public function setSubjectid($subject_id)
			{
				$this->subject_id=$subject_id;
			}		
			
			public function getSubjectname()
			{
				return $this->subject_name;
			}
		public function setSubjectname($subject_name)
			{
				$this->subject_name=$subject_name;
			}		
			
			
		
		public function getPosition()
			{
				return $this->position;
			}
		public function setPosition($position)
			{
				$this->position=$position;
			}
			
		public function getCategoryId()
			{
				return $this->categoryid;
			}
		public function setCategoryId($categoryid)
			{
				$this->categoryid=$categoryid;
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
	  		public function addSubCategory(){
		
		      $destination=$this->createDestination();
				
				if($destination){
					
			   $query="insert into tbl_subcategory set subcat_name='$this->subname', position='$this->position', category_id='$this->categoryid',image='$destination',banner_visibility='$this->banner_visibility'  ";
				
		              mysql_query($query) or die("error on insert");	
					  
			   }
			   else{
			
			      $query="insert into tbl_subcategory set subcat_name='$this->subname', position='$this->position', category_id='$this->categoryid'" ;
		             mysql_query($query) or die("error on insert");
			
			        }
			   
	echo "<script> alert('Added successfully') </script>";
		
		           }
			
		
				   
				   
public function getSubCategory($id){
			
			//$query="select s.*, c.name, c.id as cid from tbl_subcategory s, tbl_category c  where s.category_id=c.id and s.id=$id";
		    $query="select * from tbl_subcategory where id=$id";
			  $result=mysql_query($query); 
	
		      $partObj=new SubCategory();
				
		     if($result)
		          {
		      $data=mysql_fetch_assoc($result);
			  
			  $partObj->setId($data['id']);
		
		      $partObj->setSubName($data['subcat_name']);
			  
			//  $catObj= new Category();
				  
			//  $catObj->setName($data['name']);
				  
			//  $catObj->setId($data['cid']);
				  
			//  $partObj->setCategoryId($catObj);
			  
			  $partObj->setPosition($data['position']);
			  $partObj->setImage($data['image']);
			  $partObj->setBanner_visibility($data['banner_visibility']);
			 
			      }
			  
		     return $partObj;
			 
		       }
			   
public function update($id){
	
	   $destination=$this->createDestination();
	
		 if($destination){
				
			$sel="select image from tbl_subcategory where id=$id";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			  
			
			$query="update tbl_subcategory set  subcat_name='$this->subname', position='$this->position', category_id='$this->categoryid',image='$destination',banner_visibility='$this->banner_visibility' where id=$id";
			
	       mysql_query($query) or die("error on update");
			
			if($data['image']!=""){
			
			unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="gallery/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				   }
		    }else{
		   
		  $query="update tbl_subcategory set  subcat_name='$this->subname', position='$this->position', category_id='$this->categoryid',banner_visibility='$this->banner_visibility' where id=$id";
		  
			
	               mysql_query($query) or die("error on update");
				  
		         }
				 
		          echo "<script> alert('Company detail updated successfully') </script>";
		   
	
	       }   
	
		
		  	 public function delete(){
	
			$del_id=$_GET['delete_id'];
			
			$sel="select image from tbl_subcategory where id='$del_id'";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="delete from tbl_subcategory where id='$del_id'";
			
			mysql_query($query);
			
			if($data['image']!=""){
				
			   unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="gallery/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				      }
					 
				    echo "<script> alert('selected item is Deleted successfully') </script>";
				   
			   }
		
		public function listSubCategory($condition=""){
		
		       //$query="select s.*, c.name, c.id as cid from tbl_subcategory s, tbl_category c  where s.category_id=c.id order by position";
			    $query="select * from tbl_districtinfo order by  district_id $condition";
			   $partList=array();
	
			   $resultSearch= mysql_query($query);
			   
	           if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
					
				  $partObj=new SubCategory();
					
				  $partObj->setId($row['id']);
		
		          $partObj->setSubName($row['district_id']); 
			   		    $partObj->setPosition($row['district_name']);
						
						
					   array_push($partList,$partObj);
					
					       }
						
					return $partList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         } 
				 
				 
		public function listDistrict(){
		
		       //$query="select s.*, c.name, c.id as cid from tbl_subcategory s, tbl_category c  where s.category_id=c.id order by position";
			    $query="select * from tbl_districtinfo order by  district_id";
			   $partList=array();
			    $resultSearch = mysql_query("SET NAMES utf8");
	
			   $resultSearch= mysql_query($query);
			   
	           if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
					
				  $partObj=new SubCategory();
					
				  		$partObj->setId($row['district_id']);
		
		          		$partObj->setSubName($row['district_name']); 
			   		    
					   array_push($partList,$partObj);
					
					       }
						
					return $partList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         } 
				 
				 
				 
				 public function listSubjectname(){
		
		       //$query="select s.*, c.name, c.id as cid from tbl_subcategory s, tbl_category c  where s.category_id=c.id order by position";
			    $query="select * from tbl_subjectinfo order by  subject_id";
			   $partList=array();
			    $resultSearch = mysql_query("SET NAMES utf8");
	
			   $resultSearch= mysql_query($query);
			   
	           if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
					
				  $partObj=new SubCategory();
					
				  		$partObj->setSubjectid($row['subject_id']);
		
		          		$partObj->setSubjectname($row['subject_name']); 
			   		    
					   array_push($partList,$partObj);
					
					       }
						
					return $partList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         } 
				 
				 
				 
				 
				 
		public function listSubCat(){
		
		       $query="select * from tbl_subcategory order by position";
			   
			   $partList=array();
			   
			   $resultSearch= mysql_query($query);
			   
	           if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
					
				  $partObj=new SubCategory();
					
				  $partObj->setId($row['id']);
		
		          $partObj->setSubName($row['subcat_name']);
				  
				   $partObj->setCategoryId($row['category_id']);
			  
			       $partObj->setPosition($row['position']);
				   	 $partObj->setImage($row['image']);
			  $partObj->setBanner_visibility($row['banner_visibility']);
					
					   array_push($partList,$partObj);
					
					       }
						
					return $partList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }		 
				 
	
	
	
	  }
  


  ?>