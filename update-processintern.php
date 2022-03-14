<?php
include_once 'database.php';
if(count($_POST)>0) 
{
	if ($_POST['Progress']=="100%") 
	{
mysqli_query($conn,"UPDATE interns_data set Comments='" . $_POST['Comments'] . "', Progress='" . $_POST['Progress'] . "', project_status= 'Demo Scheduled' WHERE ID='" . $_POST['ID'] . "'");
		$message = "Record Modified Successfully";
	}
	else
	{
		mysqli_query($conn,"UPDATE interns_data set Comments='" . $_POST['Comments'] . "', Progress='" . $_POST['Progress'] . "' WHERE ID='" . $_POST['ID'] . "'");
		$message = "Record Modified Successfully";
	}
}
$result = mysqli_query($conn,"SELECT * FROM interns_data WHERE ID='" . $_GET['ID'] . "'");
$row= mysqli_fetch_array($result);
?>
<br><br><br><br><br>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="" style="text-align: center; border:black; border-width:5px; border-style:solid;background-color:lightgrey; " >
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<h2><a href="loggedinpageintern.php" > <button type="button" class="btn btn-success">Back To Main Page</button></a></h2>
</div>
<h3>ID: </h3>
<input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
<input type="number" name="ID"  value="<?php echo $row['ID']; ?>">
<br>
<h3>Comments:</h3> 
<input type="text" name="Comments" class="txtField" value="<?php echo $row['Comments']; ?>">
<br>
<h3>Progress: </h3>
<input type="text" name="Progress" class="txtField" value="<?php echo $row['project_status']; ?>">
<br>
<!--<h3>Project status: </h3>
<input type="text" name="project_status" class="txtField" value="<?php echo $row['project_status']; ?>" >
<br>-->
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>