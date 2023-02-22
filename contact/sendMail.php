<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $f_name = test_input($_POST["first_name"]);
  $l_name = test_input($_POST["last_name"]);
  $phone = test_input($_POST["phone_number"]);
  $email = test_input($_POST["email_address"]);
  $message = test_input($_POST["message"]);

  // Compose email message
  $to = "roidalas@gmail.com";
  $subject = "New form submission";
  $body = "Firstname: $f_name\nLastname: $l_name\Phone: $phone\nEmail: $email\nMessage:\n$message";

  // Send email
  if (mail($to, $subject, $body)) {
    // Redirect to success page
    header("Location: contact/index.html");
    exit;
  } else {
    echo "Oops, something went wrong.";
  }
}

// Validate and sanitize form data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
