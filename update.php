<?php
session_start();
$data = isset($_SESSION['data']) ? $_SESSION['data'] : array();
//unset($_SESSION['data']); // Clear the session data




include("connection.php");

foreach ($data as $row)
{
	

?>

<div class="container">
    <form action="action.php" method="POST" class="myfm">
            <div>
				<h2 class="hd">Update Details</h2>
			</div>
		

			<input type="hidden" name="panelID" value="<?php echo $row['panelID']; ?>">
			<input type="hidden" name="patchpanelID" value="<?php echo $row['patchpanelID']; ?>">

            <div><label for="switchLocation">SwitchLocation: </label>
            <input type="text" name="switchLocation" value="<?php echo $row['switchLocation'];?>"></div>

            <div><label for="switchIP">switchIP </label>
            <input type="text" name="switchIP" value="<?php echo $row['switchIP'];  ?>"></div>
			
			
			<div><label for="switchID">switchID </label>
            <input type="text" name="switchID" value="<?php echo $row['switchID'];  ?>"></div>
			
			<div><label for="userName">userName </label>
            <input type="text" name="userName" value="<?php echo $row['userName'];  ?>"></div>
			
			<div><label for="portLocation">portLocation </label>
            <input type="text" name="portLocation" value="<?php echo $row['portLocation'];  ?>"></div>
            
			
			<div><label for="vlan">vlan </label>
            <input type="text" name="vlan" value="<?php echo $row['vlan'];  ?>"></div>
            
			
			<div><label for="portIP">portIP </label>
            <input type="text" name="portIP" value="<?php echo $row['portIP'];  ?>"></div>
            
			
			<div><label for="goods">goods </label>
            <input type="text" name="goods" value="<?php echo $row['goods'];  ?>"></div>
            
			
			<div><label for="Remarks">Remarks </label>
            <input type="text" name="Remarks" value="<?php echo $row['Remarks'];  ?>"></div>
            
			
			
			
			<input type="submit" name="update" class="btn" value="UPDATE">
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