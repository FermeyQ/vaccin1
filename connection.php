<?php include('inc/pdo/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php
$title = 'Se connecter';
$errors = array();
//form soumis
if (!empty($_POST['submitted'])) {
    //Protection XSS
    $login = trim(strip_tags($_POST['login']));
    $password = trim(strip_tags($_POST['password']));
    //vérification dans la base de données
    $sql ="SELECT * FROM vaccin1_user WHERE name = :login OR email=:login";
    $query = $pdo->prepare($sql);
    $query -> bindValue(':login', $login, PDO::PARAM_STR);
    $query -> execute();
    $user = $query ->fetch();
    if (!empty($user)) {
        if (!password_verify($password, $user['password'])) {
            $errors['password'] = 'Mauvais mot de passe';
        }
    } else {
        $errors['login'] = 'Veuillez vous inscrire';
    }
    if (count($errors) == 0) {
        $_SESSION['user'] = array(
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'ip' => $_SERVER['REMOTE_ADDR'],
          );
        header('Location: index.php');
    }
}
  ?>
<?php include('inc/header.php'); ?>
<h1>Se connecter</h1>
<form class="form-inscription" action="" method="post">
    <div class="form-group">
        <label for="idEmail1">Nom ou Email</label>
        <input type="text" name="login" class="form-control" id="idEmail1" aria-describedby="emailHelp"
            placeholder="Entrer un email ou un nom" value="<?php if (!empty($_POST['login'])) {
      echo $_POST['login'];
  } ?>">
        <span><?php if (!empty($errors['login'])) {
      echo $errors['login'];
  } ?></span>
    </div>
    <div class="form-group">
        <label for="idPassword1">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="idPassword1" placeholder="Entrer un mot de passe"
            value="">
        <span><?php if (!empty($errors['password'])) {
      echo $errors['password'];
  } ?></span>
    </div>
    <div class="form-group">
        <a href="passwordforget.php">Mot de passe oublié</a>
    </div>
    <input type="submit" name="submitted" class="btn btn-primary" value="Se connecter">
</form>

<?php include('inc/footer.php');
