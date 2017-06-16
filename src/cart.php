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
	require_once 'GetProducts.php';
	require_once 'RemoveFromCart.php';
	require_once 'RemoveAllFromCart.php';
	require_once 'SetItemQuantity.php';

?>
<?php
	$itemID = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
	$quantity = filter_input (INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
	$empty = filter_input (INPUT_POST, 'empty', FILTER_SANITIZE_SPECIAL_CHARS);
	if (isset($quantity)) {
		setItemQuantity($itemID, $quantity);
	}
	else {
		if (isset($itemID)) {
			removeFromCart($itemID);
		}
	}
	if (isset($empty)) {
        removeAllFromCart($cartID);
    }
	require_once 'cartCount.php';
	$cart = getCartCount($cartID);	
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
<title>Nat20: Your cart</title>
<style> 
table, th, td {
   border: 1px solid black;
   padding: 15px;
   margin:1em auto;
}
th {
    text-align: left;
	
}
#dbimages {
	max-width: 100px;
}
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
#cartMenu {
	width:1000px;
	display:block;
	margin:auto;
}
	
#button{
	text-transform: uppercase;
	font-family: 'Squada One', cursive;
	font-weight: 800;
	background: #FFF;
	color: #333;
	font-size: 16px;
	text-align: center;
	text-shadow: 
        1px 1px 0px #FFF, 
        2px 2px 0px #999,
        3px 3px 0px #FFF;
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
        0 0 0px 3px #FFF inset;
	width: 100px;
	height: 40px;
	border-radius: 12px;
	text-align: center;
	
	}
#remove{
	text-transform: uppercase;
	font-family: 'Squada One', cursive;
	font-weight: 800;
	background: #FFF;
	color: #333;
	font-size: 16px;
	text-align: center;
	text-shadow: 
        1px 1px 0px #FFF, 
        2px 2px 0px #999,
        3px 3px 0px #FFF;
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
        0 0 0px 3px #FFF inset;
	width: 140px;
	height: 40px;
	border-radius: 12px;
	text-align: center;
	
	}
</style>
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
</div>
</header>
<br>
<br>
<body>

<?php
	function showCart($cartID){
    global $dbc;
	$query = 'SELECT SUM(p.Prod_price * ci.Item_quantity) AS Total, ci.Item_id, ci.Prod_id, p.Prod_id, p.Prod_name, p.Prod_price, p.Prod_image, ci.Item_quantity, ci.Cart_id
	FROM CartItems ci, Products p
	WHERE ci.Prod_id = p.Prod_id AND ci.Cart_id = :cartID
    GROUP BY ci.Item_id, ci.Prod_id';
	$statement = $dbc->prepare($query);
	$statement->bindValue(':cartID', $cartID);
    $statement->execute();
	$results = $statement->fetchAll();
    $statement->closeCursor();
	return $results;
	}
	function getTotal($cartID){
		global $dbc;
		$query = 'SELECT SUM(p.Prod_price * ci.Item_quantity) AS Total
	FROM CartItems ci, Products p
	WHERE ci.Prod_id = p.Prod_id AND ci.Cart_id = :cartID';
	$statement = $dbc->prepare($query);
	$statement->bindValue(':cartID', $cartID);
    $statement->execute();
	$results = $statement->fetchAll();
    $statement->closeCursor();
	return number_format($results[0]['Total'], 2, '.', '');
	}
?>


<?php
$cartItems = showCart($_SESSION['cartID']);
$total = getTotal($_SESSION['cartID']);
?>
<article id="products">
<a>Your Cart</a>
<?php if (!isset($cart)){ ?>
<br><br><br><br><br><br><br><br><br>
<p>Dear <?php echo $username?>,</p>
<p>Your cart Seems to be empty, let's go shopping!</p>
<br><br><br><br><br><br><br><br><br>
<?php } else {?>
	<div style="min-height: 400px;">
		<div id="pricing-table">
			<?php foreach ($cartItems as $cartItem) { ?>
				<div class="plan">
					<ul>
						<li><h3><?php echo $cartItem['Prod_name']; ?><span><img src="<?php echo $cartItem['Prod_image']; ?>" width="42"></span></h3></li>
						<li><form action="cart.php" method="post">
							<input type="number" name ="quantity" min="1" max="100" value="<?php echo $cartItem['Item_quantity']; ?>" id="quantity"/>
							<input type="hidden" name="itemid" value="<?php echo $cartItem['Item_id']; ?>">
							<input id="button" type="submit" value="Update item">
							</form>
						</li>
						<li><?php echo $cartItem['Item_quantity']; ?></li>
						<li>$<?php echo number_format(((float)$cartItem['Prod_price'] * (int)$cartItem['Item_quantity']) , 2, '.', ''); ?></li>
						<li><form action="cart.php" method="post">
								<input type="hidden" name="itemid" value="<?php echo $cartItem['Item_id']; ?>">
								<input id ="remove" type="submit" value="Remove from cart">
							</form>
						</li>
					</ul>
				</div>
			<?php }?>
		</div>
	</div>
	<?php }?>
</article>	
<div style="clear:both;">
	<br>
</div>
	<div id="cartMenu">
		<form action="cart.php" method="post" style="float:left;">
			<input type="hidden" name="empty" value="empty">
			<input id="button" type="submit" value="Empty Cart">
		</form>
		<?php require_once('./config.php'); ?>
	
		<form style="float:right;position:relative;" action="charge.php" method="post">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Payment checkout"
          data-amount="<?php echo $total * 100; ?>"
          data-locale="cad"
		  data-billing-address="true"
		  data-shipping-address="true"></script>
		  <input type="hidden" name="amount" value="<?php echo $total * 100; ?>" />
		</form>
		<div style="clear:both;">
		<br>
		<p style="float:right;position:relative;"><b>Total Price:</b> $<?php if (isset($total)){echo $total;} else {echo '0.00';} ?></p>
		</div>
	</div>
	<br>
<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
</div>
</body>
</html>