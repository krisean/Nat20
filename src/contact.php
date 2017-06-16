<?php
	session_start();
	require_once 'model/db_connect.php';
	require_once 'GuestCart.php';
	if (!isset($_SESSION['custID'], $_SESSION['cartID'], $_SESSION['username'])) {		
		$_SESSION['custID'] = '-1';
		$_SESSION['cartID'] = createGuest();
		$_SESSION['username'] = 'guest';
	}
	$custID = $_SESSION['custID'];
	$cartID = $_SESSION['cartID'];
	$username = $_SESSION['username'];
	?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="css/default.css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Nat20: Contact</title>

<style> 

#myCarousel {
	width: 90%;
	height: 90%;
	margin: auto;
}

input[type=text] {
    width: 100%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url(http://www.freeiconspng.com/uploads/search-icon-png-4.png);
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    
}

</style>

<?php
require_once 'cartCount.php';
$cart = getCartCount($cartID);
?>

</head>
<div id="cartContainer">
	<p id="cartvalue"><?php if(isset($cart)){echo $cart;} else{echo 0;} ?></p>
	<a href="cart.php">
		<img id="cartico" src="images/cart.png"></img>
		<p id ="cartlabel"> Cart </p>
	</a>
</div>
<div id="signMenu">
  	<?php
		if($custID == -1){
	?>
  	<a id="signup" href="signup.php" title="Sign Up"><span>Sign Up</span></a>
	<div id="linebreak">
		<p>|<p>
	</div>
	<?php
		}
		else{
			?>
			<?php
	}?>
	<?php
		if($custID == -1){
	?>
			<a id="signin" href="signin.php" title="Sign In"><span>Sign In</span></a>
	<?php
		}
		else{
			?>
			<a id="signout" href="signout.php" title="Sign Out"><span>Sign Out</span></a>
	<?php
	}?>
	<br style="clear:both;">
	<div id="welcome">
		<p>Welcome, <?php echo $username?></p>
	</div>
</div>
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

</header>

<body>

<h2>
OFFICE LOCATIONS
</h2>

Washington D.C.
<p style="width:300px;">
U.S. Senate<br>
332 Dirksen Building<br>
Washington, D.C. 20510<br>
tel (202) 224-5141<br>
fax (202) 228-0776<br>
Get Directions<br>
Burlington<br>


</p>
<p style="width:400px;">
1 Church St, 3rd Floor<br>
Burlington, VT 05401<br>
tel (802) 862-0697<br>
tel (800) 339-9834<br>
fax (802) 860-6370<br>
Get Directions<br>
St. Johnsbury<br>
</p>
<p style="width:300px;">
357 Western Ave. Suite 1B<br>
St. Johnsbury, VT 05819<br>
tel (800) 339-9834<br>
fax (802) 860-6370<br>
Get Directions<br>
</p>
<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
</div>

</body>
</html>
