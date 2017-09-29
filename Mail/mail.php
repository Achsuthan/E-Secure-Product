<?php
// Check for empty fields
$returnArray=array();
if(empty($_POST['name'])      ||  empty($_POST['email'])  || empty($_POST['message'])   || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
    $returnArray["status"]="400";
    $returnArray["message"]="Argument missing or error in mail address";
}
else {

    $name = $_POST['name'];
    $email_address = $_POST['email'];
    $message = $_POST['message'];


    $receiver=array();
    array_push($receiver,"IT14108150@my.sliit.lk");
    array_push($receiver,"it14502484@my.sliit.lk");
    array_push($receiver,"it14001680@my.sliit.lk");
    array_push($receiver,"it14004032@my.sliit.lk");

    for ($i=0; $i<count($receiver); $i++) {
// Create the email and send the message
        $to = $receiver[$i]; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        $email_subject = "Website Contact Form:  $name";
        $email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
        $headers = "From: E-Secure@E-Secure.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email_address";
        $returnvalue=mail($to, $email_subject, $email_body, $headers);
    }

    $returnArray["status"]="200";
    $returnArray["message"]="Mail Send Successfully";
}

echo json_encode($returnArray);
?>