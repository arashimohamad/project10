<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password Account</title>
</head>
<body>
    <table>
        <tr><td>Dear User</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Click on the below link to reset your Password:</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td><a href="{{ url('user/reset-password/'. $code) }}">Reset Password</a></td></tr>        
        <tr><td>&nbsp;</td></tr>
        <tr><td>Thanks & Regards,</td></tr>
        <tr><td>ShopWise</td></tr>
        <tr><td>&nbsp;</td></tr>
    </table>
</body>
</html>