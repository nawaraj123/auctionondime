<?php 
 include_once('subcategory.php');
 include_once('Uploadimage.class.php');
 class Product{ 
     private $id;
	 public $conxn;
	 private $name;	 
	 private $detail;	 
	 private $price;
	 private $bid;
	 private $current_bid_number;
	private $oprice;
	 private $image;	 
	 private $description;	 
	 private $lproduct;	 
	 private $companyid;
	 private $condition;
	 function __construct(){
		/*$this->connectdatabase("localhost","root","","db_peace");*/
		}	
		function __destruct(){
		//mysql_close($this->conxn);
		}
	 
	   public function getCondition()
			{
				return $this->condition;
			}
		public function setCondition($condition)
			{
				$this->condition=$condition;
			}
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
			public function getOprice()
			{
				return $this->oprice;
			}
		public function setOprice($oprice)
			{
				$this->oprice=$oprice;
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
			
			
			public function getBid()
			{
				return $this->bid;
			}
		public function setBid($bid)
			{
				$this->bid=$bid;
			}	
			
			public function getCurrent_bid_number()
			{
				return $this->current_bid_number;
			}
		public function setCurrent_bid_number($current_bid_number)
			{
				$this->current_bid_number=$current_bid_number;
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
	  
	  
	  public function addProduct(){
		  
	            $destination=$this->createDestination();
				
				if($destination){
					
			   $query="insert into tbl_product set name='$this->name', detail='$this->detail', price='$this->price', oprice='$this->oprice', description='$this->description' ,company_id='$this->companyid', lproduct='$this->lproduct', subcategory_id='$this->subcatId',bid='$this->bid', image='$destination' ";
			   
				
		              mysql_query($query) or die("error on insert");	
					  
			   }else{
			
			      $query="insert into tbl_product set name='$this->name', detail='$this->detail', price='$this->price', oprice='$this->oprice', description='$this->description' ,company_id='$this->companyid', lproduct='$this->lproduct',bid='$this->bid', subcategory_id='$this->subcatId' ";
							  
		             mysql_query($query) or die("error on insert");
			
			        }
			   
			   echo "<script> alert('Added successfully') </script>";
	
	        }
		
					 
		public function getProduct($id){
		        
				$query="select p.*, c.name as cname, c.id as cid from tbl_product p, tbl_company c where p.company_id=c.id  AND p.id=$id";
				
				$resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
			  $row = mysql_fetch_array($resultSearch);
				  
		        $prodObj=new Product();
		
		        $prodObj->setId($row['id']);
		
		        $prodObj->setName($row['name']);
				
				$prodObj->setDetail($row['detail']);
				 
				$prodObj->setPrice($row['price']);
				$prodObj->setBid($row['bid']);

				
				$prodObj->setOprice($row['oprice']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				
				$comp=new Company();
				
				$comp->setId($row['cid']);
				
				$comp->setName($row['cname']);
		
		        $prodObj->setCompanyId($comp);
				
				$subcatObj=new SubCategory();
				
				//$subcatObj->setId($row['sid']);
				
				//$subcatObj->setSubName($row['sname']);
				
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
											
											$prodObj->setOprice($row['oprice']);
											$prodObj->setBid($row['bid']);
						
											$prodObj->setImage($row['image']);
								
											$prodObj->setLproduct($row['lproduct']);
						 
											$prodObj->setDescription($row['description']);
											array_push($pList,$prodObj);
							}
				 return $pList;
							
					
					}
		return array();
					
			}
			
			public function getRandom($limit=4)
			{
					$query="SELECT * FROM `tbl_product` WHERE id >= (SELECT FLOOR( MAX(id) * RAND()) FROM `tbl_product` ) ORDER BY id LIMIT 4";
					$resultSearch= mysql_query($query);
					 $pList= array();
					if($resultSearch)
					{
						
							for( $i=0;$i<4;$i++){
											$row = mysql_fetch_array($resultSearch);
											$prodObj=new Product();
						
											$prodObj->setId($row['id']);
											
											$prodObj->setName($row['name']);
								
											$prodObj->setDetail($row['detail']);
								 
											$prodObj->setPrice($row['price']);
											
											$prodObj->setOprice($row['oprice']);
											$prodObj->setBid($row['bid']);
						
											$prodObj->setImage($row['image']);
								
											$prodObj->setLproduct($row['lproduct']);
						 
											$prodObj->setDescription($row['description']);
											array_push($pList,$prodObj);
							}
				 return $pList;
							
					
					}
		return array();
					
			}
		public function search($value)
			{
					$query="SELECT *
					FROM `db_peace`.`tbl_product`
					WHERE (
							`name` LIKE '%$value%'
						)
					LIMIT 0 , 30";;
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
											$prodObj->setBid($row['bid']);
											
											$prodObj->setOprice($row['oprice']);
						
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
				$prodObj->setBid($row['bid']);
				
				$prodObj->setOprice($row['oprice']);
		
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
				
				$prodObj->setOprice($row['oprice']);
				$prodObj->setBid($row['bid']);
		
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
				$prodObj->setBid($row['bid']);
				
				$prodObj->setOprice($row['oprice']);
		
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
			
	        $query="update  tbl_product set  name='$this->name', detail='$this->detail', price='$this->price',oprice='$this->oprice', image='$destination',
					description='$this->description', lproduct='$this->lproduct', company_id='$this->companyid', subcategory_id='$this->subcatId',bid='$this->bid' where id=$id";
			
	        mysql_query($query) or die("error on update");
			
			if($data['image']!=""){
			
			unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="../uploadedimages/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				   }
		    }else{
		   
		  $query="update  tbl_product set  name='$this->name', detail='$this->detail', price='$this->price', oprice='$this->oprice', description='$this->description', company_id='$this->companyid', lproduct='$this->lproduct', subcategory_id='$this->subcatId',bid='$this->bid' where id=$id";
			
	               mysql_query($query) or die("error on update");
				  
		         }
				 
		          echo "<script> alert('Product detail updated successfully') </script>";
		   
	
	       }
		   
		   
		   		
	public function updateProduct_bid($id){ 	 
			
	        $query="update  tbl_product set  current_bid_number='$this->current_bid_number'+1 where id=$id";			
	        mysql_query($query) ; 
							 
	
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
			   
			   
			    public function getRequire_to_win($id){
	
	      $query="select sum(bid-current_bid_number) as 'bid_require_to_win' from tbl_product where id=$id";
		  
	      $resultSearch= mysql_query($query);
	 
			 if($resultSearch){
			
					$row = mysql_fetch_array($resultSearch);
					
					return $row['bid_require_to_win'];
	
	              }else{
				   
	                  return 0;	
					  
		              }
				  
               } 
			   
			   
		  
		
		public function listProduct($offset, $rowsperpage){
		
		     $query="select p.*, c.name as cname, c.id as cid from tbl_product p, tbl_company c where p.company_id=c.id  order by p.name LIMIT $offset,$rowsperpage";
			 
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
				$prodObj->setBid($row['bid']);
				
				$prodObj->setOprice($row['oprice']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				$prodObj->setCurrent_bid_number($row['current_bid_number']);
				
				$comp=new Company();
				
				$comp->setId($row['cid']);
				
				$comp->setName($row['cname']);
		
		        $prodObj->setCompanyId($comp);
				
				$subcatObj=new SubCategory();
				
				//$subcatObj->setId($row['sid']);
				
				//$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
		
		             array_push($prodList,$prodObj);
					 
					 }
					 
				return $prodList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }
				 
				 public function listbidded_product_by_user($offset, $rowsperpage,$user_id){
		
		     $query="SELECT distinct p.* from  bid_record br , tbl_product p where p.id=br.product_id and user_id=$user_id LIMIT $offset,$rowsperpage";
			 
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
				$prodObj->setBid($row['bid']);
				
				$prodObj->setOprice($row['oprice']);
		
		        $prodObj->setImage($row['image']);
				
				$prodObj->setLproduct($row['lproduct']);
		 
		        $prodObj->setDescription($row['description']);
				$prodObj->setCurrent_bid_number($row['current_bid_number']);
				
				
				
				//$subcatObj->setSubName($row['sname']);
				
				$prodObj->setSubcatId($subcatObj);
		
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
				$prodObj->setBid($row['bid']);

				
				$prodObj->setOprice($row['oprice']);
		
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
				$prodObj->setBid($row['bid']);

				
				$prodObj->setOprice($row['oprice']);
		
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
				$prodObj->setBid($row['bid']);

				
				$prodObj->setOprice($row['oprice']);
		
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
				$prodObj->setBid($row['bid']);

				
				$prodObj->setOprice($row['oprice']);
				
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
					
			         $thumb="../uploadedimages/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
				      }
					 
				    echo "<script> alert('selected item is Deleted successfully') </script>";
				   
			   }	 
				 
	
    }




  ?>