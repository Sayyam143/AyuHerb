<?php 


    include('header.php');
    include('db.php');

    if(isset($_POST['submit']))
    {
        $subcategory_name = $_POST['subcategory_name'];
        $c_id = $_POST['c_id'];

        if(isset($_GET['s_id']))
        {
            $s_id = $_GET['s_id'];
            $query = "update subcategory set `subcategory_name` = '$subcategory_name',`c_id`='$c_id' where `s_id`= '$s_id'";
            $qu1 = mysqli_query($con,$query);
        }
        else
        {
            $query = "insert into subcategory (`c_id`,`subcategory_name`) values ('$c_id','$subcategory_name')";
            @$qu = mysqli_query($con,$query);
        }


        if(@$qu)
        {
            $msg = "Subcategory inserted successfully";
        }
        elseif($qu1)
        {
            $msg = "Subcategory updated successfully";
        }
    }


    if(isset($_GET['s_id']))
    {
        $s_id = $_GET['s_id'];
        $sel = "select * from subcategory where `s_id` = '$s_id'";
        $qu1 = mysqli_query($con,$sel);
        $record = mysqli_fetch_array($qu1);
    }

    

 ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        
                       <div class="col-md-12 pb-3">
                                    <h4 class="title-1">Add Subcategory</h4>
                                </div>
                      
                            <div class="col-lg-7">
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
                                                    <label for="select" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="c_id" class="form-control">
                                                        <option value="0">Please select category</option>
                                                    <?php 
                                                        $sel1 = "select * from category";
                                                        $que1 = mysqli_query($con,$sel1);
                                                        while($category = mysqli_fetch_array($que1)) { ?>

                                                        <option <?php if(isset($record['c_id'])) { if($record['c_id']==$category['c_id']) { echo "selected"; } } ?> value="<?php echo $category['c_id']; ?>"><?php echo $category['category_name']; ?></option>

                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Subcategories</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="subcategory_name" value="<?php if(isset($record['subcategory_name'])) { echo $record['subcategory_name']; } ?>" placeholder="Add Subcategory" class="form-control">
                                                </div>
                                            </div> 
                                          
                                    </div>
                                    <div class="card-footer" style="text-align: center;">
                                    <?php if(!isset($_GET['s_id'])) { ?>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    <?php } else { ?>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit Subategory
                                        </button>
                                    <?php } ?>
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