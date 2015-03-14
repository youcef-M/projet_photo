
function hideDiv() {
    if (document.getElementById) { // DOM3 = IE5, NS6
        document.getElementById('hideshow').style.visibility = 'hidden';
    } else {
        if (document.layers) { // Netscape 4
            document.hideshow.visibility = 'hidden';
        } else { // IE 4
            document.all.hideshow.style.visibility = 'hidden';
        }
    }
}
 
function showDiv() {
	
    if (document.getElementById) 
	{ // DOM3 = IE5, NS6
        document.getElementById('hideshow').style.visibility = 'visible';
		document.getElementById(champs).style.visibility = 'visible';
    }
	else 
	{
        if (document.layers) { // Netscape 4
            document.hideshow.visibility = 'visible';
        } else { // IE 4
            document.all.hideshow.style.visibility = 'visible';
        }
    }

	
}

function displayPics()
{
 
 // var chiffre=1;
 var photos = document.getElementById('inedit') ;
 var photos2 = document.getElementById('galerie_mini') ;
  // On récupère l'élément ayant pour id galerie_mini
  var liens = photos.getElementsByTagName('a') ;
  var liens2 = photos2.getElementsByTagName('a') ;
  // On récupère dans une variable tous les liens contenu dans galerie_mini
  var big_photo = document.getElementById('big_pict') ;
  // Ici c'est l'élément ayant pour id big_pict qui est récupéré, c'est notre photo en taille normale
  var titre_photo = document.getElementById('galerie').getElementsByTagName('p')[0] ;
  // Et enfin le titre de la photo de taille normale
  // Une boucle parcourant l'ensemble des liens contenu dans galerie_mini

  
  
  
  for (var i = 0 ; i < liens.length ; ++i) {
    // Au clique sur ces liens 
	
    liens[i].onclick = function() {
	 
	  
      big_photo.src = this.href; // On change l'attribut src de l'image en le remplaçant par la valeur du lien
      big_photo.alt = this.title; // On change son titre
      titre_photo.firstChild.nodeValue = this.title; // On change le texte de titre de la photo
	  showDiv();
      return false; // Et pour finir on inhibe l'action réelle du lien
	  
    };
	
  }
  
    for (var i = 0 ; i < liens2.length ; ++i) {
    // Au clique sur ces liens 
    liens2[i].onclick = function() {
      big_photo.src = this.href; // On change l'attribut src de l'image en le remplaçant par la valeur du lien
      big_photo.alt = this.title; // On change son titre
      titre_photo.firstChild.nodeValue = this.title; // On change le texte de titre de la photo
	  showDiv();
      return false; // Et pour finir on inhibe l'action réelle du lien
	  
    };
	
  }

  
  
}

// Il ne reste plus qu'à appeler notre fonction au chargement de la page
window.onload = displayPics();

