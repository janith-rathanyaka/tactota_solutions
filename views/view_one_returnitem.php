<?php
session_start();
//include 'clerk_sidebar.php';


$row= $_SESSION['return_item'];
print_r($row);
print_r($row['product.p_id']);
//print_r($row['product.p_name']);
?>
