<?php
session_start();
//include 'clerk_sidebar.php';
//require '../controller/authenitication.php';
//$data=new authenitication();
//$sql=$data->active_user();
//$_SESSION['active_deactive']
$row=$_SESSION['view_search_product'];
print_r($row['p_name']);
?>
