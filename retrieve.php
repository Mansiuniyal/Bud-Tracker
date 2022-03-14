<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM interns_data WHERE WHERE `ManagersID'` = '".$_SESSION['ID']."' ");
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
</head>
<body>
<table>
<tr>
<td>Username</td>
<td>Email</td>
<td>Task Id</td>
<td>Description</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["Username"]; ?></td>
<td><?php echo $row["Email"]; ?></td>
<td><?php echo $row["Task_Id"]; ?></td>
<td><?php echo $row["Description"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html> 