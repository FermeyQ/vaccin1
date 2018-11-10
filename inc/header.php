<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
    <nav>
      <ul>
        <li id="header"><a href="admin/index.php">Back-Office</a></li>
        <li id="header"><a href="index.php">Accueil</li></a>
        <?php if (isLogged()){ ?>
        <li id="header"><a href="deconnection.php">Déconnexion</a></li>
        <!-- <li id="header"><a href="faq.php">(Des questions ?)</li></a> -->
        <?php }else{ ?>
        <li id="header"><a href="lesvaccins.php">Les Vaccins</li></a>
        <li id="header"><a href="inscription.php">Inscription</a></li>
        <li id="header"><a href="connection.php">Connexion</a></li>     
        <?php } ?>
 </ul>
    </nav>
