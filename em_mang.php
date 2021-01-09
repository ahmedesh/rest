<?php
    include 'navbar.php';
    include 'connect.php';
?>

<div class="container mt-5">
<table class="table table-striped text-center ">
  <thead class='table-dark'>
    <tr>
      <th scope="col">Manager</th>
      <th scope="col">employee</th>
    </tr>
  </thead>
  <tbody>

    <?php
    
    // self join
    $query = "SELECT  em.firstName , mang.lastName           
                FROM employees as em JOIN employees as mang 
                ON em.employeeNumber = mang.reportsTo";    // دي عشان ترجعلي الاوردر بتاع كل اسم مش يرجعلي مجموعهم ع بعض يعني وخلاص

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          ?>
            <tr>
        <td> <?php echo $row["firstName"]?> </td>
        <td> <?php echo $row["lastName"]  ?> </td>

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