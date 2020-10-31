<?php

session_start();
     if($_SESSION['role']=="Clerk")
       require('clerk_sidebar.php');
   elseif ($_SESSION['role']=="Admin")
       require('admin_sidebar.php');
   elseif($_SESSION['role']=='Shopkeeper')
       require('shopkeeper_sidebar.php');


// print_r($_SESSION['emp_id']);


?>

<div class="content">
    <head>
        <title>Tactota Solutions</title>
        <link rel="stylesheet" href="../public/css/signup.css">


    </head>
    <body>
    <div>


        <div class="main-form">

            <div class="sub-container">

                <b><h1>Edit Account Info</h1></b>

                <form action="../controller/authenitication.php?action=view_user_details.php" method="post" enctype="multipart/form-data">
                     <div class="row">
                         <div class="col-25">
                    <label>First Name</label>
                         </div>
                         <div class="col-25">
                        <input class="text" type="text" name="firstname" placeholder="First Name" value="<?php $firstname ="";
                        echo $firstname ?>" required="">
                         </div>
                     </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Middle Name</label>
                        </div>
                        <div class="col-25">
                            <input class="text" type="text" name="middlename" placeholder="Middle Name" value="<?php $middlename ="";
                            echo $middlename ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>Last Name</label>
                        <div class="col-25">
                            <input class="text" type="text" name="lastname" placeholder="Last Name" value="<?php $lastname ="";
                            echo $lastname ?>" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Address</label>
                        </div>
                        <div class="col-25">
                            <input class="text" type="text" name="address" placeholder="Address" value="<?php $address ="";
                            echo $address ?>" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>Mobile Number</label>
                        </div>
                        <div class="col-25">
                            <input class="text" type="text" name="moblile_no" placeholder="Mobile Number" value="<?php $mobile_no ="";
                            echo $mobile_no ?>" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>NIC</label>
                        </div>
                        <div class="col-25">
                            <input class="text" type="text" name="nic" placeholder="NIC" value="<?php $nic ="";
                            echo $nic ?>" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label>DOB</label>
                        </div>
                        <div class="col-25">
                            <input class="text" type="text" name="dob" placeholder="DOB" value="<?php $dob ="";
                            echo $dob ?>" required="">
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Email</label>
                            </div>
                            <div class="col-25">
                                <input class="text email" type="email" name="email" placeholder="Email" value="<?php $email ="";
                                echo $email ?>" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Username</label>
                            </div>
                            <div class="col-25">
                                <input class="text" type="text" name="username" placeholder="Username" value="<?php $username ="";
                                echo $username ?>" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Password</label>
                            </div>
                            <div class="col-25">
                                <input class="text" type="password" name="password" placeholder="Password" value="<?php $password ="";
                                echo $password ?>" required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label>Job Position</label>
                            </div>
                            <div class="col-25">
                                <input class="text" type="text" name="text" placeholder="clerk/shop keeper/admin" value="<?php $password ="";
                                echo $password ?>">
                            </div>
                        </div>




                    </div>
            <div class="sub-container">
                </div></br>



                <div class="wthree-text">
                    <div class="clear"> </div>
                </div>
                <input type="submit" value="Update">
                </form>

            </div>
        </div>

        <div class="footer">
            <p>© Tactota Solutions All rights reserved </p>
        </div>

    </div>
    </body>
</div>

-->
