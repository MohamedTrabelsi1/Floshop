<?php $check; ?>
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
          
    } 
    catch (PDOException $e) {
        echo "Connection failed:". $e->getMessage();
    }
    $intro= 'SELECT * FROM paniers where id_commande='.$_POST["id_commande"].';';
   
 try {
        $query = $pdo->query($intro);
        
        $list =$query->fetchAll();
    } catch (PDOException $e) {
        $e->getMessage();
    }
    $n=count($list);
    $top=300;
    $tot=0;
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  
  
 

  <title>Title page</title>  

<link href="./main.a3f694c0.css" rel="stylesheet"></head>

<body style="background-color: rgb(241, 247, 226);">

 <!-- Add your content of header -->
<header>
  <nav class="navbar  navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle uarr collapsed" data-toggle="collapse" data-target="#navbar-collapse-uarr">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
      </div>

     
    </div>
  </nav>
</header>
<h2 style="position: absolute;top: 100px; left: 600px; color: brown;">Your order :</h2>
<div>
  <p style="position: absolute;top: 250px;left: 400px;">Products :</p>
  <p style="position: absolute;top: 300px;left: 500px;">Name </p>
  <p style="position: absolute;top: 300px;left: 700px;">Qty </p>
  <p style="position: absolute; top: 300px; left: 850px;">Price</p>
  </div>
  <div >
    <br><br><br><br><br><br><br><br><br><br>
<?php for ($i=0; $i <$n ; $i++) {?> 
  
  <p style="position: absolute;left: 480px;"><?php echo $list[$i]["nom"];?></p>
  <p style="position: absolute;left: 705px;"><?php echo $list[$i]["qte"];?></p>
  <p style="position: absolute;left: 840px;"><?php echo $list[$i]["prix"];?></p>
<br>
  <?php } ?>
  </div>

<p style="position: absolute;top: 500px;left: 950px;">Total : <?php 
for ($i=0; $i <$n ; $i++) { 
 $tot=$tot+$list[$i]["prix"];
}
echo $tot." T.N.D";  ?></p>
<br><br><br><br>
<form  id="form">
  <input type="hidden" name="id_commande" value="<?=$_POST["id_commande"]?>">
<div style="position: absolute;top: 550px;left: 400px;">
<input type="hidden" name="prix" value="<?=$tot?>">
<label>Name:</label>
<input type='text' name='nom' id="nom" onkeyup="affecter()" > 
</div>
<div style="position: absolute;top: 590px;left: 385px;">
<label>Adresse:</label>
<input type='text' name='adresse' id="adresse"> 
</div>
<div style="position: absolute;top: 630px;left: 395px;">
<label>Phone :</label>
<input type='text' name='phone' id="tel"> 
</div>
<div style="position: absolute;top: 680px;left: 350px;">
<label>Adresse mail :</label>
<input type='text' name='email' id="mail" > 
</div>
<div style="position: absolute;top: 680px;left: 800px;">
 <input type='submit' class= "btn btn-primary" value='Continuer' onclick="verif()" >
</div>

</form>



</body>
<script>
  
function verif() {
  var nom=document.getElementById("nom");
  var adresse=document.getElementById("adresse");
  var tel=document.getElementById("tel");
  var mail=document.getElementById("mail");
  var form=document.getElementById("form");
  var check,test=1,test2=1,test3=1,test1=1;
  {if((!isNaN(nom.value))||(nom.value==""))
            {test=0;
            nom.style.background="rgb(255, 88, 79)" ;}
            else nom.style.background="rgb(255,255,255)";}
            {if((adresse.value==""))
            {test1=0;
            adresse.style.background="rgb(255, 88, 79)" ;}
            else adresse.style.background="rgb(255,255,255)";
}
      {if((isNaN(tel.value))||(tel.value==""))
            {test2=0;
            tel.style.background="rgb(255, 88, 79)" ;}
            else tel.style.background="rgb(255,255,255)";}

            {if((mail.value==""))
            {test3=0;
            mail.style.background="rgb(255, 88, 79)" ;}
            else mail.style.background="rgb(255,255,255)";    
}
if ((test===0)||(test1===0)||(test2===0)||(test3===0))
{
  
     form.novalidate="false";
}
else {form.action="paiement.php"; 
      form.method="get";
}
}







</script>
</html>