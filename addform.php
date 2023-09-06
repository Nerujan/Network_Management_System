
<?php
session_start();
if(!(isset($_SESSION['name'])&& isset($_SESSION['role'])&& $_SESSION['role']=='admin')){
  header('location:login.php');
  exit();
}

?><html>

<head>
    <title>addData</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<link rel="stylesheet" href="main.css">
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
          <a class="navbar-item-inner flexbox-left" href="updateStaff.php">
            <div class="navbar-item-inner-icon-wrapper flexbox">
              <i class="ri-key-2-fill"></i>
            </div>
            <span class="link-text">PASSWORD</span>
          </a>
        </li>
      
        
        <li style="  margin-top: auto; margin-bottom: 2rem" class="navbar-item flexbox-left logout">
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
        <form action="addData.php" method="post" class="myfm">
			<div>
				<h2 class="hd">Add Form</h2>
			</div>
            <div>
                <label for="switchLocation">SW Location: </label>
                <select name="switchLocation">
                    <option value="networkRoom">Network Room</option>
                    <option value="auditorium">Auditorium</option>
                    <option value="CSL1">CSL1</option>
                    <option value="CSL2">CSL2</option>
                    <option value="CSL3">CSL3</option>
                    <option value="CSL4">CSL4</option>
                    <option value="researchRoom">Research Room</option>
                </select>
            </div>
            <div>
                <label>Switch IP: </label><input type="text" name="switchIP" size="30">
            </div>
            <div>
                <label>Panel ID: </label><input type="text" name="panelID" size="30" required>
            </div>
            <div>
                <label>Patch panel ID[A1-A24]: </label><input type="text" name="patchpanelID" size="30" required>
            </div>
            <div>
                <label>Switch ID: </label><input type="text" name="switchID" size="30">
            </div>
            <div>
                <label>User name: </label><input type="text" name="userName" size="30">
            </div>
            <div>
                <label>Port Location: </label><input type="text" name="portLocation" size="30">
            </div>
            <div>
                <label>Vlan: </label><input type="text" name="vlan" size="30">
            </div>
            <div>
                <label>Port IP: </label><input type="text" name="portIP" size="30">
            </div>
            <div>
                <label>Goods: </label><input type="text" name="goods" size="30">
            </div>
            <div>
                <label>Remarks: </label><textarea id="Remarks" name="Remarks" rows="3" cols="30"></textarea>
            </div>
            <div class="bbb">
				<button class="btn" type="submit" name="add">Add</button>
            </div>
        </form>
    </div>

</html>


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
}
.btn:hover{
	scale: 105%;
	background: black;
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