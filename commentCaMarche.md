# Comment ça marche

## Installation

```bash
cd /Applications/MAMP/htdocs
git clone https://github.com/Bunkermaster/upload-form-2awm.git
cd upload-form-2awm
```

## Que faire?
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
