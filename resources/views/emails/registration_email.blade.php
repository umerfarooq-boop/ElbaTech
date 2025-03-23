<!DOCTYPE html>
<html>
<head>
    <title>Company Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #343a40;
        }
        .email-body p {
            margin: 10px 0;
            line-height: 1.6;
        }
        .email-footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Welcome, {{ $details->company_name }}!</h1>
        </div>
        <div class="email-body">
            <p>Thank you for registering your company on our platform!</p>
            <p>We are excited to have you join us and look forward to working with you.</p>
        </div>
        <div class="email-footer">
            <p>Best regards,<br>Your Application Team</p>
        </div>
    </div>
</body>
</html>
