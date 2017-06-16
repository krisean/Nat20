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
<title>Nat20: Products</title>
	</head>

<?php

require_once 'GetProducts.php';
require_once 'AddToCart.php';
require_once 'cartCount.php';
?>

<?php
	
$D20 = Get20();
$D12 = Get12();
$D10 = Get10();
$D8 = Get8();
$D6 = Get6();
$D4 = Get4();
$perc = GetPerc();
	
$productID = filter_input(INPUT_POST, 'prodid', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
if (isset($productID, $quantity, $cartID)) {
        AddToCart($productID, $quantity, $cartID);
    }
$cart = getCartCount($cartID);
?>
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

<br>
<br>

<body>

	<div style="clear:both";></div><br>
	
	<article id="products">
	<a>20 Sided Dice</a><br>
	<div id="pricing-table">
	<?php foreach ($D20 as $product) { ?>
		<div class="plan">
   			<ul id="<?php echo $product['Prod_id']; ?>" display="inline";>
    			<li><h3><?php echo $product['Prod_name']; ?><span><img src="<?php echo $product['Prod_image']; ?>" width="42" class="img-circle"></span></h3></li>
				<li style="height:45px;"><?php echo $product['Prod_desc']; ?></li>
    			<li><?php echo $product['Prod_price']; ?></li>
				<form action="products.php" method="post">
					<li>
						<input type="number" name ="quantity" min="1" max="100" value="1" id="quantity"/>	
					</li>
					<li>
					<div id="addtobutton">	
						<input type="hidden" name="prodid" value="<?php echo $product['Prod_id']; ?>">
						<div id="addtobutton">	
							<input class="addtocart" type="submit" value="Add to Cart">
						</div>
					</li>
				</form>	
  			</ul>
		</div>
		<?php } ?>
	</div>
	</article>
	
	<div style="clear:both";></div><br>
	
	<article id="products">
	<a>12 Sided Dice</a><br>
	<div id="pricing-table">
	<?php foreach ($D12 as $product) { ?>
		<div class="plan">
   			<ul id="<?php echo $product['Prod_id']; ?>" display="inline";>
    			<li><h3><?php echo $product['Prod_name']; ?><span><img src="<?php echo $product['Prod_image']; ?>" width="42" class="img-circle"></span></h3></li>
				<li style="height:45px;"><?php echo $product['Prod_desc']; ?></li>
    			<li><?php echo $product['Prod_price']; ?></li>
				<form action="products.php" method="post">
					<li>
						<input type="number" name ="quantity" min="1" max="100" value="1" id="quantity"/>	
					</li>
					<li>
					<div id="addtobutton">	
						<input type="hidden" name="prodid" value="<?php echo $product['Prod_id']; ?>">
						<div id="addtobutton">	
							<input class="addtocart" type="submit" value="Add to Cart">
						</div>
					</li>
				</form>	
  			</ul>
		</div>
		<?php } ?>
	</div>
	</article>
	
	<div style="clear:both";></div><br>

	<article id="products">
	<a>10 Sided Dice</a><br>
	<div id="pricing-table">
	<?php foreach ($D10 as $product) { ?>
		<div class="plan">
   			<ul id="<?php echo $product['Prod_id']; ?>" display="inline";>
    			<li><h3><?php echo $product['Prod_name']; ?><span><img src="<?php echo $product['Prod_image']; ?>" width="42" class="img-circle"></span></h3></li>
				<li style="height:45px;"><?php echo $product['Prod_desc']; ?></li>
    			<li><?php echo $product['Prod_price']; ?></li>
				<form action="products.php" method="post">
					<li>
						<input type="number" name ="quantity" min="1" max="100" value="1" id="quantity"/>	
					</li>
					<li>
					<div id="addtobutton">	
						<input type="hidden" name="prodid" value="<?php echo $product['Prod_id']; ?>">
						<div id="addtobutton">	
							<input class="addtocart" type="submit" value="Add to Cart">
						</div>
					</li>
				</form>	
  			</ul>
		</div>
		<?php } ?>
	</div>
	</article>

	<div style="clear:both";></div><br>

	<article id="products">
	<a>8 Sided Dice</a><br>
	<div id="pricing-table">
	<?php foreach ($D8 as $product) { ?>
		<div class="plan">
   			<ul id="<?php echo $product['Prod_id']; ?>" display="inline";>
    			<li><h3><?php echo $product['Prod_name']; ?><span><img src="<?php echo $product['Prod_image']; ?>" width="42" class="img-circle"></span></h3></li>
				<li style="height:45px;"><?php echo $product['Prod_desc']; ?></li>
    			<li><?php echo $product['Prod_price']; ?></li>
				<form action="products.php" method="post">
					<li>
						<input type="number" name ="quantity" min="1" max="100" value="1" id="quantity"/>	
					</li>
					<li>
					<div id="addtobutton">	
						<input type="hidden" name="prodid" value="<?php echo $product['Prod_id']; ?>">
						<div id="addtobutton">	
							<input class="addtocart" type="submit" value="Add to Cart">
						</div>
					</li>
				</form>	
  			</ul>
		</div>
		<?php } ?>
	</div>
	</article>
	
	<div style="clear:both";></div><br>

	<article id="products">
	<a>6 Sided Dice</a><br>
	<div id="pricing-table">
	<?php foreach ($D6 as $product) { ?>
		<div class="plan">
   			<ul id="<?php echo $product['Prod_id']; ?>" display="inline";>
    			<li><h3><?php echo $product['Prod_name']; ?><span><img src="<?php echo $product['Prod_image']; ?>" width="42" class="img-circle"></span></h3></li>
				<li style="height:45px;"><?php echo $product['Prod_desc']; ?></li>
    			<li><?php echo $product['Prod_price']; ?></li>
				<form action="products.php" method="post">
					<li>
						<input type="number" name ="quantity" min="1" max="100" value="1" id="quantity"/>	
					</li>
					<li>
					<div id="addtobutton">	
						<input type="hidden" name="prodid" value="<?php echo $product['Prod_id']; ?>">
						<div id="addtobutton">	
							<input class="addtocart" type="submit" value="Add to Cart">
						</div>
					</li>
				</form>	
  			</ul>
		</div>
		<?php } ?>
	</div>
	</article>
	
	<div style="clear:both";></div><br>

	<article id="products">
	<a>4 Sided Dice</a><br>
	<div id="pricing-table">
	<?php foreach ($D4 as $product) { ?>
		<div class="plan">
   			<ul id="<?php echo $product['Prod_id']; ?>" display="inline";>
    			<li><h3><?php echo $product['Prod_name']; ?><span><img src="<?php echo $product['Prod_image']; ?>" width="42" class="img-circle"></span></h3></li>
				<li style="height:45px;"><?php echo $product['Prod_desc']; ?></li>
    			<li><?php echo $product['Prod_price']; ?></li>
				<form action="products.php" method="post">
					<li>
						<input type="number" name ="quantity" min="1" max="100" value="1" id="quantity"/>	
					</li>
					<li>
					<div id="addtobutton">	
						<input type="hidden" name="prodid" value="<?php echo $product['Prod_id']; ?>">
						<div id="addtobutton">	
							<input class="addtocart" type="submit" value="Add to Cart">
						</div>
					</li>
				</form>	
  			</ul>
		</div>
		<?php } ?>
	</div>
	</article>
	
	<div style="clear:both";></div><br>

	<article id="products">
	<a>Percentile Dice</a><br>
	<div id="pricing-table">
	<?php foreach ($perc as $product) { ?>
		<div class="plan">
   			<ul id="<?php echo $product['Prod_id']; ?>" display="inline";>
    			<li><h3><?php echo $product['Prod_name']; ?><span><img src="<?php echo $product['Prod_image']; ?>" width="42" class="img-circle"></span></h3></li>
				<li style="height:45px;"><?php echo $product['Prod_desc']; ?></li>
    			<li><?php echo $product['Prod_price']; ?></li>
				<form action="products.php" method="post">
					<li>
						<input type="number" name ="quantity" min="1" max="100" value="1" id="quantity"/>	
					</li>
					<li>
					<div id="addtobutton">	
						<input type="hidden" name="prodid" value="<?php echo $product['Prod_id']; ?>">
						<div id="addtobutton">	
							<input class="addtocart" type="submit" value="Add to Cart">
						</div>
					</li>
				</form>	
  			</ul>
		</div>
		<?php } ?>
	</div>
	</article>

</body>

<div style="clear:both;"></div>
<br>
<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
	<br>
</div>

</html>