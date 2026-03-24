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
function addadmin($data)
{
  
    $adminemail = $data['adminemail'];
    $adminpassword = $data['adminpassword'];
   

    $conn = dbconnect();

    $sql="select adminemail from admintable where adminemail = '$adminemail'";
    $rs=mysqli_query($conn,$sql)or die(mysqli_error($conn));

    if(mysqli_num_rows($rs)> 0)
    {
        echo "allready registered";
    }
    else
    {
        $sql="insert into admintable(adminemail,adminpassword)values('$adminemail','$adminpassword')";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }
}

// update admin
function updateadmin($data)
{
    $adminemail = $data['adminemail'];
    $adminpassword = $data['adminpassword'];


    $conn = dbconnect();
 
    $sql="update admintable set adminemail = '$adminemail', adminpassword = '$adminpassword' where adminemail = '$adminemail'";

    $responce=mysqli_query($conn,$sql);

    return $responce;
    }

//getrequestbyid

//getuserbyid
function getadminbyid($adminemail)
{
    $conn = dbconnect();

    $sql = "select *from admintable where adminemail = '$adminemail'";

    $responce=mysqli_query($conn,$sql);

    return $responce;
}

function getalladmin()
{
    $conn = dbconnect();

    $sql = "select *from admintable";

    $responce=mysqli_query($conn,$sql);

    return $responce;
}
       
//loginadmin
        function loginadmin($data)
        {
        $adminemail = $data['adminemail'];
        $adminpassword = $data['adminpassword'];

         $conn = dbConnect();

         $sql = "select *from admintable where adminemail = '$adminemail' and adminpassword = '$adminpassword' ";

            $responce=mysqli_query($conn,$sql);

            return $responce;
        }

        function countDonors()
        {
            $conn = dbconnect();
            $sql = "select *from donate";
            $res = mysqli_query($conn, $sql);
            $records = mysqli_num_rows($res);
            return $records;
        }

        function countusers()
        {
            $conn = dbconnect();
            $sql = "select *from donation";
            $res = mysqli_query($conn, $sql);
            $records = mysqli_num_rows($res);
            return $records;
        }

        function countrequests()
        {
            $conn = dbconnect();
            $sql = "select *from request";
            $res = mysqli_query($conn, $sql);
            $records = mysqli_num_rows($res);
            return $records;
        }
?>