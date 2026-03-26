<?php

include('crud_3.php');

$id= $_GET['id'];

$response = deleteadminrequest($id);

if($response == 1)
{
   header('location:requests.php');
   //echo "delete success";
}
else
{
    echo "delete not success";
}
?>