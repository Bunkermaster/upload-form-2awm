<?php
// je recupere le code qui est dans config-functions.php
require_once "config-functions.php";
require_once "connect.php";
// si il y a une erreur specifiee pour le fichier dans $_FILE, j'arrete
if($_FILES['file1']['error'] != 0){
    if($_FILES['file1']['error'] == UPLOAD_ERR_INI_SIZE){
        logIt("Fichier trop gros! Taille supérieure au maximum de la configuration PHP");
    } else {
        logIt("Erreur : Erreur upload #" . $_FILES['file1']['error']);
    }
}
if($_FILES['file1']['size'] > APP_MAX_UPLOAD){
    logIt("Erreur : Fichier trop gros! " . $_FILES['file1']['size']." Octets contre ".APP_MAX_UPLOAD." permis.");
}
if(!in_array($_FILES['file1']['type'], APP_ACCEPTED_CONTENT_TYPES)){
    logIt("Erreur : Type de contenu refusé! " . $_FILES['file1']['type']);
}
//if(!file_put_contents(APP_LOG_FILE, date('c').' - "'.$_POST['nom'].'"'.PHP_EOL, FILE_APPEND)){
//    die("Impossible d'écrire dans la log");
//}
$uploadDir = __DIR__."/uploads/";
$fileName = $_FILES['file1']['name'];
// vérification de l'existence du fichier cible
if(file_exists($uploadDir.$fileName)){
    logIt("Fichier déjà existant");
}
// je stocke le nom venant du formulaire dans une variable apres lui avoir retiré
// ses espaces et retours a la ligne en debut et fin de chaine
$name = trim($_POST['nom']);
// si le repertoire n'existe pas, j'arrete
if(!is_dir($uploadDir)){
    logIt("Erreur : le répertoire d'upload n'existe pas");
}
// verification de la possibilité d'écrire dans le repertoire $uploadDir
// http://php.net/manual/en/function.is-writable.php
if(!is_writable($uploadDir)){
    logIt("Erreur : le répertoire d'upload n'est pas accessible en écriture");
}
// tester si le nom est bien rempli
if(strlen($name) == 0){
    logIt("Erreur : le nom ne peut être vide");
}
// si le move_uploaded_file n'a pas fonctionne, j'arret
if(!move_uploaded_file($_FILES['file1']['tmp_name'], $uploadDir.$fileName)){
    logIt("Erreur : Fichier temporaire inaccessible");
}
// j'affiche l'image uploadee
logIt("Ca a marché! '$fileName' est bien uploadé", false);
$sql = "INSERT INTO `upload`
        (`nom`,`taille`,`content-type`)
        VALUES
        (:nom, :taille, :contenttype);";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nom',$_FILES['file1']['name']);
$stmt->bindValue(':taille',$_FILES['file1']['size']);
$stmt->bindValue(':contenttype',$_FILES['file1']['type']);
$stmt->execute();
?>
<img src="<?="/uploads/".$fileName?>" alt="">
