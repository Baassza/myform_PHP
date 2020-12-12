<?php
function islogin(){
    session_start();
    if(!isset($_SESSION["username"])){
        header("location: loginpage.php" );
        exit(0);
    }

}

?>
