<?php
session_start();

require_once'dbConfig.php';
	

	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order  </title>
    <meta charset="utf-8">
	       <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="store.css" title="style" />
  <link rel="stylesheet" type="text/css" href="style.css" title="style" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    .container{width: 100%;padding: 50px;}
    p{color: blue;font-size: 18px;}
    </style>
</head>
        <header>
            <div class="bobo">
            <h1>&nbsp;Focus Camera Store</h1>
			
            </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item ">
      <a class="nav-link" href="store.php">Store</a>
   </li>
     <li class="nav-item  ">
      <a class="nav-link" href="viewCart.php">Cart</a>
   </li>

     <li class="nav-item active ">
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
</p>
<br>
</div>
        </header>
<body>
<div class="container">
    <h2>Order Details</h2>
    

	  <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
					
					
					<?php
        //get rows query
		$user=$_SESSION['sess_user'];
        $query = $db->query("SELECT * FROM orders WHERE user_name ='$user'"); 
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>

         <tr>
                            <td><?php echo $row["order_id"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            <td><?php echo $row["total"];?></td>
                            <td><?php echo $row["created"]; ?></td>
                        </tr>
			
		
      
		
        <?php } }else{ ?>
	
<td><?php echo 'No Order is made';?></td>
      <?php } ?>
                    </tbody>
                </table>
            </div>
			</div>
     
    </div>
<footer>


</footer>
</body>
</html>