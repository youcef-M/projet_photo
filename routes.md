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
| /user/activate    |  POST  |    	   **token**		 | 	 Active un utilisateur identifié par son token   |

### Routes pour la gestion des posts. (en gras les parametres obligatoires)
      
|         URL        | METHOD |                                 ARGUMENTS                                 |                     UTILITY                     |
|:------------------:|:------:|:-------------------------------------------------------------------------:|:-----------------------------------------------:|
|     /posts/{id}    |   GET  |                                    none                                   |                 Liste des posts                 |
|      /post/new     |  POST  | **titre**, *description*, **privacy**, **user_id**, **photo(le fichier)** |                   Nouveau post                  |
|   /post/show/{id}  |   GET  |                                    none                                   |               Info du post n° {id}              |
|  /post/update/{id} |   PUT  |                   **titre**, *description*, **privacy**                   |               MAJ du post n° {id}               |
|  /post/delete/{id} |   GET  |                                    none                                   |           Suppression du post n° {id}           |
| /post/privacy/{id} |  POST  |                                 *privacy*                                 |      Change la visibilité du post n° {id}       |
|   /post/feed/{id}  |   GET  |                                    none                                   |   Liste des posts des follow du user n° {id}    |
 
EDIT: le lien pour supprimer est désactivé pour le moment.


### Routes pour la gestion des commentaires.

|          URL          | METHOD |               ARGUMENTS               |                 UTILITY                 |
|:---------------------:|:------:|:-------------------------------------:|:---------------------------------------:|
| /comments/bypost/{id} |   GET  |                  none                 |   Liste des commentaires pour un post   |
| /comments/byuser/{id} |   GET  |                  none                 | Liste des commentaires d'un utilisateur |
|      /comment/new     |  POST  |  **content**,**user_id**,**post_id**  |           Nouveau commentaire           |
|   /comment/show/{id}  |   GET  |                  none                 |       Info du commentaire n° {id}       |
|  /comment/update/{id} |   PUT  | **titre**, *description*, **privacy** |        MAJ du commentaire n° {id}       |
|  /comment/delete/{id} |   GET  |                  none                 |       Suppression du post n° {id}       |


### Routes pour la gestion des follows
        ** Les routes sont désactivées pour le moment**

|         URL        | METHOD | ARGUMENTS |                 UTILITY                 |
|:------------------:|:------:|:---------:|:---------------------------------------:|
|   /followers/{id}  |   GET  |    none   | Liste de nos followers (liste de users) |
| /followers/id/{id} |   GET  |    none   |      Liste des id de nos followers      |
|   /following/{id}  |   GET  |    none   |  Liste de nos follows (liste de users)  |
| /following/id/{id} |   GET  |    none   |       Liste des id de nos follows       |
