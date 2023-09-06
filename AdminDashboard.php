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
    <title>Main table </title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php 
    include("connection.php");
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
    
        <!-- <div id="displaymyOverlay" class="overlay">
          <span class="closebtn" onclick="closeSearch('displaymyOverlay')" title="Close Overlay">×</span>
          <div class="overlay-content">
            <form action="action.php" method="post">
              <input type="text" placeholder="Enter the Switch Location..." name="search">
              <button type="submit" name="display"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div> -->
        
        <div id="editmyOverlay" class="overlay">
          <span class="closebtn" onclick="closeSearch('editmyOverlay')" title="Close Overlay">×</span>
          <div class="overlay-content">
            <form action="action.php" method="post">
              <input type="text" placeholder="Enter the panel ID..." name="search1">
              <input type="text" placeholder="Enter the patch panel ID..." name="search2"><br>
              <button type="submit" name="edit">UPDATE</button>
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
          <label style="color:white; font-weight:200px">Switch Location:</label>
      <select  class="select" name="search">
        `<option value="networkRoom">Network Room</option>
        <option value="auditorium">Auditorium</option> 
        <option value="CSL1">CSL1</option>
        <option value="CSL2">CSL2</option>
        <option value="CSL3">CSL3</option>
        <option value="CSL4">CSL4</option>
        <option value="researchRoom">Research Room</option>
      </select>
      <div class="center">	
        <button  type="submit" id="dis1" name="display"><i class="fa fa-search"></i></button>
      </div>
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

      <div class="table-container">
        <table class="content-table">
            <thead>
              <tr>
                <th>SW Location</th>
                <th>Panal ID </th>
                <th>patch panel id</th>
                <!-- <th>Switch ID</th> -->
                <!-- <th>User Name</th> -->
                <th>Port Location</th>
                <th>Vlan</th>
                <!-- <th>Port IP</th>
                <th>Goods</th> -->
                <th>Remarks</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM resource" ;
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['panelID'];

                ?>
                <tr>
                    <td><?php echo $row['switchLocation']; ?></td>
                    <td><?php echo $row['panelID']; ?></td>
                    <td><?php echo $row['patchpanelID']; ?></td>
                    <!-- <td><?php /* echo $row['switchID'];*/ ; ?></td> -->
                    <!-- <td><?php /* echo $row['userName']; */ ;?></td> -->
                    <td><?php echo $row['portLocation']; ?></td>
                    <td><?php echo $row['vlan']; ?></td>
                    <!-- <td><?php /* echo $row['portIP']; */ ;?></td>
                    <td><?php /* echo  $row['goods'];*/ ; ?></td> -->
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
            select{
              background: #ffffff;
              width: 100%;
              height: 35px;
              /* color:#14274E; */
              max-height: 40px;
              margin-top: 9px;
              border: none;
              border-bottom: 2px solid #14274E ;
              font-size: large;
              text-align: unset;
              padding-left: 30px;
            }
           
            </style>
          
</body>
</html>