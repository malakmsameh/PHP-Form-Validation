<?php
require 'validation.php';

// Only accept data sent from the form
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.html');
    exit;
}

// 1. Get the values (trim removes extra spaces)
$email   = trim($_POST['email']   ?? '');
$mobile  = trim($_POST['mobile']  ?? '');
$fname   = trim($_POST['fname']   ?? '');
$mname   = trim($_POST['mname']   ?? '');
$lname   = trim($_POST['lname']   ?? '');
$famname = trim($_POST['famname'] ?? '');

// 2. Validate each one and collect the error messages
$errors = [];
$errors[] = validateEmail($email);
$errors[] = validateMobile($mobile);
$errors[] = validateName($fname,   'First name');
$errors[] = validateName($mname,   'Middle name');
$errors[] = validateName($lname,   'Last name');
$errors[] = validateName($famname, 'Family name');

$errors = array_filter($errors);   // remove the empty ones (the valid fields)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign up result</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="box">
    <?php if (count($errors) > 0): ?>
      <h2>Please fix these errors</h2>
      <div class="error">
        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <a href="signup.html" class="btn btn-red">Go back</a>
    <?php else: ?>
      <h2>Success!</h2>
      <div class="success">All your data is valid.</div>
      <a href="index.html" class="btn btn-blue">Back to home</a>
    <?php endif; ?>
  </div>
</body>
</html>
