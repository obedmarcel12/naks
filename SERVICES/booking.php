<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $room = htmlspecialchars($_POST['room']);
    $checkin = htmlspecialchars($_POST['checkin']);
    $checkout = htmlspecialchars($_POST['checkout']);
    $requests = htmlspecialchars($_POST['requests']);

    // Hotel recipients (Manager + Reception)
    $recipients = "manager@naks.com, reception@naks.com";
    $subjectHotel = "New Booking Request - Naks Hotel";

    $messageHotel = "
    <h2>New Booking Request</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Room Selected:</strong> $room</p>
    <p><strong>Check-in:</strong> $checkin</p>
    <p><strong>Check-out:</strong> $checkout</p>
    <p><strong>Special Requests:</strong> $requests</p>
    ";

    $headersHotel = "MIME-Version: 1.0" . "\r\n";
    $headersHotel .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headersHotel .= "From: Naks Hotel Booking <no-reply@naks.com>" . "\r\n";

    // Send to hotel staff
    mail($recipients, $subjectHotel, $messageHotel, $headersHotel);

    // Confirmation email to guest
    $subjectGuest = "Your Booking Request at Naks Hotel";
    $messageGuest = "
    <div style='font-family: Arial, sans-serif; color: #333;'>
      <h2 style='color: #045d56;'>Thank You for Booking with Naks Hotel</h2>
      <p>Dear <strong>$name</strong>,</p>
      <p>We have received your booking request. Our team will confirm shortly.</p>
      <h3>Your Booking Details</h3>
      <p><strong>Room:</strong> $room</p>
      <p><strong>Check-in:</strong> $checkin</p>
      <p><strong>Check-out:</strong> $checkout</p>
      <p><strong>Special Requests:</strong> $requests</p>
      <br>
      <p>Warm regards,</p>
      <p><strong>Naks Hotel & Towers</strong></p>
    </div>
    ";

    $headersGuest = "MIME-Version: 1.0" . "\r\n";
    $headersGuest .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headersGuest .= "From: Naks Hotel <no-reply@naks.com>" . "\r\n";

    mail($email, $subjectGuest, $messageGuest, $headersGuest);

    // Success response
    echo "<script>
        alert('✅ Thank you $name, your booking request has been sent!');
        window.location.href='index.html';
    </script>";
}
?>
