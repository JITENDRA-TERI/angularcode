<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

if(isset($_POST['email']))
{
	$sql = "SELECT * FROM users where email ='".$_POST['email']."'";
if($result = mysqli_query($mysqli,$sql))
{
$rows = array();
while($row = mysqli_fetch_assoc($result))
{
$rows[] = $row;
}

echo json_encode($rows);
}
}
else if(isset($_GET['id']))
{
	$sql = "SELECT * FROM users where id ='".$_GET['id']."'";
if($result = mysqli_query($mysqli,$sql))
{
$rows = array();
while($row = mysqli_fetch_assoc($result))
{
$rows[] = $row;
}

echo json_encode($rows);
}
}
else if(isset($_GET['delid']))
{
	$sql = "Delete  FROM users where id ='".$_GET['delid']."'";
if($result = mysqli_query($mysqli,$sql))
{
$response ='Dleted successfully';

echo json_encode($response);
}
}
else{

 $sql = "SELECT * FROM users";
if($result = mysqli_query($mysqli,$sql))
{
$rows = array();
while($row = mysqli_fetch_assoc($result))
{
$rows[] = $row;
}

echo json_encode($rows);
}
}


?>