<?php include('inc/pdo/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php
$title = 'Mot de passe oublié';
$errors = array();
//form soumis
if (!empty($_POST['submitted'])){
  //protection XSS
  $email = trim(strip_tags($_POST['email']));
  //vérification email
  if (!empty($email)) {
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Veuillez renseigner un email valide';
    }else {
      $sql ="SELECT email,token FROM vaccin1_user WHERE email = :email";
      $query = $pdo->prepare($sql);
      $query -> bindValue(':email',$email,PDO::PARAM_STR);
      $query -> execute();
      $user = $query ->fetch();
      if (!empty($user)) {
        $body = '<p>Veuillez cliquez sur le lien ci-dessous</p>';
        $body .= '<a href="passwordmodif.php?email='.urlencode($user['email']).'&token='.urlencode($user['token']).'">ici</a>';
        echo $body;
      } else {
        $errors['email'] = 'Vous n\'existez pas';
      }
    }
  }else {
    $errors['email'] = 'Veuillez renseigner un email valide';
  }
}

?>
<?php include('inc/header.php') ?>
<form class="form-inscription" action="" method="post">
<div class="form-group">
  <label for="email">Email *</label>
  <input type="text" name="email" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];} ?>">
  <input type="submit" name="submitted" class="btn btn-primary" value="Valider email">
  </div>
</form>
<?php include('inc/footer.php');
