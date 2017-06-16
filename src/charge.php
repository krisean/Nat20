<?php
	session_start();
	require_once 'model/db_connect.php';
	$custID = $_SESSION['custID'];
	$cartID = $_SESSION['cartID'];
	$username = $_SESSION['username'];
	require_once 'RemoveAllFromCart.php';
?>

<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/default.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Nat20: Payment Successful</title>
</head>
<div id="header">
  <a href="/" id="logo">Nat20</a>
</div>

<div style="clear:both;"></div>
<ul id="menu" class="menu">
  <li><a href="index.php" title="Main page"><span>Home</span></a></li>
  <li><a href="products.php" title="Products"><span>Products</span></a></li>
  <li><a href="about.php" title="About Us"><span>About</span></a></li>
  <li><a href="contact.php" title="Contact Us"><span>Contact</span></a></li>
</ul>

<br>
<br>

<?php require_once('./config.php');
  $token  = filter_input(INPUT_POST, 'stripeToken', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'stripeEmail', FILTER_VALIDATE_EMAIL);
  $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
  

  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $amount,
      'currency' => 'cad'
  ));
  
  $amount = number_format(($amount / 100), 2);

  echo "<h1>Your account has been successfully charged $$amount!</h1><br>
  <p>An order verification Email has been sent to your account to review.</p>
  <span>This page will redirect in 5 seconds.</span>";
  removeAllFromCart($cartID);
  
?>

<body>

<script>setTimeout(function(){window.location.href="/"},5000);</script>

<br><br>
				
<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
</div>

</body>
</html>