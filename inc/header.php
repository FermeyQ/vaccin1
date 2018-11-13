<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="asset/css/style.css">
  </head>
  <body>

 <header>

  <div class="container">
    <div class="logo-container">
      <a href="http://localhost/vaccin/vaccin1/index.php" class="logo">
        <img title="MaVaccination" alt="MaVaccination.net" src="asset/image/logo.png">
      </a>

      <div class="titre">
        <div class="line1">Mtitre</div>
        <div class="line2">titre1 excès</div>
      </div>
    </div>
  </div>

      <!--Le menu NAV-->
      <nav>
        <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php if (isAdmin()) { ?>
          <li><a href="admin/index.php">Back-Office</a></li>
        <?php } ?>
        <?php if (isLogged()){ ?>
          <li><a href="moncarnet.php">Mon carnet</a></li>
          <li><a href="deconnection.php">Déconnexion</a></li>
          <li>Bonjour <?php echo $_SESSION['user']['name']; ?></li>
        <?php }else{ ?>
          <li><a href="inscription.php">Inscription</a></li>
          <li><a href="connection.php">Connexion</a></li>
        <?php } ?>
        </ul>
      </nav>
     </div>

 </header>
