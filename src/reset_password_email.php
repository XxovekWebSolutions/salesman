<?php
include '../config/connection.php';

$emailid        =  $_REQUEST['email'];
$link="reset_new_password.php?emailid=".$email;
$response = array();
$result_1 = mysqli_query($con, "SELECT user_id From users where  email = '$emailid' ");

if(mysqli_num_rows($result_1)==1)
 {
$row = mysqli_fetch_array($result_1);
mysqli_query($con,$sql);
$body1= "Link For Password Reset: ".$link;
$subject1= "RESET Password";
$reply_to=" ";

require("/home/fastinvo/public_html/app/PHPMailer_5.2.0/class.phpmailer.php");
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Username = "no-reply@fastinvo.com";
$mail->Password = "testfastinvo";
$mail->Port = 587;
$mail->From = "no-reply@fastinvo.com";
$mail->FromName = "FastInvo";
$mail->AddAddress($emailid);
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject =$subject1;

if($body1=="")
{
   $mail->Body    = ".";
}
else
{
$mail->Body   = $body1;
}

if(!$mail->Send()){}

  $uname     = $row[0];
  $response['success'] = 'true';
}
else {
  $response['errors']  = 'false';
}
exit(json_encode($response));
?>
