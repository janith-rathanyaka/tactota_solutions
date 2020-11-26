<?php
include 'clerk_sidebar.php';
require '../controller/sales.php';
$data=new sales();
$sql=$data->get_supplier_names();
//print_r($sql);
?>

<head>
    <link rel="stylesheet" href="../public/css/update.css">
    <link rel="stylesheet" href="../public/css/test.css">
</head>
<div class="content" style="width: auto;">
    <h1 id="tbl-heading"  >Add new Product</h1>

    <form action="../controller/sales.php?action=add_product" method="post">
        <div class="update-tbl">
            <table>
                <tbody>

                <tr>
                    <th>Email Name</th>
                    <td>
                        <input class="text" type="text" name="product_name" placeholder="tosee497@gmail.com" required="">
                    </td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>
                        <input class="text" type="text" name="brand_name" placeholder="dfdsfhsfdjsdkjkdsvjcx kdjkdsfdsk<br>dhjshsjdjs" required="">
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </form>

</div>
