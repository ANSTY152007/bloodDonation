<?php

include('crud_2.php');

$email= $_GET['email'];

$response = deleteuserbyid($email);

if($response == 1)
{
   header('location:userDashboard.php');
   header('location:logout.php');
   //echo "delete success";
}
else
{
    echo "delete not success";
}
?>