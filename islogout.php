<?php
function islogout(){
    session_start();
    if(isset($_SESSION["username"])){
        header("location: index.php" );
        exit(0);
    }

}

?>