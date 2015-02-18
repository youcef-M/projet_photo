# Projet-photo

## API

1. Url de base (peut changer): 
        https://api-rest-youcef-m.c9.io/

   > Les paramètres vont surement changer pour l'ajout de la sécurité.
2. Routes pour la gestion des utilisateurs.
 
|        URL        | METHOD |         ARGUMENTS         |                      Utilité                      |
|:-----------------:|:------:|:-------------------------:|:-------------------------------------------------:|
|       /users      |   GET  |            none           |               Liste des utilisateurs              |
|     /user/new     |  POST  | *username,email,password* |                 Nouvel utilisateur                |
|  /user/show/{id}  |   GET  |            none           |           Info de l'utilisateur n° {id}           |
| /user/update/{id} |   PUT  | *username,email,password* |            MAJ de l'utilisateur n° {id}           |
| /user/delete/{id} |   GET  |            none           |        Suppression de l'utilisateur n° {id}       |
|    /user/login    |  POST  |    *username, password*   | Vérifie la présence de l'utilisateur dans la BDD  |