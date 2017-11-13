<?php 
    session_start();
    // need to do this at the beginning of every file in which you want acess to the session variables
    if(strcmp($_SESSION['loginId'],"not set") ==0 || is_null($_SESSION['loginId']))
    {
        $_SESSION['errorMsg'] = "Please login first.";
		 header("Location:login.php");
    }

    include("include/header.php");
	
?>

		<br />
<?php 
	$num1 = rand(0,50);
    $num2 = rand(0,50);
	$score = $_SESSION['score'];
	$operator_array = array("+", "-"); 
	$random = rand(0,1);
    $operator = $operator_array[$random];
	$resultMsg = "";
	$resultString = "";
	if(isset($_POST['answer'])) {
	    extract($_POST);
		if(!is_numeric($user_answer)) {
			$resultMsg = "<span style='color:red'>You must enter a number</span>";
		} else {
			if($user_answer === $answer) {
				$resultMsg = "<span style='color:green'>CORRECT</span>";
				$resultString = "<span style='color:green'>".$first_number." ".$form_operator." ".$second_number." = ".$answer."</span>";
				$score[0] = $form_score + 1;
				$score[1] = $form_total + 1;
				
			} else {
				$resultMsg = "<span style='color:red'>INCORRECT,".$first_number." ".$form_operator." ".$second_number." is ".$answer." </span>";
				$resultString = "<span style='color:red'>".$first_number." ".$form_operator." ".$second_number." = ".$answer."</span>";
				$score[1] = $form_total + 1;
			}
		}
		$_SESSION['score'] = $score;
	} else {
	$resultMsg = "";
	}
	$answer = 0;
	if ($random == 0) {
		$answer = $num1 + $num2;
	} else  {
		$answer = $num1 - $num2;
	}
	echo '
			<div class="col-md-3"></div> 
            <div class="col-md-6"></div>
            <div class="col-md-3">
			<a href="logout.php" class="btn btn-default">Logout</a>
			</div>
			<br/>
	';
	echo '<div class="panel panel-primary">
					<div class="panel-body">
						<h2 class="text-on-pannel text-primary">
							<strong >Math Game</strong>
						</h2>';
	
	
	echo '<form action="index.php" method="post" role="form" class="form-horizontal">

        
			<input type="hidden" name="first_number" value="'.$num1.'" />
			<input type="hidden" name="form_operator" value="'.$operator.'" />
			<input type="hidden" name="second_number" value="'.$num2.'" />
			<input type="hidden" name="form_total" value="'.$score[1].'" />
			<input type="hidden" name="form_score" value="'.$score[0].'" />
			<input type="hidden" name="answer" value="'.$answer.'" />
				';
	echo "<br/>";			
	echo '<div class="form-group">
             <div class="col-xs-12 text-center">
                <label class="col-md-1 col-md-offset-4">'.$num1.'</label>
                <label class="col-md-1">'.$operator.'
                </label>
                <label class="col-md-2">'.$num2.'</label>
                <div class="col-md-4"></div>
				</div>
            </div>';
	
	echo '<div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                    <input type="text" class="form-control" id="user_answer" name="user_answer" placeholder="Enter answer" size="30"></div> 
                <div class="col-md-3"></div>  
            </div>';
	echo '<div class="form-group">
                <div class="col-xs-12 text-center">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
            </div>

        </form>';
		
	echo '<hr style="width: 100%; color: $d3d3d3; height: 2px; background-color:#d3d3d3 "/>   

        <div class="row">
            <div class="col-xs-12 text-center ">
			<p>'.$resultMsg.'</p>
             </div>
             
        </div>';
		
	echo '<div class="row">
            <div class="col-xs-12 text-center"><p>Score:'.$score[0].'/'.$score[1].'</p>
                
        </div>';
		
	echo '</div></div>';
	

	include("include/footer.php");
?>