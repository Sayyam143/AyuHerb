<?php 

ob_start();
include('header.php');

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact_no = $_POST['contact_no'];

		$user_id = $_SESSION['user']['user_id'];

		$insert = "update user set `name` = '$name' ,`email`='$email',`contact_no`='$contact_no' where `user_id` = '$user_id'"; 
		$que = mysqli_query($con,$insert);

		if($que)
		{
			$msg = "Profile updated";
		}
	}

		$user_id = $_SESSION['user']['user_id'];
		$sel = "select * from user where `user_id` = '$user_id'";
		$que1  = mysqli_query($con,$sel);
		$record = mysqli_fetch_array($que1);


?>


<!-- <section class="hero">
	<div class="hero__slider owl-carousel">
		<div class="hero__item set-bg" data-setbg="img/hero/3.jpg">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-8">
						<div class="hero__text">
							<h2>Profile</h2>
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
			<div class="col-lg-6" style="margin:0 300px 100px 300px;">
				<div class="class__form">
					<div class="section-title">
						<span>My Profile</span>
					</div>
				<?php if(isset($msg)) { ?>
					<div class="alert alert-success"><?php echo $msg; ?></div>
				<?php } ?>
					<form method="post">
						<label>Name :</label>
						<input type="text" name="name" value="<?php if(isset($record['name'])) { echo $record['name']; } ?>">
							
					
						<label>Email :</label>
						<input type="text" name="email" value="<?php if(isset($record['email'])) { echo $record['email']; } ?>">

						<label>Contact No :</label>
						<input type="text" name="contact_no" value="<?php if(isset($record['contact_no'])) { echo $record['contact_no']; } ?>">
						<button type="submit" name="submit" class="site-btn">Change Profile</button>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>



<?php include('footer.php'); ?>