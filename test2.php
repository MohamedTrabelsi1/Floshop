
<?php
include 'C:\xampp\htdocs\AtelierPHP\login-form-20\login-form-20\test.php';
$conn=null;

$user=new user();

			?><!DOCTYPE html>
<html>
	
<head>
	<title>
		How to call PHP function
		on the click of a Button ?
	</title>
	<style>
		table,  td {
  border: 1px solid black;
  
}
	</style>
</head>

<body >
<!--table style="border: 4px solid black;"-->
<form method="post">
<input name="search" type="text" placeholder="search">
<button type="submit" >search</button>

</form>
		<?php 
		$search="";
	

		if(isset($_POST['search'])) {
			if(!empty($_POST['search'])){
				$search=$_POST['search'];
				}}
		$conn=mysqli_connect("localhost", "root", "ihebdebbech", "floshop");
    $sql1="SELECT * FROM user";
		$sql = "SELECT * FROM user WHERE id='$search' OR nom='$search' OR prenom='$search' OR usernm='$search' OR adresse='$search' OR tel='$search' OR email='$search' OR password='$search' ";
    $result= mysqli_query($conn, $sql);
	$result1= mysqli_query($conn, $sql1);
    if((mysqli_num_rows($result) > 0)){?>
    <table >
	<tr><td>id</td><td>nom</td><td>prenom</td><td>username</td><td>adresse</td><td>n°telephone</td><td>email</td><td>password</td><td>etat</td></tr>
		<?php
		
		 while($row = $result->fetch_assoc()){
			
			 if(array_key_exists($row["usernm"], $_POST)) {
				$user->update($row["usernm"]);
				header("location:http://localhost:8012/AtelierPHP/login-form-20/login-form-20/test2.php");}
				else if(array_key_exists($row["id"], $_POST)) {
					$user->unupdate($row["usernm"]);
					header("location:http://localhost:8012/AtelierPHP/login-form-20/login-form-20/test2.php");}
            ?>
			
			<form  method="post">
				<tr><td><?php echo $row["id"];?></td><td> <?php echo $row["nom"];?> </td><td> <?php echo $row["prenom"];?></td><td> <?php echo $row["usernm"];?></td><td> <?php echo $row["adresse"];?></td><td> <?php echo $row["tel"];?></td><td> <?php echo $row["email"];?></td><td> <?php echo $row["password"];?></td><td> <?php echo $row["etat"];?></td><td><button type="submit"  name="<?php echo $row["usernm"];?>">block </button> </td><td><button type="submit"  name="<?php echo $row["id"];?>">unblock </button> </td></tr>
				</form>
				<?php 
				
		}
		echo "</table>";
		}
		else {?>
			<table >
			<tr><td>id</td><td>nom</td><td>prenom</td><td>username</td><td>adresse</td><td>n°telephone</td><td>email</td><td>password</td><td>etat</td></tr>
				
				<?php
				 while($row = $result1->fetch_assoc()){
					
					 if(array_key_exists($row["usernm"], $_POST)) {
						$user->update($row["usernm"]);
						header("location:http://localhost:8012/AtelierPHP/login-form-20/login-form-20/test2.php");}
						else if(array_key_exists($row["id"], $_POST)) {
							$user->unupdate($row["usernm"]);
							header("location:http://localhost:8012/AtelierPHP/login-form-20/login-form-20/test2.php");}
					?>
					
					<form  method="post">
						<tr><td><?php echo $row["id"];?></td><td> <?php echo $row["nom"];?> </td><td> <?php echo $row["prenom"];?></td><td> <?php echo $row["usernm"];?></td><td> <?php echo $row["adresse"];?></td><td> <?php echo $row["tel"];?></td><td> <?php echo $row["email"];?></td><td> <?php echo $row["password"];?></td><td> <?php echo $row["etat"];?></td><td><button type="submit"  name="<?php echo $row["usernm"];?>">block </button> </td><td><button type="submit"  name="<?php echo $row["id"];?>">unblock </button> </td></tr>
						</form>
						<?php 
						
				}
		}
	//}
	
	$conn=null;
	?>
	</table>
	


	</body>

</html>
