# Projet-photo

## Git

Quelques Commandes de base pour l'utilisation de Git.

* Cloner un depot sur la forge

  ```sh
  $ git clone https://login@forge.clermont-universite.fr/git/nom-projet
  ```
  
* Ajouter un depot distant

  ```sh 
  $ git remote add origin lien_du_depot 
  ```

* Actualiser le contenu

  ```sh
  $ git fetch origin
  $ git reset --hard origin/master
  ```
* Creer une branche

  ```sh
  $ git branch nom_de_la_branche
  ```
* Se rendre sur la branche

  ```sh
  $ git checkout nom_de_la_branche
  ```
  
* Le commit:
  1. ajouter un fichier ou tous les fichiers
  
  ```sh
  $ git add nom_du_fichier
  # ou 
  $ git add .
  ```
  
  2. on commit
  
  ```sh
  $ git commit -m "message" 
  ```
  
* Fusion de branche

  ```sh
  $ git merge nom_de_la_branche
  ```
* Ajouter un tag sur la branche actuelle

  ```sh
  $ git tag nom_du_tag 
  ```
* Envoyer vos donees sur le depot distant

  ```sh
  $ git push origin nom_de_la_branche 
  ```


Installer Ungit (pour avoir un visuel sur les branches)

* Installer [Node.js](http://nodejs.org/) 

* Ouvrir un invité de commande

* Taper la commande suivante

```sh
$ npm install -g ungit
```

* Aller dans le dossier contenant le projet et taper 
```sh
$ ungit
```