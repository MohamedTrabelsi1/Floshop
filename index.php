<?php 
session_start();
include_once 'insertion.php';
//include_once 'C:\xampp\htdocs\AtelierPHP\login-form-20\login-form-20\login page.html';
$success=0;
$error=0;$user=null;
$userC = new UserC();
if(isset($_POST["nom"]) && isset($_POST['prenom']) && isset($_POST['username']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST["password"]))
 {if(!empty($_POST["nom"]) && !empty($_POST['prenom']) && !empty($_POST['username']) && !empty($_POST['adresse']) && !empty($_POST["email"]) && !empty($_POST["password"]))
    {
$user=new user($_POST['nom'],$_POST['prenom'],$_POST['username'],$_POST['adresse'],$_POST['tel'],$_POST['email'],$_POST['password']);
if($_POST['password']==$_POST['cpassword']){
$success=1;}
}
else{$error=1;}}
?>
<!doctype HTML>
<html lang="en">
  <head>
  	<title>inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css\style1.css">

	</head>
	<body   style="background-image: url(images/flower6.jpg); ">
		<video id="myVideo" autoplay muted>
            <source src="images/floshop4.mp4" type="video/mp4">
           
          Your browser does not support the video tag.
          </video>  
	<section class="ftco-section" id="timer1">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h1 class="heading-section"  style="margin-top: 50px;">welcome</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<a  class="mb-4 text-center" style="background-color:rgb(248, 210, 210);color:black;border-radius: 1rem;padding: 10px 78px;font-size:21px;"href="login page.php">you have an account?</a>
		      	<h3 type="button" class="mb-4 text-center" style="background-color:rgb(248, 210, 210);color:black;border-radius: 1rem;margin-top: 10px;">continue as a visitor</h3>
				  <form  class="signin-form" id="form1" method="post" name="clubform" >
					  <?php 
					 if ($success == 1) {
                        // var_dump($user);
                        $userC->afficherUser($user); 
                    }
					else{}
					 //else if($error=1){echo'{<p>error</p>';}
					 
					  ?>
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="last name" name="nom"  required>
						  <input type="text" class="form-control" placeholder="first name" name="prenom" required>
						  <input type="text" class="form-control" placeholder="Username" name="username" required>
		      		</div>
					  <input type="email" class="form-control" placeholder="email" name="email" required>

					  <input type="text" class="form-control" placeholder="adresse" name="adresse" required>
					  <input type="numero" class="form-control" placeholder="telephone number" name="tel" required>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
				<div class="form-group">
				<input id="cpassword" type="password" class="form-control" placeholder="confirm Password" name="cpassword" required>
				<p id="errorp" style="color: red; font-weight: bold;"></p>
			</div>
			<!--div class="form-group" style="color: rgb(0, 0, 0);font-weight: bold; margin-top: 20px;">
				<label style="margin-left: 100px;">would you like to be:</label>
				
				<br>
                 <input style="margin-left: 80px;" type="radio" name="typeclient" value="vendeur" >seller
				 <input type="radio" name="typeclient" value="acheteur" >buyer
				 <input type="radio" name="typeclient" value="both" >both
				</div-->
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" id="btn" onclick="validateform(event);" >Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script >
       /* var btn = document.getElementById('btn');
        btn.addEventListener('click', validateForm);*/
function validateform(event) {
    
            var password=document.forms["clubform"]["password"].value;
             var cpassword=document.forms["clubform"]["cpassword"].value;
			 var errorp=document.getElementById('errorp');
        if(password!=cpassword){
			event.preventDefault();
            errorp.innerHTML="verify your password";
          }
		 // event.preventDefault();
}
        function verif(event){
          //var nomR = document.getElementById('nomr');
           // clubForm.nomr.value;
             var password=document.forms["clubform"]["password"].value;
             var cpassword=document.forms["clubform"]["cpassword"].value;
        if(password!=cpassword){
			event.preventDefault();
            console.log(password);}
          }
		  //e.preventDefault();
         </script>

	</body>
</html>

