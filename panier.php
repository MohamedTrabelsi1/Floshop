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
    $intro= 'SELECT * FROM paniers where id_commande=3';
   
 try {
        $query = $pdo->query($intro);
        
        $list =$query->fetchAll();
    } catch (PDOException $e) {
        $e->getMessage();
    }
    $n=count($list);
    
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
  
  <link href="./assets/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="./assets/favicon.ico" rel="icon">

 

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
        <a class="navbar-brand" href="./index.html" title="">
          <img src="./assets/images/mashuptemplate.svg" class="navbar-logo-img" alt="">
        </a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-uarr">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./index.html" title="" class="active">Home</a></li>
          
          
          <li><a href="./contact.html" title="">Contact</a></li>
          
          <li>
            <p>
              <a href="./download.html" class="btn btn-primary navbar-btn" title="">Deconnecté</a>
            </p>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
</header>
<h1 style="color: rgb(248, 59, 59); position: absolute; left: 650px;top: 120px;">Votre panier :</h1>
<p style="position: absolute;left: 300px;top: 230px;">Articles :</p>
<div style="position: absolute;top: 270px;">
<?php 
    for ($i=0; $i <$n; $i++) { ?>
   
    <div class="container" style="background-color: rgb(214, 214, 243);padding: 70px; position: absolute;left: 288px; max-inline-size: 880px;"></div>
    <img src="<?=$list[$i]['img']?>" style="position: absolute; left: 300px;" width="150px">
    <p style="position: absolute; left: 530px;">Name: <?php echo $list[$i]['nom']; ?></p>
    <p id="prix<?=$i?>" style="position: absolute; left: 780px;">Prix : <?php echo $list[$i]['prix'];?> T.N.D</p>
    <br><br>
    <p id="qte<?=$i?>" style="position: absolute; left: 530px;">Quantité : <?php echo $list[$i]['qte']; ?> </p>
   
      <input id="edit<?=$i?>" onclick="modifier<?=$i?>()" type="submit" class="btn btn-primary" style="position: absolute;left: 980px;" value="Edit">
    
        <form action="../Model/supp.php" method="POST">
        <input type="submit" class="btn btn-danger" style="position: absolute;left: 1050px;" value="Supprimer">
        <input type="hidden" name="id_produit" value="<?= $list[$i]['id_produit'] ?>">
    </form>
    <div id="<?=$i?>" style="display: none;position: absolute; left: 590px;">
<input  type="text" id="newqte<?=$i?>" style="max-inline-size: 30px;" value="<?= $list[$i]['qte'] ?>">
</div>
<div>
<form action="../Model/edit.php" method="POST">
<input id="qte1<?=$i?>" type="hidden" name="qte">
<input id="prix1<?=$i?>" type="hidden" name="prix">
        <input type="hidden" name="id_produit" value="<?= $list[$i]['id_produit'] ?>">
        <input id="submit<?=$i?>" value="Confirmer" type="submit" onclick="affecter<?=$i?>()" class="btn btn-success" style="position: absolute;left: 950px;display:none;" >
    </form>
    </div>
    <br><br><br><br><br>
  


    <?php     } ?>
    </div>

      <form action="download.php" method="POST">
      <input id="commande" name="id_commande" type="hidden" value="<?=$list[0]["id_commande"];?>">
      <input value="Poursuiver l'achat" type="submit" class="btn btn-success" style="position: absolute;left: 1200px;top:<?=270*$n;?>px;" >
    
    </form>
    
<!--<div id="modifier1" style="display: none;position: absolute; left: 590px;top: 540px;">

  
  <input type="text" id="newqte1" style="max-inline-size: 30px;">
  </div>
  
    
    <input value="Poursuiver l'achat" type="submit" onclick="affecter()" class="btn btn-success" style="position: absolute;left: 1200px;top: 650px;" >
  
  
</form>--> 
<script>
  <?php for ($i=0; $i <$n ; $i++) { ?>

  
  function affecter<?=$i?>() {
    var item=document.getElementById("qte1<?=$i?>");
    var item2=document.getElementById("qte<?=$i?>");
    var item1=document.getElementById("prix1<?=$i?>");
    var x=document.getElementById("newqte<?=$i?>");
    var prix=document.getElementById("prix<?=$i?>");
    var prix_int=<?=$list[$i]["prix"]?>/<?=$list[$i]["qte"]?>;
    item.value=x.value;
    item1.value=x.value*prix_int;

}<?php }?>

<?php for ($i=0; $i <$n; $i++) {?>

function modifier<?=$i?> () {
  var item=document.getElementById("qte<?=$i?>");
  var neww=document.getElementById("<?=$i?>")
  var x=document.getElementById("newqte<?=$i?>");
  var prix=document.getElementById("prix<?=$i?>");
  var but=document.getElementById("submit<?=$i?>");
  var but1=document.getElementById("edit<?=$i?>");
  if (getComputedStyle(neww).display != "block")
  {item.style.display = "none";
  neww.style.display = "block";
  but.style.display="block";
  but1.style.display="none";
  }
  else if ((getComputedStyle(neww).display != "none")&&(x.value!='')&&(!isNaN(x.value)))
  {
    item.innerHTML="Quantité"+x.value;
    item.style.display = "block";
    neww.style.display = "none";
    prix.innerHTML= "Prix :"+(x.value*15)+"T.N.D";
  }
}
<?php }?>






</script>

</body>

</html>