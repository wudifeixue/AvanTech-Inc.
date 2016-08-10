<?php

if(isset($_POST['userEmail'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $userEmail_to = "pengzho@gmail.com";

    $userEmail_subject = "Avan-Tech.ca Contact Page Email";





    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['userName']) ||

        !isset($_POST['userEmail']) ||

        !isset($_POST['usersubject']) ||

        !isset($_POST['userMsg'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $userName = $_POST['userName']; // required

    $userEmail_from = $_POST['userEmail']; // required

    $usersubject = $_POST['usersubject']; // not required

    $userMsg = $_POST['userMsg']; // required



    $error_message = "";

    $userEmail_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($userEmail_exp,$userEmail_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$userName)) {

    $error_message .= 'The Name you entered does not appear to be valid.<br />';

  }


  if(strlen($userMsg) < 2) {

    $error_message .= 'The message you entered do not appear to be valid.<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $userEmail_message = "Information of Avan-Tech.ca Contact Page submission.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $userEmail_message .= "Name: ".clean_string($userName)."\n";

    $userEmail_message .= "Email: ".clean_string($userEmail_from)."\n";

    $userEmail_message .= "Sbject: ".clean_string($usersubject)."\n";

    $userEmail_message .= "Message: ".clean_string($userMsg)."\n";


// create userEmail headers

$headers = 'From: '.$userEmail_from."\r\n".

'Reply-To: '.$userEmail_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($userEmail_to, $userEmail_subject, $userEmail_message, $headers);

?>



<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.

<meta http-equiv="refresh" content="3;URL=contact.html" />

<?php

}

?>
