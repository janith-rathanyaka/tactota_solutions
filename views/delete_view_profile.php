<?php

session_start();

include('admin_sidebar.php');


$row=$_SESSION['row'];
//print_r($_SESSION['emp_id']);
?>
<head>
    <link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content" style="width: auto;">
    <h1 id="tbl-heading"> View User Details</h1>

    <div class="update-tbl">
        <table>
            <tbody>
            <tr>
                <th>First Name</th>
                <td><?php echo $row['first_name']?></td>
            </tr>
            <tr>
                <th>Middle Name</th>
                <td><?php echo $row['middle_name']?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $row['last_name']?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $row['address']?></td>
            </tr>
            <tr>
                <th>Contact Number</th>
                <td><?php echo $row['mobile_no']?></td>
            </tr>
            <tr>
                <th>NIC</th>
                <td><?php echo $row['nic']?></td>
            </tr>
            <tr>
                <th>DOB</th>
                <td><?php echo $row['dob']?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $row['email']?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $row['username']?></td>
                </td>
            </tr>
            <th>Job Position</th>
            <td><?php echo $row['position']?></td>
            </tr>
            <tr>
                <td colspan=2>
                    <a class="add_button" href="users.php">Back</a>
                    <a class="add_button" href="../controller/authenitication.php?action=delete_account&id=<?php  echo $row["emp_id"]; ?>" >Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
