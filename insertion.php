
<?php


class user
 {
public ?string $nom=null;
public ?string $prenom=null;
public ?string $usernam=null;
public ?string $email=null;
public ?string $adress=null;
public ?string $tel=null;
public ?string $password=null;

public function __construct( string $nm, string $pnm ,string $usern,string $adrs,string $tl, string $eml , string $pass){
    $this->nom=$nm;
    $this->prenom=$pnm;
    $this->usernam=$usern;
    $this->email=$eml;
    $this->adress=$adrs;
    $this->tel=$tl;
    $this->password=$pass;}

public function getnom(){
    return $this->nom;
  }

public function getprenom(){
    return $this->prenom;
}
public function getusername(){
  return $this->usernam;
}
public function getadress(){
  return $this->adress;
}
public function gettel(){
  return $this->tel;
}
public function getemail(){
  return $this->email;
}
public function getpassword(){
  return $this->password;
}
}class userc{
  public function afficherUser($user) {
//$user=new user('ahmed','ali','tounes','4567','rtg@gfdfgf.tn','1234');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wweb";
$nomm=$user->getnom();
$prenomm=$user->getprenom();
$usernamee=$user->getusername();
$adressee=$user->getadress();
$tell=$user->gettel();
$emaill=$user->getemail();
$passowordd=$user->getpassword();
try {

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO user (nom,prenom,usernm,adresse,tel,email,password)
  VALUES ('$nomm','$prenomm', '$usernamee' ,'$adressee','$tell','$emaill','$passowordd')";
 /* $sql->bindParam('1',$nom);
  $sql->bindParam(2,$prenom);
  $sql->bindParam(3,$adresse);
  $sql->bindparam(4,$tel);
  $sql->bindParam(5,$email);
  $sql->bindParam(6,$passoword);*/
  // use exec() because no results are returned
  $conn->exec($sql);
  header("location:./Produits.html");
  //echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
  }
}
?>