<?php
//name //email //password

require_once('db_connection.php');
//add requset

function addrequst($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $date = $data['date'];
    $blood = $data['blood'];
  
    $text = $data['text'];

    $conn = dbconnect();


        $sql="insert into request(name,email,date,blood,text)values('$name','$email','$date','$blood','$text')";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }

//getalladminbybloodgroup
    function getAllDonorsByGroup($bg)
    {
        $conn = dbconnect();

        $sql = "select *from donate where blood='$bg'";

        $responce=mysqli_query($conn,$sql);

        return $responce;
    }

     //getallrequest
     function getallrequest()
     {
         $conn = dbconnect();
  
         $sql = "select *from request";
  
         $responce=mysqli_query($conn,$sql);
  
         return $responce;
     }

     function deleteadminrequest($id)
     {
        $conn = dbconnect();
  
        $sql = "delete from request where id='$id'";
 
        $responce=mysqli_query($conn,$sql);
 
        return $responce;
     }

    include('phpmailer/PHPMailerAutoload.php');

    function sendMail($data)
    {
        $otp = random_int(100000, 999999);
        $mail = new phpmailer;
		$mail->isSMTP();  //Only enable when use in local server 

		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';

		$mail->Username = 'abirangshu.gc2@gmail.com'; //company emailid
		$mail->Password = 'rjhfogthqdvkdedh';

		$mail->setFrom('abirangshu.gc2@gmail.com', 'Deep'); //company emailid and company name
		$mail->addAddress($data['email']);
		$mail->addReplyTo('dibyendupaul875@gmail.com');

        /*$filepath = 'tanmoy.pdf';
        $mail->addAttachment($filepath);*/

		$mail->isHTML(true);
		$mail->Subject = 'Test Mail From Deep';
        $message = "Request for ";
        
        $message = $message."<h3>Your OTP is ".$otp."</h3>"."\n";

        $message = $message."<h3>blood group: ".$data['blood']."\n";

        $message = $message."<h3>date: ".$data['date']."\n";

        $message = $message."<h3>Address: ".$data['text']."\n";

        $mail->Body = $message;

		if($mail->send())
		{
            addrequst($data);
			return 1;
		}
		else{
           
			return 0;
		}
    }

?>