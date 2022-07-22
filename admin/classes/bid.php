<?php 
 class Bid{
 
     private $id;
	 public $conxn;
	 private $product_id;
	 private $price;
	 private $user_name;
	 private $current_bid_number;
	
	 
	 
	 function __construct(){
		/*$this->connectdatabase("localhost","root","","db_peace");*/
		}	
		function __destruct(){
		//mysql_close($this->conxn);
		}		
			
			public function getProduct_id()
			{
				return $this->product_id;
			}
		public function setProduct_id($product_id)
			{
				$this->product_id=$product_id;
			}	
			
			public function getPrice()
			{
				return $this->price;
			}
		public function setPrice($price)
			{
				$this->bid=$price;
			}	
			
			public function getUser_id()
			{
				return $this->user_id;
			}
		public function setUser_id($user_id)
			{
				$this->user_id=$user_id;
			}	
			
			public function getCurrent_bid_number()
			{
				return $this->current_bid_number;
			}
		public function setCurrent_bid_number($current_bid_number)
			{
				$this->current_bid_number=$current_bid_number;
			}	
			
			
			 public function search_user_id($username){
	
	      $query="select id from registered_members where username='$username'";
		  
	      $resultSearch= mysql_query($query);
	 
			 if($resultSearch){
			
					$row = mysql_fetch_array($resultSearch);
					
					return $row['id'];
	
	              }else{
				   
	                  return 0;	
					  
		              }
				  
               } 
	
	  
	  public function addBid(){			
				
					
			   $query="insert into bid_record set product_id='$this->product_id', price='$this->price', 						user_id='$this->user_id',current_bid_number='$this->current_bid_number'";
			   
				
		              mysql_query($query) or die("error on insert");	
					  
			   
			   
			   //echo "<script> alert('Bid Added successfully') </script>";
	
	        }				 
	
	
    }




  ?>