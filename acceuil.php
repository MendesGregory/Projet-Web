<?php 
session_start();
  $database= new PDO('mysql:host=localhost;dbname=heddi','root','');

if(isset($_SESSION['IDmembre']) AND $_SESSION['IDmembre'] > 0)
    {
      $getid=intval($_SESSION['IDmembre']);
      $reqmembre = $database->prepare('SELECT * FROM membre WHERE IDmembre=?');
      $reqmembre->execute(array($getid));
      $userinfo = $reqmembre->fetch();

}

?>





<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      
      
       /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 100px;
      border-radius: 0;
        
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
         background-image: url("dune.jpg");
          color:whitesmoke;
         background-size: cover;
    background-position: center;
    position: relative;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: dimgrey;
        color:whitesmoke;
      padding: 25px;
    }
    
    form {
  /* Uniquement centrer le formulaire sur la page */
  margin: 0 auto;
  width: 400px;
  /* Encadré pour voir les limites du formulaire */
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

form div + div {
  margin-top: 1em;
}

label {
  /* Pour être sûrs que toutes les étiquettes ont même taille et sont correctement alignées */
  display: inline-block;
  width: 90px;
  text-align: right;
}

input, textarea {
  /* Pour s'assurer que tous les champs texte ont la même police.
     Par défaut, les textarea ont une police monospace */
  font: 1em sans-serif;

  /* Pour que tous les champs texte aient la même dimension */
  width: 300px;
  box-sizing: border-box;

  /* Pour harmoniser le look & feel des bordures des champs texte */
  border: 1px solid #999;
}

input:focus, textarea:focus {
  /* Pour souligner légèrement les éléments actifs */
  border-color: #000;
}

textarea {
  /* Pour aligner les champs texte multi‑ligne avec leur étiquette */
  vertical-align: top;

  /* Pour donner assez de place pour écrire du texte */
  height: 5em;
}

.button {
  /* Pour placer le bouton à la même position que les champs texte */
  padding-left: 90px; /* même taille que les étiquettes */
}

button {
  /* Cette marge supplémentaire représente grosso modo le même espace que celui
     entre les étiquettes et les champs texte */
  margin-left: .5em;
}
    
    
    </style>
    
    
    
</head>
<body>
  
    <div id="header"></div>
       
<div class="jumbotron">
  <div class="container text-center">
    <h1 style="color:black;">Ebay ECE</h1>   
    <p style="color:black;">La vente aux enchères en ligne pour la communauté ECE Paris</p>
  </div>
</div>
    

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">ECE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="accueil.html">Accueil</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="achat.html">Achats</a></li>
        <li><a href="formvente.html">Vendre</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Votre Compte </a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Panier </a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
          $liste = $database->query("SELECT * FROM produit ");
          $tab= NULL;

          while($produits = $liste->fetch())
          {
            $tab .= '<div class="col-sm-4">
                        <div class="panel panel-primary">
                        <div class="panel-heading">'.$produits['Item'].'</div>
                        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">'.$produits['Descriptiondelobjet'].'

                        <a href="Ajoutpanier.php?id='.$produits['IDproduit'].'" style="float:right;position:relative;top:-5px;left:5px;" type="button" class="btn btn-primary" >J\'ajoute au panier</a></div>

                        </div>
                    </div>';
          }
        
          ?>

<div class="container">    

  <div class="row">
    <?php
          echo $tab;
          ?>
    
</div><br>




<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>
