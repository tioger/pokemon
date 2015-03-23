<html>
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<!--Css-->
	<link rel="stylesheet" type="text/css" href="css/styleliste.css">
	<!--Js-->
</head>
<body>
	<div id='content'>
		<div id="ban">
			<div id="logo">
				<img src="img/logo.png" width="884px"/>
			</div>
			<div id="sepa">
				<img src="img/pokeball.png" width="884px"/>
			</div>
		</div>
<?php  
include ("_mysql.php");
// On récupère tout le contenu de la table Pokemon
$reponse = $bdd->query('SELECT * FROM Pokemon');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
<div class="pokemon">
			<div class="poke">
				<div class="pokeimg">
					<img src="img/pokemon/<?php echo $donnees['image']; ?>">
				</div>
				<div class="pokename txtaligncent">
					<p><?php echo $donnees['id']; ?> <?php echo utf8_decode($donnees['name']); ?></p>
				</div>
				<div class="pokedescrib txtaligncent animate">
					<p><?php echo utf8_decode($donnees['describ']); ?></p>
				</div>
			</div>
		</div>
<?php

}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
	</div>
</body>
</html>