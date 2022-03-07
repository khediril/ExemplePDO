<?php

if(isset($_POST['login']) && isset($_POST['passwd']))
{
   if($_POST['login']=='toto' && $_POST['passwd'] == 'toto')  
   {
       session_start();
       $_SESSION['valide']='ok';
       $_SESSION['login']=$_POST['login'];
       header('Location:exemple1.php');
   } 
   else
   {
    $message = "login ou mot passe invalide...<br> <a href='login.html'>Vers page login</a>";
    $page =<<<PAGE
     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    $message
</body>
</html>
PAGE;

    echo $page;
   }
}