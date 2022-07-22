<?php
 include_once('../Dbconnection/db_conn.php');
if($_POST)
{
$q=$_POST['search'];
echo $q; die();
$sql_res=mysql_query("select Yojana_Name from yojana_details where Yojana_Id like '%$q%'");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['Yojana_Name'];

$b_username='<strong>'.$q.'</strong>';

$final_username = str_ireplace($q, $b_username, $username);
?>
<div class="show" align="left">
<img src="author.PNG" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><br/>
</div>
<?php
}
}
?>
