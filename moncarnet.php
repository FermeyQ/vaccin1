<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo.php' ?>



<div class="wrap">
  <?php debug ($_SESSION);
  $title = 'Mon carnet';
  ?>
  <?php include ('inc/header.php'); ?>
  <?php if (isLogged()) {
    $nom_vaccin = :nom_vaccin;
    $vaccin_id = :vaccin_id;
    $numero_de_lot = :numero_de_lot;
    $sql = "UPDATE vaccin1_user_vaccin
            SET vaccin_id =' :vaccin-id',date =':date',numero_de_lot =' :numero_de_lot',now"
            $query = $pdo->prepare($sql);
              $query->bindValue(':nom_vaccin',$nom_vaccin,PDO::PARAM_STR);
              $query->bindValue(':vaccin_id',$vaccin_id,PDO::PARAM_STR);
              $query->bindValue(':numero_de_lot',$numero_de_lot,PDO::PARAM_STR);
              $query->bindValue(':date',PDO::PARAM_STR);
              $query->execute();
              $sql = $query -> fetchAll
  }?>
<form class="" action="" method="post">
  <label for="nom_vaccin">Nom du Vaccin</label>
  <input type="text" name="nom_vaccin" id ="nom_vaccin" value="<?php if(!empty($_POST['nom_vaccin'])) {echo $_POST['nom_vaccin']; }?>">

  <label for="vaccin_id"></label>
  <input type="text" name="vaccin_id" id ="vaccin_id" value="<?php if(!empty($_POST['vaccin_id'])) {echo $_POST['vaccin_id']; }?>">

  <label for="numero_de_lot">numero</label>
  <input type="text" name="numero_de_lot" id ="numero_de_lot" value="<?php if(!empty($_POST['numero_de_lot'])) {echo $_POST['numero_de_lot']; }?>">



</form>
<?php include ('inc/footer.php') ?>
</div>
