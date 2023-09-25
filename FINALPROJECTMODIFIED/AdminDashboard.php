<?php
session_start();
if(!(isset($_SESSION['name'])&& isset($_SESSION['role'])&& $_SESSION['role']=='admin')){
  header('location:login.php');
  exit();
}

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

    <!-- <--Main -->
      <h1 class="heading">Admin</h1> 
      <div class="buttonalign">
        <button class="openBtn" onclick="document.location='addform.php'">
          <div class="iconadd"><i class="ri-add-line"></i></div>
            Add<br>
          <label class="labeladd">To add new data to the table.</label>
        </button>
    
        
        
        <div id="editmyOverlay" class="overlay">
          <span class="closebtn" onclick="closeSearch('editmyOverlay')" title="Close Overlay">×</span>
          <div class="overlay-content">
            <form action="action.php" method="post">
              <div>
                <label id="dis11">Panel ID: </label>
				<select name="search1" id="panel" required>
            <option value="IDF 1:05:0">IDF 1:05:0</option>
            <option value="IDF 1:05:1">IDF 1:05:1</option>
            <option value="IDF 1:05:2">IDF 1:05:2</option>
            <option value="IDF 1:05:3">IDF 1:05:3</option>
            <option value="IDF 1:05:4">IDF 1:05:4</option>
            <option value="IDF 1:05:5">IDF 1:05:5</option>
			<option value="IDF 1:05:6">IDF 1:05:6</option>
        </select>
				
            </div><br><br><br>
            <div>
                <label id="dis11">Patch Panel ID: </label>
        <select name="menu1" id="menu1" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
        </select>

       
        <select name="menu2" id="menu2" required>
            <?php
                for ($i = 1; $i <= 24; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
            </div>
			<br><br><br>
              <input type="submit" id="edit" name="edit" value="UPDATE">
			  <input type="submit" id="deleteItem" name="deleteItem" value="DELETE">
            </form>
          </div>
        </div>

    <button class="openBtn" onclick="openSearch('displaymyOverlay')">
      <div class="iconadd"><i class="ri-tv-2-line"></div></i>
      Display<br>
      <label class="labeladd">To show the table.</label>
    </button>
    <div id="displaymyOverlay" class="overlay">
      <div class="overlay-content">
        <form action="action.php" method="post">
          <label id="dis11">Switch Location:</label>
      <select  class="select" name="search">
        <option value="networkRoom">Network Room</option>
        <option value="auditorium">Auditorium</option> 
        <option value="CSL1">CSL1</option>
        <option value="CSL2">CSL2</option>
        <option value="CSL3">CSL3</option>
        <option value="CSL4">CSL4</option>
        <option value="researchRoom">Research Room</option>
      </select>	
      
      <button  type="submit" id="dis1" name="display"><i class="fa fa-search"></i></button>
    </form>
  </div>
  <span class="closebtn" onclick="closeSearch('displaymyOverlay')" title="Close Overlay">×</span>
</div>

    <button class="openBtn" onclick="openSearch('editmyOverlay')">
      <div class="iconadd"><i class="ri-edit-2-line"></div></i>
      Edit<br>
      <label class="labeladd">To edit the changes.</label>
    </button>
    </div>

<br><br><br><br><br>
<h6 style="font-size:25px;text-align:center;color:black;"><u>Recently Added Record</u></h6>
      <div class="table-container">
        <table class="content-table">
            <thead>
              <tr>
                <th>Switch Location</th>
				<th>Switch IP</th>
                <th>Panel ID </th>
                <th>Patch Panel ID</th>
                 <th>Switch Port ID</th> 
                <th>User Name</th> 
                <th>Terminal Location</th>
                <th>VLAN</th>
                 <th>Terminal IP</th>
                <th>Devices Connected</th> 
                <th>Remarks</th>
				
			</tr>
            </thead>
            <tbody>
            <?php
				$addData=array();
				if(isset($_COOKIE['addition']))
				{
					 $dataString=$_COOKIE['addition'];
					$addData=unserialize($dataString);
				}
				foreach ($addData as $row)
				{
	
                
                ?>
                <tr>
                    <td><?php echo $row['switchLocation']; ?></td>
					<td><?php echo $row['switchIP']; ?></td>
                    <td><?php echo $row['panelID']; ?></td>
                    <td><?php echo $row['patchpanelID']; ?></td>
                    <td><?php  echo $row['switchID'] ; ?></td> 
                    <td><?php echo $row['userName']  ;?></td> 
                    <td><?php echo $row['portLocation']; ?></td>
                    <td><?php echo $row['vlan']; ?></td>
                    <td><?php  echo $row['portIP'] ;?></td>
                    <td><?php  echo  $row['goods']; ?></td>
                    <td><?php echo $row['Remarks']; ?></td>
					
					
					
					
					
					
                </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
        <script>
          function openSearch(overlayId) {
          document.getElementById(overlayId).style.display = "block";
          }
          
          function closeSearch(overlayId) {
          document.getElementById(overlayId).style.display = "none";
          }
          $(document).ready(function(){
                $(".hamburger .hamburger__inner").click(function(){
                $(".wrapper").toggleClass("active")
                })
        
                $(".top_navbar .fas").click(function(){
                $(".profile_dd").toggleClass("active");
                });
            })
            if(window.history.replaceState){
                window.history.replaceState(null,null,window.location.href);
            }
          </script>
          <style>
            
           
            </style>
          
</body>
</html>