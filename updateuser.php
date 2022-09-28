
<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

if(($request[0]->id !='') && (isset($request[0]->id)))
{
$request = json_decode($postdata);
$name = trim($request[0]->username);
$pwd = mysqli_real_escape_string($mysqli, trim($request[0]->password));
$email = mysqli_real_escape_string($mysqli, trim($request[0]->email));
 $sql = "update users set username ='".$name."',
password ='".$pwd."',email ='".$email."'
where id ='".$request[0]->id."' ";
if ($mysqli->query($sql) === TRUE) {
$authdata = 'upadted ';
echo json_encode($authdata);
}
}

?>