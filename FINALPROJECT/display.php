<?php
session_start();
$data = isset($_SESSION['data']) ? $_SESSION['data'] : array();
//unset($_SESSION['data']); // Clear the session data

include('connection.php'); // Include your database connection
?>
<!-- // Display the data in a table -->
<div class="table-container">
<?php 
echo "<table border=2;>";
echo "<tr>
		<th>Switch Location</th>
		<th>Switch IP</th>
		<th>Panel ID</th>
		<th>Patch Panel ID</th>
		<th>Switch ID</th>
		<th>User Name</th>
		<th>Terminal Location</th>
		<th>VLAN</th>
		<th>Terminal IP</th>
		<th>Devices Connected</th>
		<th>Remarks</th>
		</tr>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row['switchLocation'] . "</td>";
	echo "<td>" . $row['switchIP'] . "</td>";
	echo "<td>" . $row['panelID'] . "</td>";
	echo "<td>" . $row['patchpanelID'] . "</td>";
	echo "<td>" . $row['switchID'] . "</td>";
    echo "<td>" . $row['userName'] . "</td>";
	echo "<td>" . $row['portLocation'] . "</td>";
	echo "<td>" . $row['vlan'] . "</td>";
	echo "<td>" . $row['portIP'] . "</td>";
	echo "<td>" . $row['goods'] . "</td>";
	echo "<td>" . $row['Remarks'] . "</td>";
    // Display other columns as needed
    echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
	</div>	
<style>
	*{
    font-family: "Poppins", sans-serif;
  }
.table-container{
  width: 100%;
  text-align: center;
  align-items: center;
}
table {
  border-collapse: collapse;
  margin: 30px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin-left: auto;
  margin-right: auto;
  width: 92%;
}

table tr {
  background-color: #394867cc;
  color: #ffffff;
  text-align: center;
  font-weight: bold;
  height: 20px;
  /* padding:20px 20px; */
}


table th{
  padding:20px;
  background-color: #394867cc;
  color: #ffffff;
  text-align: center;
  font-weight: bold;
  height: 20px;
}
td{
  padding: 12px 15px;
  text-align: center;
}

tr {
  border-bottom: 1px solid #dddddd;
}

tr:nth-of-type(even) {
  background-color: #f3f3f3;
  color: #9BA4B5;
}
tr:nth-of-type(odd) {
  background-color: #ffffff;
  color: #464e5d;
}

tr:last-of-type {
  border-bottom: 2px solid #203485a3;
}

tr.active-row {
  font-weight: bold;
  color: #9BA4B5;
}
</style>