<?php 

include('admin/db.php');

session_start();	

$sel = "select * from category";
$qu1 = mysqli_query($con,$sel);

if(isset($_SESSION['user']['user_id'])!="")
{
	@$user_id = $_SESSION['user']['user_id'];
	$sel = "select * from cart where `user_id` = '$user_id' AND `status` = 'Pending'";
	$qu = mysqli_query($con,$sel);
	$num = mysqli_num_rows($qu);
}	

?>


<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/cake/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 21:26:34 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Cake Template">
	<meta name="keywords" content="Cake, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>AyuHerb</title>
	<link rel="shortcut icon" type="image/x-icon" href="img\icon\logo1.ico">

	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/flaticon.css" type="text/css">
	<link rel="stylesheet" href="css/barfiller.css" type="text/css">
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.header__top__right__cart a i {
			font-size: 55px;
		}
	</style>
</head>
<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<div class="offcanvas-menu-overlay"></div>
	<div class="offcanvas-menu-wrapper">
		<div class="offcanvas__cart">
			<div class="offcanvas__cart__links">
				<a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
				<a href="#"><img src="img/icon/heart.png" alt=""></a>
			</div>
			<div class="offcanvas__cart__item">
				<a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
				<div class="cart__price">Cart: <span>$0.00</span></div>
			</div>
		</div>
		<div class="offcanvas__logo">
			<a href="index.html"><img src="img/logo.png" alt=""></a>
		</div>
		<div id="mobile-menu-wrap"></div>
		<div class="offcanvas__option">
			<ul>
				<li>USD <span class="arrow_carrot-down"></span>
					<ul>
						<li>EUR</li>
						<li>USD</li>
					</ul>
				</li>
				<li>ENG <span class="arrow_carrot-down"></span>
					<ul>
						<li>Spanish</li>
						<li>ENG</li>
					</ul>
				</li>
				<li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
			</ul>
		</div>
	</div>


	<header class="header">
		<div class="header__top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="header__top__inner">

							<div class="header__logo">
								<a href="index.php"><img src="img/logo.png" width="150px" height="70px" alt=""></a>
							</div>
							<div class="header__top__right">
							
								<?php if(isset($_SESSION['user']['name'])) { ?>
								<a class="pr-3"  href="profile.php"><img src="img/icon/user2.png" width="25px" alt="">	
                                 <?php if(isset($_SESSION['user'])) {?><span style="color:#f0932b; font-weight: bold;"><?php echo $_SESSION['user']['name'];?></span><?php } ?></a>
								<?php
								}  else { ?>
								<a class="pr-3"  href="login.php"><img src="img/icon/user2.png" width="25px" alt="">	
								<?php } ?>

								<div class="header__top__right__cart">
									<a class="pr-3" href="cart.php"><img src="img/icon/cart.png" width="25px" alt=""> <?php if(isset($num)) { ?><span style="color:#f0932b;font-weight: bold;"><?php echo $num; ?></span><?php } else { ?><span style="color:#f0932b;font-weight: bold;">0</span><?php } ?></a>
								</div>

							<a class="pr-3" style="color:black; font-size:25px;" href="traking.php"><img src="img/icon/track.png" width="40px"  alt=""></a>

							</div>
						</div>
					</div>
				</div>
				<div class="canvas__open"><i class="fa fa-bars"></i></div>
			</div>
		</div>
		<div class="container ">
			<div class="row">
				<div class="col-lg-12">
					<nav class="header__menu mobile-menu">
						<ul>
							<li><a href="index.php">Home</a></li>
						<?php while($record = mysqli_fetch_array($qu1)) { ?>
							<li><a href="shop.php?c_id=<?php echo $record['c_id']; ?>"><?php echo $record['category_name']; ?></a></li>
						<?php } ?>

							<?php if(isset($_SESSION['user']['name'])) { ?>
								<li><a href="#"><?php if(isset($_SESSION['user'])) { echo $_SESSION['user']['name']; } ?></a>
									<ul class="dropdown" style="width: 223px;">
										<li><a href="profile.php"><i class="fa fa-user pr-2" aria-hidden="true"></i>Profile</a></li>
										<li><a href="change_password.php"><i class="fa fa-unlock-alt pr-2" aria-hidden="true"></i>Change Password</a></li>
										<li><a href="logout.php"><i class="fa fa-sign-out pr-2" aria-hidden="true"></i>Logout</a></li>
									</ul>
								</li>
							<?php } else { ?>
								<li><a href="#">Login</a>
									<ul class="dropdown" style="width: 223px;">
										<li><a href="login.php"><i class="fa fa-sign-in pr-2" aria-hidden="true"></i>Login</a></li>
										<li><a href="register.php"><i class="fa fa-plus-square pr-2" aria-hidden="true"></i>Register</a></li>
									</ul>
								</li>
							<?php } ?>
							
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>