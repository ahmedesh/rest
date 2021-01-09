<?php
    include 'navbar.php';
    include 'connect.php';
?>

<div class="container mt-5">
<table class="table table-striped text-center ">
  <thead class='table-dark'>
    <tr>
      <th scope="col">customerNumber</th>
      <th scope="col">customerName</th>
      <th scope="col">phone</th>
      <th scope="col">addressLine1</th>
      <th scope="col">addressLine2</th>
      <th scope="col">city</th>
      <th scope="col">creditLimit</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $id = $_POST['id'];     //  ['id']  دا هو ال name='id'
        $_SESSION['id'] = $id;
    $query = "SELECT *
              FROM `customers` 
              where customerNumber = $id";

    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          ?>
            <tr>
        <td> <?php echo $row["customerNumber"]?> </td>
        <td> <?php echo $row["customerName"]  ?> </td>
        <td> <?php echo $row["phone"]         ?> </td>
        <td> <?php echo $row["addressLine1"]  ?> </td>
        <td> <?php echo $row["addressLine2"]  ?> </td>
        <td> <?php echo $row["city"]          ?> </td>
        <td> <?php echo $row["creditLimit"]          ?> </td>

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