<?php
// Configuration - Change these to your email information
$recipient_email = "info@raphatherapies.org"; // Your email address
$form_name = "RAPHA Therapies Contact Form";
$subject = "New Contact Form Submission from RAPHA Therapies Website";

// Don't edit below this line unless you know what you're doing
$name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
$service = isset($_POST['service']) ? strip_tags(trim($_POST['service'])) : '';
$message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

// Basic validation
if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Set a 400 (bad request) response code and exit
    http_response_code(400);
    echo "Please complete the form and try again.";
    exit;
}

// Build the email content
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n";
$email_content .= "Phone: $phone\n";
$email_content .= "Service of Interest: $service\n\n";
$email_content .= "Message:\n$message\n";

// Build the email headers
$email_headers = "From: $name <$email>";

// Send the email
$success = mail($recipient_email, $subject, $email_content, $email_headers);

if ($success) {
    // Set a 200 (okay) response code
    http_response_code(200);
    echo "Thank you! Your message has been sent.";
} else {
    // Set a 500 (internal server error) response code
    http_response_code(500);
    echo "Oops! Something went wrong, and we couldn't send your message.";
}
?>