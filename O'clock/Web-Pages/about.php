<?php session_start();
if(!isset($_SESSION["userName"]))
{
	header('Location:loginpg.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ABOUTUS-O'clock</title>
	<link rel="stylesheet" type="text/css" href="css/aboutStyle.css">
</head>

<body>
	<div class="about-section">
  <h1>About Us</h1>
  <p>The best and high quality clocks provide by O'clock company.</p>
  <p>Visuals are such a big part of an About Us page, and Active Campaign does a great job showing off their employees and their office environment. They also have a small section describing what a normal day in the office is like. This helps entice prospective employees while also putting a face to the company and making it more relatable..</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Mark Doe</h2>
        <p class="title">CEO & Founder</p>
        <p>Develop the company and get it into number one.</p>
        <p>jane@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Sean Ross</h2>
        <p class="title">Marketing Director</p>
        <p>Do the best for the development of the company.</p>
        <p>mike@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
        <h2>John Cary</h2>
        <p class="title">Designer</p>
        <p>Improve the creativity for the development of the company.</p>
        <p>john@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>
	<div class="container2">
	<div class="footer">
		<div class="footer1">
  <h3>Dowload O'clock App</h3>
  <p>Download the app for Android and ios mobile.</p>
			</div>
		<div class="app-logo">
          <p><img src="images/android.png" width="208" height="93">
            <img src="images/ios.png" width="192" height="94">
          </p>
          <p>&nbsp;</p>
      </div>
		<div class="footer2 ">
			<img src="images/logo.png">
			<p>Our purpose is to provide best customer service, provide best items and dilevery item on time </p>
		</div>
		<div class="footer3 ">
			<h3>Useful Links</h3>
			<ul>
				<li>Coupons</li>
				<li>BLog Post</li>
				<li>Reyurn Policy</li>
				<li>Join Affiliate</li>
			</ul>
		</div>
		<div class="footer4 ">
			<h3>Follow us</h3>
			<ul>
				<li>Facebook</li>
				<li>Instagram</li>
				<li>YouTube</li>
				<li>Twitter</li>
			</ul>
		</div>

	</div>
</div>
</body>
</html>
