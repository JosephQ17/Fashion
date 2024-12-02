<?php
	session_start();
	include("./login/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="index.css">
	<title>KAL VIN</title>
</head>
	<body>
		<main>
			<nav>
				<div class="left">
					<a href="Mens.php">MENS</a>
					<a href="Womens.php">WOMENS</a>
					<a href="Children.php">CHILDRENS</a>
				</div>
				<div class="middle">
					<a href="">KAL VIN</a>
				</div>
				<div class="right">
					<a href="index.php">HOME</a>
					<a href="cart.php">CART</a>
					<a href="logout.php">LOG-OUT</a>
				</div>
			</nav>
			<div class="home-banner">
				<img src="./resources/home-banner.jpg" alt="">
			</div>
			<div class="title">
				<h1>KAL VIN</h1>
			</div>
		</main>
		<section>
			<div class="slide">
				<img src="./resources/mens-banner.jpg" alt="">
				<h1>MENS</h1>
			</div>
			<div class="slide">
				<img src="./resources/womens-banner.jpg" alt="">
				<h1>WOMENS</h1>
			</div>
			<div class="slide2">
				<img src="./resources/children-banner.jpg" alt="">
				<h1>CHILDREN</h1>
			</div>
		</section>
	</body>
</html>