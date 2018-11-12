<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php

$title = 'Modifier password';

$errors = array();
// si user existe bien
if (!empty($_GET['email']) && !empty($_GET['token'])) {
  $email = urldecode($_GET['email']);
  $token = urldecode($_GET['token']);
  $sql = "SELECT id FROM vaccin1_user WHERE email = :email AND token = :token";
  $query = $pdo->prepare($sql);
  $query ->bindValue(':email',$email,PDO::PARAM_STR);
  $query ->bindValue(':token',$token,PDO::PARAM_STR);
  $query ->execute();
  $user = $query->fetch();

  if (!empty($user)) {
    // form soumis
    if (!empty($_POST['submitted'])) {

      // Protection XSS
      $password = trim(strip_tags($_POST['password']));
      $password2 = trim(strip_tags($_POST['password2']));
      //vérification password
      if (!empty($password) && !empty($password2)) {
        if ($password != $password2) {
          $errors['password'] = 'Vos mots de passe sont différents';
        }elseif (strlen($password) < 5 ) {
          $errors['password'] = 'Votre mot de passe est trop court';
        }
      }else {
        $errors['password'] = 'Veuillez renseigner un mot de passe';
      }
      if (count($errors) == 0) {
        // UPDATE
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $token = generateRandomString();
        $sql = "UPDATE m1_users SET password = :password,token = :token WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query ->bindValue(':password',$hash);
        $query ->bindValue(':token',$token);
        $query ->bindValue(':id',$user['id']);
        $query ->execute();
        //redirection
        header('Location:connection.php');
      }
    }
  } else {
    header('Location:404.php');
  }
} else {
  header('Location:404.php');
}
?>

<?php include('inc/header.php') ?>

<form class="" action="" method="post">
  <label for="password">Mot de passe</label>
  <span><?php if(!empty($errors['password'])){echo $errors['password'];} ?></span>
  <input type="password" name="password" value="">

  <label for="password2">Confirmer mot de passe</label>
  <span><?php if(!empty($errors['password'])){echo $errors['password'];} ?></span>
  <input type="password" name="password2" value="">

  <input type="submit" name="submitted" value="Modifier">
</form>

<?php include('inc/footer.php') ?>
