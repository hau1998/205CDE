<?php
// include database configuration file
include 'dbConfig.php';

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: store.php");
}

// set customer ID in session
$userid = $_SESSION['id'];

// get customer details by session customer ID
$query = $db->query("SELECT * FROM user WHERE userid = ".$_SESSION['id']);
$custRow = $query->fetch_assoc();


$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <meta charset="utf-8">
<meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="store.css" title="style" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>

  <body>
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
	
	<div class="container">
    <h1>Order Preview</h1>
	

    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'RM'.$item["price"]; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo 'RM'.$item["subtotal"]; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td></tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'RM'.$cart->total(); ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
 
    <div class="footBtn">
        <a href="store.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
        <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
	</div>

	</div>
	
</div>
<br>
<br>
<br>	
</body>
</html>