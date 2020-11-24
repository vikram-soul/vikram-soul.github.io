<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$errorMSG = "";

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

//$apiKey = getenv('SENDGRID_API_KEY');
// API Key ID: L9gzlXPSQDKXujML7C2YGw
$apiKey = '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';

// send email
$sendmail = new \SendGrid\Mail\Mail();
$sendmail->setFrom($email, "contact-us user");
$sendmail->setSubject("New Enquiry Received for soul technology");
$sendmail->addTo("contact@soul.technology", "Contact");
//$sendmail->addContent("text/plain", "and easy to do anywhere, even with PHP");
$sendmail->addContent(
    "text/html",
    "<strong>New subscription from: $email</strong>"
);
$sendgrid = new \SendGrid($apiKey);
try {
    $response = $sendgrid->send($sendmail);

    if ($response->statusCode() == 202) {
        echo "<p class='h4 text-black mb-5'> Thank you! Your Message has been sent</p>";;
    } else {
        echo "<p class='h4 text-black mb-5'> Sorry! could not send your message. Please try again or email us at contact@soul.technology</p>";
    }

    $_POST = array();

    //print $response->statusCode() . "\n";
    //print_r($response->headers());
    //print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
