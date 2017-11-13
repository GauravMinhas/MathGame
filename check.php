<?php 
    session_start();
    // need to do this at the beginning of every file in which you want acess to the session variables
    $text = file("./credentials.config");
    $flag=0;
    foreach($text as $line){
        $line = str_replace(PHP_EOL,'', $line);
        $data = explode(",",$line);
        if(strcmp($data[0], $_POST['userId']) == 0 && strcmp($data[1], $_POST['password'])==0 ){
            $flag=1;  
        }
    }
    $_SESSION['loginId'] = $_POST['userId']; 
    if($flag==0) {
       $_SESSION['errorMsg'] = "Wrong credentials.";
        unset($_SESSION['loginId']);
        header("Location:login.php");
        
   } else if(strcmp($_SESSION['loginId'],"not set") ==0 || isset($_SESSION['loginId'])==0)
    {
        $_SESSION['errorMsg'] = "Please login first.";
        header("Location:login.php");
    }
    else{
       $_SESSION['loginId'] = $_POST['userId'];   
        header("Location:index.php");
		$score = array(0,0);
		$_SESSION['score'] = $score;
   }
    

?>
