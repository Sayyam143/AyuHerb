<?php 

    ob_start(); 

    include('header.php');

    $OTP = $_SESSION['otp'];

    if(isset($_POST['submit']))
    {
        $otp = $_POST['otp'];

        if($otp == $OTP)
        {
            header('location:confirm_password.php');
        }
        else
        {
            $msg = "Invalid OTP";
        }
    }

    

 ?>

<!-- <section class="hero">
	<div class="hero__slider owl-carousel">
		<div class="hero__item set-bg" data-setbg="img/hero/3.jpg">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-8">
						<div class="hero__text">
							<h2>OTP(One Time Password)</h2>
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
						<span>OTP(One Time Password)</span>
					</div>
				<?php if(isset($msg)) { ?>
					<div class="alert alert-danger"><?php echo $msg; ?></div>
				<?php } ?>
					<form method="post">
					
						
						<input type="text" name="otp" placeholder="Enter OTP(One Time Password)">
				
					
						<button type="submit" name="submit" class="site-btn">Submit</button>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>



<?php include('footer.php'); ?>