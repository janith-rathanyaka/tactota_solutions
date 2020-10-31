<?php
//include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
$data=new inventory_maintain();
$sql=$data->update_product();

print_r($sql);
?>
<!--
<div class="content">

    <h1> USER DETAILS</h1>

    <div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search..">
        </div>
    </div>
    <div class="main-container" id="view-tbl">
        <table>
            <thead>
            <tr>
                <th>User ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Supplier Name</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v){
                ?>


                <tr>
                    <td><?php echo $sql[$k]["emp_id"] ?></td>
                    <td><?php echo $sql[$k]["username"] ?></td>
                    <td><?php echo $sql[$k]["position"] ?></td>
                    <td><?php echo $sql[$k]["position"] ?></td>
                    <td><a href="../controller/authenitication.php?action=view_profile&id=<?php  echo $sql[$k]["emp_id"]; ?>" class="view"><button>View</button></a></td>
                </tr>
                <?php

            } ?>
            </tbody>


        </table>
    </div>
</div>
</div>
</body>



-->
