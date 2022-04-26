<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account-O'clock</title>
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
			
        <table width="955" height="692" border="0" align="center">
          <tbody>
            <tr>
              <td width="540" height="686" align="center">&nbsp;<div class="loginBox">
   
      
				<img src="images/logo1.png">
				<h1>Welcome back,</h1>
 <form action="loginpg.php" method="post">
	  <p>&nbsp;</p>
          <p>&nbsp;</p>
            <p>
              <input type="text" name="txtEmail" placeholder="Enter your Email">
            </p>
          <p>&nbsp; </p>
            <p>
              
              <input type="password" name="txtPassword" placeholder="**************">
            </p>
    <p><a href="#"> Forgot Password?</a></p>
        <p>
			
              <input type="submit" name="btnsubmit" id="btnsubmit" value="LOG IN">
    </p>
	 <p>
			
              <input type="submit" name="btnsubmit1" id="btnsubmit1" value="LOG OUT">
    </p>
	 <p><span class="back"><a class="act1" href="Home.html" >home</a></span></p>
    <p>&nbsp; </p>
	  
              
    </form>
    </div>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
              <td width="405" align="center" valign="top" background="images/bg.jpg">
			    <div class="text">New User?</div>
				  <br><div class="text2">Register and get a new experience</div>
			  <span class="sign"><a class="act" href="signuppage.php" >SIGN UP</a></span></td>
            </tr>
          </tbody>
        </table>
     

</body>
	<?php

if(isset($_POST["btnsubmit"])){
    $username = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];
 	$mongo =  new MongoDB\Driver\Manager("mongodb://localhost:27017");

	$filter      = ['Email' => $username];
	$options = [];

	$query = new \MongoDB\Driver\Query($filter, $options);
	$rows   = $mongo->executeQuery('OCLOCK.user', $query);

	foreach ($rows as $document) {
	  $Email=$document->Email;
	  $Password=$document->Password;
		if(($Email==$username) && ($Password==$password)){
			$_SESSION["userName"]=$username;
			header('location:home.html');
		}
		else{
			echo "Username/Password do not match";
		}
		
	}
}
?>
	<?php

if(isset($_POST["btnsubmit1"])){
	session_destroy();
	unset($_SESSION["userName"]);
	echo "LOGOUT successfull";
	header('location:loginpg.php');
}
	?>



</html>