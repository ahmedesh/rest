<?php 
    include 'connect.php';
    session_start();
    // getting data
    $username = $_POST['username'];
    $password = $_POST['password'];
    // echo 'your email is:  ' . $email . '<br>' . ' and your password is:  ' . $password;

    // clean data
    function cleanData($input){
        $input1 = htmlspecialchars($input);
        $input2 = trim($input1);
        return $input2;
    }
    $username = cleanData($username);
    $password = cleanData($password);

    // compare input data with database
        $query = "SELECT customerName , CustomerPass 
                form customers
                WHERE customerName = '$userName'
                AND CustomerPass = $password  ";     

        $result = $conn->query($query);

    // validation

    $errors = [];
    $valid = true;

    if($result->num_rows == 0 && $username!="" && $password!=""){
        $errors['data'] = 'not valid data';
        $valid = false;
    }

    if (!filter_var($username, FILTER_SANITIZE_STRING) || $username == '') {
        $errors['username'] = ("$username is not valid username address") . '</br>';
        $valid = false;
      }

      if(!filter_var($password , FILTER_VALIDATE_REGEXP , array("options"=> array("regexp" => "/.{6,25}/" ))
                               ) || $password == "" )
                        {  // /.{6,25}/      /^ [a-zA-Z0-9]{6-12} $/
                            $errors['password'] = ("$password is not valid password your password must be 6 digits");
                            $valid = false;
      }
      $_SESSION['errors'] = $errors;
      if(isset($_SESSION['errors'])){
          header('location:login.php');
      }
      if($valid==true){
          $_SESSION['username']=$username;
          $_SESSION['password']=$password;
          header('location:home.php');
      }
 ?>