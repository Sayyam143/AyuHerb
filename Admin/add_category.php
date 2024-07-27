<?php 


    include('header.php');

    if(isset($_POST['submit']))
    {
        $category_name = $_POST['category_name'];

        if(isset($_GET['c_id']))
        {
            $c_id = $_GET['c_id'];
            $query = "update category set `category_name` = '$category_name' where `c_id`= '$c_id'";
            $qu1 = mysqli_query($con,$query);
        }
        else
        {
            $query = "insert into category (`category_name`) values ('$category_name')";
            @$qu = mysqli_query($con,$query);
        }


        if(@$qu)
        {
            $msg = "Category inserted successfully";
        }
        elseif($qu1)
        {
            $msg = "Category updated successfully";
        }
    }


    if(isset($_GET['c_id']))
    {
        $c_id = $_GET['c_id'];
        $sel = "select * from category where `c_id` = '$c_id'";
        $qu1 = mysqli_query($con,$sel);
        $record = mysqli_fetch_array($qu1);
    }

 ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                       
                       <div class="col-md-12 pb-3">
                                    <h4 class="title-1">Add Category</h4>
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
                                                    <label for="text-input" class=" form-control-label">Categories</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="category_name" value="<?php if(isset($record['category_name'])) { echo $record['category_name']; } ?>" placeholder="Add category" class="form-control">
                                                </div>
                                            </div> 
                                          
                                    </div>
                                    <div class="card-footer" style="text-align: center;">
                                    <?php if(!isset($_GET['c_id'])) { ?>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    <?php } else { ?>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit Category
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