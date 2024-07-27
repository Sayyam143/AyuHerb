<?php 

    include('header.php');
    // include('db.php');


  if(isset($_GET['cart_id']))
  {
    $cart_id = $_GET['cart_id'];
    $del = "delete from cart where `cart_id` = '$cart_id'";
    mysqli_query($con,$del);
  }


        $sel = " SELECT  `checkout`.`status` AS sts, `checkout`.`order_id`,`product_master`.`name` AS vname , `product_master`.`image`AS cimage, `user`.`name` AS uname, 
        `cart`.`price` AS cprice, `cart`.`qty` AS cqty, `cart`.`total_price` AS ctotal_price, `cart`.`s_weight` AS cs_weight, `cart`.`suggestion` AS csuggestion, `cart`.`photo`,
        `checkout`.`payment_method` AS cpayment_method, `cart`.`cart_id` AS cid
        FROM checkout 
        INNER JOIN product_master ON `checkout`.`cake_id` = `product_master`.`cake_id`
        INNER JOIN user ON `checkout`.`user_id` = `user`.`user_id`
        INNER JOIN cart ON `checkout`.`cart_id` = `cart`.`cart_id`";
        
        $qu = mysqli_query($con,$sel);


 ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-1">View Order</h4>
                </div>
            </div>

            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <?php if(isset($msg)) { ?>
                        <div class="alert alert-danger"><?php echo $msg; ?></div>
                        <?php } ?>


                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>#</th>
                                    <th>Cake Name</th>
                                    <th>User Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total Price</th>
                                    <th>Weight</th>
                                    <th>Suggestion</th>
                                    <th>Photo</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <!-- <th>Action</th> -->
                                    <th>Status</th>
                                    <!-- <th>Status</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($record = mysqli_fetch_array($qu)) { ?>
                                <tr style="text-align: center;">
                                    <td><?php echo $record['order_id']; ?></td>
                                    <td><?php echo $record['vname']; ?></td>
                                    <td><?php echo $record['uname']; ?></td>
                                    <td><?php echo $record['cprice']; ?></td>
                                    <td><?php echo $record['cqty']; ?></td>
                                    <td><?php echo $record['ctotal_price']; ?></td>
                                    <td><?php echo $record['cs_weight']; ?></td>
                                    <td><?php echo $record['csuggestion']; ?></td>
                                    <td><img src="image/<?php echo $record['cimage']; ?>" width="75px">
                                    </td>
                                    <td><?php echo $record['cpayment_method']; ?></td>

                                    <?php if($record['sts']=="confirm") { ?>
                                    <td><span class="badge badge-success">Success</span></td>
                                    <?php } else { ?>
                                    <td><span class="badge badge-danger">Pending</span></td>
                                    <?php } ?>
<!-- 
                                     <td><a href="view_cart.php?cart_id=<?php echo $record['cid']; ?>"><i class="fas fa-file-pdf"></i></a></td> -->

                                    <?php if($record['sts']=="confirm") { ?>
                                    <td><a href="confimorder.php?id=<?php echo $record['order_id'];  ?>" class="btn btn-success">Comfirm</a></td>
                                    <?php } else { ?>
                                    <td><a href="" class="btn btn-danger">Pending</a></td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>

        </div>
    </div>
</div>
</div>

</div>

<?php include('footer.php'); ?>