<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate the input (you can add more validation as needed)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Prepare email
    $to = 'your-email@example.com'; // Replace with your email address
    $headers = "From: $name <$email>";
    $headers .= "\r\nReply-To: $email";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    // If not POST, return a 405 error
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
