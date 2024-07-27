<?php 

    ob_start();
    include('header.php'); 

    if(isset($_POST['submit']))
    {
      $email = $_POST['email'];

      $sel = "select * from user where `email` = '$email'";
      $qu = mysqli_query($con,$sel);
      $num =  mysqli_num_rows($qu);

      if($num==1)
      {
        $_SESSION['email'] = $email;
        header('location:email.php');
      }
      else
      {
        $msg = "Invalid Email id";
      }
    }
   

?>

<!-- <section	section class="hero">
	<div class="hero__slider owl-carousel">
		<div class="hero__item set-bg" data-setbg="img/hero/3.jpg">
			<div class="container">
			<div class="row d-flex justify-content-center">
					<div class="col-lg-8">
						<div class="hero__text">
							<h2>Forgot Password</h2>
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
						<span>Forgot Password</span>
					</div>
				<?php if(isset($msg)) { ?>
					<div class="alert alert-danger"><?php echo $msg; ?></div>
				<?php } ?>
					<form method="post">
					
						
						<input type="text" name="email" placeholder="Enter Email">
				
					
						<button type="submit" name="submit" class="site-btn">Recover Password</button>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>



<?php include('footer.php'); ?>