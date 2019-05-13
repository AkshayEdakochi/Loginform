<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

//removable
  
//removable

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          ?>
          <br>
          <?php
          	unset($_SESSION['success']);
            if(isset($_SESSION['balance'])) 
              {echo $_SESSION['balance'];
                unset($_SESSION['balance']);}
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username'];?> </strong> <br> Balance:<?php echo $_SESSION['balanceno'];?> </p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
      
    <?php endif ?>
</div>

<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<!--        -->



  
  
  
<!--            -->
<form action="wallet.php" method="get">
<div class="row">
   
        <div class="column">
            <div class="card">
                <img src="watch.jpg">
                <p>Rolex Brand Watch</p>
                <p>Rs.1700/-</p>
                <!--<button type="button" style="color: red">SHOP</button> -->
                <input type="checkbox" name="item[]" value="watch"> Buy this <br>
                
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="bag.jpg">
                <p>Street Style shoe K12F7</p>
                <p>Rs.2000/-</p>
                <!-- <button type="button" style="color: red">SHOP</button> -->
                <input type="checkbox" name="item[]" value="Bag" > Buy this<br>
            </div>
        </div>
  
        <div class="column">
            <div class="card">
                <img src="shirt.jpg">
                <p>Van Heusen FLAT 500 OFF</p>
                <p>Rs.900/-</p>
                <!-- <button type="button" style="color: red">SHOP</button> -->
                <input type="checkbox" name="item[]" value="Shirt" > Buy this<br>
            </div>
        </div>
  
        <div class="column">
            <div class="card">
                <img src="shoe.jpg">
                <p>NEW WOODLAND</p>
                <p>RS.500/-</p>
                <!-- <button type="button" style="color: red">SHOP</button> -->
                <input type="checkbox" name="item[]" value="Shoe" > Buy this<br>
            </div>
        </div>
    </div>
    <input type="submit" value="Submit">
  </form>

    
</body>
</html>
