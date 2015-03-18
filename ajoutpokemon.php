
<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
if ((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['image']) && !empty($_POST['image'])) && (isset($_POST['describ']) && !empty($_POST['describ']))) {
// on teste les deux mots de passe
if ($_POST['image'] == $_POST['describ']) {
$erreur = 'Les 2 champs sont identiques.';
}
else {
$base = mysql_connect ('teammorttp.mysql.db', 'teammorttp', 'marsien13');
mysql_select_db ('teammorttp', $base);

// on recherche si ce login est déjà utilisé par un autre membre
$sql = 'SELECT count(*) FROM Pokemon WHERE name="'.mysql_escape_string($_POST['name']).'"';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$data = mysql_fetch_array($req);

if ($data[0] == 0) {
$sql = 'INSERT INTO Pokemon VALUES("", "'.mysql_escape_string($_POST['name']).'", "'.mysql_escape_string($_POST['image']).'", "'.mysql_escape_string(nl2br($_POST['describ'])).'")';
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

header('Location: ajoutpokemon.php');
exit();
}
else {
$erreur = 'Un membre possède déjà ce login.';
}
}
}
else {
$erreur = 'Au moins un des champs est vide.';
}
}
?>
<html>
<head>
  <meta charset="utf-8" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <!--Css-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--Js-->
</head>
<body>
  
<form action="ajoutpokemon.php" method="post">
  <h1>Ajout Pokemon Database</h1>
  <div class="inset">
  <p>
    <label for="name">Nom</label>
    <input name="name" id="name" type="text" value="<?php if (isset($_POST['name'])) echo htmlentities(trim($_POST['name'])); ?>">
  </p>
  <p>
    <label for="image">Image</label>
    <input name="image" id="image" type="text" value="<?php if (isset($_POST['image'])) echo htmlentities(trim($_POST['image'])); ?>">
  </p>
  <p>
    <label for="describ">Describ</label>
    <textarea rows="5" name="describ" id="describ" cols="50" ></textarea>
  </p>
  </div>
  <p class="p-container">
    <input name="inscription" id="go" value="Inscription" type="submit">
  </p>
  <p id="errormsg"><?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?></p>
</form>
</body>
</html>
