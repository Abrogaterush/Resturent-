<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">-->
    <title>Cart</title>
</head>
<body>

<?php include ("Partials/header.php"); ?>

<div class="cart">

  <div class="cart_table">
  <div class="cart_heading">
    <p>My Cart</p>
  </div> 
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Sr. no</th>
          <th scope="col">Item Name</th>
          <th scope="col">Item Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
          <th scope="col"></th>
      
        </tr>
      </thead>
      <tbody>
    
        <?php

          if (isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $key => $value){
            $sr = $key + 1;

            echo"
              <tr>
                <td>$sr</td>
                <td>$value[Item_name]</td>
                <td>$value[Price] <input type='hidden' class='iprice' value='$value[Price]'></td>
                <td><input type='number' class = 'iquantity' onchange='subTotal()' value='$value[Quantity]' min='1'></td> 
                <td class='itotal'></td>
                <td>
                <form action='Cart_Managment.php' method='POST'>
                <button name='Remove_item' class='remove'>Remove</button>
                <input type='hidden' name='Item_name' value='$value[Item_name]'>
                 </form>
                </td>
              </tr>";
            }
          }
        ?>
      </tbody>
    </table>
  </div>

  <div class="cart_calculation">
    <h3>Grand Total: </h3>
    <h5 id="gtotal"></h5>
    <form action="">
    <button class="buy">Buy</button>
    </form>
  </div>
</div>


<script>
  var gt = 0;
  var iprice=document.getElementsByClassName('iprice');
  var iquantity=document.getElementsByClassName('iquantity');
  var itotal=document.getElementsByClassName('itotal');
  var gtotal = document.getElementById('gtotal');

  function subTotal(){

    gt = 0;
    for(i=0;i<iprice.length;i++){

       itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
       gt = gt + (iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText = gt;
  }

  subTotal();

</script>
</body>
</html>