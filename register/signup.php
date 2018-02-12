<?php  
        $servername = "localhost";  
		$username = "root";  
       $password="";   
       $conn = mysql_connect ($servername , $username , $password) or die("unable to connect to host");  
       $sql = mysql_select_db ('testing',$conn) or die("unable to connect to database"); 
	   //echo $conn;
	   //echo "</br>";
	   //echo $sql;
	   //echo "</br>";
?>
<?php
// define variables and set to empty values
$name = $sex = $age = $district =$city=$state= $mobno="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $sex=test_input($_POST["sex"]);
  $age= test_input($_POST["age"]);
  $district=test_input($_POST["district"]);
  $city=test_input($_POST["city"]);
  $state=test_input($_POST["state"]);
  $mobno=test_input($_POST["mobno"]);
$password=test_input($_POST["password"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php

	$sql3 = "INSERT INTO blooddonators (name,sex,age,district,city,mobno,state,password) VALUES ('$name', '$sex', '$age','$district','$city','$mobno','$state','$password')";
  //echo $sql3;
  if (mysql_query($sql3,$conn) == TRUE)
  {
		//echo "New record created successfully";
		//$level=0;
		//echo $us;
		$message="Thanks for registering. Proceed to log in";
		echo "<script type='text/javascript'>;alert('$message');window.location.href='www.google.com';</script>";
  }
  else
  {
	  $message="User already registered. Proceed to log in";
		echo "<script type='text/javascript'>;alert('$message');window.location.href='www.youtube.com';</script>";
  }
?>