<!doctype html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="css/default.css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Untitled Document</title>

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

</head>

<div id="signup">
  	<a href="signup.php" title="Sign Up"><span>Sign Up</span></a>
</div>
<div id="linebreak">
	<p>|<p>
</div>
<div id="signin">
  	<a href="signin.html" title="Sign In"><span>Sign In</span></a>
</div>

<div id="header">
  <a href="/" id="logo">Nat20</a>
  
  <br>
  <br>
<div id="cart">
	<a href="cart.php" class="cart" title="Shopping Cart"><span>Cart</span></a>
</div>
  <br>
  
  <ul id="menu" class="menu">
    <li><a href="index.html" title="Main page"><span>Home</span></a></li>
    <li><a href="products.php" title="Products"><span>Products</span></a></li>
    <li><a href="special.html" title="Our Special Deals"><span>Specials</span></a></li>
    <li><a href="about.html" title="About Us"><span>About</span></a></li>
    <li><a href="contact.html" title="Contact Us"><span>Contact</span></a></li>
  </ul>
</div>

</header>

<body>

<p> THIS IS A TEST DONT FREAK OUT </p>

<?php
require_once 'model/db_connect.php';
require_once 'GetCustomers.php';
?>

<?php
$customers = GetAllCustomers();
?>
<table id = "custTable"><?php foreach ($customers as $cust) { ?>
	<tr>
    	<td><?php echo $cust['Cust_username']; ?></td>
		<td><?php echo $cust['Cust_password']; ?></td>
        <td><?php echo $cust['Cust_firstName']; ?></td>
        <td><?php echo $cust['Cust_lastName']; ?></td>
        <td><?php echo $cust['Cust_phone']; ?></td>
        <td><?php echo $cust['Cust_email']; ?></td>
	</tr>
<?php }?>	
</table>



<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
</div>

</body>
</html>
