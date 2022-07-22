<?php   
	class Menu 
	{
		private $id;
		private $menu;
		private $method;
		private $link;
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
		public function getMethod()
			{
				return $this->method;
			}
		public function setMethod($method)
			{
				$this->method=$method;
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
		public function getStatus()
			{
				return $this->status;
			} 
		public function setStatus($status)
			{
				$this->status=$status;
			}
			
//////////////////////////// INSERT //////////////////////////////	
		
		public function insert()
			{	
				$query="insert into tbl_mainmenu set menu_name='$this->menu' ,method='$this->method', link='$this->link' , position='$this->position' , status='$this->status'";
				
				mysql_query($query) or die("error on insert");	
			}
			
//////////////////////////// DISPLAY //////////////////////////////	

		public function display(){
		
		    $query="select * from tbl_mainmenu order by position asc";
		
		    //var_dump($query);
		
		    $result=mysql_query($query) or die(mysql_error()); 
		
		    $num=mysql_num_rows($result);
				
		   $menuList=array();
		
		   $i=0;
		
		  while($num>$i)
		   {
		 $menuObj=new Menu();
		
		 $data=mysql_fetch_assoc($result);
		
		$menuObj->setId($data['id']);
		
		$menuObj->setMenu($data['menu_name']);
		
		$menuObj->setMethod($data['method']);
		
		$menuObj->setLink($data['link']);
		
		$menuObj->setPosition($data['position']);
		
		$menuObj->setStatus($data['status']);
		
		array_push($menuList,$menuObj);
		
		$i++;
		}
		return $menuList;
		
		}	
//////////////////////////// DISPLAY MAIN MENU //////////////////////////////	

		public function displayMain()
		{
		$query="select * from tbl_mainmenu where menu_type='Mainmenu' ORDER BY menu_type";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$menuList=array();
		
		$i=0;
		while($num>$i)
		{
		$menuObj=new Menu();
		$data=mysql_fetch_assoc($result);
		
		$menuObj->setId($data['id']);
		$menuObj->setMenu($data['menu_name']);
		$menuObj->setMethod($data['method']);
		$menuObj->setMenu_type($data['menu_type']);
		$menuObj->setLink($data['link']);
		$menuObj->setPosition($data['position']);
		$menuObj->setStatus($data['status']);
		array_push($menuList,$menuObj);
		$i++;
		}
		return $menuList;
		
		}
		
//////////////////////////// DISPLAY FRONT //////////////////////////////	

		public function displayfront()
		{
		$query="select * from tbl_mainmenu where status='1' ORDER BY position";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$menuList=array();
		
		$i=0;
		while($num>$i)
		{
		$menuObj=new Menu();
		$data=mysql_fetch_assoc($result);
		
		$menuObj->setId($data['id']);
		$menuObj->setMenu($data['menu_name']);
		$menuObj->setMethod($data['method']);
		$menuObj->setLink($data['link']);
		$menuObj->setPosition($data['position']);
		$menuObj->setStatus($data['status']);
		array_push($menuList,$menuObj);
		$i++;
		}
		return $menuList;
		
		}	
//////////////////////////// DISPLAY FRONT TOP MENU //////////////////////////////	

		public function displayfrontTop()
		{
		$query="select * from tbl_mainmenu where status='1' ORDER BY position desc";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$menuList=array();
		
		$i=0;
		while($num>$i)
		{
		$menuObj=new Menu();
		$data=mysql_fetch_assoc($result);
		
		$menuObj->setId($data['id']);
		$menuObj->setMenu($data['menu_name']);
		$menuObj->setMethod($data['method']);
		$menuObj->setLink($data['link']);
		$menuObj->setPosition($data['position']);
		$menuObj->setStatus($data['status']);
		array_push($menuList,$menuObj);
		$i++;
		}
		return $menuList;
		
		}	

//////////////////////////// DELETE //////////////////////////////

		public function delete()
		{
			
			$del_id=$_GET['delete_id'];
			
			$query="delete from tbl_mainmenu where id='$del_id'";
			
			      if(mysql_query($query))
							  
				    mysql_query("delete from tbl_submenu where mainmenuid=$del_id") or die("error on Delete");
			
		  }
		
		
///////////////// DETAIL ////////////////////
		
		public function getDetail($myid)
		  {
		  $query="select * from tbl_mainmenu where id=$myid";
		  $result=mysql_query($query); 
	      $num=mysql_num_rows($result);		
	
		  $menuObj=new Menu();
		  if($result)
		  {
		  $data=mysql_fetch_assoc($result);
		
		  $menuObj->setId($data['id']);
		  $menuObj->setMenu($data['menu_name']);
		  $menuObj->setMethod($data['method']);
		  $menuObj->setLink($data['link']);
		  $menuObj->setPosition($data['position']);
		  $menuObj->setStatus($data['status']);
		
		 }
		 return $menuObj;	
		 }
		 
////////////////// UPDATE ////////////////////
		 
		 public function update($myid)
		{
			      
			$query="update  tbl_mainmenu set menu_name='$this->menu' ,method='$this->method' ,link='$this->link' ,position='$this->position' ,status='$this->status' 
			             where id=$myid";
			
			mysql_query($query)  or die("error on Update");	
		
		}
		
		public function listMenu(){
		          
			 $query="select * from tbl_mainmenu";
				  
				  $result=mysql_query($query); 
		          $num=mysql_num_rows($result);		
		          $menuList=array();
		        $i=0;
		      while($num>$i)
		          {
		       $menuObj=new Menu();
		        $data=mysql_fetch_assoc($result);
		
		       $menuObj->setId($data['id']);
		       $menuObj->setMenu($data['menu_name']);
		       $menuObj->setMethod($data['method']);
		       $menuObj->setLink($data['link']);
		       $menuObj->setPosition($data['position']);
		       $menuObj->setStatus($data['status']);
		         array_push($menuList,$menuObj);
		           $i++;
		               }
		          return $menuList;
		
		            }	
		
		
			
	}
?>
