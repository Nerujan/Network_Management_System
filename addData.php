<?php
include ('connection.php');
if(isset($_POST['add'])){
	$switchLocation=$_POST['switchLocation'];
	$switchIP=$_POST['switchIP'];
	$panelID=$_POST['panelID'];
	$patchpanelID=$_POST['patchpanelID'];
	$switchID=$_POST['switchID'];
	$userName=$_POST['userName'];
	$portLocation=$_POST['portLocation'];
	$vlan=$_POST['vlan'];
	$portIP=$_POST['portIP'];
	$goods=$_POST['goods'];
	$Remarks=$_POST['Remarks'];
	
	
	$query="INSERT INTO resource(switchLocation,switchIP,panelID,patchpanelID,switchID,userName,portLocation,vlan,portIP,goods,Remarks) VALUES 
	('$switchLocation','$switchIP','$panelID','$patchpanelID','$switchID','$userName','$portLocation','$vlan','$portIP','$goods','$Remarks')";
	$result=mysqli_query($con,$query);   //procedural style
	//$result->query($query);  //Object Oriented style
	
	if($result){
		header("location:AdminDashboard.php");
	}else
	{
		echo "connection error : ".mysqli_connect_error();
	}
}
?>