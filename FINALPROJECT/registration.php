<?php

session_start();
if(!(isset($_SESSION['name'])&& isset($_SESSION['role'])&& $_SESSION['role']=='admin')){
  header('location:login.php');
  exit();
}


include ('connection.php');
	if(isset($_POST['register'])){
		$username=$_POST['name'];
		$email=$_POST['email'];
		//$password=md5 ($_POST['password']);  //md5 to use it will not show the password show anothwr letters and number
		$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
		$role=$_POST['role'];
		

    
		$query="SELECT *FROM users WHERE name='$username' OR email='$email'";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)==1){
			echo"<script>alert('username or email already taken')</script> ";
		}
		else{
			$query="INSERT INTO users(name,email,password,role)values('$username','$email','$password','$role')";
			mysqli_query($con,$query);
			header("Location:AdminDashboard.php");
		}
		
		
	}
?>


<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    
  </head>
  <body>
  
    <div class="pattern"></div>
    <div class="center">
      <h1>Register</h1>
      <form method="POST" action="">
        <div class="txt_field">
          <input type="text" name="name" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="text" name="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="role">
        <label >Role:</label>
			  <select name="role">
			    <option value="admin" name="admin">Admin</option>
			    <option value="staff" name="staff">Staff</option>
        </select>
        </div>
        <br>
        <input type="submit" value="Register" name="register">
        <div class="signup_link">
          Do you want to log Out? <a href="logout.php">Log Out</a>
        </div>
      </form>
    </div>
  </body>
</html>
