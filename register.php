<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"] ?? "");
  $email = htmlspecialchars($_POST["email"] ?? "");
  $password = htmlspecialchars($_POST["password"] ?? "");
  $gender = htmlspecialchars($_POST["gender"] ?? "");
  $dob = htmlspecialchars($_POST["dob"] ?? "");
  // New ticket booking fields
  $show_name = isset($_POST["show_name"]) ? htmlspecialchars($_POST["show_name"]) : "Not selected";
  $ticket_type = isset($_POST["ticket_type"]) ? htmlspecialchars($_POST["ticket_type"]) : "Not selected";
  $interests = isset($_POST["interests"]) ? implode(", ", array_map('htmlspecialchars', $_POST["interests"])) : "None";

  // Render a centered result page re-using style.css
  echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Registration Successful</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Small result card styles (keeps consistent with site look) */
    .result-wrap { display:flex; align-items:center; justify-content:center; min-height:100vh; padding:24px; }
    .result-card { width:100%; max-width:720px; background:#fff; border-radius:14px; padding:28px; box-shadow: 0 12px 40px rgba(36,40,70,0.06); border:1px solid #eef2ff; }
    .result-card h2 { margin-top:0; margin-bottom:12px; text-align:center; }
    .result-list { margin: 18px 0; font-size:1.1rem; color:var(--text); }
    .result-list p { margin:8px 0; }
    .actions { text-align:center; margin-top:20px; }
    .actions a { display:inline-block; padding:10px 18px; border-radius:10px; background:#2563eb; color:#fff; text-decoration:none; margin:0 8px; }
  </style>
</head>
<body>
  <div class="result-wrap">
    <div class="result-card">
     <h2>🎉 Registration Successful! 🎊</h2>
      <div class="result-list">
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Gender:</strong> {$gender}</p>
        <p><strong>Date of Birth:</strong> {$dob}</p>
        <p><strong>Show:</strong> {$show_name}</p>
        <p><strong>Ticket Type:</strong> {$ticket_type}</p>
      </div>
      <div class="actions">
       <a href="index.html">⬅️ Back to Form</a>
      </div>
    </div>
  </div>
</body>
</html>
HTML;
}
?>