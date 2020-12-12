<?php
if(!isset($_POST["username"])||!isset($_POST["password"])){
	 header("location: loginpage.php" );
	exit(0);
}
include 'Connections/conn.php';
$conn=database_connect();
$username=mysqli_real_escape_string($conn,$_POST["username"]);
$password=mysqli_real_escape_string($conn,$_POST["password"]);
$sql="SELECT username, password FROM login WHERE username = '$username'";
$q=mysqli_query($conn,$sql);
$numrow=mysqli_num_rows($q);
if($numrow<=0){
  http_response_code(401);
  exit();
}
else{
    $hast="";
    while ($data=mysqli_fetch_assoc($q)){
       $hast=$data["password"];
    }
    if(password_verify($password,$hast)){
        session_start();
        $_SESSION["username"]=$username;
        http_response_code(200);
        exit();
    }
    else{
        http_response_code(401);
        exit();
    }
}
?>