<?php
session_start();
require_once("../model/sales_model.php");

class sales
{

    public function __construct()
    {

        $this->sale = new sales_model();

    }
   public function get_supplier_names(){
        return $this->sale->get_names();
   }

    public function add_product()
    {
        $product_name = $_POST['product_name'];
        $brand_name = $_POST['brand_name'];
        $model_number = $_POST['model_number'];
        $quantity = $_POST['quntity'];
        $product_cost= $_POST['product_cost'];
        $supplier_id = $_POST['supplier'];
        $warranty = $_POST['warranty'];
        $sales_price = $_POST['sales_price'];
        $serial_number = $_POST['serial_number'];
        $reorder_level = $_POST['reorder_level'];
        $product_status=true;
        $item_status=true;
        $product_date=date("Y-m-d");
        $product_id = $this->sale->get_product_id();

      //  print_r(sizeof($serial_number));

          $size_array=sizeof($serial_number);
          if($quantity==$size_array){
              echo "good";
          }else if($quantity > $size_array){
               echo "you can add less than quntyty";
          }else{
              echo "you can add more than quntyty";
          }


            foreach ($serial_number as $key =>$value){
                 $serial_number[$key]=$value."@".$product_id;
            }


      //  print_r($product_date);
       // print_r($item_status);
      //  print_r($product_id);
       // print_r($quantity);
    if($this->sale->add_new_product($product_id,$product_name,$product_cost,$brand_name,$reorder_level,$model_number,$quantity,$warranty,$product_status,$product_date,$serial_number,$sales_price,$item_status,$supplier_id)){
          $_SESSION['add_product']="successful Add New Suppliers";
        header('location: ../views/view_all_products.php');
    }else{
            echo "dhskfshdj";
    }

    }

    public function valid_prodcuts(){
        return $this->sale->view_products();
    }
    public function sell($id){
       print_r($id);

   //   header('location: ../views/bill.php');
    }

    public function dashbord_search()
    {
          $id=$_POST['query'];

          $row= $this->sale->dashbord_search($id);
       //   print_r($row);
         //  print_r($row);
        $_SESSION['dashbord_search']=$row;
        header('location: ../views/search_product_result.php');
    }

    public function view_search_product($id,$model)
    {
        //print_r($id);
      //  print_r($model);

        $row= $this->sale->view_search_product($id,$model);
        print_r($row);
      //  $_SESSION['view_search_product']=$row;
     //   print_r($row['product.p_name']);
     //   header('location: ../views/view_search_product.php');

    }
    public function add_bill(){ //nuwan

        //$id=$this->auth->login($username, $password);
        $bill_no= $_POST['bill_no'];
        $date_time = $_POST['date_time'];
        $amount = $_POST['amount'];
        $cust_name = $_POST['cust_name'];
        $email_address= $_POST['email_address'];
        $address = $_POST['address'];
        $telephone_no = $_POST['telephone_no'];
        $serial_no = $_POST['serial_no'];
        $payment_method = $_POST['payment_method'];
        $bank_name = $_POST['bank_name'];
        $cheque_no = $_POST['cheque_no'];
        $recived_date = $_POST['recived_date'];
        $due_date = $_POST['due_date'];
        $id=$_POST['emp_id'];
        $cust_id = $this->sale->cust_id();

        //$bill_no= $this->sale->get_bill_no();
        if($this->sale->add_bill_details($id,$bill_no,$date_time,$amount,$payment_method,$cust_id,$cheque_no,$recived_date,$due_date,$bank_name,$telephone_no,$serial_no)){
            header('location: ../views/bill.php');
        }else{
            echo "empty";
        }


    }

    public function get_product_details(){//nuwan
        return $this->sale->get_product();
    }
}
$controller = new sales();
if(isset($_GET['action']) && $_GET['action'] == "get_supplier_names") {
    $controller->get_supplier_names();
}else if(isset($_GET['action']) && $_GET['action'] == 'add_product') {
    $controller->add_product();
}else if(isset($_GET['action']) && $_GET['action'] == 'valid_prodcuts') {
    $controller->valid_prodcuts();
}else if(isset($_GET['action']) && $_GET['action'] == 'sell') {
    $id=$_GET["id"];
    $controller->sell($id);
}else if(isset($_GET['action']) && $_GET['action'] == 'dashbord_search') {

    $controller->dashbord_search();
}else if(isset($_GET['action']) && $_GET['action'] == 'view_search_product') {
     $id=$_GET['id'];
     $model=$_GET['id1'];
    $controller->view_search_product($id,$model);
}else if(isset($_GET['action']) && $_GET['action'] == 'add_bill') { //nuwan
    //$id=$_GET["id"];
    $controller->add_bill();
}else if(isset($_GET['action']) && $_GET['action'] == 'get_product_details') {//nuwan
    $controller->get_product_details();
}




