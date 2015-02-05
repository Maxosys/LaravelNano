<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
       <h3>Forgot Password E-mail</h3>
 
        <div>
           This e-mail is sent on your request for getting the password of the admin of "IT Solutions" site.<br/>
This is the tokan number for reseting your admin password. 
        </div>
        <div>{{ $tokan }}</div>
       <a href="{{ action('AdminController@reset_password')}}">click here to reset your password</a>
    </body>
</html>


