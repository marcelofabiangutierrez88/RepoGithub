 <?php 
	session_start();
	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE id =:id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records-> fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results)>0) {
			$user = $results;
		}
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<title>Bienvenido </title>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	


</head>
<body>


 <?php  require 'partials/header.php' ?>

<?php if (!empty($user)): ?>
	<br>Bienvenido .<?= $user['email']  ?>
	<br>Estas dentro de SuggarAPP
	<a href="logout.php">Salir de la APP</a>

<?php else: ?>
	

<h1>Por favor, Registrate o Inicia Sesion</h1>

<a href="login.php"><input type="submit" value="Ingresar"></a>
<a href="signup.php"><input type="submit" value="Registrarse"></a>


<?php endif; ?>


<footer>
	<b>Propiedad Marcelo Gutierrez 2019</b>
</footer>
</body>
</html>