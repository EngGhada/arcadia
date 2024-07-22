<!DOCTYPE html>
<html>
<head>
	<title>Les Animaux</title>
	<style>
		table {
			margin: 0 220px;
		}
		td {
			padding: 10px;
		}
		img {
			width: 200px;
			height: 150px;
			margin: 10px;
		}
		nav {
			background-color: #333;
			overflow: hidden;
		}
		nav a {
			float: left;
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}
		nav a:hover {
			background-color: #ddd;
			color: black;
		}
	</style>
</head>
<body>
	<nav>
		<a href="#accueil">Accueil</a>
		<a href="#habitat">Habitat</a>
		<a href="#services">Services</a>
		<a href="login.php">Connexion</a>
	</nav>
	<table>
		<?php
		require_once 'connect.php';

		$query = "SELECT * FROM lesanimaux";
		$result = mysqli_query($conn, $query);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			if ($i % 2 == 0) {
				echo "<tr>";
			}
			echo "<td>";
			echo "<img src='data:image/jpeg;base64,". base64_encode($row['images']). "' alt='Image' />";
			echo "</td>";
			$i++;
			if ($i % 2 == 0) {
				echo "</tr>";
			}
		}
		if ($i % 2 != 0) {
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>