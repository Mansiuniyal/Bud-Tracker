
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<?php

session_start();
	if(array_key_exists("ID",$_COOKIE)){
		$_SESSION['ID'] = $_COOKIE['ID'];
	}
	if(array_key_exists("ID",$_SESSION)){
		echo "";
	}else{
		header("Location: mywebpage.php");
	}
	
	include("hmanager.php");


include_once 'database.php';
if(count($_POST)>0) {
		mysqli_query($conn,"UPDATE interns_data set ID='" . $_POST['ID'] . "', Username='" . $_POST['Username'] . "', Email='" . $_POST['Email'] . "', Task_Id='" . $_POST['Task_Id'] . "' ,Description='" . $_POST['Description'] . "',End_Date='" . $_POST['End_Date'] . "', Comments='" . $_POST['Comments'] . "',Points='" . $_POST['Points'] . "', `ManagersID` = '".$_SESSION['ID']."' WHERE ID='" . $_POST['ID'] . "'");
         $message = "Record Modified Successfully";
	
	}

$result = mysqli_query($conn,"SELECT * FROM interns_data WHERE ID='" . $_GET['ID'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Intern Data</title>
</head>
<body style="background-image: url('first.jpg'); background-size: 1530px 750px;">

<form name="frmUser" method="post" action="" style="text-align: center; border:black; border-width:5px; border-style:solid; ">

<br>
<div ><p style="color:white;"><?php if(isset($message)) { echo $message; } ?></p>
</div>
<div style="padding-bottom:5px;">

<a href="loggedinpagemanager.php" class="btn btn-primary">Back To the Main Page</a>
</div><br>

<input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
<input type="number" name="ID"  value="<?php echo $row['ID']; ?>" hidden> 
<br>
<p style="color:white;">Username:</p> 
<input type="text" name="Username" class="txtField" value="<?php echo $row['Username']; ?>" readonly>
<br>
<p style="color:white;">Email :</p>
<input type="email" name="Email" class="txtField" value="<?php echo $row['Email']; ?>" readonly>
<br>
<p style="color:white;">Task Id:</p>
<input type="text" name="Task_Id" class="txtField" value="<?php echo $row['Task_Id']; ?>">
<br>
<p style="color:white;">Comments:</p>
<input type="text" name="Comments" class="txtField" value="<?php echo $row['Comments']; ?>">
<br>
<p style="color:white;">Description:</p>
<input type="text" name="Description" class="txtField" value="<?php echo $row['Description']; ?>">
<br>
<p style="color:white;">End Date:</p>
<input type="date" name="End_Date" class="txtField" value="<?php echo $row['End_Date']; ?>">
<br>
<p style="color:white;">Points:</p>
<input type="text" name="Points" class="txtField" value="<?php echo $row['Points']; ?>">
<br>
<input type="number" name="ManagersID" class="txtField" value="<?php echo $row['ManagersID']; ?>" hidden>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">


</form>
</body>
</html>