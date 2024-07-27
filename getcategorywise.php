<?php 

	include('admin/db.php');

	if(isset($_POST['c_id']))
	{
		$c_id = $_POST['c_id'];
		$sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id where product_master.`c_id` = '$c_id'";
		$qu = mysqli_query($con,$sel);

	}


 ?>

 	<?php while($record = mysqli_fetch_array($qu)) { ?>
			<div class="col-lg-3 col-md-6 col-sm-6" >
				<div class="product__item">
				<div class="product__item__pic set-bg" data-setbg="admin/image/<?php echo $record['image'] ?>" style="background-image: url(&quot;admin/image/<?php echo $record['image']; ?>&quot;);">
						<div class="product__label">
							<span><?php echo $record['subcategory_name']; ?></span>
						</div>
					</div>
					<div class="product__item__text">
						<h6><a href="product.php?cake_id=<?php echo $record['cake_id']; ?>"><?php echo $record['name']; ?></a></h6>
						<div class="product__item__price"><i class="fa fa-rupee"></i> <?php echo $record['price']; ?></div>
						<div class="cart_add">
							<a href="product.php?cake_id=<?php echo $record['cake_id']; ?>">View Product</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>