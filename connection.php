<?php include('inc/pdo.php'); ?>
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
            $errors['password'] = 'mauvais mot de passe';
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

<form class="" action="" method="post">
  <label for="login">Pseudo ou Email</label>
  <span><?php if (!empty($errors['login'])) {
    echo $errors['login'];
} ?></span>
  <input type="text" name="login" value="<?php if (!empty($_POST['login'])) {
    echo $_POST['login'];
} ?>">
  <label for="password">Mot de passe</label>
  <input type="password" name="password" value="">
  <span><?php if (!empty($errors['password'])) {
    echo $errors['password'];
} ?></span>
  <input type="submit" name="submitted" value="Se connecter">
</form>
<a href="passwordforget.php">Mot de passe oublié</a>

<?php include('inc/footer.php');
