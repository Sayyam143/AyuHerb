<?php 

ob_start();
include('header.php');

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$contact_no = $_POST['contact_no'];

	if($name=="")
	{
		$nameERR = "Name must be required";
		$eroor=1;
	}
	if($email=="")
	{ 
		$emailERR  = "Email must be required";
		$eroor=1;
	}
	if($contact_no=="")
	{
		$contactERR = "contact must be required";
		$eroor=1;
	}
	if($password=="")
	{
		$passwordERR = "Password must be required";
		$eroor=1;
	}
	// if(strlen($password<8))
	// {
	// 	$passwordERR = "Password must be above 8 digits";
	// 	$eroor=1;
	// }
	if(strlen($contact_no)!=10)
	{
		$contactERR="Contact Number Must be 10 Digits";
		$eroor=1;
	}
	// if($eroor=1){
	// 	echo '<div class="alert alert-danger">ALL FEILD REQUIDE....</div>';
	// }
	else
	{
		$insert = "insert into user (`name`,`email`,`password`,`contact_no`) values ('$name','$email','$password','$contact_no')";
		$qu = mysqli_query($con,$insert);

		if($qu)
		{
			header('location:login.php');
		}
	}
}

?>


<!-- <section class="hero">
	<div class="hero__slider owl-carousel">
		<div class="hero__item set-bg" data-setbg="img/hero/2.jpg">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-8">
						<div class="hero__text">
							<h2>Register</h2>
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
						<span>Register</span>
						<h2>Made from your <br />account</h2>
					</div>
				<?php if(isset($msg)) { ?>
					<div class="alert alert-success"><?php echo $msg; ?></div>
				<?php } ?>
					<form method="post">
					<?php if(isset($nameERR)) { ?>
						<small style="color:red;"><?php echo $nameERR; ?></small>
					<?php } ?>
						<input type="text" name="name" placeholder="Name">
							<?php if(isset($emailERR)) { ?>
						<small style="color:red;"><?php echo $emailERR; ?></small>
					<?php } ?>
						<input type="email" name="email" placeholder="Enter Email">
							<?php if(isset($contactERR)) { ?>
						<small style="color:red;"><?php echo $contactERR; ?></small>
					<?php } ?>
						<input type="text" name="contact_no" placeholder="Phone">
						<!-- <select>
							<option value="">Studying Class</option>
							<option value="">Writting Class</option>
							<option value="">Reading Class</option>
						</select> -->
							<?php if(isset($passwordERR)) { ?>
						<small style="color:red;"><?php echo $passwordERR; ?></small>
					<?php } ?>
						<input type="password" name="password" placeholder="Enter the password">
						<button type="submit" name="submit" class="site-btn">registration</button>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>



<?php include('footer.php'); ?>