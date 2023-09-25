
<?php
session_start();
if(!(isset($_SESSION['name'])&& isset($_SESSION['role'])&& $_SESSION['role']=='admin')){
  header('location:login.php');
  exit();
}


	include('connection.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	$query="SELECT * FROM users where id = $id";
	$result=mysqli_query($con,$query);
	
	$row=mysqli_fetch_assoc($result)	

	
?>
<head>
<link rel="stylesheet" href="main.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>
<body>


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

<div class="container">
	
<form action="action.php" method="POST">
	<div class="hdd">
		<h2 class="hd">Update Staff </h2>
    </div>

	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	
	<label for="name">Name: </label>
	<input type="text" name="name" value="<?php echo $row['name'];?>">
	<br><br>
	<label for="email">Email: </label>
	<input type="text" name="email" value="<?php echo $row['email'];  ?>">
	<br><br>
	
	<input type="submit" id="logout5" name="editStaff" value="UPDATE"><br><br>
	
	<?php }		 ?>
</form>
</div>
</body>
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







		</style>