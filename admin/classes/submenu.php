<?php

	class Submenu
	{
		private $id;
		private $mainmenu;
		private $sub_menu;
		private $method;
		private $link;
		private $position;
		private $status;
		private $bottom_position;
		
		public function getId()
			{
				return $this->id;
			}
		public function setId($id)
			{
				$this->id=$id;
			}
		public function getMainmenu()
			{
				return $this->mainmenu;
			}
		public function setMainmenu($mainmenu)
			{
				$this->mainmenu=$mainmenu;
			}
			
		public function getSub_menu()
			{
				return $this->sub_menu;
			}
		public function setSub_menu($sub_menu)
			{
				$this->sub_menu=$sub_menu;
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
		public function setBottom_position($position)
			{
			$this->bottom_position=$position;
			}
			public function getBottom_position()
			{
			return $this->bottom_position;
			}
//////////////////////////// INSERT //////////////////////////////	
		
		public function insert()
			{	
 $query="insert into tbl_submenu set sub_menu='$this->sub_menu' ,method='$this->method' ,link='$this->link' ,position='$this->position' ,status='$this->status',mainmenuid='$this->mainmenu',bottom_position='$this->bottom_position'";
				
				mysql_query($query) or die(mysql_error());
						
			}
////////////////// UPDATE ////////////////////
		 
		 public function update($myid){
			      
			$query="update tbl_submenu set sub_menu ='$this->sub_menu' ,method='$this->method' ,link='$this->link' ,position='$this->position' ,
			
			            status='$this->status',mainmenuid='$this->mainmenu',bottom_position='$this->bottom_position' where id=$myid";
						
						
			mysql_query($query)  or die("error on Update");			  
		
		}	
///////////////// DETAIL ////////////////////
		
		public function getDetail($myid)
		  {
		  $query="select s.*,m.menu_name as mname,m.id as mid from tbl_submenu s,tbl_mainmenu m where s.mainmenuid=m.id and s.id=$myid";
		  
		  $result=mysql_query($query); 
		  
	        $num=mysql_num_rows($result);		
	
		  $submenuObj=new submenu();
		  
		  if($result)
		  {
		  $data=mysql_fetch_assoc($result);
		  
		  $menu=new Menu;
		  
		  $menu->setId($data['mid']);
		  
		  $menu->setMenu($data['mname']);
		  
		  $submenuObj->setMainmenu($menu);
		  
		  $submenuObj->setId($data['id']);
		  
		  $submenuObj->setSub_menu($data['sub_menu']);
		  
		  $submenuObj->setMethod($data['method']);
		  
		  $submenuObj->setLink($data['link']);
		  
		  $submenuObj->setPosition($data['position']);
		  
		  $submenuObj->setStatus($data['status']);
		  		$submenuObj->setBottom_position($data['bottom_position']);
		
		       }
		 return $submenuObj;	
		       }
			
//////////////////////////// DISPLAY //////////////////////////////	

		public function display()
		{
		$query="select s.*,m.menu_name as mname,m.id as mid from tbl_submenu s,tbl_mainmenu m where s.mainmenuid=m.id order by s.position ";
		
		$result=mysql_query($query); 
		
		$num=mysql_num_rows($result);
		
		$submenuList=array();
		
		$i=0;
		
		while($num>$i){
		$submenuObj=new submenu();
		
		$data=mysql_fetch_assoc($result);
				
		$submenuObj->setId($data['id']);
		
		$menu=new menu;
		
		$menu->setId($data['mid']);
		
		$menu->setMenu($data['mname']);
		
		$submenuObj->setMainmenu($menu);
		
		$submenuObj->setSub_menu($data['sub_menu']);
		
		$submenuObj->setMethod($data['method']);
		
		$submenuObj->setLink($data['link']);
		
		$submenuObj->setPosition($data['position']);
		
		$submenuObj->setStatus($data['status']);
		$submenuObj->setBottom_position($data['bottom_position']);
		
		      array_push($submenuList,$submenuObj);
				 
		   $i++;
		  }
		return $submenuList;
		  }
	
//////////////////////////// DELETE //////////////////////////////
	
	
	
		public function delete()
		    {
			$del_id=$_GET['delete_id'];
			
			$sel="select * from tbl_submenu where id='$del_id'";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="delete from tbl_submenu where id='$del_id'";
			
			   mysql_query($query);
			
		   }	
		
				
		public function getSubmenuForMenu($menuid)
		{
		 $query="select s.*,m.menu_name as mname,m.id as mid from tbl_submenu s,tbl_mainmenu m where s.mainmenuid=m.id and m.id=$menuid";
		
		$result=mysql_query($query); 
		
		$num=mysql_num_rows($result);	
			
		$submenuList=array();
		
		$i=0;
		
		while($num>$i){
			
		$submenuObj=new submenu();
		
		$data=mysql_fetch_assoc($result);
				
		$submenuObj->setId($data['id']);
		$menu=new menu;
		$menu->setId($data['mid']);
		$menu->setMenu($data['mname']);
		$submenuObj->setMainmenu($menu);
		$submenuObj->setSub_menu($data['sub_menu']);
		$submenuObj->setMethod($data['method']);
		$submenuObj->setLink($data['link']);
		$submenuObj->setPosition($data['position']);
		$submenuObj->setStatus($data['status']);
		
		array_push($submenuList,$submenuObj);
		$i++;
		}
		return $submenuList;
		}
		
		
		
		public function listSubMenu(){
		          
			 $query="select * from tbl_submenu";
			 
			 var_dump($query);
				  
				  $result=mysql_query($query); 
		          $num=mysql_num_rows($result);		
		          $submenuList=array();
		        $i=0;
		      while($num>$i)
		          {
		       $menuObj=new Menu();
		        $data=mysql_fetch_assoc($result);
		
		       $menuObj->setId($data['id']);
		       $submenuObj->setSub_menu($data['sub_menu']);
		       $submenuObj->setMethod($data['method']);
		       $submenuObj->setLink($data['link']);
		      $submenuObj->setPosition($data['position']);
		      $submenuObj->setStatus($data['status']);
		         array_push($submenuList,$submenuObj);
		           $i++;
		               }
		          return $submenuList;
		
		            }
		

	
	}
?>