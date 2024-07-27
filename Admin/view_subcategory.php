<?php 

    include('header.php');

    if(isset($_GET['s_id']))
    {
        $s_id = $_GET['s_id'];
        $del = "delete from subcategory where `s_id` = '$s_id'";
        $que = mysqli_query($con,$del);

        if($que)
        {
            $msg = "Subcategory Deleted Successfully";
        }
    }

    if(isset($_GET['search']))
    {
        $ser = $_GET['search'];
        $sel = "select * from subcategory JOIN category ON category.c_id = subcategory.c_id where `category_name` LIKE '%$ser%' OR `subcategory_name` LIKE '%$ser%'";
    }
    else
    {
        $sel = "select * from subcategory JOIN category ON category.c_id = subcategory.c_id";
    }

    $qu = mysqli_query($con,$sel);

 ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                                    <h4 class="title-1">View Subcategory</h4>
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
                                    <input style="padding: 6px;" type="text" name="search" placeholder="Subategory or category to search">
                                    <input class="btn btn-success" type="submit" name="submit" value="Search">
                                </form><br>
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Subcategory Name</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($record = mysqli_fetch_array($qu)) { ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $record['s_id']; ?></td>
                                                <td><?php echo $record['category_name']; ?></td>
                                                <td><?php echo $record['subcategory_name']; ?></td>
                                                <td><a href="view_subcategory.php?s_id=<?php echo $record['s_id']; ?>"><i class="fa fa-trash"></i></a>  ||  
                                                <a href="add_subcategory.php?s_id=<?php echo $record['s_id']; ?>"><i class="fa fa-edit"></i></a></td>
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