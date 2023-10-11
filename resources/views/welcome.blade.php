<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        h1 {
            color: #0070C0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your One-Time Password (OTP)</h1>
        <p>Here is your OTP for secure access: <strong>{{$otp}}</strong></p>
        <p>Please use this OTP within the next 15 minutes to verify your account.</p>
        <p>If you didn't request this OTP, please contact our support team.</p>
        <a href="https://example.com/verify-otp">Click here to verify</a>
    </div>
</body>
</html>
