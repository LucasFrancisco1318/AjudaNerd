<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Calm breeze login screen</title>



    <link rel="stylesheet" href="/res/css/style2.css">


</head>

<body>

<div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>

        <form class="form" action="/admin/login" method="post">
            <input type="text" placeholder="Usuário" name="login">
            <input type="password" placeholder="Senha" name="password">
            <button type="submit" id="login-button">Login</button>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



<script  src="js/index.js"></script>




</body>

</html>