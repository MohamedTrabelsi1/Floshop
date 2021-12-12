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
    $intro= 'SELECT * FROM produit';
   
 try {
        $query = $pdo->query($intro);
        
        $list =$query->fetchAll();
    } catch (PDOException $e) {
        $e->getMessage();
    }
    $n=count($list);
    if (isset($_POST["id_com"])){
        $id_commande=$_POST["id_com"];
        $check=1;}
        else{

            $id_commande=rand(0,1000);
            $check=0;
        }
        if(isset($_POST["nom"])){
        $intro1= 'INSERT INTO paniers (nom,qte,prix,img,id_commande) VALUES ("'.$_POST["nom"].'"'.',1'.','.$_POST["prix"].','.'"'.$_POST["img"].'"'.','.$_POST["id_com"].');';
   
        try {
               $query = $pdo->query($intro1);
               
               
           } catch (PDOException $e) {
               $e->getMessage();
           }
           
    }
    
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

    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="./assets/favicon.ico" rel="icon">
    <title>Produits</title>

    <link href="./maincss1.css" rel="stylesheet">
    
</head>

<body>
<div id="grad1">
    <!-- Add your content of header -->
    <header>
    <h2>floshop</h2>
    
        <nav class="navbar  navbar-fixed-top navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <!--button type="button" class="navbar-toggle uarr collapsed" data-toggle="collapse" data-target="#navbar-collapse-uarr"-->
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
                    <!--a class="navbar-brand" href="./index.html" title="">
                        <img src="mashuptemplate.svg" class="navbar-logo-img" alt="">
                    </a-->
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse-uarr">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./Produits.html" title="" >Home</a></li>
                        
                        <li><a href="./prod.php" title="" class="active"> Products</a></li>
                        <li><a href="./index.html" title=""> sell </a></li>
                        <li><a href="./contact.html" title="">complaint</a></li>
                        <li><a href="./components.html" title="">events</a></li>
                        <?php if ($check==1){?>
                        <form action="panier.php" method="POST">
                        
                            <input type="hidden" name="id_com" id="id_comm" value="<?=$id_commande?>" >
                            <li><a href="./panier.php" title="">Panier</a></li>
                            
                        
</form>
<?php } ?>
                        <li>
                            
                                <a href="./login page.php" title="" style="margin-left: 450px;">disconnect</a>
                            
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="">
        <div class="container1">
            <div class="row">

                <div class="col-xs-12">
                    <!--img class="img-responsive" src="bg-main-slide.jpg"-->
                </div>
            </div>
        </div>
    </div>
    <div class="slideshow-container">

        <div class="mySlides ">
          <div class="numbertext">1 / 7</div>
          <img src="Lavender-Purple-images-free-download.jpg" style="width:100%">
          <div class="text">beauty of nature</div>
        </div>
        <div class="mySlides ">
            <div class="numbertext">2 / 7</div>
            <img src="tree.jpg" style="width:100%">
            <div class="text">longest trees</div>
          </div>
          <div class="mySlides ">
            <div class="numbertext">3 / 7</div>
            <img src="flower7.jpg" style="width:100%">
            <div class="text">Amaryllis flower</div>
          </div>
        <div class="mySlides">
          <div class="numbertext">4 / 7</div>
          <img src="wisteria tree.jpg" style="width:100%">
          <div class="text">the 144 years old wisteria tree in japan</div>
        </div>
        
        <div class="mySlides">
          <div class="numbertext">5 / 7</div>
          <img src="oldest tree.jpg" style="width:100%">
          <div class="text">old twisted bonzai tree</div>
        </div>
        <div class="mySlides ">
            <div class="numbertext">6 / 7</div>
            <img src="A-Ficus-tree.jpg" style="width:100%">
            <div class="text">ficus tree</div>
          </div>
          <div class="mySlides ">
            <div class="numbertext">7 / 7</div>
            <img src="flower3.jpg" style="width:100%">
            <div class="text">field of flowers in a forest</div>
          </div>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span>
          <span class="dot"></span> 
          <span class="dot"></span>
        </div>
        

    <div class="section-container">
        <div class="container1">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <div class="text-center" style="position:relative;left:500px">
                        <h1 >Available products</h1>
                    </div>
                    <!--p class="section-container-spacer">Sybille creates Papillonage with the desire to write as simply as possible about the multitude of sensations that pass through us, about the little things that make us who we are. She spontaneously accompanied her texts, often short, with ink drawings, refined and naive
                    </p-->

                    <div class="row section-container-spacer">
                        <table>
                           <?php for ($i=0; $i < $n ; $i++) { ?>
                            <tr>
                                <td>
                              <img class="img-responsive" src="<?=$list[$i]["img"]?>">
                              <p><?php echo $list[$i]["nom"]?></p>
                              <p><?php echo $list[$i]["prix"]." T.N.D"?></p>
                              <form action="./prod.php" method="POST">
                              <input type="hidden" name="id_com" value="<?=$id_commande?>" > 
                              <input type="hidden" name="nom" value="<?=$list[$i]["nom"]?>" id="id_com">
                              <input type="hidden" name="prix" value="<?=$list[$i]["prix"]?>" >
                              <input type="hidden" name="img" value="<?=$list[$i]["img"]?>" >     
                            <input type="submit" value="Add to cart" class="btn1" style="min-block-size: 70px; min-inline-size: 200px;border-radius: 2rem;margin-left: 30px;">
                          
                           </form>
                            </td>
                           <?php if ($i+1<$n)     {   ?>
                           <td>
                              <img class="img-responsive" src="<?=$list[$i+1]["img"]?>">
                              <p><?php echo $list[$i+1]["nom"]?></p>
                              <p><?php echo $list[$i+1]["prix"]." T.N.D"?></p>
                              <form action="./prod.php" method="POST">
                              <input type="hidden" name="id_com" value="<?=$id_commande?>" > 
                              <input type="hidden" name="nom" value="<?=$list[$i+1]["nom"]?>" >
                              <input type="hidden" name="prix" value="<?=$list[$i+1]["prix"]?>" >
                              <input type="hidden" name="img" value="<?=$list[$i+1]["img"]?>" >     
                            <input type="submit" value="Add to cart" class="btn1" style="min-block-size: 70px; min-inline-size: 200px;border-radius: 2rem;margin-left: 30px;">
                          
                           </form>
                           </td>
                           <?php 
                 }?> 
                 <?php if ($i+2<$n)     {   ?>
                           <td>
                              <img class="img-responsive" src="<?=$list[$i+2]["img"]?>">
                              <p><?php echo $list[$i+2]["nom"]?></p>
                              <p><?php echo $list[$i+2]["prix"]." T.N.D"?></p>
                              <form action="./prod.php" method="POST">
                              <input type="hidden" name="id_com" value="<?=$id_commande?>" > 
                              <input type="hidden" name="nom" value="<?=$list[$i+2]["nom"]?>" >
                              <input type="hidden" name="prix" value="<?=$list[$i+2]["prix"]?>" >
                              <input type="hidden" name="img" value="<?=$list[$i+2]["img"]?>" >     
                            <input type="submit" value="Add to cart" class="btn1" style="min-block-size: 70px; min-inline-size: 200px;border-radius: 2rem;margin-left: 30px;">
                          
                           </form>
                           </td>
                           <?php 
                 }?> 
                           </tr>
                    <?php 
                $i=$i+2; }?>
                           </table>
                        </div>
                </div>

            </div>

            <div class="col-xs-12 col-md-8 col-md-offset-2">

                <p>AN INSPIRATIONAL QUOTE: <br>“A garden to walk in and immensity to dream in--what more could he ask? A few flowers at his feet and above him the stars.”     <br> 
                    ― Victor Hugo, Les Misérables         </p>
                <!--small class="signature pull-right">Floshop</small-->
            </div>
        </div>
    </div>
    </div>
    </div>
   

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            navActivePage();
        });
    </script>
<script>
    var slideIndex = 0;
    showSlides();
    
    function showSlides() {
      var i; 
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length ; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>
   
    <script type="text/javascript" src="./main.41beeca9.js"></script>
</div>
</body>

</html>