<?php 

	include('db.php');

	if(isset($_POST['c_id']))
	{
		$c_id = $_POST['c_id'];
		$sel = "select * from subcategory where `c_id` = '$c_id'";
		$que = mysqli_query($con,$sel);

	}


 ?>


    										
                                                    <select id="s_id" name="s_id" class="form-control">
                                                        <option value="0">Please select subcategory</option>
                                                    <?php 
                                                      
                                                        while($subcategory = mysqli_fetch_array($que)) { ?>

                                                        <option <?php if(isset($record['s_id'])) { if($record['s_id']==$category['s_id']) { echo "selected"; } } ?>  value="<?php echo $subcategory['s_id']; ?>"><?php echo $subcategory['subcategory_name']; ?></option>

                                                    <?php } ?>
                                                    </select>
