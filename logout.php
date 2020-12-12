<?php
if(!isset($_POST["logout"])){
	 header( "location: loginpage.php" );
	 exit(0);
	
}
else if($_POST["logout"]=="logoutlogout"){
session_start();
session_destroy();
}
else{
	header( "location: loginpage.php" );
	 exit(0);
}
?>
