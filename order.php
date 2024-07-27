<?php
include('header.php');
$user_id = $_SESSION['user']['user_id'];
        $sel = "select * from cart JOIN product_master ON product_master.cake_id = cart.cake_id where `user_id` = '$user_id' AND `status`='completed'";
       $que = mysqli_query($con,$sel);
       $num=mysqli_num_rows($que);
        $res=mysqli_fetch_array($que);
        @$cart_id=$res['cart_id'];
        $sel1="select * from checkout where `cart_id` = '$cart_id'";
        $q=mysqli_query($con,$sel1);
        $res1=mysqli_fetch_array($q);
        // echo "<pre>";
        // print_r($res1);

?>
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>My order</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="index.php">Home</a>
                        <span>My order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        <?php if(@$num!=0){   ?>

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
                                    <th>status</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                               
                                <tr>
                                   
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="admin/image/<?php echo $res['image']; ?>" width="100px">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?php echo $res['name']; ?></h6>
                                            
                                            
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <?php echo $res['qty']; ?>
                                        </div>
                                    </td>
                                    <td class="cart__price" id="total_price1"><i class="fa fa-rupee">
                                        <?php echo $res['total_price']; ?>
                                    </i> </td>
                                    
                                    <td><?php if($res1['status']=='confirm')
                                    {
                                        echo "in process";

                                    }
                                    elseif ($res1['status']=='complete') {
                                        echo "Dispatched";
                                    }
                                    elseif($res1['status']=='delivered')
                                        {
                                            echo "delivered";
                                        }
                                        ?></td>
                                   
                                </tr>
                           
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
                                        <h2>Sorry,you have not any order</h2>
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
<?php include('footer.php');?>
