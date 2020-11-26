<?php
include 'clerk_sidebar.php';
require '../controller/authenitication.php';
//$data=new authenitication();
$sql=$data->active_user();
//$_SESSION['active_deactive']
?>

<div class="content" style="width: auto;">

    <h1 id="tbl-heading"> Activate Users</h1>

    <div class="search">
        <input type="text" placeholder="Search..">
    </div>
    <?php if(isset($_SESSION['active_deactive'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['active_deactive']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['active_deactive']); ?>
    <div class="view-tbl">
        <table>
            <thead>
            <tr>

                <th scope="col">Supplier</th>
                <th scope="col">Address</th>
                <th scope="col">Price</th>
                <th scope="col">View Details</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v){
            ?>


            <tr>

                <td><?php echo $sql[$k]["sup_name"] ?></td>
                <td><?php echo $sql[$k]["address"] ?></td>
                <td><?php echo $sql[$k]["p_cost"] ?></td>

                <td>
                    <?php
                    if(($sql[$k]['verified'])==0)
                    {
                        ?>

                        <?php
                    }else if(($sql[$k]['verified'])==1)
                    {
                        ?>
                        <a href="../controller/authenitication.php?action=active_inactive_account&id=<?php  echo $sql[$k]["emp_id"];?>&id1=0"  class="view"><button style="background-color: red;">Deactivate</button></a>
                        <?php
                    }?>



                </td>


                <td><a href="../controller/authenitication.php?action=view_profile&id=<?php  echo $sql[$k]["emp_id"]; ?>" class="view"><button>View</button></a></td>

                <?php

                } ?>
            </tbody>
        </table>
    </div>
</div>


<script>

    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 1600);

</script>
