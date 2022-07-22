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
mysql_select_db('db_peace');
$query="select sum(District_Yojana_SN)  from yojana_details,tbl_districtinfo where yojana_details.district_id=tbl_districtinfo.district_id and tbl_districtinfo.district_id=$country";
$result = mysql_query("SET NAMES utf8");
$result=mysql_query($query);

?>
<select name="districtwisediv">

<? while($row=mysql_fetch_array($result)) { ?>
<option value><?=$row['sum(District_Yojana_SN)']?></option>
<? } ?>
</select>
