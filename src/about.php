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
<title>Nat20: About</title>

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
<article style="font-size: 20px; width:100%; background: #FFF; 
    background-image: -webkit-linear-gradient(top, transparent 0%, rgba(0,0,0,.05) 100%);
    -webkit-transition: 1s all;
    background-image: -webkit-linear-gradient(left top, 
        transparent 0%, transparent 25%, 
        rgba(0,0,0,.15) 25%, rgba(0,0,0,.15) 50%, 
        transparent 50%, transparent 75%, 
        rgba(0,0,0,.15) 75%);
  background-size: 4px 4px;
    box-shadow: 
        0 0 0 1px rgba(0,0,0,.4) inset, 
        0 0 20px -5px rgba(0,0,0,.4),
        0 0 0px 3px #FFF inset; padding:20px;">
<h2>About Us</h2>
	<p>
	After abandoning a life of crime, manufacturing and distributing illegal fire arms, Alex and Kalib met
	the high-rolling dice enthusiast Tofer with a pitch to better use their 3D printing skills. 
	After months of procrastination and doubt, Alex approached the others with the inspiring statement,
	</p>
	<br>
	<p style="margin-left:100px;">
	"Sometimes you gotta roll the dice."
	</p>
	<br>
	<p>
	Jesus looked at them intently and said, 
	"Humanly speaking, it is impossible. But with God everything is possible." (Matthew 19:26)
	Starting with the colour grey, representing their dark past, these three fellows along with the power of the holy spirit continued their journey
	of redemption adding colours from the corners of the Earth to their collection.
	</p>
	<br>
	<p>
	Fast forward 2 months, people are starting to notice that Nat20 was creating some of the highest
	quality products. People are always saying, "Woah, jeez, Nat20; how do you make such good high quality
	products for such a reasonable price?" And the very humble folks at Nat20 just grin back at their loyal sheep.
	</p>
	<br>
</article>
<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
</div>

</body>
</html>
