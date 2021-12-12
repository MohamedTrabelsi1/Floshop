<?php 
$username='root';
$servername='localhost';
$dbname='wweb';
$password='';
try{
$pdo=new PDO(
"mysql:host=$servername;dbname=$dbname",
$username,$password

    /*PDO::ATTR_ERRMODE=> PDO ::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC*/


);
echo'connection succesfuly';
}
catch(Exeption $e){
    echo "connection failed". $e->getMessage();
}




?>