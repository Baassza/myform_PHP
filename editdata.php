<?php
include "Connections/conn.php";
include "islogin.php";
if(!isset($_POST["name"])||!isset($_POST["sername"])||!isset($_POST["sexsel"])||!isset($_POST["sex"])||!isset($_POST["birthday"])||!isset($_POST["edu"])||!isset($_POST["home"])){
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
if(!isset($_FILES["img"])){
    $ID=mysqli_real_escape_string($conn,$_POST["ID"]);
    $name=mysqli_real_escape_string($conn,$_POST["name"]);
    $sername=mysqli_real_escape_string($conn,$_POST["sername"]);
    $selsex=mysqli_real_escape_string($conn,$_POST["sexsel"]);
    $sex=mysqli_real_escape_string($conn,$_POST["sex"]);
    $birthday=mysqli_real_escape_string($conn,$_POST["birthday"]);
    $edu=mysqli_real_escape_string($conn,$_POST["edu"]);
    $home=mysqli_real_escape_string($conn,$_POST["home"]);
    $insertsex="";
    if($selsex=="อื่นๆ"){
        $insertsex=$sex;
    }
    else{
        $insertsex=$selsex;
    }
    $sql="UPDATE form SET name='$name',sername='$sername',gender='$insertsex',birthday='$birthday',edu='$edu',home='$home' WHERE ID= $ID";
    $q=mysqli_query($conn,$sql);

}
else {
    $ID=mysqli_real_escape_string($conn,$_POST["ID"]);
    $sql="SELECT img FROM form WHERE ID =$ID";
    $q=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($q);
    if($num<=0){
        header( "location: loginpage.php" );
        exit(0);
    }
    else{
        $path="upload/";
        $data=mysqli_fetch_assoc($q);
        $path.=basename($data["img"]);
        if(!unlink($path)){
            http_response_code(500);
            exit(0);
        }
    }
    $dir = 'upload/';
    $imagename = generateRandomString() . basename($_FILES["img"]["name"]);
    $filename = $dir . $imagename;
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $filename)) {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $sername = mysqli_real_escape_string($conn, $_POST["sername"]);
        $selsex = mysqli_real_escape_string($conn, $_POST["sexsel"]);
        $sex = mysqli_real_escape_string($conn, $_POST["sex"]);
        $birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
        $edu = mysqli_real_escape_string($conn, $_POST["edu"]);
        $home = mysqli_real_escape_string($conn, $_POST["home"]);
        $img = mysqli_real_escape_string($conn, $imagename);
        $insertsex = "";
        if ($selsex == "อื่นๆ") {
            $insertsex = $sex;
        } else {
            $insertsex = $selsex;
        }
    }
else{
        http_response_code(500);
        exit(0);
    }
    $sql="UPDATE form SET name='$name',sername='$sername',gender='$insertsex',birthday='$birthday',edu='$edu',home='$home',img='$img' WHERE ID= $ID";
    $q=mysqli_query($conn,$sql);
}




?>