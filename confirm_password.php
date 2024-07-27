<?php 

    ob_start(); 

    include('header.php');

    $email = $_SESSION['email'];

    if(isset($_POST['submit']))
    {
        $npass = $_POST['npass'];
        $cpass = $_POST['cpass'];

        if($npass==$cpass)
        {
            $update = "update user set `password` = '$npass' where `email` = '$email'";
            $qu = mysqli_query($con,$update);
            header('location:login.php');
        }
        else
        {
            $msg = "Please confirm password same as new password";
        }
    }

    

 ?>
<!-- 
<section class="hero">
	<div class="hero__slider owl-carousel">
		<div class="hero__item set-bg" data-setbg="img/hero/3.jpg">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-8">
						<div class="hero__text">
							<h2>Confirm Password</h2>
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
						<span>Confirm Password</span>
						</div>
					<?php if(isset($msg)) { ?>
						<div class="alert alert-danger"><?php echo $msg; ?></div>
					<?php } ?>
					<form method="post">
					
						
						<input type="password" name="npass" placeholder="Enter New Password">
						<input type="password" name="cpass" placeholder="Enter Confirm Password">
				
					
						<button type="submit" name="submit" class="site-btn">Submit</button>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>



<?php include('footer.php'); ?>