<?php
    include 'navbar.php';
    include 'connect.php';
?>

<div class="container mt-5">
<table class="table table-striped text-center ">
  <thead class='table-dark'>
    <tr>
      <th scope="col">customerName</th>
      <th scope="col">productCode</th>
      <th scope="col">quantityOrdered</th>
      <th scope="col">orderNumber</th>
      
    </tr>
  </thead>
  <tbody>

    <?php
        $productCode = $_POST['productCode'];     //  ['id']  دا هو ال name='id'

    $query = "SELECT orderdetails.productCode , orders.orderNumber , orderdetails.quantityOrdered ,  customers.customerName
                FROM orders JOIN customers JOIN orderdetails
                ON customers.customerNumber = orders.customerNumber
                AND orders.orderNumber = orderdetails.orderNumber
                WHERE orderdetails.productCode = '$productCode' 
                ORDER BY customers.creditLimit DESC ";     

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          ?>
            <tr>
        <td> <?php echo $row["customerName"]  ?> </td>
        <td> <?php echo $row["productCode"]  ?> </td>
        <td> <?php echo $row["quantityOrdered"]  ?> </td>
        <td> <?php echo $row["orderNumber"]  ?> </td>

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