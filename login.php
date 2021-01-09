<?php 

    include 'navbar.php';


    if(isset($_SESSION['errors'])){
      foreach($_SESSION['errors'] as $error){
        echo '<div class="alert alert-danger"> ' . $error . '</div>';
      }
    }
?>

<form action='handleLogin.php' class='login' method='post' class='mt-5 container'>
 
  <div class="form-group">
  <h4 class="text-center"> Admin Login </h4>
    <input type="text" name='username' class="form-control" id="exampleInputLogin" placeholder="UserName">

    <input type="password" name='password' class="form-control" id="exampleInputLogin" placeholder="Password">
  </div>

  <button type="submit" class="form-control btn btn-primary"> Login </button>
</form>