
<!DOCTYPE html>
<html>
 <link rel="stylesheet" type="text/css" href="register.css" title="style" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <body background="wallpaper/login.jpg">
        <header>
		<title>Process</title>
            <div class="bobo">
            <h1>&nbsp;Focus Camera Store</h1>
            </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item ">
      <a class="nav-link" href="home.html">Home</a>
    </li>
      <li class="nav-item ">
      <a class="nav-link" href="login.html">Login</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="register.html">Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact_us.html">Contact Us</a>
    </li>
    
  </ul>
</nav>
        </header>

	
	<center>
	<br>
	<br>
		<div class="bord">
		<br>
		<br>
	<script>
function goBack() {
  window.history.back();
}
</script>








<?php

$email = $_POST['email'];
$password =	$_POST['password'];


$conn = mysqli_connect("127.0.0.1", "root", "", "webstore");
$query = "SELECT * FROM user WHERE email='$email'";
$result=mysqli_query ($conn,$query);
$numrows = mysqli_num_rows($result);



	if($numrows==0){
		echo"Invalid username or password, please try again <a href='login.html'>LOG IN</a>";
	}

	else {$row = mysqli_fetch_assoc($result);
		$datapass = $row ['password'];

	if($datapass!=$password){?>
		<p>Invalid Username or Password!</p> 
		<input type="button" class="in" value="Try Again!" onclick="goBack()" />
			<br>
			<?php
	}

	else{
		session_start();
		$_SESSION['sess_id']= $row['userid'];
		$_SESSION['sess_user']= $row['name'];
		$_SESSION['email']= $row['email'];
		$_SESSION['password']= $row ['password'];
		$_SESSION['address']= $row['address'];
		$_SESSION['postcode']= $row['postcode'];
		$_SESSION['city']= $row['city'];
		$_SESSION['state']= $row['state'];
		$_SESSION['phone']= $row['phone'];
		
		header('location:store.php');
	}
}
?>
<br>
<br>


</body>
</html>