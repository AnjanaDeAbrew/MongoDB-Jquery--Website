<?php session_start();
if(!isset($_SESSION["userName"]))
{
	header('Location:loginpg.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PAYMENT-O'clock</title>
<link rel="stylesheet" type="text/css" href="css/chkoutStyle.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
	<script type="text/javascript">
		function validateAll()
		{
			alert("Your payment is success");
		}
	</script>
<body>
<div class="container">
<form action="checkouut.php" method="post">
  <table width="729" height="807" border="0" align="center">
    <tbody>
      <tr>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td height="89" colspan="2"><img src="images/logo1.png">
          <h2>PAYMENT</h2>
      
      </tr>
      <tr>
        <td height="53" colspan="2"><h3>Provide further information</h3></td>
      </tr>
      <tr>

        <td width="663"><input type="text" name="txtcarnum" id="txtcarnum" placeholder="Card number" maxlength="16" required></td>
      </tr>
		
      <tr>
     
        <td><input type="text" name="txtholder" id="txtholder" placeholder="Cardholder Name" required></td>
      </tr>
      <tr>
        
        <td><input type="text" name="txtmonth" id="txtmonth"  placeholder="Expire month" maxlength="1" required></td>
      </tr>
      <tr>
        
        <td><input type="text" name="txtyear" id="txtyear"  placeholder="Expire year" maxlength="4" required></td>
      </tr>
      <tr>

        <td><input type="text" name="txtcvv" id="txtcvv"  placeholder="CVV" maxlength="3" required></td>
      </tr>
          
          <p> 
            <label><br />
              <br />
              <br />
            </label>
          </p>
      </tr>
      <tr>
		  <td colspan="2"> <p>Your payment information is safe with us</p></td>     
      </tr>
      <tr>
        <td colspan="2"> <p>
            <input type="submit" name="btnsubmit" id="btnsubmit" value="Cofirm&Pay" onClick="validateAll()">
			</p>  </td>
      </tr>
  
    </tbody>
  </table>
</form></div>
</body>
<?php
if(isset($_POST["btnsubmit"]))
{
		   $cnum=$_POST["txtcarnum"];
		   $holdername=$_POST["txtholder"];
		   $month=$_POST["txtmonth"];
		   $year=$_POST["txtyear"];
		   $number=$_POST["txtcvv"];


try {
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $db=new MongoDB\Driver\BulkWrite;
	
    $query =  [
		'Cardnumber'=>$cnum,
		'Email'=>$_SESSION["userName"],
		'Holdername'=>$holdername,
		'Month'=>$month,
		'Year'=>$year,
		'CvvNumber'=>$number
	];
     $db->insert($query);
   $mng->executeBulkWrite('OCLOCK.creditcard',$db);
	
	
    
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
