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
    
    /*if(isset($_POST["search"])){
        header("Location:search.php");
    }*/
    
    ?>
      
    <!-- Navbar -->
    <nav id="navbar">
      <ul style="height: 100vh;" class="navbar-items flexbox-col">
        <li class="navbar-logo flexbox-left">
            <h6>DCS</h6>
        </li>
        <li class="navbar-item flexbox-left">
          <a class="navbar-item-inner flexbox-left" href="staff.php">
            <div class="navbar-item-inner-icon-wrapper flexbox">
              <i class="ri-home-4-fill"></i>
            </div>
            <span class="link-text">HOME</span>
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
   
	
	<div style="text-align:center">
	<h1><u>Filtering Records</u></h1><br><br><br>
	<form action="action.php" method="POST">
		<label for="panelID">Select the Panel ID:</label>
		
			<select name="search1" id="panel" required>
            <option value="IDF 1:05:0">IDF 1:05:0</option>
            <option value="IDF 1:05:1">IDF 1:05:1</option>
            <option value="IDF 1:05:2">IDF 1:05:2</option>
            <option value="IDF 1:05:3">IDF 1:05:3</option>
            <option value="IDF 1:05:4">IDF 1:05:4</option>
            <option value="IDF 1:05:5">IDF 1:05:5</option>
			<option value="IDF 1:05:6">IDF 1:05:6</option>
        </select>
				
            <br><br><br>
            <div>
                <label > Select the Panel Location : </label>
        <select name="menu1" id="menu1" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
        </select>
		
		<br><br>
		
		<input type="submit" name="filter" value="FILTER">
       
        
            </div>










