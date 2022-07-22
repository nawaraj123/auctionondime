<?
#### Roshan's Ajax dropdown code with php
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### fell free to visit my blog http://php-ajax-guru.blogspot.com
?>

<? $country=$_REQUEST['district_name'];
$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('pcprpgov_peace');
$query="select vdc_name from tbl_vdcinfo,tbl_districtinfo where tbl_vdcinfo.district_id=tbl_districtinfo.district_id and tbl_districtinfo.district_id=$country";
$result = mysql_query("SET NAMES utf8");
$result=mysql_query($query);

?>
<select name="vdc">

<? while($row=mysql_fetch_array($result)) { ?>
<option value="<?=$row['vdc_name']?>"><?=$row['vdc_name']?></option>
<? } ?>
</select>
