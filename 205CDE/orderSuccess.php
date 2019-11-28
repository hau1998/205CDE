<?php
session_start();
if(!isset($_REQUEST['id'])){
    header("Location: store.php");
}
	require_once'dbConfig.php';
	
$result = $db->query("SELECT r.*, c.name, c.email, c.phone FROM orders as r LEFT JOIN user as c ON c.name = r.user_name WHERE r.order_id = ".$_REQUEST['id']); 
 
if($result->num_rows > 0){ 
    $orderInfo = $result->fetch_assoc(); 
}else{ 
    header("Location: index.php"); 
}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success </title>
    <meta charset="utf-8">
	       <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
     <li class="nav-item active ">
      <a class="nav-link" href="viewCart.php">Cart</a>
   </li>

     <li class="nav-item  ">
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
    <h2>Order Status</h2>
    <p>Your order has submitted successfully. Order ID is <b style="color:red;">#<?php echo $_REQUEST['id']; ?></b>.</p>
	<p>Your order will arrive in a week. If not, please dial 012-3456789 for service and info.</p>
	<p><b style="color:black;">Payment is done</b> when the delivery man <b style="color:black;">reaches your doorstep with your order</b>.</p>
	    <div class="row col-lg-12 ord-addr-info">
	<div class="hdr">Order Info</div>
                <p style="color:green;"><b style="color:black;">Order ID: </b> #<?php echo $_REQUEST['id']; ?></p>
                <p style="color:green;"><b style="color:black;">Total:</b> <?php echo 'RM'.$orderInfo['total']; ?></p>
                <p style="color:green;"><b style="color:black;">Placed On:</b> <?php echo $orderInfo['created']; ?></p>
                <p style="color:green;"><b style="color:black;">Buyer Name:</b> <?php echo $orderInfo['name']; ?></p>
                <p style="color:green;"><b style="color:black;">Email:</b> <?php echo $orderInfo['email']; ?></p>
                <p style="color:green;"><b style="color:black;">Phone:</b> <?php echo $orderInfo['phone']; ?></p>
            </div>
	  <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Get order items from the database 
                        $result = $db->query("SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN product as p ON p.product_id = i.product_id WHERE i.order_id = ".$_REQUEST['id']); 
                        if($result->num_rows > 0){  
                            while($item = $result->fetch_assoc()){ 
                                $price = $item["price"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
                        <tr>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo 'RM'.$price.' '; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo 'RM'.$sub_total; ?></td>
                        </tr>
                        <?php } 
                        } ?>
                    </tbody>
                </table>
            </div>
			</div>
     
    </div>
<footer>


</footer>
</body>
</html>