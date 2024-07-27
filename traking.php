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


<style>
body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #fff;
    background-repeat: no-repeat
}

.card {
    z-index: 0;
    background-color: #fff;
    padding-bottom: 20px;
    margin-top: 90px;
    margin-bottom: 90px;
    border-radius: 10px
}

.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #f0932b;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #000
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #f0932b;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 15px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #f0932b
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c"
}

.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
}
</style>
<!-- <?php 
    $orde = @$_SESSION['order_id'];
    $user =  @$_SESSION['user_id'];
    $ck_id =  $_SESSION['cake_id'];
        $query = "select * from tbl_payment where `order_id`='$orde' AND `user_id`='$user' AND `cake_id`='$ck_id'";
        $query1 = mysqli_query($con,$query);
        $query2 = mysqli_fetch_array($query1);

   $qu ="select * from checkout where `order_id`='$orde'";
   $qu1 = mysqli_query($con,$qu);
   $qu2 = mysqli_fetch_array($qu1);

   $car_re =  explode(',',$qu2['cart_id']);
   for($i=0;$i<sizeof($car_re);$i++)
   {
        $cart_re =  "select * from cart JOIN product_master ON cart.cake_id=product_master.cake_id where `cart_id`='$car_re[$i]'";
        $cart_rec = mysqli_query($con,$cart_re);
        $cart_rec1[] =  mysqli_fetch_array($cart_rec);
    }


?> -->
<section class="class">
	<div class="container">
		<div class="row" >
			<div class="col-lg-12" >
				
			<div class="container px-1 px-md-4 py-3 mx-auto">
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER <span class=" font-weight-bold" style="color:#f0932b;">#101</span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <div class="date">Expected Arrival: 2022-03-25</div>
				
                        
                <p>Track id <span class="font-weight-bold">234094567242423422898</span></p>
            </div>
            
            <table border="1" cellspacing="0" cellpadding="0" class="table table-hover table-bordered">
                    <thead>
                      
                        <tr style="color:#f0932b;">
                            <th>No.</th>
                            <th class="text-center">Cake Name</th>
                            <th class="text-center">Cake image</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Weight & PCs</th>
                            <th class="text-right">Other Charge</th>
                            <th class="text-right">Total</th>
                            
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        
                        $k=1;
                        for($i=0;$i<sizeof($cart_rec1);$i++)
                        {
                        ?>
                        <tr>
                            <td><?php echo $k; $k++;?></td>
                            
                            <td class="text-center">
                              <?php echo @$cart_rec1[$i]['name']; ?>
                            </td>
                            <td class="unit"> <center><img src="Admin/image/<?php echo @$cart_rec1[$i]['image'];; ?>" width="100px" class="img-thumbnail"></center></td>
                            <td class="unit"> <?php echo @$cart_rec1[$i]['price'];; ?></td>
                            <td class="unit"> <?php echo @$cart_rec1[$i]['qty'];; ?></td>
                            <td class="unit"> <?php echo @$cart_rec1[$i]['weight'];; ?></td>
                            <td class="unit"> <?php echo @$cart_rec1[$i]['dc'];; ?></td>
                            <td class="unit"> <?php echo @$cart_rec1[$i]['total_price'];; ?></td>
                            
                        </tr>
                        
                    <?php } ?>

                   
                        
          
                       
                    </tbody>
                </table>


                <table class="table table-hover table-bordered" align="center" style="backgroung-color:#000;" width="70%">
                     
                    <tr style="text-align:right;">
                        <td>Total: <span><?php if(@$query2['amount']) { echo $query2['amount']; } else { echo @$_SESSION['tp']; } ?></span></td>
                    </tr>

                </table>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content"> <a href="#"><img class="icon" src="https://i.imgur.com/9nnc9Et.png"></a>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <a href="#"><img class="icon" src="https://i.imgur.com/u1AzR7w.png"></a>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <a href="#"><img class="icon" src="https://i.imgur.com/TkPm63y.png"></a>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <a href="#"><img class="icon" src="https://i.imgur.com/HdsziHP.png"></a>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
</div>

				
			</div>
		</div>
		
	</div>
</section>






<?php include('footer.php'); ?>