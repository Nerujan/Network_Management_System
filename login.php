
<?php
session_start();
if(isset($_SESSION['name'])&& isset($_SESSION['role'])){
  if($_SESSION['role'] == 'admin'){
    header('location:AdminDashboard.php');
  }else  if($_SESSION['role'] == 'staff'){
    header('location:detailsStaff.php');
}
}
include 'connection.php';
if(isset($_POST['login'])){
	$username=$_POST['name'];
	$password=$_POST['password'];



	$query="SELECT * FROM users WHERE name = '$username'";
	$result=mysqli_query($con,$query);
	if($result){
		$row=mysqli_fetch_assoc($result);
    

   // echo password_hash($password,PASSWORD_DEFAULT);
		if(mysqli_num_rows($result)>0){
		if(password_verify($password,$row['password'])){
			$_SESSION['name']=$row['name'];
			$_SESSION['role']=$row['role'];
			if($row['role']=='admin'){
				header("Location:AdminDashboard.php");
			}
			else{
				header("Location:detailsStaff.php");
			}
		}
  }
		else{
	     $msg = "Ivalid Details";
    
		}
	}
}


?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="heading"><b>Network Managment System</b></div>
    <div class="pattern"></div>
    <div class="center">
      <h1>Login</h1>
      <p id="err"><?php if(isset($msg)){echo $msg;}else echo ""; ?></p>
      <form method="POST" action="">
        <div class="txt_field">
          <input type="text" name="name" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        
        

        <input type="submit" value="Login" name="login">
        <!-- Contact Admin ? <button id="showPopup">Show Popup</button> -->
      </form>

      <div class="signup_link">
        Contact Admin ? <a id="showPopup" >Contact us</a>
      </div>
    </div>
    <!-- <button id="showPopup">Show Popup</button> -->

<!-- The popup -->
<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close" id="closePopup">&times;</span>
        <h2>Contect Admin</h2>
        <p>Admin email:admin@123gmail.com</p>
    </div>
</div>
    <script>
        // Get references to the button, popup, and close button
        var showButton = document.getElementById("showPopup");
        var popup = document.getElementById("popup");
        var closeButton = document.getElementById("closePopup");

        // Show the popup when the button is clicked
        showButton.addEventListener("click", function () {
            popup.style.display = "block";
        });

        // Close the popup when the close button is clicked
        closeButton.addEventListener("click", function () {
            popup.style.display = "none";
        });

        // Close the popup when the user clicks anywhere outside of it
        window.addEventListener("click", function (event) {
            if (event.target == popup) {
                popup.style.display = "none";
            }
        });
       
    </script>
    <style>
      #err{
        margin-left: 8px;

      padding-left: 5px;
      border-left: 2px solid red;
      background-color: #a6a6a6;

      }
      .popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
}
#showPopup{
  cursor: pointer;
}
.popup-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  width: 300px;
  height: 150px;
}

/* Close button styles */
.close {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
}
      </style>
  </body>
</html>
