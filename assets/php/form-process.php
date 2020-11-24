<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$errorMSG = "";

// NAME
if (empty($_POST["first_name"])) {
    $errorMSG = "Name is required ";
} else {
    $first_name = $_POST["first_name"];
}

// Last NAME
if (empty($_POST["last_name"])) {
    $errorMSG = "Name is required ";
} else {
    $last_name = $_POST["last_name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["company"])) {
    $errorMSG .= "Company name is required ";
} else {
    $company = $_POST["company"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}

//$apiKey = getenv('SENDGRID_API_KEY');
// API Key ID: L9gzlXPSQDKXujML7C2YGw
$apiKey = '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';

// send email
$sendmail = new \SendGrid\Mail\Mail();
$sendmail->setFrom($email, "contact-us user");
$sendmail->setSubject("New Enquiry Received for soul technology");
$sendmail->addTo("contact@soul.technolofy", "Contact");
//$sendmail->addContent("text/plain", "and easy to do anywhere, even with PHP");
$sendmail->addContent(
    "text/html",
    "<strong>$message</strong>"
);
$sendgrid = new \SendGrid($apiKey);
try {
    $response = $sendgrid->send($sendmail);

    if ($response->statusCode() == 202) {
        echo "<p class='h4 text-black mb-5'> Thank you! Your Message has been sent</p>";;
    } else {
        echo "<p class='h4 text-black mb-5'> Sorry! could not send your message. Please try again or email us at support@soul.id</p>";
    }

    $_POST = array();

    print_r($response->statusCode() . "\n");
    print_r($response->headers());
    print_r($response->body() . "\n");
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
