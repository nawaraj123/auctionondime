<html>
<head>
<title>Search data</title>
</head>
<body>
<table>
  <tr>
    <td align="center">EMPLOYEES DATA</td>
  </tr>
  <tr>
    <td>
      <table border="1">
      <tr>
        <td>vdc_name</td>
        <td>vdc_name<br>NUMBER</td>
        
      </tr>
<?
//the example of searching data 
//search.php
mysql_connect("localhost","root","");//database connection
mysql_select_db("db_peace ");
				
$order = "SELECT Subject_Name,vdc_name FROM yojana_details where ";
//order to search data
//declare in the order variable
				
$result = mysql_query($order);	
//order executes the result is saved
//in the variable of $result
				
while($data = mysql_fetch_row($result)){
  echo("<tr><td>$data[1]</td><td>$data[0]</td><td>$data[2]</td></tr>");
}
?>
    </table>
  </td>
</tr>
</table>
</body>
</html>
