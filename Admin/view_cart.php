<?php 

    include('header.php');
    // include('db.php');


  if(isset($_GET['cart_id']))
  {
    $cart_id = $_GET['cart_id'];
    $del = "delete from cart where `cart_id` = '$cart_id'";
    mysqli_query($con,$del);
  }


        $sel = "select * from cart JOIN product_master ON product_master.cake_id = cart.cake_id";
        $qu = mysqli_query($con,$sel);


 ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                                    <h4 class="title-1">View Cart</h4>
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
                                                <th>Total Price</th>
                                                <th>Weight</th>
                                                <th>Qty</th>
                                                <th>Suggestion</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                                <!-- <th>Status</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($record = mysqli_fetch_array($qu)) { ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $record['cart_id']; ?></td>
                                                <td><?php echo $record['name']; ?></td>
                                                <td><?php echo $record['user_id']; ?></td>
                                                <td><?php echo $record['price']; ?></td>
                                                <td><?php echo $record['total_price']; ?></td>
                                                <td><?php echo $record['weight']; ?></td>
                                                <td><?php echo $record['qty']; ?></td>
                                                <td><?php echo $record['suggestion']; ?></td>
                                                <td><img src="image/<?php echo $record['image']; ?>" width="75px"></td>
                                                <td><a href="view_cart.php?cart_id=<?php echo $record['cart_id']; ?>"><i class="fa fa-trash"></i></a></td>
                    
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