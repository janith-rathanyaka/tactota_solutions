<?php
require_once('shopkeeper_sidebar.php');
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<div class="content" style="width: auto;">
    <br><br> <br><br>
    <div class="center">


        <form class="example">
            <input type="text" id="search" placeholder="Search Product" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>

        </form>

    </div>
    <div id="result"></div>
    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>

<script>



</script>

<script type="text/javascript">
  //  var value;
  var value;
  $('input[type=radio]').click(function (e) {//jQuery works on clicking radio box
      value = $(this).val(); //Get the clicked checkbox value
    //  console.log(value);


  });

  $(document).ready(function(){

      $('#search').keyup(function(){
          var query = $(this).val();
          if(query != '')
          {
              $.ajax({

                  url:"../controller/inventory_maintain.php?action=dashbord_return_search",
                  method:"POST",
                  data:{query:query},
                  success:function(data)
                  {
                      $('#result').fadeIn();
                      $('#result').html(data);
                  }
              });
          }
      });
      $(document).on('click', 'li', function(){
          $('#search').val($(this).text());
          $('#result').fadeOut();
      });
  });

</script>



