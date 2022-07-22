<?php 

	//include('submenu.php');
	
	class Trimenu
	{
		private $id;
		private $sub_menu;
		private $tri_menu;
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
		public function getSub_menu()
			{
				return $this->sub_menu;
			}
		public function setSub_menu($sub_menu)
			{
				$this->sub_menu=$sub_menu;
			}
		public function getTri_menu()
			{
				return $this->tri_menu;
			}
		public function setTri_menu($tri_menu)
			{
				$this->tri_menu=$tri_menu;
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
				$query="insert into tbl_trimenu set tri_menu='$this->tri_menu' ,method='$this->method' ,link='$this->link' ,position='$this->position' ,status='$this->status' ,submenuid='$this->sub_menu'";
				mysql_query($query) or die("error on insert");		
			}
////////////////// UPDATE ////////////////////
		 
		 public function update($myid)
		{
			      
			$query="update tbl_trimenu set tri_menu='$this->tri_menu' ,method='$this->method' ,link='$this->link' ,position='$this->position' ,status='$this->status' ,submenuid='$this->sub_menu' where id=$myid";
			mysql_query($query)  or die("error on Update");			  
		
		}	
///////////////// DETAIL ////////////////////
		
		public function getDetail($myid)
		  {
		  $query="select t.*, s.id as sid, s.sub_menu as sname from tbl_trimenu t, tbl_submenu s where s.id=t.submenuid and t.id=$myid";
		  $result=mysql_query($query); 
	      $num=mysql_num_rows($result);		
	
		  $trimenu=new Trimenu();
		  if($result)
		  {
		  $data=mysql_fetch_assoc($result);
		  $submenu=new submenu;
		  $submenu->setId($data['sid']);
		  $submenu->setSub_menu($data['sname']);
		  $trimenu->setId($data['id']);
		  $trimenu->setSub_menu($submenu);
		  $trimenu->setTri_menu($data['tri_menu']);
		  $trimenu->setMethod($data['method']);
		  $trimenu->setLink($data['link']);
		  $trimenu->setPosition($data['position']);
		  $trimenu->setStatus($data['status']);
		
		 }
		 return $trimenu;	
		 }
			
//////////////////////////// DISPLAY //////////////////////////////	

		public function display()
		{
		$query="select t.*, s.id as sid, s.sub_menu as sname from tbl_trimenu t, tbl_submenu s where s.id=t.submenuid order by t.position";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$trimenuList=array();
		
		$i=0;
		while($num>$i)
		{
		$trimenuObj=new Trimenu();
		
		$data=mysql_fetch_assoc($result);
		
		$trimenuObj->setId($data['id']);
		
		$submenu=new submenu;
		
		$submenu->setId($data['sid']);
		
		$submenu->setSub_menu($data['sname']);
		
		$trimenuObj->setSub_menu($submenu);
		
		$trimenuObj->setTri_menu($data['tri_menu']);
		
		$trimenuObj->setMethod($data['method']);
		
		$trimenuObj->setLink($data['link']);
		
		$trimenuObj->setPosition($data['position']);
		
		$trimenuObj->setStatus($data['status']);
		
		array_push($trimenuList,$trimenuObj);
		
		         $i++;
		}
		
		return $trimenuList;
		
		}
//////////////////////////// DELETE //////////////////////////////

		public function delete(){
			
			$del_id=$_GET['delete_id'];
			
			$sel="select * from tbl_trimenu where id='$del_id'";
			
			$result=mysql_query($sel);
			
			$data=mysql_fetch_assoc($result);
			
			$query="delete from tbl_trimenu where id='$del_id'";
			
			      mysql_query($query);
			
		        }	
		
		
		
		public function displayForSubmenu($submenuid)
		{
		$query="select t.*, s.id as sid, s.sub_menu as sname from tbl_trimenu t, tbl_submenu s where s.id=t.submenuid and s.id=$submenuid";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$trimenuList=array();
		
		$i=0;
		while($num>$i)
		{
		$trimenuObj=new Trimenu();
		$data=mysql_fetch_assoc($result);
		
		$trimenuObj->setId($data['id']);
		$submenu=new Submenu;
		$submenu->setId($data['sid']);
		$submenu->setSub_menu($data['sname']);
		
		$trimenuObj->setSub_menu($submenu);
		$trimenuObj->setTri_menu($data['tri_menu']);
		$trimenuObj->setMethod($data['method']);
		$trimenuObj->setLink($data['link']);
		$trimenuObj->setPosition($data['position']);
		$trimenuObj->setStatus($data['status']);
		array_push($trimenuList,$trimenuObj);
		$i++;
		}
		return $trimenuList;
		}
		
		
	}
?>