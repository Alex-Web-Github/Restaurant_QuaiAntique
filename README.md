# Évaluation en Cours de Formation

![cover](https://github.com/Alex-Web-Github/Restaurant_QuaiAntique/blob/afcfe1fb3f3b8b3fb93af77671393d38790959c8/Screenshot%202023-05-18%20at%2010-32-41%20Quai%20Antique%20Chamb%C3%A9ry%20-%20Savoie.png)

Consulter sur : <http://sc4foal9574.universe.wf/quai_antique>.

L'objectif est de réaliser une application pour un restaurant fictif appelé "Quai Antique" à Chambéry.

Les fonctionnalités principales sont :

* Connexion en mode ADMIN pour gérer les informations du site web
* Gestion de la carte des plats (Create/Read/Update/Delete) en PHP/MySQL
* Module de Réservation en JS (le client peut voir s'il y a assez de places disponibles sur un créneau horaire donné)

## Installation

```sh
git clone https://github.com/Alex-Web-Github/Restaurant_QuaiAntique.git
cd Sites/Restaurant_QuaiAntique/
npm install
npm start
```

### Déploiement sur serveur Apache/NGNINX

'- Créer une DB MySql puis un utilisateur (login, password)
'- Créer les Tables avec les scripts SQL ci-joints
'- Ouvrir une liaison FTP avec le serveur distant
'- Importer fichiers PHP et les répertoires /lib, /css, /js, /templates, /upload, /assets
'- Ouvrir le fichier ./lib/pdo.php et actualiser les paramètres de la liaison à la BDD
'- Pour créer un compte Admin, créer un compte Utilisateur, puis changer le 'role' de 'client' à 'admin' avec une commande SQL (Alter Table `users`) ou avec PHPMyAdmin.
