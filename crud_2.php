<?php
//name //email //password

require_once('db_connection.php');
//addadmin
function adduser($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $blood = $data['blood'];
    $address = $data['address'];

    $conn = dbconnect();

   
    if(!$conn)
    {
        echo "allready registered";
    }
    else
    {
        $sql="insert into donation(name,email,password,blood,address)values('$name','$email','$password','$blood','$address')";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }
}
// update admin
function updateuser($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $blood = $data['blood'];
    $address = $data['address'];


    $conn = dbconnect();
 
    $sql="update donation set name = '$name', email = '$email', password = '$password', blood = '$blood', address = '$address' where email = '$email'";

    $responce=mysqli_query($conn,$sql);

    return $responce;
    }
//deleteuser

//getalladmin
    function getalluser()
    {
        $conn = dbconnect();

        $sql = "select *from donation";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }
//getuserbyid
        function getuserbyid($email)
        {
            $conn = dbconnect();

            $sql = "select *from donation where email = '$email'";

            $responce=mysqli_query($conn,$sql);

            return $responce;
        }

        function deleteuserbyid($email)
        {
            $conn = dbconnect();

            $sql = "delete from donation where email = '$email'";

            $responce=mysqli_query($conn,$sql);

            return $responce;
        }
//loginadmin
        function loginuser($data)
        {
        $email = $data['email'];
        $password = $data['password'];

         $conn = dbConnect();

         $sql = "select *from donation where email = '$email' and password = '$password' ";

            $responce=mysqli_query($conn,$sql);

            return $responce;
        }
?>