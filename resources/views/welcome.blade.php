<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign-Up/Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>
<div class="form">

    <ul class="tab-group">
        <li class="tab"><a href="register">Sign Up</a></li>
        <li class="tab active"><a href="login">Log In</a></li>
    </ul>

    <div class="tab-content">

        <div id="data"></div>

    </div><!-- tab-content -->

</div> <!-- /form -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="/js/auth.js"></script>

</body>
</html>
