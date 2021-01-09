<?php
    include 'navbar.php';
    include 'connect.php';
?>

<div class="container mt-5">
<table class="table table-striped text-center ">
  <thead class='table-dark'>
    <tr>
      <th scope="col">productName</th>
      <th scope="col">quantityOrdered</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $query = "SELECT products.productName , orderdetails.quantityOrdered , SUM(orderdetails.quantityOrdered * orderdetails.priceEach)
                from products JOIN  orderdetails
                ON products.productCode = orderdetails.productCode
                GROUP BY products.productName
                ORDER BY orderdetails.quantityOrdered DESC";    // دي عشان ترجعلي الاوردر بتاع كل اسم مش يرجعلي مجموعهم ع بعض يعني وخلاص

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          ?>
            <tr>
            <!-- لاحظ مينفعش تقوله products.productName -->
        <td> <?php echo $row["productName"]?> </td>          
        <td> <?php echo $row["quantityOrdered"]  ?> </td>
        <td> <?php echo $row["SUM(orderdetails.quantityOrdered * orderdetails.priceEach)"]  ?> </td>

           </tr>
        <!-- echo  $row["customerName"]. " " . $row["creditLimit"]. "<br>"; -->
        
        <?php
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>

  </tbody>
</table>
</div>