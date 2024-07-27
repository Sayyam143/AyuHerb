<?php 


    include('header.php');
    // include('db.php');

    if(isset($_POST['submit']))
    {
        $c_id = $_POST['c_id'];
        $s_id = $_POST['s_id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $weight = $_POST['weight'];
        $flavour = $_POST['flavour'];
        $rand = rand(1000,9999);
        $image = $_FILES['image']['name'];

        $mimage = $_FILES['mimage'];

        if(isset($_GET['cake_id']))
        {
            $cake_id = $_GET['cake_id'];
            $sel1 = "select * from product_master where `cake_id` = '$cake_id'";
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
                move_uploaded_file($_FILES['image']['tmp_name'],"image/".$image);
                @unlink("image/".$record1['image']);
            }

            if($mimage['name'][0]=="")
            {
                $mim = $record1['mimage'];
            }
            else
            {
                $img_exp = explode(',',$record1['mimage']);

                for($i=0;$i<count($img_exp);$i++)
                {
                    @unlink("image/".$img_exp[$i]);
                }

                $mimg = array();

                for($i=0;$i<count($mimage['name']);$i++)
                {
                    $rand = rand(10000,9999);
                    $mimg[] = $rand.$mimage['name'][$i];
                    move_uploaded_file($mimage['tmp_name'][$i],"image/".$mimg[$i]);
                }

                $mim = implode(',',$mimg);
            }

            $query = "update product_master set `c_id` = '$c_id',`s_id` = '$s_id',`name` = '$name',`name` = '$name',`price` = '$price',`description` = '$description',`weight` = '$weight',`flavour` = '$flavour',`image`='$image',`mimage`='$mim' where `cake_id`= '$cake_id'";
            $qu1 = mysqli_query($con,$query);
        }
        else
        {
            $rand = rand(1000,9999);
            $image = $rand.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],"image/".$image);


            $mimage = $_FILES['mimage'];

            $mimg = array();

            for($i=0;$i<count($mimage['name']);$i++)
            {
                $rand = rand(1000,9999);
                $mimg[] = $rand.$mimage['name'][$i];
                move_uploaded_file($mimage['tmp_name'][$i],"image/".$mimg[$i]);
            }

            $mim = implode(',',$mimg);

            $query = "insert into product_master (`c_id`,`s_id`,`name`,`price`,`description`,`weight`,`flavour`,`image`,`mimage`) values ('$c_id','$s_id','$name','$price','$description','$weight','$flavour','$image','$mim')";
            @$qu = mysqli_query($con,$query);
        }


        if(@$qu)
        {
            $msg = "Subcategory inserted successfully";
        }
        elseif(@$qu1)
        {
            $msg = "Category updated successfully";
        }
    }


    if(isset($_GET['cake_id']))
    {
        $cake_id = $_GET['cake_id'];
        $sel = "select * from product_master where `cake_id` = '$cake_id'";
        $qu1 = mysqli_query($con,$sel);
        $record = mysqli_fetch_array($qu1);
    }

    

 ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                       <div class="col-md-12 pb-3">
                                    <h4 class="title-1">Add product</h4>
                                </div>
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


                                             <div class="row form-group" >
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select id="c_id" name="c_id" class="form-control" onchange="return get_subcategory()">
                                                        <option value="0">Please select category</option>
                                                    <?php 
                                                        $sel1 = "select * from category";
                                                        $que1 = mysqli_query($con,$sel1);
                                                        while($category = mysqli_fetch_array($que1)) { ?>

                                                        <option <?php if(isset($record['c_id'])) { if($record['c_id']==$category['c_id']) { echo "selected"; } } ?>  value="<?php echo $category['c_id']; ?>"><?php echo $category['category_name']; ?></option>

                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                               <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Subategory</label>
                                                </div>
                                                <div class="col-12 col-md-9" id="subcategory">
                                                    <select id="s_id" name="s_id" class="form-control">
                                                        <option value="0">Please select subcategory</option>
                                                       <?php
                                                       if(isset($_GET['cake_id'])) {
                                                        $c_id = $record['c_id'];
                                                        $sel = "select * from subcategory where `c_id` = '$c_id'";
                                                        $que = mysqli_query($con,$sel);
                                                        while($subcategory = mysqli_fetch_array($que)) { ?>

                                                        <option <?php if(isset($record['s_id'])) { if($record['s_id']==$subcategory['s_id']) { echo "selected"; } } ?>  value="<?php echo $subcategory['s_id']; ?>"><?php echo $subcategory['subcategory_name']; ?></option>

                                                    <?php } } ?>
                                                    </select>
                                            </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="name" value="<?php if(isset($record['name'])) { echo $record['name']; } ?>" placeholder="Add product Name" class="form-control">
                                                </div>
                                            </div> 

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">product Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="price" value="<?php if(isset($record['price'])) { echo $record['price']; } ?>" placeholder="Add  Price" class="form-control">
                                                </div>
                                            </div> 

                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">product Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="description" value="<?php if(isset($record['description'])) { echo $record['description']; } ?>" placeholder="Add product Description" class="form-control">
                                                </div>
                                            </div> 

                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">product Weight</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="weight" value="<?php if(isset($record['weight'])) { echo $record['weight']; } ?>" placeholder="Add product Weight" class="form-control">
                                                </div>
                                            </div> 

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">product Flavour</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="flavour" value="<?php if(isset($record['flavour'])) { echo $record['flavour']; } ?>" placeholder="Add product Flavour" class="form-control">
                                                </div>
                                            </div> 


                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">product Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="image" class="form-control">
                                                    <img src="image/<?php echo $record['image'] ?>" width=100px;>
                                                </div>
                                            </div> 


                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">product Multiple Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="mimage[]" multiple class="form-control">
                                                    <?php if(isset($_GET['cake_id'])) { $mimgs = explode(',',$record['mimage']);
                                                    for($i=0;$i<count($mimgs);$i++) { ?>
                                                        <img src="image/<?php echo $mimgs[$i]; ?>" width="100px;">
                                                    <?php } } ?>
                                                </div>
                                            </div> 
                                          
                                    </div>
                                    <div class="card-footer" style="text-align: center;">
                                    <?php if(!isset($_GET['cake_id'])) { ?>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    <?php } else { ?>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit productMaster
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
      
        function get_subcategory()
        {
            var c_id = $('#c_id').val();
            $.ajax({

                url : "get_subcategory.php",
                type : "post",
                data : {
                    'c_id' : c_id,
                },
                success : function(gs)
                {
                    $('#subcategory').html(gs);
                }

            });
        }

    </script>