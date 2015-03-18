# Projet-photo

## API

### Url de base (peut changer): 
        https://api-rest-youcef-m.c9.io/

   > Les paramètres vont surement changer pour l'ajout de la sécurité.
   
### Routes pour la gestion des utilisateurs.
 
   > Les avatars des utilisateurs sont situés à l'adresse : https://api-rest-youcef-m.c9.io/avatar/{id}.jpg
   > où {id} est l'id de l'utilisateur. A noté que toutes les images sont au format jpg et donc lors d'une modification
   > vous devrez envoyer une image au format JPG
   
|        URL        | METHOD |         ARGUMENTS         |                      Utilité                          |
|:-----------------:|:------:|:-------------------------:|:-----------------------------------------------------:|
|       /users      |   GET  |          **page**         |               Liste des utilisateurs                  |
|     /user/new     |  POST  | *username,email,password* |                 Nouvel utilisateur                    |
|  /user/show/{id}  |   GET  |            none           |           Info de l'utilisateur n° {id}               |
| /user/update/{id} |   PUT  | *username,email,password* |            MAJ de l'utilisateur n° {id}               |
| /user/delete/{id} | DELETE |            none           |        Suppression de l'utilisateur n° {id}           |
|    /user/login    |  POST  |    *username, password*   |    Vérifie la présence de l'utilisateur dans la BD    |
| /user/activate    |  POST  |         **token*	         |     Active un utilisateur identifié par son token     |
| /user/avatar/{id} |  POST  |    **photo**(image jpg)   |      Change la photo de profil de l'utilisateur {id}  |

### Routes pour la gestion des posts.
      
|         URL        			| METHOD |                                 ARGUMENTS                                 	|                     UTILITY                     	|
|:-----------------------------:|:------:|:----------------------------------------------------------------------------:|:-------------------------------------------------:|
|     /posts/{id}    			|   GET  |                                  **page**                                 	|                 Liste des posts                 	|
|      /post/new     			|  POST  | **titre**, *description*, **privacy**, **user_id**, **photo(le fichier)** 	|                   Nouveau post                  	|
|   /post/show/{id}  			|   GET  |                                    none                                   	|               Info du post n° {id}              	|
|  /post/update/{id} 			|   PUT  |                   **titre**, *description*, **privacy**                   	|               MAJ du post n° {id}               	|
|  /post/delete/{id}           	| DELETE |                                 none                                      	|        Suppression du post n° {id}           		|
| /post/privacy/{id}           	|  POST  |                                 *privacy*                                 	|      Change la visibilité du post n° {id}       	|
|   /post/feed/{id}/follow     	|   GET  |                           **page**                                 		 	|   Liste des posts des follow du user n° {id}    	|
| /post/feed/{id}/friend       	|   GET  |                            **page**                                			| Liste des posts des friends du user n° id}    	| 
| /post/feed/latest   			|   GET  |                            **page**                                			| Liste des derniers posts    						| 
| /post/feed/vote   			|   GET  |                            **page**                                			| Liste des posts les mieux notés					| 
| /post/pages   				|   GET  |                            none                                				| nombre de pages de posts							| 
| /post/pages/{id}   			|   GET  |                            none                                				| nombre de pages de posts appartenant a {id}		| 
| /post/follow/pages/{id}   	|   GET  |                            none                                				| nombre de pages de posts pour /feed/{id}/follow 	| 
| /post/friend/pages/{id}   	|   GET  |                            none                                				| nombre de pages de posts pour /feed/{id}/friend 	| 


### Routes pour la gestion des commentaires.

|          URL          		| METHOD 	|               ARGUMENTS               |                 UTILITY                 								|
|:-----------------------------:|:---------:|:-------------------------------------:|:---------------------------------------------------------------------:|
| /comments/bypost/{id} 		|   GET  	|                **page**               |   Liste des commentaires pour un post   								|
| /comments/byuser/{id} 		|   GET  	|                **page**               | Liste des commentaires d'un utilisateur 								|
|      /comment/new     		|  POST  	|  **content**,**user_id**,**post_id**  |           Nouveau commentaire           								|
|   /comment/show/{id}  		|   GET  	|                  none                 |       Info du commentaire n° {id}       								|
|  /comment/update/{id} 		|   PUT  	|              **content**              |        MAJ du commentaire n° {id}       								|
|  /comment/delete/{id} 		| DELETE 	|                  none                 |       Suppression du commentaire n° {id}       						|
|  /comments/post/pages/{id} 	| GET 		|                  none                 |       nombres de pages de commentaires pour le post {id}      		|
|  /comments/user/pages/{id} 	| GET 		|                  none                 |       nombres de pages de commentaires pour l'utilisateur {id}       	|


### Routes pour la gestion des follows

|         URL        	| METHOD |             ARGUMENTS             	|                   UTILITY                  				|
|:---------------------:|:------:|:------------------------------------:|:---------------------------------------------------------:|
|     /follow/new    	|  POST  | **follower_id**, **following_id** 	| follower_id suit les posts de following_id 				|
|   /follow/delete   	|  DELETE| **follower_id**, **following_id** 	|    follower_id ne suit plus following_id   				|
|   /followers/{id}  	|   GET  |                none               	|   Liste de nos followers (liste de users)  				|
|   /following/{id}  	|   GET  |  **follower_id**, **following_id**	|    Liste de nos follows (liste de users)   				|
| /followers/pages/{id} |   GET  |                none               	|   nombres de pages pour /followers/{id}  					|
| /follower/exist 		|   GET  |  **follower_id**, **following_id** 	|   retourne code 200 si follower est abonné a following  	|


### Routes pour la gestion des amis

|         URL        			| METHOD 	|             ARGUMENTS               |                   UTILITY                  										|
|:-----------------------------:|:---------:|:-----------------------------------:|:-------------------------------------------------------------------------------:|
|     /friends/{id} 			|  GET   	|                page                 |   Liste des amis de l'{id}              										| 
|   /friend/activate 			|  PUT   	|     **user_id**, **friend_id**      |     friend_id accepte user_id              										|
|/friends/waiting/{id}			|  GET  	|                none                 |   Liste des amis en attente de l'{id}      										|
|   /friend/new      			|  POST  	|      **user_id**, **friend_id**     |   user_id demande friend_id en ami         										|
|   /friend/delete   			| DELETE 	|      **user_id**, **friend_id**     |  Suppression de la relation ami            										| 
| /friends/pages/{id}  			|  GET   	|                none                 |   nombre de pages pour /friends/{id}              								|        
| /friends/waiting/pages/{id} 	|  GET   	|                none                 |   nombre de pages pour /friends/waiting/{id}              						| 
|   /friend/exist      			|  GET  	|      **user_id**, **friend_id**     |   retourne 200 si il existe deja une demande en ami en cours(bilatéral)         |


### Routes pour la gestion des votes

|         URL        	| METHOD 	|             ARGUMENTS             |                   UTILITY                   							|
|:---------------------:|:---------:|:---------------------------------:|:---------------------------------------------------------------------:|
|  /vote/likes/{id}  	|  GET   	|                none               |   Nombre de like pour le post {id}         	 						| 
|/vote/dislikes/{id} 	|  GET   	|                none               |    Nombre de dislike pour le post {id}      							|
|/vote/like/         	|  POST  	|      **user_id**, **post_id**     |    user_ id like la photo post_id           							|
|/vote/dislike/      	|  POST  	|      **user_id**, **post_id**     |    user_ id dislike la photo post_id        							|
|/vote/delete/       	| DELETE 	|      **user_id**, **post_id**     |    Supprime le vote                         							|
|/vote/voted/       	| GET 		|      **user_id**, **post_id**     |    Retourne ok si a deja voté not found sinon                        	|
|/vote/note/       		| GET 		|      **user_id**, **post_id**     |    Retourne  la note de l'utilisateur sur le post(1/-1)              	|
