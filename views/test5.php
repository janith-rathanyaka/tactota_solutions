<?php
include 'clerk_sidebar.php';
//require '../controller/inventory_maintain.php';
//$data=new inventory_maintain();
//$sql=$data->view_suppliers();
?>
<head>
   <link rel="stylesheet" href="../public/css/update.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<div class="content" style="width: auto;">
    <h1 id="tbl-heading">Supplier Details</h1>
    <div class="search">
        <input type="text" id="search_text" placeholder="Search..">
    </div>
    <div>
     <!--   <a class="add_button" href="add_suppliers.php" class="next">-|- Add new Suppliers</a> -->
    </div>
    <br>
    <div class="view-tbl" id="result">

    </div>
</div>
</body>

<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"../controller/inventory_maintain.php?action=view_suppliers",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>
