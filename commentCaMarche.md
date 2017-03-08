# Comment ça marche

## Installation

```bash
cd /Applications/MAMP/htdocs
git clone https://github.com/Bunkermaster/upload-form-2awm.git
cd upload-form-2awm
```

## Que faire?
* Créer une table `upload` dans une base de données nommée `file-upload-2awm` définissant les fichiers comme suit:
    * id 
    * nom VARCHAR(255)
    * taille INT
    * content-type VARCHAR(100)
* stocker les informations relatives au fichier uploadé dans la table en utilisant PDO
INSERT INTO `upload`...

## Déjà fait
* Rajouter un test sur le type de fichier
Informations :
```php
$_FILES['fichier']['type']
```
Je ne veux accepter que les images (GIF, JPG, PNG)
* image/gif
* image/jpeg
* image/png

En cas d'autre type, erreur!

Hint : http://php.net/manual/fr/function.in-array.php