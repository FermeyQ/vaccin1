<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
  <div class="wrap">
    <header id ="header">
      <!--La petite bare au dessus-->
      <div>
        <h1>VACCINATION</h1>
      </div>
      <!--Le menu NAV-->
      <nav>
        <ul>
          <li><a href="index.php">Accueil</li></a>
          <?php if (isLogged()){ ?>
          <!-- <li id="header"><a href="faq.php">(Des questions ?)</li></a> -->
          <?php }else{ ?>
          <li><a href="lesvaccins.php">Les Vaccins</li></a>
          <li><a href="moncarnet.php">Mon carnet de vaccination</a></li>
          <li><a href="connection.php">Connexion</a></li>
          <li><a href="inscription.php">Inscription</a></li>
          <?php } ?>
        </ul>
      </nav>
    </header>
  </div>
