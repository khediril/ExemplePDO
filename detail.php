
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
       
       $id = $_GET['id'];
       $req="select * from produit  where id=".$id;
       $resultat = $connex->query($req);
       
       
       //$data = $resultat->fetchAll();
       //var_dump($data);
      // print_r($data);
      if ($resultat->rowCount()> 0) {
        $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
        echo '<table border="1">';
              echo "<tr>";
          
              
              echo "<td>".$ligne["id"]."</td>";
              echo "<td><a href='detail.php'>".$ligne["nom"]."</a></td>";
              echo "<td>".$ligne["prix"]."</td>";
              echo "</tr>";
          
          echo "</table>";
      }
      else
      {
          echo "<p>Id inexistant....</p>";
      }

    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }






?>
</body>
</html>