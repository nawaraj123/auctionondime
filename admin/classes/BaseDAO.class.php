<?php
class BaseDAO
{
private $user;
private $password;
private $database;
private $server;
private $connection;

public $error;
public $sql;
public $result;

const CONNECTION_ERROR = 1;
const SQL_EXECUTION_ERROR = 2;
	
	
	function __construct($server, $user, $password, $database)
		{
		$this->server = $server;
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		}
		
	public function dbConnect()
		{
		if(!$this->connection=mysql_connect($this->server,$this->user,$this->password))
			throw new Exception('<font color="red">ERROR :: COULD NOT ESTABLISH A CONNECTION: '.mysql_error().'</font>', self::CONNECTION_ERROR);
		else
			{	
			if(!mysql_select_db($this->database))
				throw new Exception('<font color="red">ERROR :: COULD NOT FIND A DATABASE : '.mysql_error().'</font>', self::CONNECTION_ERROR);
			}
		}

	function exec($query)
		{
	
			$this->result=mysql_query($query);

			if($this->result)
				{
				return $this->result;
				}
			else{
			//echo "<br>".mysql_error()."<br>";
				$this->error = mysql_error();
			return false;
			}
		}
	function fetch($result)
		{
			
		return mysql_fetch_array($result);
		
		}
	function fetch_assoc($result)
		{
			
		return mysql_fetch_assoc($result);
		
		}
	function row_count($result)
		{
		return mysql_num_rows($result);
		}

	function insert_id()
		{
		return mysql_insert_id();
		}

	function close()
		{
		mysql_close($this->connection);
		}
	
	function free_resource($rs)
		{
		mysql_free_result($rs);
		}

	   
	function preventInjection($var)
		{
		if(get_magic_quotes_gpc())
		$var = stripslashes($var);
		return mysql_real_escape_string($var);
		}
		
		function GetPages($numC,$limit,$page_no,$ac){
	if($numC > $limit){
		//echo "Page(s) :: ";
		if($numC > $limit){
			$rmax = ceil($numC / $limit);
		}
		else{
			$rmax = 1;
		}
			if($page_no != 1){
			$prevpage = (int)$page_no-1;
			echo " <a  href=$_SERVER[PHP_SELF]?page=$prevpage>&laquo; Previous</a>";
		}
		for($i = 1; $i <= $rmax; $i++){
			if($page_no == $i){
				echo "&nbsp;" . "<font size=1 >" . $i . "</font>";
			}
			else{
				echo "&nbsp;" . "<a  href=$_SERVER[PHP_SELF]?page=$i>" . $i . "</a>";
			}
		}
	
		if($page_no < $rmax){
			$nextpage = (int)$page_no+1;
			echo " | <a  href=$_SERVER[PHP_SELF]?page=$nextpage>Next &raquo;</a>";
		}			
	}
	}	
	public function getScript($script)
	    {
			echo '<script src="'.MYJS.$script.'" type="text/javascript"></script>';
		}
	
	public function getCss($css)
	   {
		   echo '<link rel="stylesheet" href="'.MYCSS.$css.'" type="text/css" media="screen" title="default" />';   
	   }
	   
function curPageURL() {
     $pageURL = 'http';
     if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}
     $pageURL .= "://";
     if ($_SERVER["SERVER_PORT"] != "80") {
     $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
     } else {
     $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
      }

	 $arr = preg_split('[/-]', strtolower($pageURL));
    if(in_array("cms", $arr) )
      {
		  die("not posssible");
      }
	 else
	 return true; 
}

public function FrontHead()
    {
	$head='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dashboard</title>
<link href="'.GUMBA_LINK.'/css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--  jquery core -->

<!--  checkbox styling script -->
';
echo $head;		
	}

public function uploadScript($url)
     {
$script="<script>
$(document).ready(function() {	$(\"#loading\").ajaxStart(function(){ $(this).show(); }) .ajaxComplete(function(){	$(this).hide(); }); var options = {beforeSubmit:  showRequest,		success:       showResponse,
		url:       '".$url."',  // your upload script
		dataType:  'json'
	};
	$('#Form1').submit(function() {
	
		document.getElementById('message').innerHTML = '';
		$(this).ajaxSubmit(options);
		return false;
	});
}); 
</script>"; 
	echo $script;	 
	 }
	public function uploadScriptbyhit()
	    {
		$script='<script type="text/javascript" language="javascript">
   var http_request = false;
   function makePOSTRequest(url, parameters) {
      http_request = false;
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
         http_request = new XMLHttpRequest();
         if (http_request.overrideMimeType) {
         	// set type accordingly to anticipated content type
            //http_request.overrideMimeType(\'text/xml\');
            http_request.overrideMimeType(\'text/html\');
         }
      } else if (window.ActiveXObject) { // IE
         try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
      }
      if (!http_request) {
         alert(\'Cannot create XMLHTTP instance\');
         return false;
      }   
      http_request.onreadystatechange = alertContents;
      http_request.open(\'POST\', url, true);
      http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      http_request.setRequestHeader("Content-length", parameters.length);
      http_request.setRequestHeader("Connection", "close");
      http_request.send(parameters);
   }
   function alertContents() {
      if (http_request.readyState == 4) {
         if (http_request.status == 200) {
            //alert(http_request.responseText);
            result = http_request.responseText;
            document.getElementById(\'myspan\').innerHTML = result;  
			document.getElementById("loading2").style.display="none"; 
			          
         } else {
            alert("error");
         }
      }
   }
   </script>';
   echo $script;	
		}
		
	function __destruct()
		{
		unset($this->user);
		unset($this->password);
		unset($this->database);
		unset($this->server);
		unset($this->connection);
		unset($this->error);
		unset($this->sql);
		unset($this->result);
		
		unset($this);
		}
public function validateClient()
       {
		if(!isset($_SESSION["GUMBA_GTUSER"])&&empty($_SESSION["GUMBA_GTUSER"]))
                     {
                     echo '<script>alert("Please login into the system ?");window.location="'.GUMBA_LINK.'/login.php"</script>';
                    }   
		   
	   }

}



?>