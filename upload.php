<?php
include "islogin.php";
include "Connections/conn.php";
if(!isset($_POST["name"])||!isset($_POST["sername"])||!isset($_POST["sexsel"])||!isset($_POST["sex"])||!isset($_POST["birthday"])||!isset($_POST["edu"])||!isset($_POST["home"])||!isset($_FILES["img"])){
	 header( "location: loginpage.php" );
	 exit(0);
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
islogin();
$conn=database_connect();
mysqli_set_charset($conn,"utf8");
$dir='upload/';
$imagename=generateRandomString().basename($_FILES["img"]["name"]);
$filename=$dir.$imagename;
if(move_uploaded_file($_FILES["img"]["tmp_name"],$filename)){

$name=mysqli_real_escape_string($conn,$_POST["name"]);
$sername=mysqli_real_escape_string($conn,$_POST["sername"]);
$selsex=mysqli_real_escape_string($conn,$_POST["sexsel"]);
$sex=mysqli_real_escape_string($conn,$_POST["sex"]);
$birthday=mysqli_real_escape_string($conn,$_POST["birthday"]);
$edu=mysqli_real_escape_string($conn,$_POST["edu"]);
$home=mysqli_real_escape_string($conn,$_POST["home"]);
$img=mysqli_real_escape_string($conn,$imagename);

$insertsex="";
if($selsex=="อื่นๆ"){
   $insertsex=$sex;
}
else{
    $insertsex=$selsex;
}

$sql="INSERT INTO form(name,sername,gender,birthday,edu,home,img) 
VALUES 
('$name','$sername','$insertsex','$birthday','$edu','$home','$img')";
$q=mysqli_query($conn,$sql);

}
else{
    http_response_code(500);
    exit(0);
}


?>
