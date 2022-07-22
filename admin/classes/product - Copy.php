<?php 

 include_once('subcategory.php');

 class Product{
 
     private $id;
	 
	 private $name;
	 
	 private $detail;
	 
	 private $price;
	 
	 private $image;
	 
	 private $description;
	 
	 private $lproduct;
	 
	 private $companyid;
	 
	 
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
		public function getPrice()
			{
				return $this->price;
			}
		public function setPrice($price)
			{
				$this->price=$price;
			}
		public function getDescription()
			{
				return $this->description;
			}
		public function setDescription($description)
			{
				$this->description=$description;
			}	
		public function getCompanyId()
			{
				return $this->companyid;
			}
		public function setCompanyId($companyid)
			{
				$this->companyid=$companyid;
			}
		public function getLproduct()
			{
				return $this->lproduct;
			}
		public function setLproduct($lproduct)
			{
				$this->lproduct=$lproduct;
			}	
			
		public function getImage()
			{
				return $this->image;
			}
		public function setImage($image)
			{
				$this->image=$image;
			}
			
		public function getSubcatId()
			{
				return $this->subcatId;
			}
		public function setSubcatId($subcatId)
			{
				$this->subcatId=$subcatId;
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
	  
	  
	  public function addProduct(){
		  
	            $destination=$this->createDestination();
				
				if($destination){
					
			   $query="insert into tbl_product set name='$this->name', detail='$this->detail', price='$this->price', description='$this->description' ,company_id='$this->companyid', lproduct='$this->lproduct', subcategory_id='$this->subcatId', image='$destination' ";
			   
				
		              mysql_query($query) or die("error on insert");	
					  
			   }else{
			
			      $query="insert into tbl_product set name='$this->name', detail='$this->detail', price='$this->price', description='$this->description' ,company_id='$this->companyid', lproduct='$this->lproduct', subcategory_id='$this->subcatId' ";
							  
		             mysql_query($query) or die("error on insert");
			
			        }
			   
			   echo "<script> alert('Added successfully') </script>";
	
	        }
		
					 
		public function getProduct($id){
		        
				$query="select p.*, c.name as cname, c.id as cid, s.id as sid, s.subcat_name as sname from tbl_product p, tbl_company c, tbl_subcategory s where p.company_id=c.id and p.subcategory_id=s.id AND p.id=$id";
				
				$resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
			  $row = mysql_fetch_array($resultSearch);
				  
		        $prodObj=new Product();
		
		        $prodObj->setId($row['id']);
		
		        $prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				 
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				$comp=new Company();
				
				$comp->setId($row['cid']);
				
				$comp->setName($row['cname']);
		
		        $prodObj->setCompanyId($comp);
				
				$subcatObj=new SubCategory();
				
				$subcatObj->setId($row['sid']);
				
				$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
		      
		            }
				   
		       return $prodObj;
		
		    }
			
			public function getFeatured()
			{
					$query="select * from tbl_product where lproduct=1";
					$resultSearch= mysql_query($query);
					 $pList= array();
					if($resultSearch)
					{
							   	   $numrows=mysql_num_rows($resultSearch);
							for( $i=0;$i<$numrows;$i++){
											$row = mysql_fetch_array($resultSearch);
											$prodObj=new Product();
						
											$prodObj->setId($row['id']);
											
											$prodObj->setName($row['name']);
								
											$prodObj->setDetail($row['detail']);
								 
											$prodObj->setPrice($row['price']);
						
											$prodObj->setImage($row['image']);
								
											$prodObj->setLproduct($row['lproduct']);
						 
											$prodObj->setDescription($row['description']);
											array_push($pList,$prodObj);
							}
				 return $pList;
							
					
					}
		return array();
					
			}
			
			
			public function getCproduct($id){
		        
				$query="select p.*, s.id as sid, s.subcat_name as sname from tbl_product p, tbl_subcategory s where p.subcategory_id=s.id AND p.id=$id";
				
				$resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
			  $row = mysql_fetch_array($resultSearch);
				  
		        $prodObj=new Product();
		
		        $prodObj->setId($row['id']);
		
		        $prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				 
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				$subcatObj=new SubCategory();
				
				$subcatObj->setId($row['sid']);
				
				$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
		      
		            }
				   
		       return $prodObj;
		
		    }
			
			
			
			
			
			
		public function getFrontProd($id){
			
		        
		$query="select p.*, c.name as cname, c.detail as cdetail, c.image as cimage, s.id as sid, s.subcat_name as sname from tbl_product p, tbl_company c, tbl_subcategory s where p.company_id=c.id and p.subcategory_id=s.id and p.company_id=$id";
				
		    $pList= array();
			 
			$resultSearch= mysql_query($query);
			   
	      if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
		         $prodObj=new Product();
		
		        $prodObj->setId($row['id']);
		
		        $prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				 
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				$comp=new Company();
				
				$comp->setDetail($row['cdetail']);
				
				$comp->setName($row['cname']);
				
				$comp->setImage($row['cimage']);
				
				 $prodObj->setCompanyId($comp);
				 
				 $subcatObj=new SubCategory();
				
				$subcatObj->setId($row['sid']);
				
				$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
				
				   array_push($pList,$prodObj);
					 
					    }
					 
				  return $pList;
					}
					return array();
				
		  }	
			
			
		public function getFrontCat($id){
			
		        
		$query="select p.*, s.id as sid, s.subcat_name as sname from tbl_product p, tbl_subcategory s where p.subcategory_id=s.id and p.subcategory_id=$id";
				
		    $pList= array();
			 
			$resultSearch= mysql_query($query);
			   
	      if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
		         $prodObj=new Product();
		
		        $prodObj->setId($row['id']);
		
		        $prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				 
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				 
				 $subcatObj=new SubCategory();
				
				$subcatObj->setId($row['sid']);
				
				$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
				
				   array_push($pList,$prodObj);
					 
					    }
					 
				  return $pList;
					}
					return array();
				
		  }		
			
			
			
			
			
			
			
			
	public function updateProduct($id){
	
	   $destination=$this->createDestination();
	   
		 if($destination){
				
			$sel="select image from tbl_product where id=$id";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
	        $query="update  tbl_product set  name='$this->name', detail='$this->detail', price='$this->price', image='$destination',
					description='$this->description', lproduct='$this->lproduct', company_id='$this->companyid', subcategory_id='$this->subcatId' where id=$id";
			
	        mysql_query($query) or die("error on update");
			
			if($data['image']!=""){
			
			unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="gallery/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				   }
		    }else{
		   
		  $query="update  tbl_product set  name='$this->name', detail='$this->detail', price='$this->price', description='$this->description', company_id='$this->companyid', lproduct='$this->lproduct', subcategory_id='$this->subcatId' where id=$id";
			
	               mysql_query($query) or die("error on update");
				  
		         }
				 
		          echo "<script> alert('Product detail updated successfully') </script>";
		   
	
	       }
		   
		   
		 public function getImages($id){
	
	      $query="select image from tbl_product where id=$id";
		  
	      $resultSearch= mysql_query($query);
	 
			 if($resultSearch){
			
					$row = mysql_fetch_array($resultSearch);
					
					return $row['image'];
	
	              }else{
				   
	                  return 0;	
					  
		              }
				  
               } 
		  
		
		public function listProduct($offset, $rowsperpage){
		
		     $query="select p.*, c.name as cname, c.id as cid, s.id as sid, s.subcat_name as sname from tbl_product p, tbl_company c, tbl_subcategory s where p.company_id=c.id and p.subcategory_id=s.id order by p.name LIMIT $offset,$rowsperpage";
			 
			 //var_dump($query);
			 
			 $prodList= array();
			 
			 $resultSearch= mysql_query($query);
			   
	         if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
				$prodObj= new Product();
				
				$prodObj->setId($row['id']);
				
				$prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				$comp=new Company();
				
				$comp->setId($row['cid']);
				
				$comp->setName($row['cname']);
		
		        $prodObj->setCompanyId($comp);
				
				$subcatObj=new SubCategory();
				
				$subcatObj->setId($row['sid']);
				
				$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
		
		             array_push($prodList,$prodObj);
					 
					 }
					 
				return $prodList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }
 public function listProductcat($offset, $rowsperpage,$catid){
		
		     $query="SELECT * FROM tbl_product WHERE subcategory_id='$catid' LIMIT $offset,$rowsperpage";
			 
			 //var_dump($query);
			 
			 $prodList= array();
			 
			 $resultSearch= mysql_query($query);
			   
	         if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
				$prodObj= new Product();
				
				$prodObj->setId($row['id']);
				
				$prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				
				
		
		             array_push($prodList,$prodObj);
					 
					 }
					 
				return $prodList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }
				 
public function listProductcom($offset, $rowsperpage,$catid){
		
		     $query="SELECT * FROM tbl_product WHERE company_id='$catid' LIMIT $offset,$rowsperpage";
			 
			 //var_dump($query);
			 
			 $prodList= array();
			 
			 $resultSearch= mysql_query($query);
			   
	         if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
				$prodObj= new Product();
				
				$prodObj->setId($row['id']);
				
				$prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				
				
		
		             array_push($prodList,$prodObj);
					 
					 }
					 
				return $prodList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }
				 
				 
		public function listCProduct($offset, $rowsperpage){
		
		     $query="select p.*, s.id as sid, s.subcat_name as sname from tbl_product p, tbl_subcategory s where p.subcategory_id=s.id order by p.name LIMIT $offset,$rowsperpage";
			 
			// var_dump($query);
			 
			 $prodList= array();
			 
			 $resultSearch= mysql_query($query);
			   
	         if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
				$prodObj= new Product();
				
				$prodObj->setId($row['id']);
				
				$prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				$prodObj->setCompanyId($row['company_id']);
				
				$subcatObj=new SubCategory();
				
				$subcatObj->setId($row['sid']);
				
				$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
		
		             array_push($prodList,$prodObj);
					 
					 }
					 
				return $prodList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }		 
				 
				 
				 
		public function listCompProduct($id){
		
		     $query="select * from tbl_product where company_id=$id order by id desc";
			 
			 $prodList= array();
			 
			 $resultSearch= mysql_query($query);
			   
	         if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
				$prodObj= new Product();
				
				$prodObj->setId($row['id']);
				
				$prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				
				$prodObj->setPrice($row['price']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
		
		        $prodObj->setCompanyId($row['company_id']);
		
		             array_push($prodList,$prodObj);
					 
					 }
					 
				     return $prodList;
					
					}
					return array();
		
		         } 
				 
				 
		public function listLatestProduct(){
		
		     $query="select p.*, c.id as cid, c.name as cname, s.id as sid, s.subcat_name as sname from tbl_product p, tbl_company c, tbl_subcategory s where c.id=p.company_id and p.subcategory_id=s.id and lproduct=1 order by p.id desc";
			 
			 $prodList= array();
			 
			 $resultSearch= mysql_query($query);
			   
	         if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
				
				$prodObj= new Product();
				
				$prodObj->setId($row['id']);
				
				$prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setPrice($row['price']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				$comp=new Company();
				
				$comp->setId($row['cid']);
				
				$comp->setName($row['cname']);
		
		        $prodObj->setCompanyId($comp);
				
				$subcatObj=new SubCategory();
				
				$subcatObj->setId($row['sid']);
				
				$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
		
		             array_push($prodList,$prodObj);
					 
					 }
					 
				     return $prodList;
					
					}
					return array();
		
		         } 		 
				 
				 
				 
				 
				 
	 public function delete(){
	
			$del_id=$_GET['delete_id'];
			
			
			$sel="select image from tbl_product where id='$del_id'";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="delete from tbl_product where id='$del_id'";
			
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