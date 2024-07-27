<?php 

	ob_start();
	include('header.php');

	if(isset($_GET['cart_id']))
	{
		$cart_id = $_GET['cart_id'];
		
		$del = "delete from cart where `cart_id` = '$cart_id'";
		$query1 = mysqli_query($con,$del);

		if($query1)
		{
			$msg = "Item removed in cart";
		}
	}

	if($_SESSION['user']['user_id']!="")
	{
		$user_id = $_SESSION['user']['user_id'];
		$sel = "select * from cart JOIN product_master ON product_master.cake_id = cart.cake_id where `user_id` = '$user_id' AND `status` = 'Pending'";
		$que = mysqli_query($con,$sel);
	}
	else
	{
		header("location:javascript://history.go(-1)");
	}

 ?>

	<div class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="breadcrumb__text">
						<h2>Shopping cart</h2>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="breadcrumb__links">
						<a href="index.php">Home</a>
						<span>Shopping cart</span>
					</div>
				</div>
			</div>
		</div>
	</div>

						<?php if(@$num!=0) { ?>

	<section class="shopping-cart spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="shopping__cart__table">
						<table>
							<thead>
								<tr>
									<th>Product</th>
									<th>Quantity</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<?php if(isset($msg)) { ?>
							<div class="alert alert-danger"><?php echo $msg; ?></div>
						<?php } ?>
							<tbody>
								<?php $i=0; $j=0; $k=0; $total_price=0;  while($cart = mysqli_fetch_array($que)) { ?>
								<tr>
									<input type="hidden" name="cart_id" id="cart_id" value="<?php echo $cart['cart_id']; ?>">

									<td class="product__cart__item">
										<div class="product__cart__item__pic">
											<img src="admin/image/<?php echo $cart['image']; ?>" width="100px">
										</div> 	 
										<div class="product__cart__item__text">
											<h6><?php echo $cart['name']; ?></h6>
											<h5><i class="fa fa-rupee"> <?php echo $cart['price']; ?></i> </h5>
											<input type="hidden" name="price" id="price<?php echo $k; ?>" value="<?php echo $cart['price']; ?>">
										</div>
									</td>
									<td class="quantity__item">
										<div class="quantity" onclick="return getprice('<?php echo $cart['cart_id']; ?>','<?php echo $i; ?>','<?php echo $j; ?>','<?php echo $k; ?>')">
											<div class="pro-qty">
												<input readonly type="text" id="qty<?php echo $i; ?>" value="<?php echo $cart['qty']; ?>">
											</div>
										</div>
									</td>
									<td class="cart__price" id="total_price1"><i class="fa fa-rupee"></i> <?php echo $cart['total_price']; ?></td>
									<td class="cart__close"><a href="cart.php?cart_id=<?php echo $cart['cart_id']; ?>"><span class="icon_close"></span></a></td>
									<input type="hidden" id="weight<?php echo $i; ?>" value="<?php echo $cart['s_weight']; ?>">
								</tr>
							<?php $i++; $j++; $k++; $total_price = $total_price + $cart['total_price']; } ?>
							
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="continue__btn">
								<a href="shop.php">Continue Shopping</a>
							</div>
						</div>
					
					</div>
				</div>
				<div class="col-lg-4">
					
					<div class="cart__total">
						<h6>Cart total</h6>
						<ul>
							<li>Subtotal <span><i class="fa fa-rupee"></i> <?php echo $total_price; ?></span></li>

							<?php if($total_price>=2000) { ?>
							<li>Free delivery <span><?php echo $dc = 0; ?></li>
							<?php } else if($total_price>=1 && $total_price<2000) { ?>
							<li>Delivery Charge <span><i class="fa fa-rupee"></i> <?php echo $dc = 50; ?></span></li>
							<?php } else { ?>
							<li>Delivery Charge <span><i class="fa fa-rupee"></i> <?php echo $dc = 0; ?></span></li>
							<?php } ?>

							<li>Total <span><i class="fa fa-rupee"></i> <?php echo $total_price + $dc; ?></span></li>

						</ul>
						<a href="checkout.php" class="primary-btn">Proceed to checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section>

					<?php } else { ?>

					<section class="shopping-cart spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="shopping__cart__table" style="text-align: center;">
						<table>
							<thead>
								<tr>
									
								</tr>
							</thead>
							
							<tbody>
								<tr>
										<h2>Sorry, Your cart is empty</h2>
								</tr>
							
							</tbody>
						</table>
					</div><br><br>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="continue__btn" style="text-align: center;">
								<a href="shop.php">Continue Shopping</a>
							</div>
						</div>
					
					</div>
				</div>
			
			</div>
		</div>
	</section>


				<?php } ?>
<?php include('footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
			function getprice(cart_id,i,j,k)
			{

				var we = 'weight'+j;
				var ma = 'qty'+i;
				var pri = 'price'+k;
				var qty = document.getElementById(ma).value;	
				var weight = document.getElementById(we).value;	
				var price = document.getElementById(pri).value;	
				$.ajax({
			        url:"updatecart.php",
			        type :"post",
			        data :{
			          'cart_id' : cart_id,
			          'qty' : qty,
			          'price' : price,
			          'weight' : weight,
			        },
			        success: function(data)
			        {
			        	// alert(data);
			          location.reload(); 
			        }
			    });


			}
		
</script>