<?php
	session_start();
	require_once 'model/db_connect.php';
	require_once 'GuestCart.php';	
	$_SESSION['custID'] = '-1';
	$_SESSION['cartID'] = createGuest();
	$_SESSION['username'] = 'guest';
	$custID = $_SESSION['custID'];
	$cartID = $_SESSION['cartID'];
	$username = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/default.css">
<style type="text/css">

/* CSS style for the entire form */
#formbox { 
	width: 620px;
    background-color: #DCDCDC;                  
	border: 1px #333;              
	padding: 10px;                    
	margin: auto;
	margin-top: 15px;	
    }
input[type=text], input[type=tel], input[type=password] {
	font-family: Helvetica, Arial, sans-serif;   
	border:1px solid #ccc;   
	font-size:14px;   
	width:200px;   
	min-height:30px;   
	display:block;
	box-sizing: border-box;   
	margin-bottom:15px;   
	margin-top:5px;   
	outline: none;   
	-webkit-border-radius:5px;   
	-moz-border-radius:5px;   
	-o-border-radius:5px;   
	-ms-border-radius:5px;   
	border-radius:5px;
	moz-transition: padding .25s;      
	-webkit-transition: padding .25s;      
	-o-transition: padding .25s; 
	transition: padding .25s;
    } 
#expiry  {      
	width:100px;   
    }
input {
padding-left: 10px;
}
input[type=submit], input[type=reset] {
    background:none;   
	padding:10px; 
	}
		
		
input:invalid { 
	border-color: #e88;   
	-webkit-box-shadow: 0 0 5px rgba(255, 0, 0, .8);   
	-moz-box-shadow: 0 0 5px rgba(255, 0, 0, .8);   
	-o-box-shadow: 0 0 5px rgba(255, 0, 0, .8);   
	-ms-box-shadow: 0 0 5px rgba(255, 0, 0, .8);   
	box-shadow:0 0 5px rgba(255, 0, 0, .8); 
	}
	
	
input:required {   
	border-color: #88a;   
	-webkit-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
	-moz-box-shadow: 0 0 5px rgba(0, 0, 255, .5);   
	-o-box-shadow: 0 0 5px rgba(0, 0, 255, .5);
	-ms-box-shadow: 0 0 5px rgba(0, 0, 255, .5);   
	box-shadow: 0 0 5px rgba(0, 0, 255, .5); }
	
	
input:required:valid {    
	background: #fff url(images/valid.png) no-repeat 98% center;    
	box-shadow: 0 0 5px #5cd053;    
	border-color: #28921f; 
	} 
input:required {   
	background: #fff url(images/red_asterisk.png) no-repeat 98% center;  
	} 
input:focus {   
	background: #fff;   
	border: 1px solid #555;   
	box-shadow: 0 0 3px #aaa;   
	padding-right: 20px; 
	} 
input:focus:invalid {   
	background: #fff url(images/invalid.png) no-repeat 98% center;   
	box-shadow: 0 0 5px #d45252;   
	border-color: #b03535; 
	}
textarea{
	width: 400px; 
	height: 100px;
	}
button{
	width: 80px;
	height: 40px;
	border-radius: 12px;
	text-align: center;
	}
.myButton{
	font-size: 16px;
	}
.myOtherButton{
	font-size: 16px;
	}

</style>

<?php
require_once 'SetUpCart.php';

?>

<meta charset="utf-8">

<title>Nat20: Sign out</title>

</head>

<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$check = filter_input(INPUT_POST, 'signin', FILTER_SANITIZE_SPECIAL_CHARS);
if (isset($email, $password)) {
		$user = getUser($email, $password);
		$Cart_id = $user['Cart_id'];
		$Cust_id = $user['Cust_id'];
		SetUpCart($Cart_id, $Cust_id);
}else if (isset($check)){
	echo "
	<script type=\"text/javascript\">
		alert('Username or password is incorrect.');
	</script>";
}
?>

<body>
<div id="header">
  <a href="/" id="logo">Nat20</a>

<ul id="menu" class="menu">
    <li><a href="index.php" title="Main page"><span>Home</span></a></li>
    <li><a href="products.php" title="Products"><span>Products</span></a></li>
    <li><a href="about.php" title="About Us"><span>About</span></a></li>
    <li><a href="contact.php" title="Contact Us"><span>Contact</span></a></li>
  </ul>
</div>

</header>

<br><br>

<article>
 <p style="font-size:20px;">You are signed out.</p>
</article>

<br><br>

<script>setTimeout(function(){window.location.href="/"},1500);</script>

<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
</div>

</body>
</html>