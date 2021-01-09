<?php
    include 'navbar.php';
    include 'connect.php';
?>

<div class="container mt-5">
<table class="table table-striped text-center  ">
  <thead class='table-dark'>
    <tr>
      <th scope="col">customerName</th>
      <th scope="col">No.orderNumber</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $query = "SELECT customers.customerName , COUNT(orders.orderNumber)
                FROM `customers` join `orders`
                ON customers.customerNumber = orders.customerNumber
                GROUP BY customers.customerName";    // دي عشان ترجعلي الاوردر بتاع كل اسم مش يرجعلي مجموعهم ع بعض يعني وخلاص

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          ?>
            <tr>
        <td> <?php echo $row["customerName"]?> </td>
        <td> <?php echo $row["COUNT(orders.orderNumber)"]  ?> </td>

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