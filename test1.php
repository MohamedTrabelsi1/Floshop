<?php
    $servername= 'localhost';
    $username='root';
    $password ='';
    $dbname='wweb';
    try {
        $pdo=new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
            );
            echo "Connected successfully";
    } 
    catch (PDOException $e) {
        echo "Connection failed:". $e->getMessage();
    }
    $intro= 'INSERT INTO produit (nom,categorie,descript,prix,img) VALUES ('.'"'.$_POST["nom"].'"'.',"'.$_POST["categorie"].'","'.$_POST["description"].'",'.$_POST["prix"].',"'.$_POST["img"].'");';
    echo $intro;
    
 try {
        $query = $pdo->query($intro);
       
        
    } catch (PDOException $e) {
        $e->getMessage();
    }
    header('Location:prod.php');
    ?>
