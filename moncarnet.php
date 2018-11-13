<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo.php' ?>

<?php $title = 'Mon carnet';?>

<?php $error = array();
// requete affiche tableau vaccins
$sql = "SELECT * FROM vaccin1_vaccin";
$query = $pdo -> prepare($sql);
$query -> execute();
$users = $query ->fetchAll();
?>

<?php include('inc/header.php'); ?>

  <h1>Programmer une vaccination</h1>

  <!-- tableau des vaccins a programmer -->
  <table>
    <tr>
      <th>Nom du vaccin</th>
      <th>Nom de la maladie traitée</th>
    </tr>
    <?php foreach ($users as $user) {
    ?>
    <tr>
      <td><?php echo $user['nom_vaccin']?></td>
      <td><?php echo $user['nom_maladie']?></td>
      <td><?php echo '<a href="programmervaccins.php?id='. $user['id'].'">Programmer ce vaccin</a>'?></td>
    </tr>
    <?php
} ?>
  </table>
  <br>

<?php include('inc/footer.php') ?>