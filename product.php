<?php 

ob_start();
include('header.php');

// include('admin/db.php');

if(!$_SESSION['user']['user_id'])
{
	header("location:login.php");
}

if(isset($_GET['cake_id']))
{
	$cake_id = $_GET['cake_id'];
	$sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id where `cake_id` = '$cake_id'";
	$qu = mysqli_query($con,$sel);
	$product = mysqli_fetch_array($qu);
}
else
{
	header("location:javascript://history.go(-1)");
}

if(isset($_POST['submit']))
{
	$cake_id = $_POST['cake_id'];
	$user_id = $_POST['user_id'];
	$price = $_POST['price'];
	$total_price = $_POST['total_price'];
	$s_weight = $_POST['s_weight'];
	$qty = $_POST['qty'];
	$suggestion = $_POST['suggestion'];
	@$photo = $_FILES['photo']['name'];
	@move_uploaded_file($_FILES['photo']['tmp_name'], "order_pic/".$photo);

	if($suggestion=="")
	{
		$msg = "<strong>Suggestion</strong> must be required* ";
		
	}	
	else if($s_weight=="")
	{
		echo "<script>alert('Weight must be required');</script>";
	}
	else
	{
		 if(isset($_SESSION['user']['user_id'])!="")
        {
            $user_id = $_SESSION['user']['user_id'];
            $sel1 = "select * from cart where `cake_id` = '$cake_id' AND `user_id` = '$user_id' AND `status` != 'Completed'";
            $que2 = mysqli_query($con,$sel1);
            $num = mysqli_num_rows($que2);

            if($num==0)
            {
				$insert = "insert into cart (`cake_id`,`user_id`,`price`,`total_price`,`s_weight`,`qty`,`suggestion`,`photo`,`status`) values ('$cake_id','$user_id','$price','$total_price','$s_weight','$qty','$suggestion','$photo','Pending')";

				$que1 = mysqli_query($con,$insert);
				header('location:cart.php');
            }
            else
            {
				echo "<script>alert('Item already added in cart');</script>";
            }
        }
        else
        {
        	header('location:login.php');
        }

	}


}

	if(isset($_GET['cake_id']))
	{
		$cake_id = $_GET['cake_id'];
		$sel = "select * from product_master where `cake_id` = '$cake_id'";
		$que = mysqli_query($con,$sel);
		$fetch = mysqli_fetch_array($que);
		$category = $fetch['c_id'];

		$sel1 = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id where product_master.`c_id` = '$category'";
		$que1 = mysqli_query($con,$sel1);
	}


?>




<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="breadcrumb__text">
					<h2>Product detail</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="breadcrumb__links">
					<a href="index.php">Home</a>
					<a href="shop.php">Shop</a>
					<span><?php echo $product['name']; ?> with <?php echo $product['flavour']; ?></span>
				</div>
			</div>
		</div>
	</div>
</div>


	<section class="product-details spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 center">
					<div class="product__details__img img-magnifier-container">
						<div class="product__details__big__img ">
							<img id="myimage" class="big_img" src="admin/image/<?php echo $product['image']; ?>" alt="">
						</div>
						<div class="product__details__thumb">
							<div class="pt__item active">
								<img data-imgbigurl="admin/image/<?php echo $product['image']; ?>" src="admin/image/<?php echo $product['image']; ?>" alt="">
							</div>

							<?php $mimg = explode(',',$product['mimage']);
							for($i=0;$i<count($mimg);$i++) { ?>
								<div class="pt__item">
									<img  data-imgbigurl="admin/image/<?php echo $mimg[$i]; ?>" src="admin/image/<?php echo $mimg[$i]; ?>" alt="">
								</div>
							<?php } ?>

						</div>
					</div>
					<div id="myresult" class="img-zoom-result"></div>
				</div>
				<div class="col-lg-6">
				<form method="post" enctype="multipart/form-data"> 

					<input type="hidden" name="cake_id" value="<?php echo $product['cake_id']; ?>">
					<input type="hidden" name="user_id" value="<?php if(isset($_SESSION['user']['name'])) { echo $_SESSION['user']['name']; } ?>">




					<div class="product__details__text">
						<div class="product__label"><?php echo $product['category_name']; ?></div>
						<h4><?php echo $product['name']; ?></h4>
						<h5><i class="fa fa-rupee"></i> <?php echo $product['price']; ?></h5>
						<input type="hidden" name="price" value="<?php echo $product['price']; ?>" id="price">
						<ul>
							<li>Discripction : <span><?php echo $product['description']; ?><span></li>
							<li>Category: <span><?php echo $product['subcategory_name']; ?></span></li>
							<!-- <li>Flavour: <span> -->
								<?php
								//  echo $product['flavour'];
								 ?>
							<!-- </span></li>  -->
							<!-- <li>Weight: <span><?php echo $product['weight']; ?></span></li> -->
							<div class="mt-3">
									<label style="margin-left: -8px;">Selected Weight :</label>
									<input style="border: none" readonly type="text" name="s_weight" value="1" class="flavour-select" id="cake_weight1">
								</div> 
						</ul>
						<div class="product__details__option">
							<div class="quantity"  onclick="return getprice()">
								<div class="pro-qty">
									<input type="text" name="qty" value="1" id="qty">
								</div>
							</div>
						</div><br>
						<div class="product__details__option">
							<h5 id=""> Total Price ₹</h5>
							<h5 id="total_price">  <?php echo $product['price']; ?></h5>
							<input type="hidden" id="total_price1" name="total_price" value="<?php echo $product['price']; ?>">

							<?php if($product['s_id']==2) { ?>
								<div class="d-flex flex-wrap">
									<p class="col-lg-3">Select Pieces:</p>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('1')" value="1" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">1 Piece</button></label>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('2')" value="2" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">2 Piece</button></label>

								</div>
								<div class="mt-3 ml-4">
									<label style="margin-left: -8px;">Selected Weight :</label>
									<input style="border: none" readonly type="text" name="s_weight" value="1" class="flavour-select" id="cake_weight1">
								</div>

							<?php  } else if($product['s_id']==3) { ?>

								<div class="d-flex flex-wrap">
									<p class="col-lg-3">Select Pieces:</p>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('1')" value="2" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">1 Piece</button></label>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('2')" value="1" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">2 Piece</button></label>

								</div>

								

							<?php } else { ?>
								<div class="d-flex flex-wrap">
									<p class="col-lg-3">Weight :</p>
									<label id="form" class="col-lg-3"><button type="button" style="width: 112px !important;" name="weight" onclick="return cakeweight('1.0')" value="1.0" id="weight"  class="btn  btn-warning hover-btn addItemBtn">1 KG</button></label>&nbsp;
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('0.1')" value="0.1" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">100 GM</button></label>
									<!-- <label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('1')" value="1" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">100 GM</button></label>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('1.5')" value="1.5" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">1.5 KG</button></label>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('2')" value="2" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">2.0 KG</button></label>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('2.5')" value="2.5" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">2.5 KG</button></label>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('3')" value="3" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">3.0 KG</button></label>
									<label id="form" class="col-lg-3"><button type="button" name="weight" onclick="return cakeweight('3.5')" value="3.5" id="weight" style="width: 112px !important;" class="btn  btn-warning hover-btn addItemBtn">3.5 KG</button></label> -->
								</div>
								<!-- <div class="mt-3 ml-4">
									<label style="margin-left: -8px;">Selected Weight :</label>
									<input style="border: none"  readonly type="text" name="s_weight" value="1" class="flavour-select" id="cake_weight1">
								</div> -->
								<?php } ?><br>

								<label> </label><br>
								<textarea name="suggestion" style="width: 100%" placeholder="Give the name of patient"></textarea>
								<?php if(isset($msg)) { ?>
									<div class="alert alert-danger"><?php echo $msg; ?></div>
							<?php	} ?>

							
								<?php if($product['s_id']==4) { ?>
									<br><br><label>Photo on cake :</label>
									<input type="file" name="photo">
								<?php } ?>
							</div>
							<br>
							<div>
								<button type="submit" name="submit" class="primary-btn">Add to cart</button>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</section>

		<section class="related-products spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Related Products</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="related__products__slider owl-carousel">
						<?php while($record = mysqli_fetch_array($que1)) { ?>
						<div class="col-lg-3">
							<div class="product__item">
								<div class="product__item__pic set-bg" data-setbg="admin/image/<?php echo $record['image']; ?>">
									<div class="product__label">
										<span><?php echo $record['subcategory_name']; ?></span>
									</div>
								</div>
								<div class="product__item__text">
									<h6><a href="product.php?cake_id=<?php echo $record['cake_id']; ?>"><?php echo $record['name'] ?></a></h6>
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
			</div>
		</section>


		<?php include('footer.php'); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script>

			function getprice()
			{
				var qty = $('#qty').val();
				var price = $('#price').val();
				var cake_weight = $('#cake_weight1').val();

				if(qty>=1)
				{
					var total_price = (qty * price) * cake_weight;

					$('#total_price1').val(total_price);
					$('#total_price').html(total_price);
				}
				else
				{
					$('#qty').val(1);
					$('#total_price1').val(price);
					$('#total_price').html(price);
				}

			}

			function cakeweight(w)
			{
				var qty = $('#qty').val();
				var price = $('#price').val();

				var total_price = (price * w) * qty;
				$('#total_price1').val(total_price);
				$('#total_price').html(total_price);
				$('#cake_weight').val(w);
				$('#cake_weight1').val(w);
				document.getElementById('cake_weight1').type = "text";

			}

			magnify("myimage", 2);
			function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}



		</script>