<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Bitwa o Pierścień</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div id="content">
<?php
	if(empty($_POST["login"]) OR (empty($_POST["pass"])) OR (empty($_POST["name"])) OR (empty($_POST["email"])))
	{
		echo "<span style='color:red;'><h1>Uzupełnij dane!</h1></span>";
		echo "<br><br><br>";
		echo "<a href='rejestracja.php'><input type='button' value='powrót do rejestracji!'></a>";
	}
	else
	{
			require_once "connect.php";
	$connect = mysqli_connect("$host","$user","$pass","$db") or die("Błąd połączenia!");

		$login = $_POST["login"];
		$haslo = $_POST["pass"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		
	
		$log = "INSERT INTO users VALUES(NULL, '$login', '$haslo', '$name', '$email','100','100','100','100')";
		mysqli_query($connect, $log);

		
	mysqli_close($connect);
	
	echo "Witaj"." ".$login." możesz teraz śmiało się zalogować do gry";
	echo "<br><br>";
	echo "<a href='zaloguj.php'><input type='button' value='Zaloguj się!'</a>";
	}

	
	
?>

	</div>
</body>
</html>