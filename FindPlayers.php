<!DOCTYPE html>
<html>
	<head>
		<title>NBA Player Stats</title>
	</head>
	<body>
		<h1>NBA Player Stats</h1>

		<br />

		<form action="http://ec2-54-149-186-103.us-west-2.compute.amazonaws.com/FindPlayers.php" method="GET">
			Type in a Player&rsquo;s Name: <input type="text" name="name">
			<input type="submit">
		</form>

		<br />

		<?php

		if (isset($_GET["name"])) {
			$name = $_GET["name"];
			# GET PLAYER INFO FROM NAME!
			
			try {
				$db = new PDO(
					'mysql:host=info344database.ck5syqgiaru0.us-west-2.rds.amazonaws.com:3306;dbname=CSV_DB',
					'info344user', 'D4t4B455');
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$rows = $db->query("
					SELECT *
					FROM Players
					WHERE PlayerName LIKE '%$name%'");

				foreach ($rows as $row){
					echo "Name: " . $row[0] . "<br />";
					echo "GP: " . $row[1] . "<br />";
					echo "FGP: " . $row[2] . "<br />";
					echo "TPP: " . $row[3] . "<br />";
					echo "FTP: " . $row[4] . "<br />";
					echo "PPG: " . $row[5] . "<br />";
					
					echo "<br />";
				}
			} catch (PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
		}
		?>

	</body>
</html>