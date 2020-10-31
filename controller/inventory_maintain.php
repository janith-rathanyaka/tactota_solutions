<?php
require_once("../model/inventory_maintain_model.php");

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

        $row = $this->inven->valid_email($email);
        $row1 = $this->inven->valid_name($name);

        if ($row != "0") {

            echo "email already does not has";
        }
        else if($row1 != "0" )
        {
            echo "name already has";
        }else{
            $sup_id = $this->inven->getsupid();
            echo $sup_id;
            if($this->inven->supplier_register($sup_id,$name,$address,$mobile_no,$email) !=0){
                header('location: ../views/supplier_details.php');
            }else{
                echo "wrong";
            }
        }
    }

    public function view_suppliers()
    {

        return $this->inven->get_details();
    }

    public function supplier_profile($id)
    {
         print_r($id);
        $row = $this->inven->get_view_details($id);
        echo "<br>";
        print_r($row['sup_name']);
        echo "<br>";
        print_r($row['email_address']);
        echo "<br>";
        print_r($row['address']);
        echo "<br>";
        print_r($row['telephone_no']);
    }

    public function update_product(){

       return $this->inven->get_product_details();
    }
}



      $controller = new inventory_maintain();
if(isset($_GET['action']) && $_GET['action'] == "newsuppliers") {
     $controller->newsuppliers();
}else if(isset($_GET['action']) && $_GET['action'] == 'view_suppliers') {
    $controller->view_suppliers();
}else if(isset($_GET['action']) && $_GET['action'] == 'supplier_profile' ) {
    $id=$_GET["id"];
    $controller->supplier_profile($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'update_product') {
    $controller->update_product();
}
