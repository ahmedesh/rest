<?php
    include 'navbar.php';
    include 'connect.php';
?>

<div class="container mt-5">
<table class="table table-striped text-center ">
  <thead class='table-dark'>
    <tr>
      <th scope="col">customerName</th>
      <th scope="col">city</th>
      <th scope="col">creditLimit</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $city = $_POST['city'];     //  ['id']  دا هو ال name='id'

    $query = "SELECT customerName , city , creditLimit
              FROM customers
              WHERE city = '$city'
              ORDER BY creditLimit DESC
              LIMIT 3  ";     

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          ?>
            <tr>
        <td> <?php echo $row["customerName"]  ?> </td>
        <td> <?php echo $row["city"]  ?> </td>
        <td> <?php echo $row["creditLimit"]  ?> </td>

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