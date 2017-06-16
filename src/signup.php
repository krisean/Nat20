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
<title>Nat20: Sign up</title>
</head>

<style>

/* CSS style for the entire form */
#signup-page {
	text-align: center;
	width: 400px; 
	position:relative;
	margin:0 auto;
	

}

#signup-page .plan {
	font: 12px 'Lucida Sans', 'trebuchet MS', Arial, Helvetica;
	text-shadow: 0 1px rgba(255,255,255,.8);        
	background: #fff;      
	border: 1px solid #ddd;
	color: #333;
	height: 570px;
	padding: 20px;
	width: 400px;
	
	}
	

#signup-page h6 {
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

#username {
	position:relative;	
	margin: 10px auto;
	padding: 5px;
}
	
#pwd1 {
	position:relative;	
	margin: 10px auto;	
	padding: 5px;
}
	
#pwd2 {
	position:relative;	
	margin: 10px auto;	
	padding: 5px;
}
	
#email {
	position:relative;	
	margin: 10px auto;
	padding: 5px;
}
	
#firstname {
	position:relative;	
	margin: 10px auto;
	padding: 5px;
}
	
#lastname {
	position:relative;	
	margin: 10px auto;	
	padding: 5px;
}
	
#phone {
	position:relative;	
	margin: 10px auto;
	padding: 5px;
}
#buttons {
	
	position:relative;	
	margin-left: 0 auto;
	}


</style>
<meta charset="utf-8">

<title>Sign up Page</title>

<script type="text/javascript">

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }
	  
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

    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(form.pwd1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pwd1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd1.focus();
      return false;
    }

    alert("Please sign in on the next page.");
    return true;
  }

</script>
<body>

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

<?php
require_once 'AddCustomers.php';
?>

<?php

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$unhashed_password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$password = password_hash($unhashed_password, PASSWORD_DEFAULT);
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
if (isset($username, $password, $firstname, $lastname, $phone, $email)) {
        AddToCustomers($username, $password, $firstname, $lastname, $phone, $email);
?>
	<script>window.location = 'signin.php';</script>
<?php
    }
?>

<br>

<img id="dragon1" src="images/drag.png" style="width:30%;top:350px;left:40px;position:absolute;"></img>
<img id="dragon2" src="images/drag.png" style="width:30%;top:350px;right:40px;position:absolute;transform:scale(-1,1);	
-webkit-transform:scale(-1,1);-moz-transform:scale(-1,1);-o-transform:scale(-1,1)'"></img>

<br>

<div id="signup-page">
  <div class ="plan">
    <form class="register-form" onsubmit="return checkForm(this);" name="SignUp" method="POST" action="signup.php">

		<h6 style="text-align:center;">Sign Up</h6>
	
		<input type="text" name="username" required id="username" placeholder="Username">

		<input type="text" name="email" required id="email" placeholder="Email">
		
		<input type="password" name="password" required id="pwd1" placeholder="Password">
					
		<input type="password" name="confirm_password" required id="pwd2" placeholder="Confirm Password">
			 
		<input type="text" name="firstname" required id="firstname" placeholder="First Name">

		<input type="text" name="lastname" required id="lastname" placeholder="Last Name">
			  
		<input type="tel"  name="phone" required id="phone" placeholder="Phone Number">

		<br>
		
		<div id="buttons">
			<button id="submit" type="submit" class="myButton" name="myButton">Submit</button>
			<button id="reset" type="reset" class="myOtherButton" name="myOtherButton">Reset</button>
		</div>
		
		<br><br><br><br>
		 
		<div id="signup">
			<p>Already have an account?<a href="signin.php" title="Sign In" style="padding-left:10px;"><span>Sign In</span></a></p>
		</div>
		
	</form>
  </div>
</div>

<br><br>

<div style="clear:both;"></div>

<div id="footer">
	<p>&copy; 2017 NAT20. All Rights Reserved.</p>
</div>

</body>
</html>
