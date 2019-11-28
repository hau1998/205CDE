<?php
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
        <title>Home</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="home.css" title="style" />
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
           <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
           <script src="https://kit.fontawesome.com/a076d05399.js"></script>
               
    </head>
    <body>
        <header>
        <div class="bobo">
            <h1>&nbsp;Focus Camera Store</h1>
            </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active ">
      <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="login.html">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="register.html">Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact_us.html">Contact Us</a>
    </li>
    
  </ul>
</nav>
        </header>
        
        
        <style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}



/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration:1s;
  animation-name: fade;
  animation-duration: 5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
    <center>

	<br>
<div class="bo">
      <span class="rounded">
    <br>
    <br>
      <div class="slideshow-container">

<div class="mySlides fade">
  <img src="slide/bird.jpg" style="width:100%">
 
</div>

<div class="mySlides fade">
  <img src="slide/nikon.jpg" style="width:100%">

</div>

<div class="mySlides fade">

  <img src="slide/sony.jpg" style="width:100%">
</div>



</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<br>

</div>
    </center>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>


        
        
        
             <br>
        <p class = cat>&nbsp;&nbsp;Products</p>
		<div id="template-wrapper">
   <div class="products">
		
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM product ORDER BY product_id ASC");
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
                            <a href="login.html"><img src="cart.png"  onmouseover="this.src='login.jpg';"
         onmouseout="this.src='cart.png';" class="cart"></a>
                        </div>
				<br>
            </div>
			
		
      
		
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>
	</div>
	<br>
		<br>
		<br>
		
    </body>
</html>
