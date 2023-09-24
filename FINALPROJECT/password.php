<?php

session_start();
if(!(isset($_SESSION['name'])&& isset($_SESSION['role'])&& $_SESSION['role']=='admin')){
  header('location:login.php');
  exit();
}


include 'connection.php';

if(isset($_POST['change'])){
  $username = $_POST['username'];
  $old_password=$_POST['old_password'];
  $new_password= password_hash($_POST['new_password'], PASSWORD_DEFAULT);
   
  $query1 = "SELECT * from users Where name = '$username'";
  $result1 = mysqli_query($con,$query1);
  if($result1){
    $row = mysqli_fetch_assoc($result1);

  if(password_verify($old_password,$row['password'])){
    $update_sql = "UPDATE users SET password = '$new_password' WHERE name = '$username'";
    $result2= mysqli_query($con,$update_sql);
    echo "Password updated successfully";
	header("Location:success.php");
  }
  else{
    echo"<script>alert('username or email Wrong')</script> ";
  }}

}
// if(isset($_POST['logout'])){
//   header('location:logout.php');
// }

?>
<html>
  <head>
    <title>Password Change</title>
    <!-- <link rel="stylesheet" href="staffStyle.css"> -->
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

  </head>
   
    <!-- Navbar -->
    <nav id="navbar">
      <ul style="height: 100vh;" class="navbar-items flexbox-col">
        <li class="navbar-logo flexbox-left">
            <h6>DCS</h6>
        </li>
        <li class="navbar-item flexbox-left">
          <a class="navbar-item-inner flexbox-left" href="AdminDashboard.php">
            <div class="navbar-item-inner-icon-wrapper flexbox">
              <i class="ri-home-4-fill"></i>
            </div>
            <span class="link-text">HOME</span>
          </a>
        </li>
        <li class="navbar-item flexbox-left">
          <a class="navbar-item-inner flexbox-left" href="registration.php">
            <div class="navbar-item-inner-icon-wrapper flexbox">
              <i class="ri-user-add-fill"></i>
            </div>
            <span class="link-text">ADD STAFF</span>
          </a>
        </li>
      
        <li class="navbar-item flexbox-left">
          <a class="navbar-item-inner flexbox-left" href="viewStaff.php">
            <div class="navbar-item-inner-icon-wrapper flexbox">
              <i class="ri-team-fill"></i>
            </div>
            <span class="link-text">STAFF</span>
          </a>
        </li>
      
        <li class="navbar-item flexbox-left">
          <a class="navbar-item-inner flexbox-left" href="password.php">
            <div class="navbar-item-inner-icon-wrapper flexbox">
              <i class="ri-key-2-fill"></i>
            </div>
            <span class="link-text">PASSWORD</span>
          </a>
        </li>
      
        
        <li style="  margin-top: auto;
        margin-bottom: 2rem" class="navbar-item flexbox-left logout">
          <a class="navbar-item-inner flexbox-left " href="login.php">

            <div class="navbar-item-inner-icon-wrapper flexbox logout2">
              <i class="ri-login-box-fill"></i>
            </div>
            <span class="link-text">LOG OUT</span>
          </a>
        
        </li>
      </ul>
    </nav>

  <body>
    <div class="container">
    <form method="post" action="">
    <div class="hdd">
				<h2 class="hd">Password Change</h2>
    </div>
      <label>Username : </label>
      <input type="text" name="username" required><br><br>
      
      <label>Old_password : </label>
      <input type="password" name="old_password" required><br><br>
      
      <label>New_password : </label>
      <input type="password" name="new_password" required><br><br>
  
      <label>Re-Type password : </label>
      <input type="password"><br><br>
      
      
      <!-- <button class="openBtn4" id="logout5" onclick="document.location='logout.php'">Log Out</button> -->
      <input id="logout5" type="submit"  value="Confirm" name="change"><br><br>
      
    </form>
    </div>
<style>
  
  #logout5{
    width:250px ;
    height: 50px;
    border: 1px solid;
    border-radius: 25px;
    font-size: 18px;
  color: #14274E;
  font-weight: 700;
  cursor: pointer;
  outline: none;
  margin:auto;
  position: relative;
  background-color: #fff;
  margin-left: 200px;
}
.openBtn4{
  background-color: #14274E;
  color: #fff;
}
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}
body{
  background-color: white;
}
.container{
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	background: white;
}
.hdd{
	/* padding: 5px 15px 5px 3px; */
  padding-bottom:20px ;
	color: black;
}

.hd{
	background: rgb(0, 67, 122);
	color:#fff;
	text-align: center;
	padding: 10px;
	font-size: larger;
}
label{
	width: 200px;
	display: inline-block;
	color: rgb(0, 67, 122);
	
}
input[type="text"]{
	width: 300px;
	height: 35px;
	display: inline-block;
	border: 2px solid rgb(0, 67, 122);
	padding-left: 10px;
	transition: 0.4s;
}
input[type="password"]{
	width: 300px;
	height: 35px;
	display: inline-block;
	border: 2px solid rgb(0, 67, 122);
	padding-left: 10px;
	transition: 0.4s;
}

textarea{
	width: 300px;
	height: 90px;
	display: inline-block;
	border: 2px solid rgb(0, 67, 122);
	color: rgb(0, 0, 0);
	padding: 10px;
	transition: 0.4s;
}
textarea:hover{
	scale: 105%;
	border: 4px solid rgb(0, 0, 0);
}
input:hover{
scale: 102%;
border: 2px solid #394867cc;
}
form{
  border:solid 2px black;
  padding: 20px;
  border-radius: 5px;
}





@media only screen and (max-width: 768px) {
body{
	background: rgb(228, 228, 228);
	padding-top: 50%;
}
.container{
	margin-bottom: 30px;
}
.myfm div{
	width: 100%;
	margin-bottom: 6px;
}
.myfm input{
	width: 100%;
}
.myfm select{
	width: 100%;
}
.myfm textarea {
	width: 100%;
}
.btn{
	width: 100%;
}
.hd{
	width: 100%;
}
}
</style>


  </body>
</html>