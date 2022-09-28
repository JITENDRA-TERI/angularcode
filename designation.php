<?php
include_once("database.php");

$getdesignation="select * from designation";

if($result = mysqli_query($mysqli,$getdesignation))
{
$rows = array();
while($row = mysqli_fetch_assoc($result))
{
$rows[] = $row;
}

echo json_encode($rows);
}
?>