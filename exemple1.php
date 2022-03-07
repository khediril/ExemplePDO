<?php 
   require_once("verif.inc.php");
?>   



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


// https://www.php.net/manual/fr/errorfunc.configuration.php
// Cette directive détermine si les erreurs doivent être affichées à l'écran ou non
  ini_set('display_errors', 1);
// display_startup_errors bool
// Même si display_errors est activé, des erreurs peuvent survenir lors de la séquence de démarrage
// de PHP, et ces erreurs sont cachées. Avec cette option, vous pouvez les afficher, ce qui est 
// recommandé pour le débogage. En dehors de ce cas, il est fortement recommandé de laisser 
// display_startup_errors à off
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL); // Fixe le niveau d'erreur


try {
    $pdo=new PDO("mysql:host=localhost;dbname=app1","lotfi","lotfi") ;
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $requete = "SELECT * FROM produit";
    $pdostat = $pdo->query($requete );
  
    $_SESSION['nbproduit'] = $pdostat->rowCount();
    echo "je suis :".$_SESSION['login'];
    echo  '<table border="1">';
    while (($ligne = $pdostat->fetch(PDO::FETCH_ASSOC)) != false) {
       echo "<tr>";
       echo "<td>".$ligne['id']."</td>";
       echo "<td>".$ligne['nom']."</td>";
       echo "<td>".$ligne['prix']."</td>";

        //var_dump($ligne);
       /*foreach($ligne as $value)
       {
         echo "id :".$ligne["id"];

       }*/
       echo "</tr>";
    }
    echo "</table>";
    $pdo = null;
    
    echo "<br>";
    echo "<a href='liste.php'>voir la page liste</a><br>";
    echo "<a href='logout.php'>Se deconnecte</a>";
    //var_dump($_SERVER);
    
   }
   catch (Exception $e) {
     echo "<p>ERREUR : ".$e->getMessage() ;
   } 

?>   
</body>

</html>