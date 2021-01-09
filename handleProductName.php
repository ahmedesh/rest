<?php
    include 'navbar.php';
    include 'connect.php';
?>

<div class="container mt-5">
<table class="table table-striped text-center ">
  <thead class='table-dark'>
    <tr>
      <th scope="col">productName</th>
      <th scope="col">quantityInStock</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $number = $_POST['number'];     //  ['id']  دا هو ال name='id'

    $query = "SELECT productName , quantityInStock
              FROM products
              WHERE quantityInStock>$number
              ORDER BY quantityInStock  ";     // لاحظ حطيت ال $name بين سنجل كوتيشن او دبل كوتيشن عشان هو string مش رقم ف لابد منه

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          ?>
            <tr>
        <td> <?php echo $row["productName"]  ?> </td>
        <td> <?php echo $row["quantityInStock"]  ?> </td>

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