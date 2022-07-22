<?php	
	class banner 
	{
		private $id;
		private $image;
		private $status;
		private $heading;
		private $discription;
		private $link;
		
		public function setLink($link)
		{
			$this->link=$link;
		}
		public function getLink()
		{
			 return $this->link;
		}
		public function setHeading($heading)
		{
			$this->heading=$heading;
		}
		public function getHeading()
		{
			return $this->heading;
		}
		public function setDiscription($discription)
		{
			$this->discription=$discription;
		}
		public function getDisciption()
		{
			return $this->discription;
		}
		public function getId()
		{
			return $this->id;
		}
		public function setId($id)
		{
			 $this->id=$id;
		}
		
		public function getStatus()
		{
			return $this->status;
		}
		public function setStatus($status)
		{
			$this->status=$status;
		}
		public function getImage()
		{
			return $this->image;
		}
		public function setImage($image)
		{
			$this->image=$image;
		}

		
		private function createDestination()
		{
			$error=$_FILES['userfile']['error'];
			
			$n=explode(".",".jpg");
			
			$ext=strtolower($n[1]);
			
			if($ext=="jpg"|| $ext=="gif"|| $ext=="png"){
			
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
////////////////// INSERT ////////////////////
	
		public function insert()
		
		{
				//global $ado;
				$uploadimageObj=new Uploadimage();
				$uploadimageObj->upload("../uploadedimages/original",true);
				$this->setImage($uploadimageObj->code);
			
				
			
		    $query="insert into tbl_banner set image='$this->image', status='$this->status', heading='$this->heading', discription='$this->discription', link='$this->link'";
			
			//var_dump($query);
			
		$res=	mysql_query($query) or die("error on insert");
			if($res){
								echo "<script> alert('Added successfully') </script>";
								}
								else
								{	echo "<script> alert('Cannot Add New Banner') </script>";
									}
								
			
			//header("Location:manage_banner.php");
			
			
		
		}
		
////////////////// UPDATE ////////////////////
		
		public function update()
		{
					global $ado;
				$uploadimageObj=new Uploadimage();
				if($uploadimageObj->upload("../uploadedimages/original",true))
				{
								$sel="select * from tbl_banner where id='$this->id'";
								$result=mysql_query($sel);
								$data=mysql_fetch_assoc($result);
								$qury="delete * from tbl_banner where id='$this->id'";
								mysql_query($qury);
								unlink("../uploadedimages/original/".$data['image']);
								$this->setImage($uploadimageObj->code);
								 $query="update  tbl_banner set image='$this->image' ,status='$this->status', heading='$this->heading', discription='$this->discription', link='$this->link' where id='$this->id'";
								$res=mysql_query($query)  or die("error on Update");
								if($res){
								echo "<script> alert('Updated successfully') </script>";
								}
								else
								{	echo "<script> alert('Cannot successfully') </script>";
									}
								
				}
				else
				{
				
			      $query="update  tbl_banner set status='$this->status', heading='$this->heading', discription='$this->discription', link='$this->link' where id='$this->id'";
			      mysql_query($query)  or die("error on Update");
				  
				}
		
		}

////////////////// DISPLAY ////////////////////
		
	public function display(){
		$query="select * from tbl_banner";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$bannerList=array();
		
		$i=0;
		while($num>$i)
		{
		$bannerObj=new banner();
		$data=mysql_fetch_assoc($result);
		
		$bannerObj->setId($data['id']);
		$bannerObj->setImage($data['image']);
		$bannerObj->setStatus($data['status']);
		$bannerObj->setHeading($data['heading']);
		$bannerObj->setDiscription($data['discription']);
		$bannerObj->setLink($data['link']);
		array_push($bannerList,$bannerObj);
		$i++;
		}
		return $bannerList;
		
		}
		
////////////////// DISPLAY FRONT ////////////////////
		
		public function displayfront()
		
		{
		$query="select * from tbl_banner where status='1'";
		$result=mysql_query($query); 
		$num=mysql_num_rows($result);		
		$bannerList=array();
		
		$i=0;
		while($num>$i)
		{
		$bannerObj=new banner();
		$data=mysql_fetch_assoc($result);
		
		$bannerObj->setId($data['id']);
		$bannerObj->setImage($data['image']);
		$bannerObj->setStatus($data['status']);
		$bannerObj->setHeading($data['heading']);
		$bannerObj->setDiscription($data['discription']);
		$bannerObj->setLink($data['link']);
		array_push($bannerList,$bannerObj);
		$i++;
		}
		return $bannerList;
		
		}

///////////////// DETAIL ////////////////////
		
		public function getDetail($myid)
		  {
		  $query="select * from tbl_banner where id=$myid";
		  $result=mysql_query($query); 
	      $num=mysql_num_rows($result);		
	
		  $bannerObj=new banner();
		  if($result){
		  $data=mysql_fetch_assoc($result);
		
		$bannerObj->setId($data['id']);
		$bannerObj->setImage($data['image']);

		$bannerObj->setStatus($data['status']);
		$bannerObj->setHeading($data['heading']);
		$bannerObj->setDiscription($data['discription']);

				$bannerObj->setLink($data['link']);
		}
		return $bannerObj;	
		}
		
////////////////// DELETE ////////////////////	

		public function delete()
		{
	
		$del_id=$_GET['delete_id'];
		$sel="select * from tbl_banner where id='$del_id'";
		$result=mysql_query($sel);
		$data=mysql_fetch_assoc($result);
		$qury="delete from tbl_banner where id='$del_id'";
		mysql_query($qury);
		unlink("../uploadedimages/original/".$data['image']);
		header("Location:manage_banner.php");
		
		}	

////////////// FUNCTION UPDATE BANNER /////////////

	public function removeStatus()
	     {
		 $sel="update tbl_banner set status=0";
		 $result=mysql_query($sel);
		 }
	public function updateStatus($id)
	     {
		 
		  $sel="update tbl_banner set status=1 WHERE id=$id";
		  $result=mysql_query($sel);
		 }
	     	
	}
?>