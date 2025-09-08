<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $phone   = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Recipients (Manager + Reception)
    $to = "manager@nakshotel.com, reception@nakshotel.com";

    // Email subject
    $email_subject = "Contact Form: $subject";

    // Email body
    $email_body = "
    New message from the Naks Hotel Contact Form:

    Name: $name
    Email: $email
    Phone: $phone
    Subject: $subject

    Message:
    $message
    ";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>
                alert('Thank you $name, your message has been sent successfully!');
                window.location.href = 'contact.html'; 
              </script>";
    } else {
        echo "<script>
                alert('Sorry, something went wrong. Please try again later.');
                window.location.href = 'contact.html';
              </script>";
    }
}
?>
