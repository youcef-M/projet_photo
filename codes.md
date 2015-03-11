# Projet-photo

## API

### Les codes HTTP retour à attendre


* Code 200

	La requete s'est executé sans soucis, les opérations attendues ont été effectuées.



* Code 400

	Erreur, les contraintes sur les paramètres ne sont pas respectées



* Code 404

	La ressource est manquante.



* Code 409

	Lors d'une sauvegarde (/new), la ressource existe déja.



### Le Body des réponses


* Code 200
	*Ressources simples (/show)

```json
{
	"champ 1": "valeur 1",
	"champ 2": "valeur 2",
	"champ 3": "valeur 3"
}
```

	*Liste de ressources
```json
{
	"type de ressources": [
	{
		"champ 1": "valeur 1",
		"champ 2": "valeur 2",
		"champ 3": "valeur 3"
	},
	{
		"champ 1": "valeur 1",
		"champ 2": "valeur 2",
		"champ 3": "valeur 3"
	},
	{
		"champ 1": "valeur 1",
		"champ 2": "valeur 2",
		"champ 3": "valeur 3"
	}
	]
}
```

* Code 400:

```json
{
	"param 1": [
		"Le param 1 a fail car ...."
	],
	"param 2": [
		"Le param 2 a fail car ...."
	],
	"param 3": [
		"Le param 3 a fail car ...."
	]
}
```

> Les erreurs renvoyées sont en anglais.


* Code 404

```json
	"Not Found"
```

* Code 409
```json
	"Already Exist"
```
