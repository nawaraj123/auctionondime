<?php
class Pagesettings
   {
	public $pageid;
	private $countme;
	private $images;
	private $rowPerpage;
	public  $pageNum;
	private $offset;
	public $numRows;
	public $maxPage;
	private $self;
	private $nav;
	private $first;
	public $next;
	private $last;
	public $prev;
	private $values;
	public $condition;
	
	
	function setValues($values)
	            {
				$this->values=$values;	
				}
	function getValues()
	            {
				return $this->values;	
				}
	function setPageid($pageid)
	    {
			$this->pageid=$pageid;
		}
		
	function getPageid()
	     {
			return $this->pageid; 
		 }
	function setImages($images)
	      {
			  $this->images=$images;
		  }
	function getImages()
	    {
	         return $this->images;	
		}
	function setCount($count)
	   {
		$this->countme=$count;   
	   }
	 function getCount()
	   {
		return $this->countme;   
	   }  
	 function setNumrows($numrows)
	     {
			 $this->numRows=$numrows;
		 }
	function getNumrows()
	        {
			return $this->numRows;	
			}
	function setPagenum($pagenum)
	       {
			   $this->pageNum=$pagenum;
		   }
	function setOffset($pagenum)
	      {
			$this->offset=($pagenum-1)*$this->getRowsperpage(); 
		
		  }
	function getOffset()
	      {
			return $this->offset;  
		  }
	function getPagenum()
	       {
			return $this->pageNum;   
		   }
	function getSelf()
	        {
			return 'all_products.php';
			}
	    
	function setRowsperpage($rowsperpage) 
	        {
				$this->rowsPerpage=$rowsperpage;
				
			}
	function getRowsperpage()
	       {
			return $this->rowsPerpage;   
		   }
	function setMaxpage($maxpage)
	         {
				$this->maxPage=$maxpage; 
				 
			 }
	function getMaxpage()
	         {
				 return $this->maxPage;
				 
			 }
	function setNav($nav)
	            {
				$this->nav=$nav;	
				}
	function getNav()
	             {
					return $this->nav; 
				 }
	 function setFirst($first)
	              {
					$this->first=$first;  
     			  }
	 function getFirst()
	              {
					return $this->first;  
				  }
	 function setPrev($prev)
	              {
					  $this->prev=$prev;
				  }
	 function getPrev()
	              {
					return $this->prev;  
				  }
	 function setLast($last)
	               {
					$this->$last=$last;   
				   }
	 function getLast()
	               {
					return $this->last;   
				   }
	 function setNext($next)
	               {
					$this->next=$next;   
				   }
	 function getNext()
	               {
					return $this->next;   
				   }

	function countRow($pageid)
	      {
			global $ado;
			$sql="SELECT count(pageid) FROM tbl_pagesettings WHERE pageid=$pageid";
			$select=$ado->exec($sql);
			$row=$ado->fetch(select);
			$this->setCount($row['count(pageid)']);
		  }
	function setCondition($condition)
	      {
			$this->condition=$condition;  
		  }
		  
		  
	 function getPageno($pagenum,$table)
	      {
			  global $ado;
			  $sql="SELECT * FROM ".$table." ".$this->condition;
              $select=mysql_query($sql);
			  $this->setNumRows(@mysql_num_rows($select));
			  $this->setMaxpage(ceil($this->getNumrows()/$this->getRowsperpage()));
			 
			 
			 for($page= 1; $page <=$this->getMaxpage(); $page++)
                 {
                  if ($page == $this->getPagenum())
                       {
                       //$nav .= " $page ";
					   
					   $this->setNav($this->getNav()."$page");// no need to create a link to current page
                       }
                 else
                      {  
		   			    
                     //    $nav .= " <a href=\"$self?"&page=$page\">$page</a> ";
					 
						 $this->setNav($this->getNav()."<a href=\"".$this->getSelf()."&page=$page\">$page</a>");
                      } 
  
               } 
			   
             if ($this->getPagenum() > 1)
                  {
                    $page  =$this->getPagenum()-1;
                   // $prev  = "<a href=\"$self?"&page=$page\">[Prev]</a> ";
					$this->setPrev("<a href=\"".$this->getSelf()."?page=$page\"></a>");
                   // $first = " <a href=\"$self?"&page=1\">[First Page]</a> "; 
					$this->setFirst("<a href=\"".$this->getSelf()."?page=1\">[First Page]</a> ");
                } 
            else
              {
             // $prev  = '&nbsp;'; // we're on page one, don't print previous link
			  $this->setPrev('&nbsp;');
             //$first = '&nbsp;'; // nor the first page link
			 $this->setFirst('&nbsp;');
              } 

         if ($this->getPagenum()< $this->getMaxpage())
              {
                $page =$this->getPagenum()+ 1;
             //   $next = "<a href=\"".$this->getSelf()."?"&page=$page\">[Next]</a> ";
				$this->setNext("<a   href=\"".$this->getSelf()."?page=$page\">[Next Page]</a>");
               // $last = " <a href=\"".$this->getSelf()."?"&page=$maxPage\">[Last Page]</a> ";
				$this->setLast("<a href=\"".$this->getSelf()."&page=".$this->getMaxpage()."\">[Last Page]</a>");
              } 
        else
          {
         // $next = '&nbsp;'; // we're on the last page, don't print next link
		    $this->setNext('&nbsp;');
		    $this->setLast("&nbsp;");
         // $last = '&nbsp;'; // nor the last page link
          }
		  }
	 
		 
   }

?>
        