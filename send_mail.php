<?php
// filepath: c:\Users\z005472y\Documents\projects\templatemo_485_rainbow\send_mail.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "janastrizak@hotmail.com"; // <-- Change this to your email address
    $name = strip_tags(trim($_POST["contact_name"]));
    $email = filter_var(trim($_POST["contact_email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["contact_subject"]));
    $message = trim($_POST["contact_message"]);

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank you page or show a success message
        echo "<script>alert('Email has been sent!'); window.location.href='index.html';</script>";
        exit;
    } else {
        echo "Sorry, your message could not be sent.";
    }
} else {
    // Not a POST request
    http_response_code(403);
    echo "There was a problem with your submission.";
}
?>