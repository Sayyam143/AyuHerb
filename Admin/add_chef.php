<?php 

include('header.php');
// include('db.php');

if(isset($_POST['submit']))
{
    $chef_name = $_POST['chef_name'];
    $designation = $_POST['designation'];
    $image = $_FILES['image']['name'];

    if(isset($_GET['chef_id']))
    {
        $chef_id = $_GET['chef_id'];
        $sel1 = "select * from chef where `chef_id` = '$chef_id'";
        $qu2 = mysqli_query($con,$sel1);
        $record1 = mysqli_fetch_array($qu2);

        if($image=="")
        {
            $image = $record1['image'];
        }
        else
        {
            $rand = rand(1000,9999);
            $image = $rand.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "chef/".$image);
            @unlink("chef/".$record1['image']);
        }

        $insert = "update chef set `chef_name` = '$chef_name',`designation`='$designation',`image`='$image' where `chef_id` = '$chef_id'";
    }
    else
    {
        $rand = rand(1000,9999);
        $image = $rand.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "chef/".$image);
        $insert = "insert into chef (`chef_name`,`designation`,`image`) values ('$chef_name','$designation','$image')";

    }

    @$que = mysqli_query($con,$insert);

    if(@$que)
    {
        $msg = "Chef detail inserted";
    }
}

if(isset($_GET['chef_id']))
{
    $chef_id = $_GET['chef_id'];
    $sel = "select * from chef where `chef_id` = '$chef_id'";
    $qu1 = mysqli_query($con,$sel);
    $record = mysqli_fetch_array($qu1);
}



?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
           
                       <div class="col-md-12 pb-3">
                                    <h4 class="title-1">Add Teammates</h4>
                                </div>
                      
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <strong>Category Form</strong> 
                        </div>
                        <?php if(isset($msg)) { ?>
                            <div class="alert alert-success"><?php echo $msg; ?></div>
                        <?php } ?>
                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body card-block">


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Teammates Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="chef_name" value="<?php if(isset($record['chef_name'])) { echo $record['chef_name']; } ?>" placeholder="Add Teammates Name" class="form-control">
                                </div>
                            </div> 

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Teammates Designation</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="designation" value="<?php if(isset($record['designation'])) { echo $record['designation']; } ?>" placeholder="Add Teammates Designation" class="form-control">
                                </div>
                            </div> 

                           
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Teammates Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" name="image" class="form-control">
                                    <img src="chef/<?php echo $record['image']; ?>" width="100px">
                                </div>
                            </div> 



                        </div>
                        <div class="card-footer" style="text-align: center;">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                        
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
</div>
</div>

</div>

<?php include('footer.php'); ?>

