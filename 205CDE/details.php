<?php
// include database configuration file
session_start();
include 'dbConfig.php';

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Details</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="details.css" title="style" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body background="wallpaper/login.jpg">
        <header>
            <div class="bobo">
            <h1>&nbsp;Focus Camera Store</h1>
            </div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item  ">
      <a class="nav-link" href="store.php">Store</a>
   </li>
     <li class="nav-item  ">
      <a class="nav-link" href="viewCart.php">Cart</a>
   </li>

     <li class="nav-item ">
      <a class="nav-link" href="order.php">Order</a>
   </li>

    
  </ul>

</nav>
<div>


<?php 

    if(empty($_SESSION['sess_user']))
    {
  
        header("Location: home.php");
	}
else{

}?>
				
<br>
</div>
        </header>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 3px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-size: 20px;
}

td{
	color: red;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>		




<br>
<br>
<center>

		<h2>User Details</h2>
		</center>
		
		
		<br>
		<center>
			  <div class ="bord">
                     
                     
           <label for="name"><b>Name :</b></label><br>
           <p class="detail"><?php echo $_SESSION['sess_user'] ?></p>
           <br>
           <label for="email"><b>Email :</b></label><br>
    <p class="detail"><?php echo $_SESSION['email']; ?></p>
<br>
<label for="address"><b>Address :</b></label><br>
<p class="detail"><?php echo $_SESSION['address']; ?></p>
<br>
<label for="postcode"><b>Postcode :</b></label><br>
<p class="detail"><?php echo $_SESSION['postcode']; ?></p>
<br>
<label for="city"><b>City/Town :</b></label><br>
<p class="detail"><?php echo $_SESSION['city']; ?></p>
<br>
<label for="state"><b>State :</b></label><br>
<p class="detail"><?php echo $_SESSION['state']; ?></p>
<br>
<label for="phone"><b>Telephone Number :</b></label><br>
<p class="detail"><?php echo $_SESSION['phone']; ?></p>
<br>                
					  </div>
</center>		
		
		
		
		

<br>
<br>
<center>
<input type="button" class="in" value="Logout" onclick="window.location.href='logout.php'" />
</center>
<br>
<br>


			
</body>
</html>				