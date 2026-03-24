<?php
//name //email //password

function dbconnect()
{
    $hostname="localhost";
    $username="root";
    $userpassword="";
    $dbname="blooddonor";

    $conn=mysqli_connect($hostname,$username,$userpassword,$dbname);

    return $conn;
}
//addadmin
function adddonor($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $blood = $data['blood'];
    $address = $data['address'];

    $conn = dbconnect();

    $sql="select email from donate where email = '$email'";
    $rs=mysqli_query($conn,$sql)or die(mysqli_error($conn));

    if(mysqli_num_rows($rs)> 0)
    {
        echo "allready registered";
    }
    else
    {
        $sql="insert into donate(name,email,password,blood,address)values('$name','$email','$password','$blood','$address')";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }
}
// update admin
function updatedonor($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $blood = $data['blood'];
    $address = $data['address'];


    $conn = dbconnect();
 
    $sql="update donate set name = '$name', email = '$email', password = '$password', blood = '$blood', address = '$address' where email = '$email'";

    $responce=mysqli_query($conn,$sql);

    return $responce;
    }
//deleteuser

//getalldonor
    function getalldonor()
    {
        $conn = dbconnect();

        $sql = "select *from donate";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }
//getuserbyid
        function getdonorbyid($email)
        {
            $conn = dbconnect();

            $sql = "select *from donate where email = '$email'";

            $responce=mysqli_query($conn,$sql);

            return $responce;
        }

        function deletedonorbyid($email)
        {
            $conn = dbconnect();

            $sql = "delete from donate where email = '$email'";

            $responce=mysqli_query($conn,$sql);

            return $responce;
        }
//loginadmin
        function logindonor($data)
        {
        $email = $data['email'];
        $password = $data['password'];

         $conn = dbConnect();

         $sql = "select *from donate where email = '$email' and password = '$password' ";

            $responce=mysqli_query($conn,$sql);

            return $responce;
        }
?>