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
<head>
<link rel="stylesheet" type="text/css" href="css/default.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Nat20: Sign in</title>
</head>

<style>

/* CSS style for the entire form */
#sign-in {
	text-align: center;
	width: 400px; 
	position:relative;
	margin:0 auto;
	

}

#sign-in .plan {
	font: 12px 'Lucida Sans', 'trebuchet MS', Arial, Helvetica;
	text-shadow: 0 1px rgba(255,255,255,.8);        
	background: #fff;      
	border: 1px solid #ddd;
	color: #333;
	height: 400px;
	padding: 20px;
	width: 400px;
	
	}
	

#sign-in h6 {
	text-transform: uppercase;
	font-family: 'Squada One', cursive;
	font-weight: 800;
	background: #FFF;
	color: #333;
	font-size: 35px;
	text-align: center;
	padding: 20px;
	margin: -20px -20px 50px -20px;
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
	width: 80px;
	height: 40px;
	border-radius: 12px;
	text-align: center;
	
	}

#email {
	position:relative;	
	margin: 10px auto;
	padding: 5px;
}

#password {
	position:relative;	
	margin: 10px auto;	
	padding: 5px;
}
	
#buttons {
	
	position:relative;	
	margin-left: 0 auto;
	}



</style>

<?php
require_once 'SetUpCart.php';
require_once 'GetCustomer.php';
require_once 'MoveCart.php';
?>

<?php

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$check = filter_input(INPUT_POST, 'signin', FILTER_SANITIZE_SPECIAL_CHARS);
$customer = getCustomer($email);

	if (password_verify($password, $customer[0]['Cust_password'])){
		
		$Cart_id = $user['Cart_id'];
		$Cust_id = $user['Cust_id'];
		SetUpCart($Cart_id, $Cust_id);	
		?>
	<?php
	}
	else{
		if (isset($email, $password)){
	?>
			<script type="text/javascript">
				alert('Username or password is incorrect.');
			</script>
	<?php
		}
	}
		moveCart($_SESSION['cartID'], $customer[0]['Cart_id']);
		$_SESSION['custID'] = $customer[0]['Cust_id'];
		$_SESSION['username'] = $customer[0]['Cust_username'];
		$_SESSION['cartID'] = $customer[0]['Cart_id'];
?>

<script type="text/javascript">

  function checkForm(form)
  {
	if(form.email.value == "") {
      alert("Error: Email cannot be blank!");
      form.email.focus();
      return false;
    }
    re = /([\w-\.]+)@((?:[\w]+\.))([a-zA-Z]{2,4})/;
    if(!re.test(form.email.value)) {
      alert("Error: Must enter a valid email!");
      form.email.focus();
      return false;
    }
	  return true;
  }
</script>

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

<img id="dragon1" src="images/drag.png" style="width:30%;top:350px;left:40px;position:absolute;"></img>
<img id="dragon2" src="images/drag.png" style="width:30%;top:350px;right:40px;position:absolute;transform:scale(-1,1);	
-webkit-transform:scale(-1,1);-moz-transform:scale(-1,1);-o-transform:scale(-1,1)'"></img>

<br><br>

<div id="sign-in">
   <div class="plan">
	 <form id="formbox" name="SignUp" onsubmit="return checkForm(this);" method="POST" action="index.php">
		 
		 <h6 style="text-align:center;">Sign In</h6>
		 
		 	<br><br>
		 
			<input type="text" name="email" required  id="email" placeholder="Email" value="<?php echo $email['Cust_email']; ?>">
				
			<input type="password" name="password" required id="password" placeholder="Password" value="<?php echo $password['Cust_password']; ?>">
				
			<input type="hidden" name="signin" required id="signin" value="true">
		 
			
		    <button id="submit" type="submit" class="myButton" name="myButton">Submit</button>
		 
		 	<br><br><br><br>
		 
		 	<div id="signup">
				<p>Don't have an account?<a href="signup.php" title="Sign Up" style="padding-left:10px;"><span>Sign Up</span></a></p>
		 	</div>
	   
	   </form>
	</div>
</div>
	  
	  <br><br><br>

<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
</div>

</body>
</html>