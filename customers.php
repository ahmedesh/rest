<?php  

    include 'navbar.php';
    include 'connect.php';

    ?>
<div class="container mt-5">
<table class="table table-striped ">
  <thead class='table-dark'>
    <tr>
      <th scope="col">customerName</th>
      <th scope="col">creditLimit</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $query = "SELECT customerName , creditLimit
              FROM `customers` 
              where creditLimit>20000
              ORDER BY creditLimit";

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          ?>
            <tr>
        <td> <?php echo $row["customerName"] ?> </td>
        <td> <?php echo $row["creditLimit"] ?> </td>
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