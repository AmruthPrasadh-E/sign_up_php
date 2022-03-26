<?php 
@include'config.php';
session_start();

if(isset($_POST['submit'])){
  $user = mysqli_real_escape_string($conn, $_POST['user']);
  $password = md5($_POST['psw']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $mark1 = mysqli_real_escape_string($conn, $_POST['mark1']);
  $mark2 = mysqli_real_escape_string($conn, $_POST['mark2']);
  $mark3 = mysqli_real_escape_string($conn, $_POST['mark3']);

  $select= "SELECT * FROM user_signup WHERE User='$user' && Password='$password'";

  $result = mysqli_query($conn, $select);
  
  if(mysqli_num_rows($result)>0){
    $error[]='user already exist!';
  }else{
    $insert = "INSERT INTO user_signup(User, Password, Name, FatherName, Address, Age, 10thMark, 12thMark, CGPA)
    VALUES('$user','$password','$name','$fname','$address','$age','$mark1','$mark2','$mark3')";

    mysqli_query($conn, $insert);

    header('location:action_page.php');
    
  }

};
?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/pSopper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password], input[type=number]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

.form-button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.form-button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form action="action_page.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <?php
      if(isset($error)){
        foreach($error as $error){
          echo '<span class="error_msg">'.$error.'</span>';
        };
      };
    ?>
    
    <label for="user"><b>User Name</b></label>
    <input type="text" placeholder="Enter Email" name="user" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="fname"><b>Father's Name</b></label>
    <input type="text" placeholder="Enter Father's Name" name="fname" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>

    <label for="age"><b>Age</b></label>
    <input type="number" placeholder="Enter Age" name="age" required>

    <label for="mark1"><b>10th Mark</b></label>
    <input type="number" placeholder="Enter 10th mark" name="mark1" required>

    <label for="address"><b>12th mark</b></label>
    <input type="number" placeholder="Enter 12th mark" name="mark2" required>

    <label for="address"><b>CGPA</b></label>
    <input type="number" placeholder="Enter CGPA" name="mark3" required>
    
    <div class="clearfix">
      <input type="submit" name="submit" value="Sign up" class="form-button">
    </div>
    <p>have an account? <a href="page2.php">Login</a></p>
  </div>
</form>

</body>
</html>
<?php
$_SESSION['name'];
    $_SESSION['fname'];
    $_SESSION['address'];
    $_SESSION['age'];
    $_SESSION['mark1'];
    $_SESSION['mark2'];
    $_SESSION['mark3'];
    

?>