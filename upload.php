<?php
define('APP_LOG_FILE', __DIR__."/log.txt");
function logIt($message, $die = true)
{
    file_put_contents(APP_LOG_FILE, date('c').' - "'.$_POST['nom'].'" - "'.$message.'"'.PHP_EOL, FILE_APPEND);
    if($die === true){
        die($message);
    }
}
// @todo rajouter un test sur la taille maximum
// @todo Chaque upload doit être loggé dans un fichier de log "log.txt"
//var_dump($_POST);
//var_dump($_FILES);
// si il y a une erreur specifiee pour le fichier dans $_FILE, j'arrete
if($_FILES['file1']['error'] != 0){
    logIt("Erreur : Erreur upload " . $_FILES['file1']['error']);
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
?>
<img src="<?="/uploads/".$fileName?>" alt="">
