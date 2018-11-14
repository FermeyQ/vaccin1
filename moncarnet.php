<?php include 'inc/fonction.php' ?>
<?php include 'inc/pdo/pdo.php' ?>

<?php
$title = 'Mon carnet';
$error = array();
// requete affiche tableau vaccins
$sql = "SELECT * FROM vaccin1_vaccin";
$query = $pdo -> prepare($sql);
$query -> execute();
$users = $query ->fetchAll();
?>
<?php include('inc/header.php'); ?>
<h1>Programmer une vaccination</h1>

<!-- tableau des vaccins a programmer -->
<table id="tableCarnet" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Nom du vaccin</th>
      <th>Nom de la maladie traitée</th>
      <th></th>
    </tr>
  </thead>
  <?php foreach ($users as $user) {
    ?>
  <tbody>
    <tr>
      <td><?php echo $user['nom_vaccin']?></td>
      <td><?php echo $user['nom_maladie']?></td>
      <td><?php echo '<a href="programmervaccins.php?id='. $user['id'].'">Programmer ce vaccin</a>'?></td>
    </tr>
  </tbody>
  <?php
} ?>
</table>
<br>
<?php include('inc/footer.php');?>
<script>
  $(document).ready(function() {
    $('#tableCarnet').DataTable();
  });
</script>