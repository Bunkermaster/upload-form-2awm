<?php
// http://php.net/manual/en/features.file-upload.post-method.php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Upload d'une image</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <p><label for="nom">Nom</label> <input id="nom" type="text" name="nom"></p>
    <p><label for="file1">Fichier</label> <input id="file1" type="file" name="file1"></p>
    <p><input type="submit" value="Uploader"></p>
</form>
</body>
</html>