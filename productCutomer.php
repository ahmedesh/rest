
<?php

include 'navbar.php';
include 'connect.php';

    $query = "SELECT  DISTINCT productCode
              FROM orderdetails  ";     

$result = $conn->query($query);

if ($result->num_rows > 0) {

?>

<form action='handleProductCustomer.php' method='post' class='mt-5 container'>

<div class='form-group'>
    <label>productCode</label>
    <select class='form-control' name="productCode" id="">

        <?php
    while($row = $result->fetch_assoc()) {

    ?>
    <option> <?php echo $row["productCode"]  ?> </option>

    <?php
         } }
    ?>

    </select>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php

 