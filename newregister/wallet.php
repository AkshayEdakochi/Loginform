<!DOCTYPE html>
<html>
<head>
	<title>Wallet Status</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="header">
	<h2>Wallet Status</h2>
</div>
<div class="container">
  <div class="jumbotron">
    <h1>Thank You for Your Purchase</h1>
    <img src="emoji.jpg" style="float: right">

<?php
session_start();
$name = $_GET['item'];

// optional
// echo "You chose the following color(s): <br>";
$bal = $_SESSION['balanceno'];
foreach ($name as $color){ 
    echo $color."<br />";
    if ($color=="watch") {
    	$bal=$bal-1700;
    	
    }
    elseif ($color=="Bag") {
    	$bal=$bal-2000;
    }
    elseif ($color=="Shirt") {
    	$bal=$bal-900;
    }
    elseif ($color=="Shoe") {
    	$bal=$bal-500;
    }
}

if ($bal<0) {
	echo "Balance insufficient ";

	//header('location:index.php');
}
else
{
echo "Current balance  : ";
echo $bal ;
$username = $_SESSION['username'];


///********************///
$db = mysqli_connect('localhost', 'root', 'Akshay@1999', 'register');
$query = "SELECT * FROM users WHERE username='$username'";

    $results = mysqli_query($db, $query);
    $usr =mysqli_fetch_assoc($results);
    $id=$usr['id']; 
    $query2= "UPDATE accounts set balance=$bal WHERE id = $id";
    $res =mysqli_query($db, $query2);
    $bal = mysqli_fetch_assoc($res);
    $balance=$bal['balance'];  

////**********************////
}

?>


  </div>
  <h1>VISIT AGAIN</h1>
  <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
</div>
</body>
</html>