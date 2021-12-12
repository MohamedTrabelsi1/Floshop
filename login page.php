<?php 
//include_once 'C:/xampp/htdocs/AtelierPHP/verify.php';

$success=0;
$error=0;
//$found=1;
//$userC = new UserC();
if( isset($_POST['username']) && isset($_POST['password']))
 {if( !empty($_POST['username']) && !empty($_POST['password']))
    {
        $success=1;
        include_once 'verify.php';
        $found=verify($_POST["username"],$_POST["password"]);
        if($found==1){header("location:./Produits.html");}

}

else{$error=1;}}
?>

<!doctype HTML>
<html>
<head>
<title>login page</title>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style1.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
        <video id="myVideo" autoplay muted>
            <source src="images/floshop4.mp4" type="video/mp4">
           
          Your browser does not support the video tag.
          </video>  
        <!--img src="images\floshop1.png" height="150" width="150" alt="logo site" style="position:absolute; left:685px; top:20px; " type="button" id="formButton"-->
        
          
        <section class="ftco-section" id="timer1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h1 class="heading-section"  style="top: 20px;">welcome</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                      <h3 type="button" class="mb-4 text-center" style="background-color:rgb(248, 210, 210);color:black;border-radius: 1rem;margin-top: 10px;">continue as a visitor</h3>
                      <form action="#" class="signin-form" id="form1" method="post">
                      <?php /*
					 if ( $success==1) {
                        // var_dump($user);
                        include_once 'C:\xampp\htdocs\AtelierPHP\login-form-20\login-form-20\verify.php';
                        $found=verify($_POST["username"],$_POST["password"]);
                    }
                    
					else{}
					 //else if($error=1){echo'{<p>error</p>';}
					 */
					  ?>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Usernamer" name="username" required>
                          </div>
                  
                    <div class="form-group">
                      <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                      <p id="error" style="color:red;font-weight:bold"></p>
                      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
               
                </div>
               
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3" onclick="validateform(event)">log In</button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary" style="color: rgb(0, 0, 0)" >Remember Me
                                          <input type="checkbox" checked>
                                          <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" style="color: rgb(0, 0, 0)">Forgot Password</a>
                                    </div>
                    </div>
                  </form>
                  <p class="w-100 text-center">&mdash; Or login In With &mdash;</p>
                  <div class="social d-flex text-center">
                      <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                      <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                  </div>
                  </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/main.js"></script>
       <script >
           //var check=0;
           function validateform(event) {
              // var check=1;
               var errorp=document.getElementById('error');
           var check=<?php echo $found ?>;
           console.log(check);
           if(check==0)
           {
            errorp.innerHTML=" verify your password";
          //  event.preventDefault();
          $found=1;
           }
           }
       </script> 
    
</body>

</html>