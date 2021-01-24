# STI : Projet 2 - Système de messagerie sécurisé

> Auteurs : Julien Béguin & Gwendoline Dössegger
>
> Date : 23.01.2021



## Installation

```
git clone --depth=1 https://github.com/jul0105/STI-Messenger.git
cd STI-Messenger/
make init
```

Cette commande permet de construire et lancer les conteneurs ainsi que d'installer les dépendances nécessaires. Lorsque l'initialisation est terminée, vous pouvez accéder à l'application avec l'URL suivant : **http://localhost/**.

### Start/Stop

**Lancer les conteneurs** : `make up` (la commande `make init` est uniquement nécessaire lors de la première utilisation)

**Arrêter les conteneurs** : `make stop`

Besoin d'aide ?  : `make help`


## Modifications par rapport au projet 1

Toutes les modifications effectuées lors du projet 2 commencent par un commentaire "[Project2]".

Voici la liste des modifications effectuées :

- Préparer toutes les requêtes SQL
- Hachage fort des mots de passes pour éviter qu’ils puissent être utilisé même en cas de fuite de la DB
- sanitizer les entrées utilisateurs avant de les persister dans la base de donnée pour éviter les attaque XSS
- Vérifier que l’utilisateur supprimant un message est bien son propriétaire (par exemple)
- Ajouter des tokens anti-CSRF aux formulaires.
- Mettre à jour le serveur web et le SGBD (SQLite)
- Échapper/encoder les information récupéré depuis la base de donnée avant de les insérer dans une page HTML pour éviter les attaques XSS



## Spécifications

Les spécifications de l'application sont disponibles dans le fichier `SPECIFICATIONS.md`.



## Utilisation

### Inscription/connexion

Cette page permet d'accéder au reste du site. Le formulaire de gauche permet de s'enregistrer alors que le formulaire de droite permet de se connecter. 

**Voici les informations de connexion des utilisateurs déjà inscrits :**

- `julien` : `1234` (admin)

- `gil` : `1234` (admin)

- `albert` : `1234` (collaborateur)



![](doc/img/login.png)

----

### Boîte de réception

Ceci est la page principale du site. Elle permet de recevoir, répondre, supprimer et envoyer des messages à d'autres utilisateurs. Le menu de gauche permet de lister un aperçu des messages reçus. En cliquant sur un message, ce dernier est chargé dans la partie de droite. On peut alors voir le contenu du message ainsi que l'historique de la conversation (apparaissant en citation). Le champ textuel en dessous du message permet d'y répondre directement :

![](doc/img/inbox.png)

---

Création d'un nouveau message :

![](doc/img/new_message.png)

----

### Profil

La page de profil permet uniquement de changer de mot de passe. Elle est accessible depuis le bouton à droite de la barre de navigation supérieur :

![](doc/img/profile.png)

---

### Administration

La page d'administration est uniquement accessible au utilisateur possédant le rôle nécessaire. Elle permet d'ajouter, supprimer et modifier des utilisateurs :

![](doc/img/admin.png)

---

Création d'un nouvel utilisateur :

Tous les champs doivent être saisis pour pouvoir continuer.

![](doc/img/new_user.png)
