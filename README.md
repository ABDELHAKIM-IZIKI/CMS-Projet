# Configuration de WordPress avec XAMPP

## Outils utilisés

1. **XAMPP** : Ce package comprend Apache (serveur web) et MySQL (base de données).
2. **Fichiers WordPress** : Téléchargez les fichiers du repository et placez-les dans le dossier `htdocs` de XAMPP.
3. **Base de données** : Le fichier `DB/mystore_DB.sql` contient la structure de la base de données pour l'application.

## Étapes de configuration

### 1. Installation de XAMPP

- Téléchargez et installez **XAMPP** depuis [https://www.apachefriends.org](https://www.apachefriends.org).
- Lancez XAMPP et assurez-vous que **Apache** et **MySQL** sont démarrés.

### 2. Configuration de la base de données

- Accédez à **phpMyAdmin** via [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
- Créez une nouvelle base de données appelée **mystore**.
- Importez le fichier `DB/mystore_DB.sql` dans cette base de données.

### 3. Installation de WordPress

- Téléchargez les fichiers de WordPress depuis le repository et placez-les dans le dossier `htdocs` de XAMPP (par exemple `C:\xampp\htdocs\`).
- Remplacez tout le contenu du dossier `htdocs` par les fichiers téléchargés.

### 4. Configuration de WordPress

- Ouvrez le fichier `wp-config.php` dans le dossier `htdocs` et modifiez les paramètres suivants pour la connexion à la base de données :

```php
define('DB_NAME', 'mystore'); // Nom de la base de données
define('DB_USER', 'root');     // Utilisateur de la base de données
define('DB_PASSWORD', '');     // Mot de passe (vide par défaut)
define('DB_HOST', 'localhost'); // Hôte de la base de données
define('DB_CHARSET', 'utf8');  // Jeu de caractères
define('DB_COLLATE', '');

```
