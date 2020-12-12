<?php
include "Connections/conn.php";
include "islogin.php";
islogin();
if(!isset($_POST["ID"])){
    header( "location: loginpage.php" );
    exit(0);
}
$conn=database_connect();
$ID=mysqli_real_escape_string($conn,$_POST["ID"]);
$path="upload/";
$sql="SELECT img FROM form WHERE ID =$ID";
$q=mysqli_query($conn,$sql);
$num=mysqli_num_rows($q);
if($num<=0){
    header( "location: loginpage.php" );
    exit(0);
}
else{
    $data=mysqli_fetch_assoc($q);
    $path.=basename($data["img"]);
    if(!unlink($path)){
        http_response_code(500);
        exit();
    }
    else{
        $sql="DELETE FROM form WHERE ID =$ID";
        $q=mysqli_query($conn,$sql);
    }
}
?>
