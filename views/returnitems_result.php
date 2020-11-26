<?php
session_start();
$sql=$_SESSION['return_search'];
//  print_r($row);
?>
<head>
    <link rel="stylesheet" href="../public/css/search.css">
</head>
<?php
foreach ($sql as $k => $v)
{
?>
 <ul id="myUL">
  <li><a href="../controller/inventory_maintain.php?action=display_onereturnitem_details&id=<?php  echo $sql[$k]['p_id']; ?>&id1=<?php echo $sql[$k]['serial_no'] ?>"> <?php  echo $sql[$k]['p_name'];   ?></a></li>

 </ul>

 <?php

} ?>

