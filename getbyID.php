<?php
include 'Connections/conn.php';
include 'islogin.php';
islogin();
if(!isset($_POST["ID"])){
    header("location: loginpage.php" );
	exit(0);
}
$data=[];
$conn=database_connect();
mysqli_set_charset($conn,"utf8");
$ID=mysqli_real_escape_string($conn,$_POST["ID"]);
$sql="SELECT  name, sername, gender,birthday,edu,home,img FROM form WHERE ID = $ID";
$q=mysqli_query($conn,$sql);
$numrow=mysqli_num_rows($q);
if($numrow<=0){
  http_response_code(404);
  exit();
}
else{
    while ($row=mysqli_fetch_assoc($q))
    {
        array_push($data,$row);

    }
    echo json_encode($data);
}
?>
