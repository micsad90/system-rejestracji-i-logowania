<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Bitwa o Pierścień</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="container">
	<div id="gra">
		<?php
			require_once "connect.php";
			$connect = mysqli_connect("$host","$user","$pass","$db") or die("Błąd połączenia!");
			
			mysqli_set_charset($connect, "utf8");
				
			$login = $_POST["login"];
			$haslo = $_POST["haslo"];
			
			$sql = "SELECT * FROM users WHERE login='$login' AND haslo='$haslo'";
			
			$result = mysqli_query($connect, $sql) or die("Błąd połączenia!");
			
			if($row = mysqli_fetch_assoc($result))
			{
				//WIDOK ZALOGOWANEGO GRACZA!!!
				echo @$row[login]." "."<a href='wyloguj.php'>Wyloguj się!</a>"."<br>";
				echo @$row[imie]."<br>";
				echo @$row[email]."<br>";
				echo "Twoje zasoby: <br>";
				echo "|Złoto: ".@$row[zloto]." |Drewno: ".@$row[drewno]." |Kamień: ".@$row[kamien]." |Żywność: ".@$row[zywnosc];
			}
			else
			{
				echo "nie ma takiego konta lub podane dane są pieprawidłowe!";
				echo "<br><br><br>";
				echo "<a href='zaloguj.php'><input type='button' value='Zaloguj sie!'></a>";
				echo "<br><br><br>";
				echo "<a href='rejestracja.php'><input type='button' value='Zarejestruj sie!'></a>";
			}
			
				
			mysqli_close($connect);
		?>
	</div>
</div>
</body>
</html>