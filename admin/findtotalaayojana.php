<?
#### Roshan's Ajax dropdown code with php
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### fell free to visit my blog http://php-ajax-guru.blogspot.com
?>

<? $country=$_REQUEST['district_id'];


$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('pcprpgov_peace');
$query="select count(Yojana_Id)  from yojana_details";
$result = mysql_query("SET NAMES utf8");
$result=mysql_query($query);
?>
<select name="total_aayojana">

<? while($row=mysql_fetch_array($result)) { ?>
<option value ="<?=$row['count(Yojana_Id)']+1?>"><?=$row['count(Yojana_Id)']+1?></option>
<? } ?>
</select>
