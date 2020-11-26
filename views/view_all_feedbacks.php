<?php
include 'clerk_sidebar.php';
//require '../controller/authenitication.php';
//$data=new authenitication();
//$sql=$data->active_user();
//$_SESSION['active_deactive']
?>

<div class="content" style="width: auto;">

    <h1 id="tbl-heading" style="text-align: left;font-weight: bold;">All Feedbacks</h1>

    <div class="search">
        <input type="text" placeholder="Search..">
    </div>

    <div class="view-tbl">
        <table>
            <thead>
            <tr>

                <th scope="col">Email</th>

                <th scope="col">View Details</th>
            </tr>
            </thead>
            <tbody>


            <tr>

                <td>email</td>

                <td><a href="../controller/authenitication.php?action=view_profile&id=<?php  echo $sql[$k]["emp_id"]; ?>" class="view"><button>View</button></a></td>

            </tr>
            <tr>

                <td>email1</td>

                <td><a href="view_feedback.php" class="view"><button>View</button></a></td>

            </tr>
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

