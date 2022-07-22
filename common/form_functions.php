<?php
if(!function_exists('check_required_fields')){
function check_required_fields($required_array)
{
    $field_errors=array();
    foreach($required_array as $fieldname)
    {
        if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])) ||
      ($_POST[$fieldname] !=0))
        {
            $field_errors[]=$fieldname;
        }
    }
    return $field_errors;
}
}
if(!function_exists('check_max_field_lengths')){
function check_max_field_lengths($field_length_array)
{
         $field_errors=array();
    foreach($field_length_array as $fieldname => $maxlength)
    {
        if(strlen(trim($_POST[$fieldname])) > $maxlength)
        {
            $field_errors[] = $fieldname;
        }
    }
    return $field_errors;
}
}
if(!function_exists('display_errors')){
function display_errors($error_array)
{
    echo "<p class=\"errors\">";
    echo "Please review the following fields:<br/>";
    foreach($error_array as $error)
    {
        echo " - " . $error . "<br />";
    }
    echo "</p>";
}
}
?>