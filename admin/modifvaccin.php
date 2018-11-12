<?php include '../inc/fonction.php' ?>
<?php include '../inc/pdo.php' ?>
<?php

$title = 'Modifier vaccin';

$error = array();
// si user existe bien
if (!empty($_GET['nom_vaccin'])) {
  $nom_vaccin = urldecode($_GET['nom_vaccin']);
  $sql = "SELECT * FROM vaccin1_vaccin WHERE nom_vaccin = :nom_vaccin";
  $query = $pdo->prepare($sql);
  $query ->bindValue(':nom_vaccin',$nom_vaccin,PDO::PARAM_STR);
  $query ->execute();
  $vaccin = $query->fetch();
  if (!empty($vaccin)) {
    if (!empty($_POST['submitted'])) {
      if (!empty($nom_vaccin_modifié)) {
      }
      else {
        $error['$nom_vaccin_modifié'] = 'Veuiller renseigner un vaccin';
      }
      if (!empty($nom_maladie_modifié)) {
      }else {
        $error['$nom_maladie_modifié'] = 'Veuiller renseigner une maladie';
      }
        // UPDATE
        if (count($error) == 0) {
          $nom_vaccin_modifié = trim(strip_tags($_POST['nom_vaccin_modifié'])) ;
          $nom_maladie_modifié = trim(strip_tags($_POST['nom_maladie_modifié'])) ;
          $sql = "UPDATE vaccin1_vaccin SET nom_vaccin = ':nom_vaccin_modifié' ,nom_maladie = ':nom_maladie_modifié'  WHERE id = :id";
          $query = $pdo->prepare($sql);
          $query ->bindValue(':nom_vaccin_modifié',$nom_vaccin_modifié,PDO::PARAM_STR);
          $query ->bindValue(':nom_maladie_modifié',$nom_maladie_modifié,PDO::PARAM_STR);
          $query ->bindValue(':id',$vaccin['id'],PDO::PARAM_INT);
          $query ->execute();
        }
    }
  }
}
print_r ($vaccin);
?>
<?php include 'inc/headerback.php' ?>
<form action="" method="post">
  <label for="nom_vaccin_modifié">Nom du vaccin</label>
  <span><?php if (!empty($error['nom_vaccin_modifié'])) {echo $error['nom_vaccin_modifié'];} ?></span>
  <input type="text" name="nom_vaccin_modifié" value="<?php if(!empty($_POST['nom_vaccin_modifié'])){echo $_POST['nom_vaccin_modifié'];} ?>">
  <label for="nom_maladie_modifié">Nom de la maladie traitée</label>
  <span><?php if (!empty($error['nom_maladie_modifié'])) {echo $error['nom_maladie_modifié'];} ?></span>
  <input type="text" name="nom_maladie_modifié" value="<?php if(!empty($_POST['nom_maladie_modifié'])){echo $_POST['nom_maladie_modifié'];} ?>">
  <input type="submit" name="submitted" value="envoyer">
</form>






<?php include 'inc/footerback.php' ?>
