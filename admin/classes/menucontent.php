<?php

include_once("menu.php");
	
	class menucontent{
		private $id;
		private $menu;
		private $menu_name;
		private $page_title;
		private $keyword;
		private $attribute;
		private $image;
		private $description;
		private $details;
		private $position;
		private $status;
		
		public function getId()
			{
				return $this->id;
			}
		public function setId($id)
			{
				$this->id=$id;
			}
		public function getMenu()
			{
				return $this->menu;
			}
		public function setMenu($menu)
			{
				$this->menu=$menu;
			}
		public function getMenu_name()
			{
				return $this->menu_name;
			}
		public function setMenu_name($menu_name)
			{
				$this->menu_name=$menu_name;
			}
		public function getPage_title()
			{
				return $this->page_title;
			}
		public function setPage_title($page_title)
			{
				$this->page_title=$page_title;
			}
		public function getkeyword()
			{
				return $this->keyword;
			}
		public function setKeyword($keyword)
			{
				$this->keyword=$keyword;
			}
		public function getAttribute()
			{
				return $this->attribute;
			}
		public function setAttribute($attribute)
			{
				$this->attribute=$attribute;
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
		public function getDetails()
			{
				return $this->details;
			}
		public function setDetails($details)
			{
				$this->details=$details;
			}
		
		public function getPosition()
			{
				return $this->position;
			}
		public function setPosition($position)
			{
				$this->position=$position;
			}
		public function getStatus()
			{
				return $this->status;
			} 
		public function setStatus($status)
			{
				$this->status=$status;
			}
		
		private function createDestination()
				{
					$error=$_FILES['userfile']['error'];
			
					$n=explode(".",".jpg");
					$ext=strtolower($n[1]);
			
						if($ext=="jpg"|| $ext=="gif"|| $ext=="png")
							{
			
							$source=$_FILES['userfile']['tmp_name'];
							$name=$_FILES['userfile']['name'];
							if ($name=="" or $name==null)
								{
									return false;
								}
									$destination="gallery/".$name;
									
									$ran=rand(1000,9999);
									$a=explode(".",$destination);
									$destination=$a[0].$ran.".".$a[1];
									
									move_uploaded_file($source,$destination);
									return $destination;
								}
								else
								echo "file type must be only jpg,gif and png";
							return false;	
		
				}
			
//////////////////////////// INSERT //////////////////////////////	
		
		public function insert()
				{	
					$destination=$this->createDestination();
					if($destination)
					{
					$menuid=$this->getMenu()->getId();
					$query="insert into tbl_menucontent set image='$destination' ,menu_id=$menuid ,menu='$this->menu_name' ,page_title='$this->page_title' ,keyword='$this->keyword' ,attribute='$this->attribute' ,description='$this->description' ,details='$this->details' ,position='$this->position' ,status='$this->status'";		
				
				 mysql_query($query) or die("error on insert");
					
					}
					else
					{
					$menuid=$this->getMenu()->getId();
							$query="insert into tbl_menucontent set menu_id=$menuid ,menu='$this->menu_name',page_title='$this->page_title' ,keyword='$this->keyword' ,attribute='$this->attribute' ,description='$this->description' ,details='$this->details' ,position='$this->position' ,status='$this->status'";
						 	
							mysql_query($query) or die("error on insert");
					}	
				}
				
				
				
				
	 public function getImages($id){
	
	      $query="select image from tbl_menucontent where id=$id";
		  
	      $resultSearch= mysql_query($query);
	 
			if($resultSearch){
			
					$row = mysql_fetch_array($resultSearch);
					
					return $row['image'];
	
	           }else{
				   
	               return 0;	
		          }
				  
				  
        }	  
	
			
//////////////////////////// DISPLAY //////////////////////////////	

		public function display()
		{
		$query="select * from tbl_menucontent ORDER BY position";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$menucontentList=array();
		
		$i=0;
		while($num>$i)
		{
		$menucontentObj=new menucontent();
		$data=mysql_fetch_assoc($result);
		
		$menucontentObj->setId($data['id']);
		$menucontentObj->setMenu($data['menu']);
		$menucontentObj->setMenu_name($data['menu_name']);
		$menucontentObj->setPage_title($data['page_title']);
		$menucontentObj->setKeyword($data['keyword']);
		$menucontentObj->setImage($data['image']);
		$menucontentObj->setAttribute($data['attribute']);
		$menucontentObj->setPosition($data['position']);
		$menucontentObj->setStatus($data['status']);
		
		array_push($menucontentList,$menucontentObj);
		$i++;
		}
		return $menucontentList;
		
		}	
		
//////////////////////////// DISPLAY FRONT //////////////////////////////	

		public function displayfront()
		{
		$id=$this->getMenu()->getId();
		$query="select * from tbl_menucontent where status='1' AND  menu_id=$id AND menu='".$this->getMenu_name()."' ORDER BY position";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$menucontentList=array();
		
		$i=0;
		while($num>$i)
		{
		$menucontentObj=new menucontent();
		$data=mysql_fetch_assoc($result);
		
		$menucontentObj->setId($data['id']);
		$menucontentObj->setMenu($data['menu']);
		$menucontentObj->setMenu_name($data['menu_name']);
		$menucontentObj->setPage_title($data['page_title']);
		$menucontentObj->setKeyword($data['keyword']);
		$menucontentObj->setImage($data['image']);
		$menucontentObj->setAttribute($data['attribute']);
		$menucontentObj->setDetails($data['details']);
		$menucontentObj->setDescription($data['description']);
		$menucontentObj->setPosition($data['position']);
		$menucontentObj->setStatus($data['status']);
		
		array_push($menucontentList,$menucontentObj);
		$i++;
		}
		return $menucontentList;
		
		}	

//////////////////////////// DELETE //////////////////////////////

		public function delete()
		{
			$del_id=$_GET['delete_id'];
			
			$sel="select * from tbl_menucontent where id='$del_id'";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="delete from tbl_menucontent where id='$del_id'";
			
			   mysql_query($query);
			
		}
		
///////////////// DETAIL ////////////////////
		
		public function getDetail($myid)
		  {
		  $query="select * from tbl_menucontent where id=$myid";
		  
		  $result=mysql_query($query); 
		  
	      $num=mysql_num_rows($result);		
	
		  $menucontentObj=new menucontent();
		  
		  if($result)
		   {
			  $data=mysql_fetch_assoc($result);
			
			  $menucontentObj->setId($data['id']);
			  
			  $menucontentObj->setMenu($data['menu']);
			  
			  $menucontentObj->setMenu_name($data['menu_id']);
			  
			  $menucontentObj->setPage_title($data['page_title']);
			  
			  $menucontentObj->setKeyword($data['keyword']);
			  
			  $menucontentObj->setImage($data['image']);
			  
			  $menucontentObj->setAttribute($data['attribute']);
			  
			  $menucontentObj->setDescription($data['description']);
			  
			  $menucontentObj->setDetails($data['details']);
			  
			  $menucontentObj->setPosition($data['position']);
			  
			  $menucontentObj->setStatus($data['status']);
			
		           }
				   
		 return $menucontentObj;
		 
		          }
		 
////////////////// UPDATE ////////////////////
		 
		 public function update($myid){
			 
					$destination=$this->createDestination();
					
					if($destination)
					
			      	  {
				$menuid=$this->getMenu()->getId();
						
						$query="update tbl_menucontent set image='$destination' ,menu_id=$menuid ,menu='$this->menu_name' ,page_title='$this->page_title' ,keyword='$this->keyword' ,attribute='$this->attribute' ,description='$this->description' ,details='$this->details' ,position='$this->position' ,status='$this->status' where id='$myid'";
							
				 mysql_query($query) or die("error on insert");	
				 
			  		}
					
				else
					{
						
				$menuid=$this->getMenu()->getId();
						
						$query="update tbl_menucontent set menu_id=$menuid ,menu='$this->menu_name',page_title='$this->page_title' ,keyword='$this->keyword' ,attribute='$this->attribute' ,description='$this->description' ,details='$this->details' ,position='$this->position' ,status='$this->status' where id='$myid'";
						
				    	mysql_query($query) or die("error on insert");	
					
					}
		
				}
				
				
			
				
				
				
				/************Used to return only main menu content***************/
				
	public function getMainMenuContent(){
		
		$query="select m.menu_name as mname,mc.* from tbl_menucontent mc,tbl_mainmenu m where menu='Mainmenu' and mc.menu_id=m.id ORDER BY position";
		
		$result=mysql_query($query); 
		
		$num=mysql_num_rows($result);	
		
		$menucontentList=array();
		
		$i=0;
		
		while($num>$i){
			
		$menucontentObj=new menucontent();
		
		$data=mysql_fetch_assoc($result);
		
		$menucontentObj->setId($data['id']);
		
		$menu=new Menu;
		
		$menu->setMenu($data['mname']);
		
		$menu->setId($data['menu_id']);
		
		$menucontentObj->setMenu($menu);
		
		$menucontentObj->setMenu_name($data['menu']);
		
		$menucontentObj->setPage_title($data['page_title']);
		
		$menucontentObj->setKeyword($data['keyword']);
		
		$menucontentObj->setImage($data['image']);
		
		$menucontentObj->setAttribute($data['attribute']);
		
		$menucontentObj->setPosition($data['position']);
		
		$menucontentObj->setStatus($data['status']);
		
		       array_push($menucontentList,$menucontentObj);
		
	     	$i++;
		
		   }
		   
		return $menucontentList;
		
		}
		
		/************Used to get submenu contents only but returns the merged array of menu and submenu. It takes parameter an array of mainmenu**************/	
		
		
	 private function getSubMenuContent($mainmenus){
		 
		$query="select s.sub_menu,mc.* from tbl_menucontent mc,tbl_submenu s where menu='SubMenu' and mc.menu_id=s.id ORDER BY position";
		
		$result=mysql_query($query); 
		
		$num=mysql_num_rows($result);		
		
		$menucontentList=array();
		
		$i=0;
		
		while($num>$i){
			
		$menucontentObj=new menucontent();
		
		$data=mysql_fetch_assoc($result);
		
		$menucontentObj->setId($data['id']);
		
		$menu=new Submenu;
		
		$menu->setSub_menu($data['sub_menu']);
		
		$menu->setId($data['menu_id']);
		
		$menucontentObj->setMenu($menu);
		
		$menucontentObj->setMenu_name($data['menu']);
		
		$menucontentObj->setPage_title($data['page_title']);
		
		$menucontentObj->setKeyword($data['keyword']);
		
		$menucontentObj->setImage($data['image']);
		
		$menucontentObj->setAttribute($data['attribute']);
		
		$menucontentObj->setPosition($data['position']);
		
		$menucontentObj->setStatus($data['status']);
		
		     array_push($menucontentList,$menucontentObj);
		
		  $i++;
		  
		}
		
		return array_merge($mainmenus,$menucontentList);
		
		}
		
		
	private function getTriMenuContent($submainmenus){
		
		$query="select t.tri_menu,mc.* from tbl_menucontent mc,tbl_trimenu t where menu='TriMenu' and mc.menu_id=t.id ORDER BY position";
		
		$result=mysql_query($query);
		
		$num=mysql_num_rows($result);
		
		$menucontentList=array();
		
		$i=0;
		
		while($num>$i){
			
		$menucontentObj=new menucontent();
		
		$data=mysql_fetch_assoc($result);
		
		  $menucontentObj->setId($data['id']);
		
		$menu=new Trimenu;
		
		$menu->setTri_menu($data['tri_menu']);
		
		$menu->setId($data['menu_id']);
		
		$menucontentObj->setMenu($menu);
		
		$menucontentObj->setMenu_name($data['menu']);
		
		$menucontentObj->setPage_title($data['page_title']);
		
		$menucontentObj->setKeyword($data['keyword']);
		
		$menucontentObj->setImage($data['image']);
		
		$menucontentObj->setAttribute($data['attribute']);
		
		$menucontentObj->setPosition($data['position']);
		
		$menucontentObj->setStatus($data['status']);
		
		    array_push($menucontentList,$menucontentObj);
			
		    $i++;
			
		  }
		  
		   return array_merge($submainmenus,$menucontentList);
		
		}	
		
		
		/**************Gets all menu content***************/
		
		public function getAllMenuContent(){
		
		    $mainmenus=$this->getMainMenuContent();
			
		    $submainmenus=$this->getSubMenuContent($mainmenus);
			
			return $this->getTriMenuContent($submainmenus);
		
		}
		
		
		public function deleteImage($id){
			
			$sel="select image from tbl_menucontent where id=$id";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			if($data['image']!=""){
				
			   unlink($data['image']);
			
		        	$thumbarray=explode("/",$data['image']);
					
			         $thumb="gallery/thumb/".$thumbarray[1];
					 
			         unlink($thumb);
					 
				      }
					  
			      $query="update tbl_menucontent set image='' where id=$id";
			
			    mysql_query($query);
				
					 
				    echo "<script> alert('Image is Deleted successfully') </script>";
				   
			         }	
		
				
				
				
			
	}
?>
