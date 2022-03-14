
<?php
session_start();
	if(array_key_exists("ID",$_COOKIE)){
		$_SESSION['ID'] = $_COOKIE['ID'];
	}
	if(array_key_exists("ID",$_SESSION)){
		echo "Logged In! <a href = 'mywebpage.php?logout=1'>Log out</a></p>";
	}else{
		header("Location: mywebpage.php");
	}
	
	include("hmanager.php");

include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM interns_data WHERE `ID` = '".$_SESSION['ID']."' ");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
   <title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "LucIDa Sans Unicode", "LucIDa Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-wIDth: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solID #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
		
		#color{
			
			
			background-color: white;
			border-style: inset;
			
			margin-right:1000px;
			
			
}
			
			
		}
		
		
	</style>

	<nav class="navbar navbar-light bg-faded navbar-fixed-top " style="background-color: #8FC7D3    ">
  

  

    <div class="pull-xs-right">
    	
      <a href ='mywebpageintern.php?logout=1'>
        <button class="btn btn-primary-outline fa fa-thumbs-up" type="submit"><span style="color:white">Logout</span></button></a>
    </div>

</nav></br>
 </head>
<body>

<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class="data-table">
	  <thead>
			<tr>
				<th>Task Id</th>
				<th>Comments</th>
				<th>Points</th>
				<th>Progress</th>
				<th>Description</th>
				<th>End Date</th>
				<th>Project Status</th>

			

				
			</tr>
		</thead>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <!--<td><a href="update-process.php?ID=<?php //echo $row["ID"]; ?>"><?php //echo $row["ID"]; ?></a></td>-->
		<td><?php echo $row["Task_Id"]; ?></td>
		<td><a href="update-processintern.php?ID=<?php echo $row["ID"]; ?>"><?php echo $row["Comments"]; ?></a></td>
		<td><?php echo $row["Points"]; ?></td>
		<td><?php echo $row["Progress"]; ?></td>
		<td><?php echo $row["Description"]; ?></td>
		<td><?php echo $row["End_Date"]; ?></td>
		<td><?php echo $row["project_status"]; ?></td>
		<!--<td><a href="update-process.php?ID=<?php //echo $row["ID"]; ?>">Update</a></td>-->
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>

<?php

	include("footermanager.php");
?>