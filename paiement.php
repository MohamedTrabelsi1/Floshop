

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
<body>
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
<h2 style="color: rgb(228, 56, 93);position: absolute;left: 550px;top: 150px;">Choose payment method </h2>

<div style="position: absolute;left: 800px;top: 300px;">
<input id="especes" type="checkbox" onclick="pay()" > By cash
</div>
<div style="position: absolute;left: 600px;top: 300px;">
<input id="carte" type="checkbox" onclick="pay()"> By credit card
</div>
<!--
<div id="coord_carte" style="position: absolute;left: 350px;top: 400px;display: none;">
    <label >Name :</label>
    <br>
    <input id="nom" type="text" style="min-inline-size: 300px;">
    <br>
    <label >Numero de carte bancaire : </label><br> <img id="img_type" ><br><input id="numero" type="text" style="min-inline-size: 300px;" onkeyup="carte_type()">
    <br><label >Date d'exipiration  : </label> <br><input type="text" id="date" value="dd/mm" maxlength="5" style="min-inline-size: 300px;">
    <br><label >Code: </label> <br><input id="code" type="password" maxlength="3" style="min-inline-size: 300px;"> 
    <button onclick="verification()" style="position: absolute;left: 400px; top: 270px;">Confirmer </button> <br><br><br><br>
</div>

<div id="conf_espece" style="position: absolute;left: 730px;top: 450px; display: none;">
    <button >Confirmer </button>
</div>-->
<div id="coord_carte" style="position: absolute;left: 710px;top: 400px;display: none;">
<form action="../Model/checkout-charge.php" method="POST">
<input type="hidden" name="id_commande" value="<?=$_GET["id_commande"]?>">
<input type="hidden" name="phone" value="<?=$_GET["phone"]?>">
<input type="hidden" name="email" value="<?=$_GET["email"]?>">
<input type="hidden" name="adresse" value="<?=$_GET["adresse"]?>">
<input type="hidden" name="nom" value="<?=$_GET["nom"]?>">
<input type="hidden" name="prix" value="<?=$_GET["prix"]?>">
<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
data-key="pk_test_51K2fzlDrZKYTpdbUovcgje4LvifqvZTVgxPAxZTbTdO6Cv9o9WYx4C1Y3RK9JOaLuhWyNQdsSXMGzzngytzp2T5700ZptSoXdj"
data-amount="<?php echo $_GET["prix"]*100?>"
data-name="<?=$_GET["nom"]?>"
data-description="<?php echo $_GET["adresse"]?>"
data-currency="eur"
data-locale="auto"

>
</script>
</form>
  </div>
  <form action="../Model/ajouter.php" method="get">
  <input type="hidden" name="id_commande" value="<?=$_GET["id_commande"]?>">
<input type="hidden" name="phone" value="<?=$_GET["phone"]?>">
<input type="hidden" name="email" value="<?=$_GET["email"]?>">
<input type="hidden" name="adresse" value="<?=$_GET["adresse"]?>">
<input type="hidden" name="nom" value="<?=$_GET["nom"]?>">
  <div id="conf_espece" style="position: absolute;left: 730px;top: 450px; display: none;">
    <button >Confirmer </button>
</div>
</form>
</body>





<script>
    function verification() {
        var ch="/";
        var nom=document.getElementById("nom");
        var num=document.getElementById("numero");
        var code=document.getElementById("code");
        var datee=document.getElementById("date");
        {if((datee.value[2]!="/")||(datee.value=="")||(datee.value.length<5)||(Number(datee.value.substr(0,2))>31)||(Number(datee.value.substr(3,2))>12)||((Number(datee.value.substr(0,2))>28)&&(Number(datee.value.substr(3,2))===02)))
            {
            datee.style.background="rgb(255, 88, 79)" ;}
            else datee.style.background="rgb(255,255,255)";}
            {if((isNaN(num.value))||(num.value==""))
            {
            num.style.background="rgb(255, 88, 79)" ; }
            else num.style.background="rgb(255,255,255)";}
            {if((isNaN(code.value))||(code.value=="")||(code.value.length<3))
            {
            code.style.background="rgb(255, 88, 79)" ;}
            else code.style.background="rgb(255,255,255)";}
            {if((!isNaN(nom.value))||(nom.value==""))
            {
            nom.style.background="rgb(255, 88, 79)" ;}
            else nom.style.background="rgb(255,255,255)";}
    }
    function pay() {
        
    
    var especes=document.getElementById("especes");
        var carte=document.getElementById("carte");
        var button=document.getElementById("conf_espece");
        var coord=document.getElementById("coord_carte");
          if ((especes.checked==true)&&(carte.checked==false))
          {
            button.style.display = "block";
            coord.style.display = "none";
            carte.checked==false;
          }
          else if ((carte.checked==true)&&(especes.checked==false))
          {
            button.style.display = "none";
            coord.style.display = "block";
            
          }
          else
          { button.style.display = "none";
            coord.style.display = "none";}
        }

        function carte_type() {
          var num=document.getElementById("numero");
          var img=document.getElementById("img_type");
          if (Number(num.value[0])===4)
              img.src="./assets/images/visa.png";
              else if (Number(num.value[0])===5)
              img.src="./assets/images/master.png";
              else img.src="";
        }

        function ajouter() {
          
        }
</script>

</html>