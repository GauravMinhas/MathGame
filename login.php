<?php 
    session_start();// need to do this at the beginning of every file in which you want acesss to the session variables
    
    // if login already done, no need to do it again.
    if(isset($_SESSION['loginId'])  && strcmp($_SESSION['loginId'],"not set") !=0 )
    {
        header("Location:index.php");
    } else {
        // display error msg if the prompt was redirected here form pages other than logout.php
        
        // init the login variable
        $_SESSION['loginId'] = "not set";
    }
    include("include/header.php");
?>
<div class="row">
	<div class="col-md-10 col-sm-offset-1 text-center">
		<h1>Please login to enjoy your math game:</h1>
	</div>
</div>

<form action="check.php" method="post"  class="form-horizontal">

	<div class="form-group">        
	  <div class="col-sm-offset-2 col-sm-10">
		<label>
			<span style="color:red">
				<?php 
					echo $_SESSION['errorMsg'];
					session_unset($_SESSION['errorMsg']);
				?>
			</span>
		</label>
	  </div>
	</div>

	<div class="form-group">
		<label for="userId" class="col-md-3 control-label">Email: </label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="userId" name="userId" placeholder="Email" size="30">
		</div>
	</div>

	<div class="form-group">
		<label for="password" class="col-md-3 control-label">Password: </label>
		<div class="col-md-9">
			<input type="text" class="form-control" id="password" name="password" placeholder="Password" size="30">
		</div>
	</div>
	<div class="form-group">        
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
	</div>
</form>
<?php include("include/footer.php"); ?>
