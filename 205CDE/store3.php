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
        <title>Store</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="store.css" title="style" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <header>
            <div class="bobo">
            <h1>&nbsp;Focus Camera Store</h1>
			
            </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active  ">
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
<p class="user">&nbsp;&nbsp;<img src="user.png" class="icon"/><a href="details.php">

<?php 

    if(empty($_SESSION['sess_user']))
    {
  
        header("Location: home.php");
	}
else{
echo $_SESSION['sess_user'];
}?>
</a>				
<input type="button" class="in" value="Logout" onclick="window.location.href='logout.php'" />
</p
<br>
</div>
        </header>
	
	<div class="nice" >
    <br>
	<center>
	<h2>Welcome to Focus Camera Store.</h2>
           <img  class="canon" src="canon.jpg"/>
       </center>
	   <br>
	   <br>
	   <br>
    </div>
	


	<div class="cleaner">
	
	</div>
	
	<br>
	 <div id="template-main">
		<div id="template-wrapper">
        <div id="sidebar">
        	<h2>All Brand</h2>
            <ul class="sidebar_menu">
			<li><a href="store.php">All</a></li>
			   <li><a href="store1.php">Nikon</a></li>
                <li><a href="store2.php">Canon</a></li>				
                <li><a href="store3.php">Sony</a></li>
			</ul>
        
            <div id="newsletter">
			<h2>Advertisement</h2>
        	<a href="viewproduct.php?id=3;"><img  class="ad" src="advert.jpeg"/></a>
			  <br>
			  <br>
			  <img  class="ad" src="advert2.jpg"/>
			  <br>
			  <br>
			  <br>
			  <br>
                <div class="cleaner"></div>
            </div>
		
        </div>
		<div class="products">
		<p class ="title">&nbsp;Sony</p>
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM product WHERE brand = 'Sony'");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>

            <div class="thumbnail">
			<br>
			<img src="<?php echo $row["image"]; ?>" class="image">
			
					<p class="brand"><?php echo $row["brand"]; ?></p>
                    <p class="name"><?php echo $row["name"]; ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo 'RM'.$row["price"]; ?></p>
                        </div>
						
                </div>
				 <div class="col-md-6">
                            <a class="btn btn-success" href="viewproduct.php?id=<?php echo $row["product_id"]; ?>">View</a>
                        </div>
				<br>
            </div>
			
		
      
		
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>
	
		
		
		</div>
		</div>
		<br>
		<br>
		<br>

		
				
</body>
</html>	