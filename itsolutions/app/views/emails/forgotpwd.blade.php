<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
       <h3>Forgot Password E-mail</h3>
 
        <div>
           This e-mail is sent on your request for getting the password of your account in "IT Solutions" site.<br/>
This is the tokan number for reseting your account password:- 
        </div>
        <div>{{ $tokan }}</div>
       <a href="{{ action('HomeController@reset_pwd')}}">click here to reset your password</a>
    </body>
</html>


