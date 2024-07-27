<?php 

	include('header.php'); 

	if(isset($_GET['c_id']))
	{
	$c_id = $_GET['c_id'];

	if(isset($_GET['search']))
	{
		$ser = $_GET['search'];
		$sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id where category.`c_id` = '$c_id' OR subcategory.`subcategory_name` LIKE '%$ser%' OR `name` LIKE '%$ser%'";
	}
	else
	{
		$sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id where category.`c_id` = '$c_id'";
		
	}
	$qu = mysqli_query($con,$sel);
}
else
{
	
	
	if(isset($_GET['search']))
	{
		$ser = $_GET['search'];
		$sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id where subcategory.`subcategory_name` LIKE '%$ser%' OR `name` LIKE '%$ser%'";
	}
	else
	{
		$sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id";
		
	}
	$qu = mysqli_query($con,$sel);
}


	$category_sel = "select * from category";
	$que  = mysqli_query($con,$category_sel);

?>


<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="breadcrumb__text">
					<h2>Shop</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="breadcrumb__links">
					<a href="index.php">Home</a>
					<span>Shop</span>
				</div>
			</div>
		</div>
	</div>
</div>


<section class="shop spad">
	<div class="container">
		<div class="shop__option">
			<div class="row">
				<div class="col-lg-7 col-md-7">
					<div class="shop__option__search">
						<form>
							<select onchange="return getcategorywise()" id="c_id">
								<option value="">Categories</option>
								<?php while($category = mysqli_fetch_array($que)) { ?>

								<option value="<?php echo $category['c_id']; ?>"><?php echo $category['category_name']; ?></option>
								<?php } ?>
							</select>
							<input type="text" name="search" placeholder="Search">
							<button type="submit" name="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
			
			</div>
		</div>
		<div class="row resultcat">

			<?php while($record = mysqli_fetch_array($qu)) { ?>
			<div class="col-lg-3 col-md-6 col-sm-6" >
				<div class="product__item">
					<div class="product__item__pic set-bg" data-setbg="admin/image/<?php echo $record['image']; ?>">
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
	

		</div>
	 	
	</div>
</section>


<?php include('footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	
	function getcategorywise()
	{
		var c_id = $('#c_id').val();
		
		$.ajax({
			url : "getcategorywise.php",
			type : "post",
			data : {
				'c_id' : c_id
			},
			success : function(r)
			{
				$('.resultcat').html(r);
			}
		});
	}

</script>