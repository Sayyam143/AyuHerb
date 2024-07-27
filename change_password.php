<?php 

ob_start();
include('header.php');
// include('admin/db.php');
// session_start();

$dbpass = $_SESSION['user']['password'];

if(isset($_POST['submit']))
{
	$opass = $_POST['opass'];
	$npass = $_POST['npass'];
	$cpass = $_POST['cpass'];

	if($opass==$dbpass)
	{
		if($opass!=$npass)
		{
			if($npass==$cpass)
			{
				$user_id = $_SESSION['user']['user_id'];
				$update = "update user set `password` = '$npass' where `user_id` = '$user_id'";
				$qu = mysqli_query($con,$update);
				header('location:logout.php');
			}
			else
			{
				$msg = "Comfirm password does not match as new password";
			}
		}
		else
		{
			$msg = "New password same as old password please try another";
		}
	}
	else
	{
		$msg = "Invalid old password";
	}
}

?>


<!-- <section class="hero">
	<div class="hero__slider owl-carousel">
		<div class="hero__item set-bg" data-setbg="img/hero/1.jpg">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-8">
						<div class="hero__text">
							<h2>Change Password</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section> -->







<section class="class spad">
	<div class="container">
		<div class="row" >
			<div class="col-lg-6" style="margin: 0 300px 100px 300px;">
				<div class="class__form">
					<div class="section-title">
						<span>Change Password</span>
						
					</div>
				<?php if(isset($msg)) { ?>
					<div class="alert alert-danger"><?php echo $msg; ?></div>
				<?php } ?>
					<form method="post">
					<?php if(isset($nameERR)) { ?>
						<small style="color:red;"><?php echo $nameERR; ?></small>
					<?php } ?>
						<input type="password" name="opass" placeholder="Old Password">
						<input type="password" name="npass" placeholder="New Password">
						<input type="password" name="cpass" placeholder="Comfirm Password">
						<button type="submit" name="submit" class="site-btn">Change Password</button>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>



<?php include('footer.php'); ?>