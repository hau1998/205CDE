<?php 
session_start();
require('db.php');



$id=$_GET['id'];
$query = "SELECT * from product WHERE product_id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$_SESSION['id']=$row['product_id'];
?>

<!doctype html>

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
    <li class="nav-item active ">
      <a class="nav-link" href="store.php">Store</a>
   </li>
     <li class="nav-item  ">
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
</p
<br>
</div>

        </header>
		
			<script>
function goBack() {
  window.history.back();
}
</script>
<center>
<h2>Product Details</h2>
</center>
		<center>
		<div class="product">
		
	<div class="show">
<img class="item" src="<?php echo $row['image'];?>"/>
</div>
<br>
<br>
<p class="detail" ><?php echo $row['brand'];?>&nbsp;<?php echo $row['name'];?></p>
<p class="detail">RM <?php echo $row['price'];?></p>
		<p class="info"><?php echo $row['details'];?></p>
		<form>
		
		 <div class="col-md-6">
                            <a class="btn btn-danger" href="cartAction.php?action=addToCart&id=<?php echo $row["product_id"]; ?>">Add to Cart</a>
                        </div>
							</form>
						<br>
						
</div>
		</center>
		<br>
		<br>
		<center>
				 <div class="col-md-6">
                            <a class="btn btn-warning" onclick="goBack()">Back to Store</a>
                        </div>
						</center>
						<br>
						<br>
</body>
</html>	

