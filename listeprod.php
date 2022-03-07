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
    require_once("params.inc.php");
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $connex =new PDO($dsn,$login,$mp);
        $connex->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {

        echo "Erreur de connexion....";
        echo $e->getMessage();
        die();
    } 
    try{

       $req="select * from produit";
       $resultat = $connex->query($req);
       
       echo '<table border="1">';
       //$data = $resultat->fetchAll();
       //var_dump($data);
      // print_r($data);
       while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
       {
          echo "<tr>";
          
              
              echo "<td>".$ligne["id"]."</td>";
              echo "<td><a href='detail.php?id=".$ligne['id']."'>".$ligne["nom"]."</a></td>";
          echo "</tr>";
       }
       echo "</table>";

    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }






?>
</body>
</html>