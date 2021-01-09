<?php

    include 'navbar.php';
    include 'connect.php';

        $query = "SELECT  DISTINCT city
                FROM customers
                ORDER BY city  ";     // لاحظ حطيت ال $name بين سنجل كوتيشن او دبل كوتيشن عشان هو string مش رقم ف لابد منه

    $result = $conn->query($query);

    if ($result->num_rows > 0) {

?>

<form action='handleCustomer_city.php' method='post' class='mt-5 container'>
 
    <div class='form-group'>
        <label>city</label>
        <select class='form-control' name="city" id="">

            <?php
        while($row = $result->fetch_assoc()) {

        ?>
        <option> <?php echo $row["city"]  ?> </option>

        <?php
             } }
        ?>

        </select>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php

     