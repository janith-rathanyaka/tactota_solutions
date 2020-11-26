<?php
session_start();
if(empty($_SESSION['emp_id']) || $_SESSION['emp_id'] == ''){
    header("Location: login.php");
    die();
}
include 'clerk_sidebar.php';

require '../controller/inventory_maintain.php';
$data=new inventory_maintain();
$sql=$data->display_few_reminders();
?>

<div class="content" style="width:auto;">
    <div>
        <div class= "dash1">

            <b><i class="fas fa-users fa-3x"></i></i><p class="dash">SUPPLIERS</p></b>
        </div>

        <div class= "dash2">
            <b><p class="dash">PRODUCTS</p></b>
        </div>
    </div>

    <div>
        <div class= "dash3">
            <b><p class="dash">REMINDERS</p></b>
        </div>
        <div class= "dash4">
            <b><p class="dash">RETURN ITEMS</p></b>
        </div>
    </div>

    <div class="wrapper">
        <div class="list_wrap">
            <div class="subcontent">
                <h1><p>Stock <br/>Reminders</p></h1>
            </div>
            <ul>
                <?php
                foreach ($sql as $k => $v){
                    ?>
                    <li class="github">
                    <div class="list">
                        <div class="contentc">
                            <b><?php echo $sql[$k]["p_name"] ?></b>
                        </div>

                    </div>

                    </li><?php }?>
                <div class="view"><br/>
                    <b><a href="reminderitems.php"><span>View All Reminders</span></a></b>
                </div>

            </ul>
        </div>
    </div>
    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>
</body>

<script>

    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 500);

</script>

  
