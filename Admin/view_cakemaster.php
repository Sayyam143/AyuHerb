<?php 

    include('header.php');

    if(isset($_GET['cake_id']))
    {
        $cake_id = $_GET['cake_id'];
        $sel1 = "select * from product_master where `cake_id` = '$cake_id'";
        $que1 = mysqli_query($con,$sel1);
        $fetch1 = mysqli_fetch_array($que1);
        @unlink("image/".$fetch1['image']);

        $mimg = explode(',',$fetch1['mimage']);

        for($i=0;$i<count($mimg);$i++) 
        {
            @unlink("image/".$mimg[$i]);
        }

        $del = "delete from product_master where `cake_id` = '$cake_id'";
        $que = mysqli_query($con,$del);

        if($que)
        {
            $msg = "Subcategory Deleted Successfully";
        }
    }

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 0;
    }
    
    $per_page = 10;
    $page = $page * $per_page;

    if(isset($_GET['search']))
    {
        $ser = $_GET['search'];
        $sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id where `category_name` LIKE '%$ser%' OR `subcategory_name` LIKE '%$ser%' OR `name` LIKE '%$ser%' OR `price` LIKE '%$ser%' OR `flavour` LIKE '%$ser%'";
    }
    else
    {
        $sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id";
    }

    $qu1 = mysqli_query($con,$sel);
    $num = mysqli_num_rows($qu1);
    $num1 = ceil($num/$per_page);

    if(isset($_GET['search']))
    {
        $ser = $_GET['search'];
        $sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id where `category_name` LIKE '%$ser%' OR `subcategory_name` LIKE '%$ser%' OR `name` LIKE '%$ser%' OR `price` LIKE '%$ser%' OR `flavour` LIKE '%$ser%' LIMIT $page,$per_page";
    }
    else
    {
        $sel = "select * from product_master JOIN category ON category.c_id = product_master.c_id JOIN subcategory ON subcategory.s_id = product_master.s_id LIMIT $page,$per_page";
    }

    $qu = mysqli_query($con,$sel);

 ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       <div class="row">
                       <div class="col-md-12">
                                    <h4 class="title-1">View Product List</h4>
                                </div>
                       </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                <?php if(isset($msg)) { ?>
                                    <div class="alert alert-danger"><?php echo $msg; ?></div>
                                <?php } ?>

                                <form>
                                    <input style="padding: 6px;" type="text" name="search" placeholder="Type here to search">
                                    <input class="btn btn-success" type="submit" name="submit" value="Search">
                                </form><br>
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Name</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Flavour</th>
                                                <th>Image</th>
                                                <th>Mimage</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($record = mysqli_fetch_array($qu)) { ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $record['cake_id']; ?></td>
                                                <td><?php echo $record['category_name']; ?></td>
                                                <td><?php echo $record['subcategory_name']; ?></td>
                                                <td><?php echo $record['name']; ?></td>
                                                <td><?php echo $record['price']; ?></td>
                                                <td><?php echo $record['description']; ?></td>
                                                <td><?php echo $record['flavour']; ?></td>
                                                <td><img src="image/<?php echo $record['image'] ?>" width="75px"></td>
                                                <td><?php $mi = explode(',',$record['mimage']);
                                                    for($i=0;$i<sizeof($mi);$i++) { ?>
                                                        <img src="image/<?php echo $mi[$i]; ?>" width="75px"><?php } ?>
                                                    </td>
                                                <td><a href="view_cakemaster.php?cake_id=<?php echo $record['cake_id']; ?>"><i class="fa fa-trash"></i></a>  ||  
                                                <a href="add_cakemaster.php?cake_id=<?php echo $record['cake_id']; ?>"><i class="fa fa-edit"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="text-align: center;">
                                    <tr >
                                    <?php for($i=0;$i<$num1;$i++) { ?>
                                        <td><a class="btn btn-info" href="view_cakemaster.php?page=<?php echo $i; ?>&search=<?php echo @$_GET['search']; ?>"><?php echo $i+1; ?></a></td>
                                    <?php } ?>
                                    </tr>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include('footer.php'); ?>