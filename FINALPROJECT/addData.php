<?php
session_start();
include ('connection.php');

if(isset($_POST['add'])){
	$switchLocation=$_POST['switchLocation'];
	$switchIP=$_POST['switchIP'];
	$panelID=$_POST['panel'];
	$menu1Value = $_POST["menu1"];
    $menu2Value = $_POST["menu2"];

    // Concatenate the selected values into a single string
    $combinedValue = $menu1Value . $menu2Value;
	//$patchpanelID=$_POST['patchpanelID'];
	$switchID=$_POST['switchID'];
	$userName=$_POST['userName'];
	$portLocation=$_POST['portLocation'];
	$vlan=$_POST['vlan'];
	
	$goods=$_POST['goods'];
	$Remarks=$_POST['Remarks'];
	$_SESSION['action']="add";
	

    $portIP = $_POST['portIP'];
	if (isset($portIP) && !empty($portIP))
	{
		if (filter_var($portIP, FILTER_VALIDATE_IP))
		{
		 $query="INSERT INTO resource(switchLocation,switchIP,panelID,patchpanelID,switchID,userName,portLocation,vlan,portIP,goods,Remarks) VALUES 
		('$switchLocation','$switchIP','$panelID','$combinedValue','$switchID','$userName','$portLocation','$vlan','$portIP','$goods','$Remarks')";
		$result=mysqli_query($con,$query);
		
		   //procedural style
		//$result->query($query);  //Object Oriented style

			if($result)
			{
			$query1="SELECT * FROM resource WHERE panelID='$panelID' AND patchpanelID='$combinedValue'";
				$result1=mysqli_query($con,$query1);
			
			$addData=array();
		
	   

				if ($result1) 
				{
					while($row=mysqli_fetch_assoc($result1))
					{
						
						$addData[]=$row;
						
					}
					//echo $data[0][0];
				}

				else 
				{
					echo "Error: " . mysqli_error($con);
				}
				
				$dataString=serialize($addData);
				setcookie("addition",$dataString,time()+(10 * 365 * 24 * 60 * 60),'/');
				//$_SESSION['addData']=$addData;
				header("location: AdminDashboard.php");
				 exit();
			}
		}
		else
		{
			echo '<script>alert("Invalid IP Address.")</script>';
			echo '<script>window.location.href = "addform.php";</script>';
			exit;
		}
	}
	
	else
	{
		$query="INSERT INTO resource(switchLocation,switchIP,panelID,patchpanelID,switchID,userName,portLocation,vlan,portIP,goods,Remarks) VALUES 
		('$switchLocation','$switchIP','$panelID','$combinedValue','$switchID','$userName','$portLocation','$vlan','$portIP','$goods','$Remarks')";
		$result=mysqli_query($con,$query);
		
		   //procedural style
		//$result->query($query);  //Object Oriented style

			if($result)
			{
			$query1="SELECT * FROM resource WHERE panelID='$panelID' AND patchpanelID='$combinedValue'";
				$result1=mysqli_query($con,$query1);
			
			$addData=array();
		
	   

				if ($result1) 
				{
					while($row=mysqli_fetch_assoc($result1))
					{
						
						$addData[]=$row;
						
					}
					//echo $data[0][0];
				}

				else 
				{
					echo "Error: " . mysqli_error($con);
				}
				
				$dataString=serialize($addData);
				setcookie("addition",$dataString,time()+(10 * 365 * 24 * 60 * 60),'/');
				//$_SESSION['addData']=$addData;
				header("location: AdminDashboard.php");
				 exit();
			}
		}
}
	
        

	
	



?>