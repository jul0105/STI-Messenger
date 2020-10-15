# Spécifications

## Pages

| Nom                                                  | Accès          | Status |
| ---------------------------------------------------- | -------------- | ------ |
| Login                                                | Tous le monde  | OK     |
| Lister les messages                                  | Collab + Admin | OK     |
| Ecrire un message                                    | Collab + Admin | OK     |
| Détails d'un message                                 | Collab + Admin | OK     |
| Répondre à un message                                | Collab + Admin | OK     |
| Supprimer un message (peut être juste un bouton)     | Collab + Admin | OK     |
| Changer de mot de passe                              | Collab + Admin | OK     |
| Ajouter un utilisateur                               | Admin          | OK     |
| Modifier un utilisateur                              | Admin          | OK     |
| Supprimer un utilisateur (peut être juste un bouton) | Admin          | OK     |
| Lister les utilisateurs (pas demandé mais utile)     | Admin          | OK     |



## Base de données

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

