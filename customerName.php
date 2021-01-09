<?php

    include 'navbar.php';

?>

<form action='handleCustomerName.php' method='post' class='mt-5 container'>
 
  <div class="form-group">
    <label for="exampleInputCustomer_Name"> Customer Name </label>
    <input type="text" name='name' class="form-control" id="exampleInputCustomer_Name">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


