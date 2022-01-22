<?php
  $r="";
  $msg="";
  include "dbs.php";
  if(isset($_POST['submit1'])) 
  {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $sql="INSERT INTO users (Name,Email,Phone) VALUES ('$name','$email','$phone');"; 
  $r=mysqli_query($con,$sql);
   // or die("cannot insert data in database.".mysqli_error($con));
  if ($r) 
  {
  // echo  $msg="1";
  
  http_response_code(200);
  echo json_encode(array("statusCode"=>200, "status"=>1));
  }
  else
  {
  // echo  $msg="0";
  http_response_code(500);
   echo json_encode(array("statusCode"=>201, "status"=>0));
  }
}
?>
