# Projet-photo

## API

### Url de base (peut changer): 
        https://api-rest-youcef-m.c9.io/

   > Les paramètres vont surement changer pour l'ajout de la sécurité.
   
### Routes pour la gestion des utilisateurs.
 
|        URL        | METHOD |         ARGUMENTS         |                      Utilité                      |
|:-----------------:|:------:|:-------------------------:|:-------------------------------------------------:|
|       /users      |   GET  |            none           |               Liste des utilisateurs              |
|     /user/new     |  POST  | *username,email,password* |                 Nouvel utilisateur                |
|  /user/show/{id}  |   GET  |            none           |           Info de l'utilisateur n° {id}           |
| /user/update/{id} |   PUT  | *username,email,password* |            MAJ de l'utilisateur n° {id}           |
| /user/delete/{id} |   GET  |            none           |        Suppression de l'utilisateur n° {id}       |
|    /user/login    |  POST  |    *username, password*   | Vérifie la présence de l'utilisateur dans la BDD  |


### Routes pour la gestion des posts. (en gras les parametres obligatoires)
 
|         URL        | METHOD |                                 ARGUMENTS                                 |                UTILITY                |
|:------------------:|:------:|:-------------------------------------------------------------------------:|:-------------------------------------:|
|     /posts/{id}    |   GET  |                                    none                                   |            Liste des posts            |
|      /post/new     |  POST  | **titre**, *description*, **privacy**, **user_id**, **photo(le fichier)** |              Nouveau post             |
|   /post/show/{id}  |   GET  |                                    none                                   |          Info du post n° {id}         |
|  /post/update/{id} |   PUT  |                   **titre**, *description*, **privacy**                   |          MAJ du post n° {id}          |
|  /post/delete/{id} |   GET  |                                    none                                   |      Suppression du post n° {id}      |
| /post/privacy/{id} |  POST  |                                 *privacy*                                 | Change la visibilité du post n° {id}  |

EDIT: le lien pour supprimer est désactivé pour le moment.
