<?php
function database_connect(){
$conn = mysqli_connect("localhost", "root", "rootroot","myform");
return $conn;
}
?>