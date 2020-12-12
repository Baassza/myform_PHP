<?php
include "Connections/conn.php";
include "islogin.php";
islogin();
$conn=database_connect();
mysqli_set_charset($conn,"utf8");
$data=[];
$sql="SELECT ID, name, sername, gender, birthday, edu, home, img FROM form";
$q=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($q)){
    array_push($data,$row);
}
echo json_encode($data);
?>
