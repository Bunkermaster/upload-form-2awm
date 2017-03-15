<?php
// @todo créer une liste des images uploadées sur le système dans un tableau HTML
// connexion à la base
require_once "connect.php";
// select
$sql = "SELECT `nom`, `content-type` FROM `upload` ORDER BY `name`;";
// preparer la requete
// executer la requete
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// boucler sur le resultat du select
// un page html!
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td><img src="uploads/willywaller.jpg" alt=""></td>
        <td>image/jpeg</td>
    </tr>
</table>
</body>
</html>
