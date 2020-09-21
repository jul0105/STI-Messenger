## Pages :

| Nom                                                  | Accès          |
| ---------------------------------------------------- | -------------- |
| Login                                                | Tous le monde  |
| Lister les messages                                  | Collab + Admin |
| Ecrire un message                                    | Collab + Admin |
| Détails d'un message                                 | Collab + Admin |
| Répondre à un message                                | Collab + Admin |
| Supprimer un message (peut être juste un bouton)     | Collab + Admin |
| Changer de mot de passe                              | Collab + Admin |
| Ajouter un utilistateur                              | Admin          |
| Modifier un utilisateur                              | Admin          |
| Supprimer un utilisateur (peut être juste un bouton) | Admin          |
| Lister les utilisateurs (pas demandé mais utile)     | Admin          |



## Base de données :

Table :

**User** : 

- <u>username</u>
- password
- role
- status



**Message** :

- <u>id</u>
- sender (*user*)
- recipient (*user*)
- date
- subject
- content

