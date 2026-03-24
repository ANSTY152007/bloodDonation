<?php

include('crud_1.php');

$email= $_GET['email'];

$response = deletedonorbyid($email);

if($response == 1)
{
   header('location:donorDashboard.php');
   header('location:logout.php');

   //echo "delete success";
}
else
{
    echo "delete not success";
}
?>