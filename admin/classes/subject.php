<?php

    class Subject{
	   
	    private $id;
		
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
			
			
			
		public function getsubject_id()
			{
				return $this->subject_id;
			}
		public function setsubject_id($subject_id)
			{
				$this->subject_id=$subject_id;
			}
			
			public function getsubject_name()
			{
				return $this->subject_name;
			}
		public function setsubject_name($subject_name)
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
			
		
				 
				 
				 public function listSubject()
				 {
				$query="select * from  tbl_subjectinfo order by subject_id";
			   
			   $partList=array();
			   
			   $resultSearch= mysql_query($query);
			   
	           if($resultSearch){
				  
			   $numrows=mysql_num_rows($resultSearch);
				
			   for( $i=0;$i<$numrows;$i++){
				
				$row = mysql_fetch_array($resultSearch);
					
				  $partObj=new Subject();
					
				  $partObj->setsubject_id($row['subject_id']);
		
		          $partObj->setsubject_name($row['subject_name']);
				  
				   
					
					   array_push($partList,$partObj);
					
					       }
						
					return $partList;
					
					}else{
					
					   echo("<script>alert('".mysql_error()."')</script>");
					
					  }
		
		         }		 
				 
					 
				
				 
				 
				 
		
				 
	
	
	
	  }
  


  ?>