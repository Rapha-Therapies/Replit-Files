<?php
// Configuration - Change these to your email information
$recipient_email = "info@raphatherapies.org"; // Your email address
$subject = "New Newsletter Subscription from RAPHA Therapies Website";

// Don't edit below this line unless you know what you're doing
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';

// Basic validation
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Set a 400 (bad request) response code and exit
    http_response_code(400);
    echo "Please enter a valid email address.";
    exit;
}

// Build the email content
$email_content = "New Newsletter Subscription\n\n";
$email_content .= "Email: $email\n";

// Build the email headers
$email_headers = "From: RAPHA Therapies Website <noreply@raphatherapies.org>";

// Send the email
$success = mail($recipient_email, $subject, $email_content, $email_headers);

if ($success) {
    // Set a 200 (okay) response code
    http_response_code(200);
    echo "Thank you for subscribing to our newsletter!";
} else {
    // Set a 500 (internal server error) response code
    http_response_code(500);
    echo "Oops! Something went wrong, and we couldn't process your subscription.";
}

// Optional: Redirect back to homepage
header("Location: index.html?newsletter=success");
exit;
?>