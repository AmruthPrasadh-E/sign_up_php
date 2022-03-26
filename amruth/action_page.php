<?php 
@include'config.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Action page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
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
        <h1>ACTION PAGE</h1>
        <div>
          <?php

              $sql = "SELECT * FROM user_signup LIMIT 1";
              $result= mysqli_query($conn, $sql);

              if(mysqli_num_rows($result)>0){

          ?>
                   
                      
                      <p><?php echo "Name :    ".$row.['name'];?></p><br>
                      <p><?php echo "Father's Name :    ".$row.['fname'];?></p><br>
                      <p><?php echo "Address :    ".$row.['address'];?></p><br>
                      <p><?php echo "Age :    ".$row.['age'];?></p><br>
          <table class="center" style="background-color:#fff">
                <tr>
                  
                  <th>10th Mark</th>
                  <th>12th Mark</th>
                  <th>CGPA</th>
                </tr>
                <?php
                  while($row = mysqli_fetch_array($result)){
                    echo "<br>";
                    ?>
                    <tr>
                      
                      <td><?php echo $row.['mark1'];?></td>
                      <td><?php echo $row.['mark2'];?></td>
                      <td><?php echo $row.['mark3'];?></td>
                    </tr>
                  <?php
                  } 
                  ?>
                  </table>  
                  <?php
                    }else{
                      echo "0 results";
                    }
                    mysqli_close(); 
                  ?>
        </div>
        <a href="/thank.php" class="btn btn-info" role="button">LOG OUTS</a>
    </body>
</html>