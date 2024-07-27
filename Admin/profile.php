<?php 

    ob_start();
    include('header.php');

    $DbPass = $_SESSION['admin']['password'];

    if(isset($_POST['submit']))
    {
        $opass = $_POST['opass'];
        $npass = $_POST['npass'];
        $cpass = $_POST['cpass'];

        if($opass==$DbPass)
        {
            if($opass!=$npass)
            {
                if($npass==$cpass)
                {
                  $id = $_SESSION['admin']['id'];
                  $update = "update admin set `password` = '$npass' where `id` = '$id'";
                  $qu = mysqli_query($con,$update);
                  header('location:logout.php');  
                }
                else
                {
                    $msg = "New and comfirm password does not same";
                }
            }
            else
            {
                $msg = "New password same as old password please try another";
            }
        }
        else
        {
            $msg = "Invalid Old password";
        }

    }

   

 ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Profile</strong> 
                                    </div>
                                <?php if(isset($msg)) { ?>
                                    <div class="alert alert-success"><?php echo $msg; ?></div>
                                <?php } ?>
                                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-body card-block">
                                         
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input readonly type="text" name="name" value="<?php echo $_SESSION['admin']['name']; ?>"  class="form-control">
                                                </div>
                                            </div> 

                                              <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input readonly type="text" name="email" value="<?php echo $_SESSION['admin']['email'] ?>" class="form-control">
                                                </div>
                                            </div> 

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input readonly type="text" name="password" value="<?php echo $_SESSION['admin']['password'] ?>" class="form-control">
                                                </div>
                                            </div> 
                                          
                                    </div>
                                   <!--  <div class="card-footer" style="text-align: center;">
                                  
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                
                                    </div> -->
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