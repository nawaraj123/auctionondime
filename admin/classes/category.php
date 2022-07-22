<?php
    class Category{
	   
	    private $id;
		
	    private $name;
		
		private $position;
		
		
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
		
		public function getPosition()
			{
				return $this->position;
			}
		public function setPosition($position)
			{
				$this->position=$position;
			}	
			
			
			
			
		public function addCategory(){
		
		           $query="insert into tbl_category set name='$this->name', position='$this->position' ";
				   
					 mysql_query($query)  or die("error on insert");	
		
		            }	
				   
				   
		public function getCategory($id){
		
		      $query="select * from tbl_category where id=$id";
			  
			  $result=mysql_query($query); 
			  
	          $num=mysql_num_rows($result);		
	
		      $catObj=new Category();
				
		     if($result)
		          {
		      $data=mysql_fetch_assoc($result);
		
		      $catObj->setName($data['name']);
			  
			  $catObj->setPosition($data['position']);
		  
		      $catObj->setId($data['id']);
			 
			    }
			  
		     return $partObj;
			 
		       }
			   
			   
		public function update($id){
			      
			$query="update  tbl_category set  name='$this->name', position='$this->position' where id=$id";
			
			   mysql_query($query)  or die("error on Update");	
			  
		
		} 
		
		
		public function delete(){
		      
			  $del_id=$_GET['delete_id'];
			      
			 $query="delete from tbl_category where id=$del_id";
			
			   mysql_query($query)  or die(mysql_error());
			   
		      }  
		
		
		public function listCategory(){
		
		       $query="select * from tbl_category order by position asc";
			   
			   $catList=array();
			   
			   $resultSearch= mysql_query($query);
			   
	           if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
					
					$catObj=new Category();
					
					 $catObj->setName($row['name']);
			  
			         $catObj->setPosition($row['position']);
		  
		             $catObj->setId($row['id']);
					
					      array_push($catList,$catObj);
					
					    }
						
					return $catList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }  		   
	
	
	
	  }
  


  ?>