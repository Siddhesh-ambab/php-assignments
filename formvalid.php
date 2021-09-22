<html>  
<head>  
<style>  
.error {color: #red;} 
h3 {color: green;}
h4 {color: red;} 
</style>  
</head>  
<body>    
  <?php 

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (empty($_POST['fname'])) {
			$fnameErr = "First name is required";
		}
		else{
			$fname = $_POST['fname'];
			if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
				$fnameErr = "Enter valid name";
			}
		}

		if (empty($_POST['lname'])) {
			$lnameErr = "Last name is required";
		}
		else{
			$lname = $_POST['lname'];
			if(!preg_match("/^[a-zA-Z-' ]*$/", $lname)){
				$lnameErr = "Enter valid name";
			}
		}

		if (empty($_POST['email'])) {
			$emailErr = "Email is required";
		}
		else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr = "Enter valid email";
			}
		}

		if (empty($_POST['pass1'])) {
			$passErr1 = "Password id required";
		}
		else{
			$pass1 = $_POST['pass1'];
			if ($_POST['pass1'] != $_POST['pass2']) {
				$passErr2 = "Enter valid password";
			}
			else{
				$pass2 = $_POST['pass2'];
			}
			
		}

		if (empty($_POST['pass2'])) {
			$passErr2 = "Password is required";
		}
	}
 ?>

  
<h2>Registration Form</h2>   
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
    First Name:   
    <input type="text" name="fname">  
    <span class="error">* <?php echo $fnameErr; ?> </span>  
    <br><br> 

    Last Name: <input type="text" name="lname">
    <span class="error">* <?php echo $lnameErr; ?></span>
    <br><br>

    E-mail:   
    <input type="text" name="email">  
    <span class="error">* <?php echo $emailErr; ?> </span>  
    <br><br>  
    Create password:   
    <input type="password" name="pass1">  
    <span class="error">* <?php echo $passErr1; ?> </span>  
    <br><br> 
    Confirm password:   
    <input type="password" name="pass2">  
    <span class="error">* <?php echo $passErr2; ?> </span>  
    <br><br> 
    <input type="submit" name="submit" value="Submit">   
  
    <br><br>                             
</form>  
 <?php

	$pass=$_POST['pass1'];
	if (isset($_POST['submit'])) {
		if ($fnameErr =="" &&$lnameErr == "" && $emailErr == ""&& $passErr1 == "" && $passErr2 =="") 
		{
			if ($pass==123456)
			{
				echo "<h3> <b>You have sucessfully registered.</b> </h3>";  
				echo "<h2>Your Input:</h2>";  
				echo "Fist name: " .$fname;  
				echo "<br>"; 
				echo "Last name: " .$lname; 
				echo "<br>";
				echo "Email: " .$email; 
			}
			else
			{
				echo "Password is not correct";
			}
		}
		else{
			 echo "<h4> <b>You didn't filled up the form correctly.</b> </h4>"; 
		}
	}
?> 
</body>  
</html> 
