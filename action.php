<?php 
include ('connection.php');
session_start();

if(isset($_POST['display']))
{
	$search=$_POST['search'];
	
	$query="SELECT * FROM resource WHERE switchLocation='$search'";
	$result=mysqli_query($con,$query);
	
	$data=array();
   

	if ($result) 
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$data[]=$row;
		}
	}

	else 
	{
		echo "Error: " . mysqli_error($con);
	}


$_SESSION['data']=$data;
header("Location:display.php");
exit();
}
if(isset($_POST['view'])){
	header('location:detailsStaff.php');
}
if(isset($_POST['edit']))
{
	
	$search1=$_POST['search1'];
	$search2=$_POST['search2'];
	
	$query="SELECT * FROM resource WHERE panelID='$search1' AND patchpanelID='$search2'";
	
	$result=mysqli_query($con,$query);
	
	$data=array();
   

if ($result) 
{
	while($row=mysqli_fetch_assoc($result))
	{
		$data[]=$row;
	}
}

else 
{
    echo "Error: " . mysqli_error($con);
}




$_SESSION['data']=$data;
header("Location:update.php");
exit();
}

if(isset($_POST['update']))
{
	$switchLocation = $_POST['switchLocation'];
	$switchIP = $_POST['switchIP'];
    
    $switchID = $_POST['switchID'];
	$userName = $_POST['userName'];
	$portLocation = $_POST['portLocation'];
	$vlan = $_POST['vlan'];
    $portIP = $_POST['portIP'];
    $goods = $_POST['goods'];
    $Remarks = $_POST['Remarks'];
	
	
	
	$panelID = $_POST['panelID'];
    $patchpanelID = $_POST['patchpanelID'];
	
    $query = "UPDATE resource SET switchLocation='$switchLocation',switchIP='$switchIP',
	switchID='$switchID',
	userName='$userName',portLocation='$portLocation', vlan='$vlan',portIP='$portIP',
	goods='$goods',Remarks='$Remarks' 
	WHERE panelID='$panelID' AND patchpanelID='$patchpanelID'";
				
	$result=mysqli_query($con,$query);
    if($result)
	{
		$query1="SELECT * FROM resource WHERE panelID='$panelID' AND patchpanelID='$patchpanelID'";
		$result1=mysqli_query($con,$query1);
	
	$data=array();
	
   

		if ($result1) 
		{
			while($row=mysqli_fetch_assoc($result1))
			{
				
				$data[]=$row;
			}
			//echo $data[0][0];
		}

		else 
		{
			echo "Error: " . mysqli_error($con);
		}
		
		
		$_SESSION['data']=$data;
        header("location: display.php");
         exit();
	

	}
        

	else
	{
		echo "Error updating data: "  .mysqli_connect_error();
	}
	



}

if(isset($_POST['editStaff']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	
	$query="UPDATE users SET name='$name', email='$email' WHERE id='$id'";
	$result=mysqli_query($con,$query);
	if($result)
	{
		header("Location:viewStaff.php");
		exit();
	}
	else
		{
		echo "Error updating data: "  .mysqli_connect_error($con);
	}
}
		

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$query="DELETE FROM users WHERE id='$id'";
	$result=mysqli_query($con,$query);
	if($result)
	{
		header("Location:viewStaff.php");
		exit();
	}
	else
	{
		echo "Error updating data: "  .mysqli_connect_error();
	}
}
	


mysqli_close($con); // Close the database connection
?>
