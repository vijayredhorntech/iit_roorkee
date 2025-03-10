<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>
    <p>Your account has been created successfully.</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    <p>Please log in and change your password.</p>
    <p>Regards,<br>Team</p>
</body>
</html>
