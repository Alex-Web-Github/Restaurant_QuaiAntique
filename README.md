# Application Web / restaurant QUAI ANTIQUE

![cover](https://github.com/Alex-Web-Github/Restaurant_QuaiAntique/blob/afcfe1fb3f3b8b3fb93af77671393d38790959c8/Screenshot%202023-05-18%20at%2010-32-41%20Quai%20Antique%20Chamb%C3%A9ry%20-%20Savoie.png)

Consulter sur : <http://sc4foal9574.universe.wf/quai_antique/>

L'objectif est de réaliser une application Web pour un restaurant fictif appelé "Quai Antique" à Chambéry.

Les fonctionnalités principales sont :

* Inscription/Connexion à l'appli. en tant que CLIENT
* Interface Back-End pour gérer les contenus du site par l'ADMIN
* Gestion des Utilisateurs enregistrés (ie: les CLIENTS) (Create/Read/Update/Delete)
* Gestion de la Carte des plats (Create/Read/Update/Delete)
* Gestion des Réservations (Create/Read/Update/Delete)
* Gestion des images du Carousel de la page d'accueil avec description des images au survol
* Affichage des Menus et Horaires d'ouverture
* Vérification du nb de couverts dispo pour une date (sans rechargement de la page) avant réservation en ligne sur un créneau horaire donné
* Prise en compte des Préférences Client lors de la Réservation (nb de couverts habituel, allergies éventuelles notamment)

## Installation

```sh
git clone https://github.com/Alex-Web-Github/Restaurant_QuaiAntique.git
cd Sites/Restaurant_QuaiAntique/
npm install
npm start
```

### Déploiement sur serveur Apache/NGINX

1- Créer une DB MySql puis un utilisateur (login, password)
2- Créer les Tables de la DB avec les scripts SQL fournis
3- Ouvrir une liaison FTP avec le serveur distant
4- Importer fichiers PHP + /libs, /css, /js, /src, /templates, /upload, /assets et la favicon
5- Ouvrir le fichier ./lib/pdo.php et actualiser les paramètres de la liaison à la BDD
6- Pour créer un compte Admin, créer un compte Utilisateur, puis changer le 'role' de 'client' à 'admin' avec une commande SQL (Alter Table `users`) ou avec PHPMyAdmin.
