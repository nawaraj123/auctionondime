<?
#### Roshan's Ajax dropdown code with php
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### fell free to visit my blog http://php-ajax-guru.blogspot.com
?>

<? $Yojana_Id=$_REQUEST['Yojana_Id'];

$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('pcprpgov_peace');
$query="select Yojana_Name from  yojana_details where Yojana_Id=$Yojana_Id";
$result=mysql_query($query);

?>
<select name="Yojana_Name">

<? while($row=mysql_fetch_array($result)) { ?>
<option value="<?=$row['Yojana_Name']?>"><?=$row['Yojana_Name']?></option>
<? } ?>
</select>
