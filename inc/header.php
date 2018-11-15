<?php if (!isset($_SESSION)) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title><?php echo $title ?>
  </title>

  <link rel="icon" type="image/png" href="asset/image/logo.png" />

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <!-- <link rel="stylesheet" href="asset/bootstrap/bootstrap.min.css"> -->
  <link rel="stylesheet" href="asset/slider/sliderstyle.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css" />
  <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>

  <header>

    <div class="container">
      <div class="logo-container">
        <a href="index.php" class="logo">
          <img title="MaVaccination" alt="MaVaccination.net" src="asset/image/logo.png">
        </a>

        <div class="titre">
          <div class="line1">my Little CARNET</div>
        </div>
      </div>
    </div>

    <!--Le menu NAV-->
    <nav>
      <ul id="menu">
        <li><a href="index.php">Accueil</a></li>
        <?php if (isAdmin()) {
    ?>
        <li><a href="admin/listusers.php">Back-Office</a></li>
        <?php
} ?>
        <?php if (isLogged()) {
        ?>
        <li><a href="moncarnet.php">Mon carnet</a></li>
        <li><a href="deconnection.php">Déconnexion</a></li>
        <div class="bonjour">
          <li>Bonjour <?php echo $_SESSION['user']['name']; ?>
          </li>
          </di>
          <?php
    } else {
        ?>
          <li><a href="inscription.php">Inscription</a></li>
          <li><a href="connection.php">Connexion</a></li>
          <?php
    } ?>
      </ul>
    </nav>
  </header>
  <!-- <div class="content"> -->
