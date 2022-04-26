<?php session_start();
if(!isset($_SESSION["userName"]))
{
	header('Location:loginpg.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>CONTACT-O'clock</title>
	<link rel="stylesheet" type="text/css" href="css/contactStyle.css">
	</head>
<script type="text/javascript">

function validateEmail()
{
	var email = document.getElementById("txtemail").value;
	var at=email.indexOf("@");
	var dt = email.lastIndexOf(".");
	var len = email.length;
	
	if((at<2) || (dt - at < 2) || (len - dt < 2))
		{
			alert("Please enter valid email address");
			return false;
		}
	
	return true;
}
function validateAll()
{
	if(validateEmail())
	{
		alert("Thanks for your feedback !!");
	}
			
	else
	{
		event.preventDefault();
	}
	
}
	</script>
<body>
	<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>If you have complain or review contact us from below:</p>
  </div>
  <div class="row">
    <div class="column">
      <img src="images/contact.jpg" style="width:100%">
    </div>
    <div class="column">
      <form action="contact.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Your name..">
        <label for="lname">Email</label>
        <input type="text" id="txtemail" name="txtemail" placeholder="Your email.." required>
        <label for="country">Country</label>
        <input type="text" id="txtcountry" name="txtcountry" placeholder="Sri Lanka..">
        <label for="subject">Comment</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" onClick="validateAll()">
      </form>
    </div>
  </div>
</div>
	<div class="container2">
	<div class="footer">
		
		  <div class="pic1"><img src="images/location.png" width="100"></div>
		  <div class="address"> <h3> Address</h3>
			<ul>
				<h4>O'clock group</h4>
				<li>32/B</li>
				<li>Colombo</li>
			</ul>
		</div>
		<div class="phone">
			<img src="images/phone.png">
			<h3>Phone</h3>
			<ul>
				<h4>O'clock group</h4>
				<li>0112354567</li>
				<h4>FAX</h4>
				<li>0864561121</li>
				<h4>Emergency Contact</h4>
				<li>0776567678</li>
			</ul>
		</div>
		<div class="email">
			<img src="images/email.png">
			<h3>Email</h3>
			<ul>
				<h4>O'clock group</h4>
				<li>o.clock@gmial.com</li>
				<h4>Emplloyement Opportunities</h4>
				<li>oclock.employee@gmail.com</li>
			</ul>
		</div>
		</div>
	</div>
</body>
	<?php
if(isset($_POST["btnsubmit"]))
{
		   $fname=$_POST["fname"];
		   $email=$_POST["txtemail"];
		   $country=$_POST["txtcountry"];
		   $comment=$_POST["subject"];


try {
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $db=new MongoDB\Driver\BulkWrite;
	
    $query =  [
		'Firstname'=>$fname,
		'Email'=>$email,
		'Country'=>$country,
		'Comment'=>$comment
	];
     $db->insert($query);
   $mng->executeBulkWrite('OCLOCK.comment',$db);
	
    
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";       
}
	
	}

?>
</html>
