<?php
    
    session_start();
   if(strcmp($_SESSION['loginId'],"not set") ==0 || isset($_SESSION['loginId'])==0)
    {
        header("Location:login.php");
    }
else{
	
    session_destroy();
	header("Location:login.php");

}

?>