<?php 

	include('admin/db.php');

	if(isset($_POST['cart_id']))
	{
		$cart_id = $_POST['cart_id'];
		$price = $_POST['price'];
		$qty = $_POST['qty'];
		$weight = $_POST['weight'];

		 $total_price = ($qty * $price) * $weight; 
		$update = "update cart set `qty` = '$qty',`total_price` = '$total_price' where `cart_id` = '$cart_id'";
		$que = mysqli_query($con,$update);
	}


 ?>