<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bienvenue sur Pascagram</title>
		<link rel="stylesheet" type="text/css" href="css/reset-design.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" media="all"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />



		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/ddsmoothmenu.js" type="text/javascript"></script>
		<script src="js/menu.js" type="text/javascript"></script>

		
		<script type="text/javascript">
		$(function() {
		var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
		     $("#smoothmenu1 li a").each(function(){
		          if($(this).attr("href") == pgurl)
		          $(this).addClass("selected");
		     })
		});
		alert(pgurl);
		</script>
		<link rel="shortcut icon" href="favicon.ico">
    </head>

    <body>