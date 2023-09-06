<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <link rel="stylesheet" href="staffStyle.css">
</head>
<body>
    <?php 
    include("connection.php");
    include("connection.php");
    if(isset($_POST["logout"])){
        header("Location:logout.php");
        exit();
    }
    
    if(isset($_POST["search"])){
        header("Location:display.php");
    }
    
    ?>
    
    <h1>Network Management System</h1>
    <form action="staff.php" method = "post">
    <input type="submit" name ="search" value = "Search" id="search">
    <input type="submit" name ="logout" value = "Logout" id="logout">
    <!-- <select  class="select" name="search">
		<option value="networkRoom">Network Room</option>
		<option value="auditorium">Auditorium</option>
		<option value="CSL1">CSL1</option>
		<option value="CSL2">CSL2</option>
		<option value="CSL3">CSL3</option>
		<option value="CSL4">CSL4</option>
		<option value="researchRoom">Research Room</option>
	</select> -->
	<!-- <button  type="submit" name="display">Search</button> -->
    </form>
    <div class="table-container">
    <table class="content-table">
            <thead>
                <th>SW Location</th>
                <th>Panal ID </th>
                <th>patch panel id</th>
                <th>Switch ID</th>
                <th>User Name</th>
                <th>Port Location</th>
                <th>Vlan</th>
                <th>Port IP</th>
                <!-- <th>Goods</th> -->
                <th>Remarks</th>
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
                    <td><?php echo $row['switchID']; ?></td>
                    <td><?php echo $row['userName']; ?></td>
                    <td><?php echo $row['portLocation']; ?></td>
                    <td><?php echo $row['vlan']; ?></td>
                    <td><?php echo $row['portIP']; ?></td>
                    <!-- <td><?php /* echo $row['goods']; */ ; ?></td> -->
                    <td><?php echo $row['Remarks']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    

    <!-- <div class="calendar-container">
        
        <div class="calendar">
        <h3>Calander</h3>
            <div class="month">
            <button id="prevYearBtn">Previous Year</button>
            <button id="nextYearBtn">Next Year</button>
                <div class="month-name" id="currentMonth">August 2023</div>
                <button id="prevMonthBtn">Previous</button>
                <button id="nextMonthBtn">Next</button>
                
            </div>
            <div class="days">
                <div class="day">Sun</div>
                <div class="day">Mon</div>
                <div class="day">Tue</div>
                <div class="day">Wed</div>
                <div class="day">Thu</div>
                <div class="day">Fri</div>
                <div class="day">Sat</div>
            </div>
            <div class="dates" id="dates">
                Calendar dates will be generated here by JavaScript
            </div>
        </div>
    </div>
    <script src="script.js"></script> -->
    
    
</body>
</html>