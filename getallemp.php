<?php
include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


	if(isset($request->empid))
{
	if($request->empid !='')
	{
	 $sql="update employees set code = '".$request->code."',name ='".$request->name."',
	email ='".$request->email."',phone='".$request->phone."',designation='".$request->designation."',
	gender = '".$request->gender."',is_active ='".$request->isactive."' where id = '".$request->empid."' ";
	if($result = mysqli_query($mysqli,$sql))
	{
		$res='updated';
		echo json_encode($res);
	}
	}
	else{
		 $sql="insert into employees(code,name,email,phone,designation,gender,is_active)
	values('".$request->code."','".$request->name."','".$request->email."','".$request->phone."','".$request->designation."','".$request->gender."','".$request->isactive."')";
	if($result = mysqli_query($mysqli,$sql))
	{
		$res='pass';
		echo json_encode($res);
	}
	}
	
}
	 
		

else if(isset($_GET['empdata']))
{
	$sql = "SELECT * FROM employees where id = '".$_GET['empdata']."'";
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

else if(isset($_GET['delemp']))
{
	$sql = "delete FROM employees where id = '".$_GET['delemp']."'";
	if($result = mysqli_query($mysqli,$sql))
		{
		$rows='Deleted';

		echo json_encode($rows);
		}
}

else{
  $sql = "SELECT * FROM employees";
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