<?php
/**
 * login
 */
include '../_cms/index.php';

Cms::pageProtect();

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>brooklyn panel login</title>
    <meta name="description" content="brooklyn panel login">
    <meta name="keywords" content="brooklyn panel login">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../brooklyn/_assets/_img/_favicon/favicon.ico" />
    <link rel="stylesheet" href="../brooklyn/_assets/_css/style.css">
</head>
<body class="login-background">

<div class="login-screen">
    <div class="login-screen__logo"><img src="../brooklyn/_assets/_img/logo_login.png"></div><!-- .login-screen__logo -->
    <div class="login-screen__error js-login-error"><p>Wrong login credentials!</p></div><!-- .login-screen__error -->
    <form id="login-screen__form" class="js-login-form">

        <label>
            <input type="text" class="login-screen__input" placeholder="username" name="username">
            <input type="password" class="login-screen__input" placeholder="password" name="password">
        </label>

        <input type="submit" class="login-screen__submit" value="Login" />
    </form><!-- .login-screen__form -->

</div><!-- .login-screen -->

<script src="../brooklyn/_assets/_js/jquery.1.8.3.min.js"></script>
<script src="../brooklyn/_assets/_js/main.min.js"></script>
</body>
</html>