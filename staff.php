<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" 
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <link rel="stylesheet" href="staffStyle.css">

    
</head>
<body>
    <?php 
    include("connection.php");
    if(isset($_POST["logout"])){
        header("Location:logout.php");
        exit();
    }
    
   
    ?>
    <h1>Network Management System</h1>
    
    <form action="staff.php" method = "post">
        <input type="submit" id="logout2" name = "logout" value = "Logout">
    </form>        
	<form action="action.php" method="post">
        <select  class="select" name="search">
		<option value="networkRoom">Network Room</option>
		<option value="auditorium">Auditorium</option>
		<option value="CSL1">CSL1</option>
		<option value="CSL2">CSL2</option>
		<option value="CSL3">CSL3</option>
		<option value="CSL4">CSL4</option>
		<option value="researchRoom">Research Room</option>
	</select>
	<input type="submit" id="search" name="display" value="Filter" >
    <input type="submit" name="view" value="View All" id="search">
</form>
    <!-- <div class="calendar-container"> -->
        
        <!-- <div class="calendar">
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
