
<?php 
require("php/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  

    <!-- Bootstrap / Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php require("element/nav.php"); ?>

<?php
require("php/db.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
require 'php/db.php';

/* ===== 1.  LOAD PHPMailer MANUALLY ===== */
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



/* ===== 2.  YOUR LOGIC ===== */
$success = false;
$errors  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* sanitising / validation */
    $name    = trim($_POST['name']    ?? '');
    $email   = trim($_POST['email']   ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '')  $errors[] = 'Name is required';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email required';
    if ($message === '') $errors[] = 'Message is required';

    if (!$errors) {
        /* 2‑A  save to DB */
        $stmt = $db->prepare("INSERT INTO contact_messages(name, email, message) VALUES (?, ?, ?)");
        if (!$stmt) die("Prepare failed: " . $db->error);
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();
        $stmt->close();

        /* 2‑B  send email */
        try {
           $mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'syedhassanshahrizvi8004086@gmail.com';
$mail->Password   = 'cbbp embb fdzd uymo'; // 16-char app password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

$mail->setFrom('syedhassanshahrizvi8004086@gmail.com', 'Website Contact Form');

// ✅ This line is required!
$mail->addAddress('syedhassanshahrizvi8004086@gmail.com'); // your own email

$mail->addReplyTo($email, $name);



            $mail->isHTML(true);
            $mail->Subject = "New message from $name";
           $mail->Body = "
    <h3>New Contact Message from STPShop</h3>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> <a href='mailto:$email'>$email</a></p>
    <hr>
    <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
";


            $mail->send();
            $success = true;
            // clear form
            $name = $email = $message = '';
        } catch (Exception $e) {
            $errors[] = 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

  <?php if ($success): ?>
    <div class="alert alert-success">Your message has been sent successfully!</div>
  <?php endif; ?>

  <?php if ($errors): ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

 <div class="container mt-5">
  <h2 class="text-center mb-4">Contact Us</h2>

  <form method="POST" action="" class="mx-auto" style="max-width: 600px;">
    <div class="mb-3">
      <label for="name" class="form-label">Your Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Your Email</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send Message</button>
  </form>
</div>

</div>
</body>
</html>

<!-- your HTML below (unchanged) -->
