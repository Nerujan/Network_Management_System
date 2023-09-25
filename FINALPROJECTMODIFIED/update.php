<?php
session_start();
$data = isset($_SESSION['data']) ? $_SESSION['data'] : array();
//unset($_SESSION['data']); // Clear the session data




include("connection.php");

foreach ($data as $row)
{
	$switchLocation=$row['switchLocation'];

?>
<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <title>Main table </title>
</head>
<body>
<?php 
    include("connection.php");
    if(isset($_POST["logout"])){
        header("Location:login.php");
    }
    
    if(isset($_POST["search"])){
        header("Location:search.php");
    }
    
    ?>
      
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

<div class="container">
    <form action="action.php" method="POST" class="myfm">
            <div>
				<h2 class="hd">Update Details</h2>
			</div>
		<script>
        // JavaScript to update the combinedValue input field
        var menu1 = document.getElementById("menu1");
        var menu2 = document.getElementById("menu2");
        var combinedValue = document.getElementById("combinedValue");

        // Initial update
        updateCombinedValue();

        // Event listeners to update combinedValue whenever menu1 or menu2 changes
        menu1.addEventListener("change", updateCombinedValue);
        menu2.addEventListener("change", updateCombinedValue);

        function updateCombinedValue() {
            combinedValue.value = menu1.value + menu2.value;
        }
    </script>

			<input type="hidden" name="search1" value="<?php echo $row['panelID']; ?>">
			<input type="hidden" name="combinedValue" value="<?php echo $row['patchpanelID']; ?>">

            <div><label for="switchLocation">Switch Location: </label>
			
			<select name="switchLocation">
                    <option value="networkRoom"<?php if ($switchLocation == 'Network Room') echo 'selected'; ?>>Network Room</option>
                    <option value="auditorium" <?php if ($switchLocation == 'Auditorium') echo 'selected'; ?>>Auditorium</option>
                    <option value="CSL1" <?php if ($switchLocation == 'CSL1') echo 'selected'; ?>>CSL1</option>
                    <option value="CSL2" <?php if ($switchLocation == 'CSL2') echo 'selected'; ?>>CSL2</option>
                    <option value="CSL3" <?php if ($switchLocation == 'CSL3') echo 'selected'; ?>>CSL3</option>
                    <option value="CSL4" <?php if ($switchLocation == 'CSL4') echo 'selected'; ?>>CSL4</option>
                    <option value="researchRoom" <?php if ($switchLocation == 'Research Room') echo 'selected'; ?>>Research Room</option>
                </select>
            

            <div><label for="switchIP">Switch IP </label>
            <input type="text" name="switchIP" value="<?php echo $row['switchIP'];  ?>"></div>
			
			
			<div><label for="switchID">Switch Port ID </label>
            <input type="text" name="switchID" value="<?php echo $row['switchID'];  ?>"></div>
			
			<div><label for="userName">User Name </label>
            <input type="text" name="userName" value="<?php echo $row['userName'];  ?>"></div>
			
			<div><label for="portLocation">Terminal Location </label>
            <input type="text" name="portLocation" value="<?php echo $row['portLocation'];  ?>"></div>
            
			
			<div><label for="vlan">VLAN </label>
            <input type="text" name="vlan" value="<?php echo $row['vlan'];  ?>"></div>
            
			
			<div><label for="portIP">Terminal IP </label>
            <input type="text" name="portIP" value="<?php echo $row['portIP'];  ?>"></div>
            
			
			<div><label for="goods">Devices Connected </label>
            <input type="text" name="goods" value="<?php echo $row['goods'];  ?>"></div>
            
			
			<div><label for="Remarks">Remarks </label>
            <input type="text" name="Remarks" value="<?php echo $row['Remarks'];  ?>"></div>
            
			
			
			
			<input type="submit" name="update" class="btn" value="UPDATE">
			<input type="submit" name="deleteItem" class="dbtn" value="DELETE">
			  </select>
			  <br><br>
		</div>
<?php

}

mysqli_close($con);?>

<style>
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
	
	background: rgb(228, 228, 228);
}
.container{
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	background: rgb(228, 228, 228);
}
.myfm div{
	padding: 5px 15px 5px 3px;
	color: black;
}
.myfm div:hover{
	background: rgb(183, 223, 255);
}
.hd{
	background: rgb(0, 67, 122);
	color:#fff;
	text-align: center;
	padding: 10px;
	font-size: larger;
}
.myfm label{
	width: 200px;
	display: inline-block;
	color: rgb(0, 67, 122);
	
}
.myfm input{
	width: 300px;
	height: 35px;
	display: inline-block;
	border: 2px solid rgb(0, 67, 122);
	padding-left: 10px;
	transition: 0.4s;
}
.myfm select{
	color: black;
	background: white;
	width: 298px;
	height: 35px;
	border: 2px solid rgb(0, 67, 122);
}
.myfm textarea{
	width: 300px;
	height: 90px;
	display: inline-block;
	border: 2px solid rgb(0, 67, 122);
	color: rgb(0, 0, 0);
	padding: 10px;
	transition: 0.4s;
}
.myfm textarea:hover{
	scale: 105%;
	border: 4px solid rgb(0, 0, 0);
}
.myfm input:hover{
scale: 105%;
border: 4px solid rgb(0, 0, 0);
}

.bbb{
	display: flex;
	justify-content: right;
	align-items: center;
	background: none;
}

.btn{
	background: rgb(0, 67, 122);
	width: 300px;
	height: 50px;
	color: #fff;
	font-weight: bold;
	font-size: large;
	border: none;
	transition: 0.2s;
    margin-left: 206px;
}
.btn:hover{
	scale: 105%;
	background: black;
}
</style>