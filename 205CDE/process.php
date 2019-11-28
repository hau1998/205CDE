<?php
session_start();
?>

<!DOCTYPE html>
<html>
 <link rel="stylesheet" type="text/css" href="register.css" title="style" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <body background="wallpaper/reg.jpg">
        <header>
		<title>Register Process</title>
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
		if(isset($_POST["submit"])){
			$name = $_POST['name'];
		    $email =	$_POST['email'];
			$password =	$_POST['password'];
			$conpass = $_POST['conpass'];
			$address= $_POST['address'];
			$postcode= $_POST['postcode'];
			$city= $_POST['city'];
			$state= $_POST['state']; 
			$phone= $_POST['phone'];
           

			$conn = mysqli_connect("127.0.0.1", "root", "", "webstore");

			$query ="SELECT * FROM user WHERE name='$name'";
			$result=mysqli_query ($conn,$query);
			$numrows = mysqli_num_rows($result);

			if ($conpass==$password)
			if($numrows==0)
			{
			$sql="INSERT INTO user(name,email,password,address,postcode,city,state,phone) VALUES ('$name','$email','$password','$address','$postcode','$city','$state','$phone')";
			$result=mysqli_query ($conn,$sql);
			
					
			 if($result){?>
				<div class="w3-center w3-new">
				<br>
				<br>
			<p>Account Created.</p><br>
			<input type="button" class="in" value="Login" onclick="window.location.href='login.html'" />
			<br>
			<?php
			} else{
			?> <p>Failed to Register.</p>
			<input type="button" class="in" value="Try Again!" onclick="goBack()" />
			<br>
			<?php
			}
		}else{
			?><p>The Username already exists!</p> 
			<br>
		   <input type="button" class="in" value="Try Again!" onclick="goBack()" />
			<br>
			<?php
		}
		else{
			?><p>Password didn't match!</p>
			<input type="button" class="in" value="Try Again!" onclick="goBack()" />
			<br>
			<?php
		}
		}
		?>
		<br>
		<br>
		
		</div>
	</center>
		</body>
		</html>