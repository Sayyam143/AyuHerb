<?php

$id=$_GET['id'];

ob_start();
include('header.php');


              $update = "update checkout set `password` = '$npass' where `id` = '$id'";
              $qu = mysqli_query($con,$update);
              header('location:logout.php');  
?>