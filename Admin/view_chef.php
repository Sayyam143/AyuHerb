<?php 

    include('header.php');

    if(isset($_GET['chef_id']))
    {
        $chef_id = $_GET['chef_id'];
        $sel1 = "select * from chef where `chef_id` = '$chef_id'";
        $qu1 = mysqli_query($con,$sel1);
        $rec = mysqli_fetch_array($qu1);
        @unlink("chef/".$rec['image']);
        $del = "delete from chef where `chef_id` = '$chef_id'";
        $que = mysqli_query($con,$del);

        if($que)
        {
            $msg = "Category Deleted Successfully";
        }
    }

   
        $sel = "select * from chef";
        $qu = mysqli_query($con,$sel);

 ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                                    <h4 class="title-1">View Team</h4>
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
                                                <th>Teammates Name</th>
                                                <th>Teammates Designation</th>
                                                <th>Teammates Image</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($record = mysqli_fetch_array($qu)) { ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $record['chef_id']; ?></td>
                                                <td><?php echo $record['chef_name']; ?></td>
                                                <td><?php echo $record['designation']; ?></td>
                                                <td><img src="chef/<?php echo $record['image']; ?>" width="75px"></td>
                                                <td><a href="view_chef.php?chef_id=<?php echo $record['chef_id']; ?>"><i class="fa fa-trash"></i></a>  ||  
                                                <a href="add_chef.php?chef_id=<?php echo $record['chef_id']; ?>"><i class="fa fa-edit"></i></a></td>
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