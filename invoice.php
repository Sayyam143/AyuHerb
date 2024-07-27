<?php

    include('admin/db.php');

    session_start();

    $user_id = $_SESSION['user']['user_id'];
    $order_id = $_SESSION['order_id'];

    $upd = "update checkout set `status` = 'confirm' where `order_id` = '$order_id'";
    $que = mysqli_query($con,$upd);

    $sel  = "select * from checkout where `order_id` = '$order_id'";
    $qe = mysqli_query($con,$sel);
    $que2 = mysqli_fetch_array($qe);
    $cart_id = explode(',',$que2['cart_id']);

    for($i=0;$i<count($cart_id);$i++)
    {
        $update = "update cart set `status` = 'Completed' where `cart_id` = '$cart_id[$i]'";
        mysqli_query($con,$update);
    } 


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #FF1493
    /*#3989c6*/
    /*#E91E63*/
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid  #FF1493
    /*#3989c6*/
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #FFF5EE;
    /*#eee;*/
    border-bottom: 1px solid #FF1493

}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    /*#3989c6;*/
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}
#tot {
    font-size: 16px;
    margin-bottom: 30px;
   
}
.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #FFFAFA
    /*#ddd*/
}

.invoice table .total {
    background: #3989c6;
    color: #FF1493
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #FF1493
    /*#aaa*/
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #FF1493;
    /*#3989c6*/
    font-size: 1.4em;
    border-top: 1px solid #FF1493
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #FF1493;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}

</style>



<?php 
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


?>
<div id="invoice">

    <div class="toolbar hidden-print">
         <div class="text-left">
            <a href="index.php" class="btn btn-success">Home</a>
        </div>
        <div class="text-right">
            <button class="btn btn-success" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print Invoice</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
              
        
            <div class="container-fluid">
                <div style="background-color: #E91E63;">
           
            
                <div class="row py-1">
                    <div class="col-4"><img src="img/logo.png" class="img-fluid" width="100     " alt="indigoseaways"/></div>
                    <div  class="col-8 text-right align-self-center"><b><a href="" class="navbar-brand" style="color:#000; text-align:justify;  font-size:24px;">AyuHerb Wealth Centre</a></b>
                    <!-- <span style="font-family: 'Sansita', sans-serif; font-size:20px;">UNITED GROUP OF INDIA</span><br> -->
                    <span style="font-family: 'Sansita', sans-serif; font-size:20px; padding:20px;">ayuherbwealthcentre@gmail.com</span><br>
                    </div>
                </div>
            
            </div>
            </div>
        </div>

                     <div class="col-12 col-md-6">
                    
                    
                
                    <i class="fa fa-envelope"></i>
                    
                </div>

                </div>

            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <h5><div class="text-gray-light">INVOICE TO:</div></h5>
                        <h3 class="to"><tr><td><?php echo @$qu2['name']; ?></td></tr></h3>
                        <h4><div class="address"><tr><td><?php echo @$qu2['address']; ?></td></tr></div></h4>
                        <h4><div class="email"><tr><td><?php echo @$qu2['email']; ?></td></tr></div></h4>
                    </div>
                    <div class="col invoice-details">
                        
                        <div class="date">Date of Invoice:<?php echo substr($qu2['checkout_time'],0,10);?></div>
                        <div class="date">Due Date: 2022-06-30</div>
                    </div>
                </div>

                 <div id="tot" class="col-md-5">
                    <hr>
                    <table border="1" cellspacing="0" class="table table-hover table-bordered" >
                    <tr>
                    <th>Your phone no</th>
                    <td><?php echo $qu2['contact_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Order_date</th>
                        <td><?php echo substr($qu2['checkout_time'],0,10);?></td>
                    </tr>
                    <tr>
                    <tr>
                        <th>Location Name</th>
                        <td><?php echo $qu2['address'];?></td>
                    </tr>
                    
                    <th>City Name</th>
                        <td><?php echo $qu2['city'];?></td>
                    </tr>
                   
                    
                    <tr>
                        <th>State</th>
                        <td><?php echo @$qu2['state']; ?></td>
                    </tr>
                    </table>
                     
                      
                 </div>

                <table border="1" cellspacing="0" cellpadding="0" class="table table-hover table-bordered">
                    <thead>
                      
                        <tr>
                            <th><b>No.</b></th>
                            <th class="text-center"><b>Item Name</b></th>
                            <th class="text-center"><b>Item image</b></th>
                            <th class="text-right"><b>Price</b></th>
                            <th class="text-right"><b>Quantity</b></th>
                            <th class="text-right"><b>Weight & PCs</b></th>
                            <th class="text-right"><b>Total</b></th>
                            
                        
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
                            <td class="unit"> <?php echo @$cart_rec1[$i]['total_price'];; ?></td>
                            
                        </tr>
                        
                    <?php } ?>

                   
                        
          
                       
                    </tbody>
                </table>


                <table class="table table-hover table-bordered" align="center" bgcolor="#cccccc" width="70%">
                     
                    <tr style="text-align:right;">
                        <td>Total: <span><?php if(@$query2['amount']) { echo $query2['amount']; } else { echo $_SESSION['tp']; } ?></span></td>
                    </tr>

                </table>



                <div class="thanks my-5">Thank you!</div>
                <!-- <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div> -->
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

<script type="text/javascript">
    
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>>