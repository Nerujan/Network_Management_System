<?php
session_start();
if(!(isset($_SESSION['name'])&& isset($_SESSION['role'])&& $_SESSION['role']=='admin')){
  header('location:login.php');
  exit();
}

?>
<html>
	<head>
		<title>View Staff Page</title>
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
          <a class="navbar-item-inner flexbox-left " href="logout.php">

            <div class="navbar-item-inner-icon-wrapper flexbox logout2">
              <i class="ri-login-box-fill"></i>
            </div>
            <span class="link-text">LOG OUT</span>
          </a>
        
        </li>
      </ul>
    </nav>

		<div class="table-container">
        <table class="content-table">
            <thead>
              <tr>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Action</th>
              </tr>
            </thead>
            <tbody>
				<?php
				include('connection.php');
				
				$query="SELECT * FROM users";
				$result=mysqli_query($con,$query);
				
				while($row=mysqli_fetch_assoc($result))
				{
					$id=$row['id'];
					?>
					<tr>
					   <td><?php echo $row['name'];?></td>
					   <td><?php echo $row['email'];?></td>
					   <td><?php echo $row['role'];?></td>

					   <td>
						   <a href="updateStaff.php?id=<?php echo $row['id'];?>">Edit</a>
						   <a href="action.php?id=<?php echo $row['id'];?>">Delete</a>
					   </td>
				   </tr>
				   <?php }  ?>
            
            </tbody>
          </table>
        </div>
	</body>
</html>
		 
				
				
				
				
				
				
				
		 
	