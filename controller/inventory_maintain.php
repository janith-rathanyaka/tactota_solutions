<?php
require_once("../model/inventory_maintain_model.php");
session_start();
class inventory_maintain
{
    public function __construct()
    {

        $this->inven = new inventory_maintain_model();

    }

    public function newsuppliers()
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $mobile_no = $_POST['moblile_no'];
        $email = $_POST['email'];

        if (empty($name)) {
            $errors['lastname'] = "Lastname is required";
        }
        if (empty($address)) {
            $errors['address'] = "Address is required";
        }
        if (empty($mobile_no)) {
            $errors['mobile_no'] = "Mobile number is required";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required";
        }

        $row1 = $this->inven->valid_name($name);
        $row = $this->inven->valid_email($email);

        if ($row != "0") {

            echo "email already does not has";
        } else if ($row1 != "0") {
            echo "name already has";
        } else {
            $sup_id = $this->inven->getsupid();
            echo $sup_id;
            if ($this->inven->supplier_register($sup_id, $name, $address, $mobile_no, $email) != 0) {
                header('location: ../views/supplier_details.php');
            } else {
                echo "wrong";
            }
        }
    }

    public function view_suppliers($row)
    {
   //       $row=$_POST['query'];
           //print_r($row);
        //$_SESSION['supplier_details']=$row1;
        //header('location: ../views/supplier_details_search.php');
     $row1=$this->inven->get_details1($row);
     // print_r($row1);
        if($row1!=""){
            $_SESSION['supplier_details']=$row1;
            header('location: ../views/supplier_details_search.php');
            //   print_r($row1);
        }else if($row1==0) {
            echo "NOT FOUND";
        }

    }

    public function supplier_profile($id)
    {
        // print_r($id);
        $row = $this->inven->get_view_details($id);
        /* echo "<br>";
         print_r($row['sup_name']);
         echo "<br>";
         print_r($row['email_address']);
         echo "<br>";
         print_r($row['address']);
         echo "<br>";
         print_r($row['telephone_no']);
        */
        $_SESSION['supplier_profile_details'] = $row;
        header('location: ../views/view_one_supplier.php');

    }

    public function update_product($row)
    {


       //   print_r($row);
        $row1=$this->inven->get_product_details_search($row);
    //  print_r($row);
        if($row1!=""){
            $_SESSION['update_product']=$row1;
            header('location: ../views/view_all_product_search.php');
            //   print_r($row1);
        }else if($row1==0) {
            echo "NOT FOUND";
        }
         // get_product_details();
    }

    public function view_product_details($id)
    {
        //print_r($id);
        $row = $this->inven->get_view_product_details($id);
        //$p=$row['pp_name'];
        //   print_r($row);
        // print_r($row['p_name']);
        // echo "<br>";
        //      print_r($row['p_id']);
        $_SESSION['product_details'] = $row;
        // print_r($_SESSION['product_details']);
        header('location: ../views/update_product.php');

    }

    public function update_product_details($id)
    {

        $reorder_level = $warranty = $p_cost = $sales_price = "";
        $reorder_level = $_POST['reorder_level'];
        $warranty = $_POST['warranty'];
        $p_cost = $_POST['p_cost'];
        $sales_price = $_POST['sales_price'];
        // print_r($reorder_level);
        //echo "<br>";
        // print_r($warranty);
        //echo "<br>";
        // print_r($p_cost);
        // echo "<br>";
        // print_r($sales_price);
        $row = $this->inven->update_product_details($id, $reorder_level, $warranty, $p_cost, $sales_price);
        if ($row == "0") {
            header('location: ../views/update_product.php');
        } else {
            header('location: ../views/list_updateproduct.php');
        }
    }

    public function view_one_product_details($id)
    {
        //print_r($id);
        $row = $this->inven->get_view_product_details($id);
        //$p=$row['pp_name'];
        //     print_r($row);
        // print_r($row['p_name']);
        // echo "<br>";
        //      print_r($row['p_id']);
        $_SESSION['one_product_details'] = $row;
        // print_r($_SESSION['product_details']);
        header('location: ../views/view_one_product.php');

    }

    public function delete_product_details($id)
    {
        //print_r($id);
        $row = $this->inven->get_delete_product_details($id);
        $quantity = $row['quantity'];
        $count_serial_number = $row['COUNT(item.serial_no)'];
        $value = false;
        //     print_r($quantity);
        //   echo "</br>";
        //  print_r($count_serial_number);
        $row = $this->inven->delete_product_details($id, $quantity, $count_serial_number, $value);
        if ($row == "0") {
            echo "wrong";
        } else {
            header('location: ../views/list_updateproduct.php');

        }

    }

    public function display_reminders()
    {   //reshani
        return $this->inven->display_stockreminders();
    }

    public function display_few_reminders(){   //reshani    display few reminder items in clerk dashboard
        return $this->inven->display_few_stockreminders();
    }





    ////// new add need check
    public function display_onereturnitem_details($id,$id1){
       $row=$this->inven->display_returnitem($id,$id1);
       //  print_r($id);
      //   print_r($row["model_no"]);

        $_SESSION['return_item']=$row;
        header('location: ../views/view_one_returnitem.php');
    }
    public function add_returnitem_details(){       //reshani
        // $description="";
        $serial_no=$_POST['serial_no'];
        $description=$_POST['description'];
        $returned_date=date("Y-m-d");
        $sup_id=$this->inven->get_supid_serial_no( $serial_no);
        //$serial_no=$this->inven->get_supid_serial_no1();

        if($this->inven->add_return_item($sup_id,$serial_no,$returned_date,$description)){
            header('location: ../views/view_one_returnitem.php');
        }else{
            echo "error";
        }

    }

    public function display_returnitem_details(){   //reshani
        return $this->inven->diplay_return_items();
    }

    public function dashbord_return_search()
    {     // print_r($value);
           $id=$_POST['query'];

            $row= $this->inven->dashbord_return_search($id);

            if($row==0){
                $row1= $this->inven->dashbord_customer_return_product($id);
                if($row1==0){
                   echo "NOT FOUND";
                    header('location: ../views/returnitems_result.php');
                }else{
                    $_SESSION['return_search']=$row1;
                    header('location: ../views/returnitems_result.php');
                   // print_r($row1);
                }
            }else{
                $_SESSION['return_search']=$row;
                header('location: ../views/returnitems_result.php');
               // print_r($row);
            }


    }

    public function view_search_product($id)
    {
        print_r($id);
    }

    public function reminderitems_suppliers($id){    //nuwan
        $row=$this->inven->display_reminder_suppliers($id);
        $_SESSION['reminderitem_suppliers']=$row;
        header('location: ../views/stockreminders.php');
    }

}


      $controller = new inventory_maintain();
if(isset($_GET['action']) && $_GET['action'] == "newsuppliers") {
     $controller->newsuppliers();
}else if(isset($_GET['action']) && $_GET['action'] == 'view_suppliers') {
    $row=$_POST['query'];
    //print_r($row);
    $controller->view_suppliers($row);
}else if(isset($_GET['action']) && $_GET['action'] == 'supplier_profile' ) {
    $id=$_GET["id"];
    $controller->supplier_profile($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'update_product') {
    $row=$_POST['query'];
    //print_r($row);
    $controller->update_product($row);
}else if(isset($_GET['action']) && $_GET['action'] == 'view_product_details') {
    $id=$_GET["id"];
    $controller->view_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'update_product_details') {
    $id=$_GET["id"];
    $controller->update_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'delete_product_details') {
    $id=$_GET["id"];
    $controller->delete_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'view_one_product_details') {
    $id=$_GET["id"];
    $controller->view_one_product_details($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'display_reminders') {

    $controller->display_reminders();
}else if(isset($_GET['action']) && $_GET['action'] == 'display_few_reminders'){   //reshani
    $controller->display_few_reminders();
}else if(isset($_GET['action']) && $_GET['action'] == 'display_returnitem_details'){  //reshani
    $controller->display_returnitem_details();
}else if(isset($_GET['action']) && $_GET['action'] == 'display_onereturnitem_details'){  //reshani
    $id=$_GET["id"];
    $id1=$_GET["id1"];
    $controller->display_onereturnitem_details($id,$id1);
}else if(isset($_GET['action']) && $_GET['action'] == 'add_returnitem_details') {  //reshani
    $controller->add_returnitem_details();
}else if(isset($_GET['action']) && $_GET['action'] == 'dashbord_return_search') {

   $controller->dashbord_return_search();
}else if(isset($_GET['action']) && $_GET['action'] == 'reminderitems_suppliers'){  //nuwan
    $id=$_GET["id"];
    $controller->reminderitems_suppliers($id);
}
