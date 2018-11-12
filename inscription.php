<?php include ('inc/fonction.php') ?>
<?php include ('inc/pdo.php') ?>
<?php
$title = 'S\'inscrire';
// FORMULAIRE SOUMIS
$error = array();
if (!empty($_POST['submitted'])) {
    // FAILLE XSS
    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $password2 = trim(strip_tags($_POST['password2']));

    // VALIDATION
    // validation name
    if (!empty($name)) {
        if (strlen($name) < 5) {
            $error['name'] = 'min 5 caracteres';
        } elseif (strlen($name) > 50) {
            $error['name'] = 'max 50 caracteres';
        } else {
            //    requete
            $sql = "SELECT name FROM vaccin1_user WHERE name = :name";
            $query = $pdo->prepare($sql);
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->execute();
            $username = $query->fetch();
            if (!empty($username)) {
                $error['name'] = 'name deja utilisé';
            }
        }
    } else {
        $error['name'] = 'renseigner un name';
    }

    // validation email
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'renseigner un email';
        } else {
            //    requete
            $sql = "SELECT email FROM vaccin1_user WHERE email = :email";
            $query = $pdo->prepare($sql);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $useremail = $query->fetch();
            if (!empty($useremail)) {
                $error['email'] = 'email deja utilisé';
            }
        }
    } else {
        $error['email'] = 'renseigner un email';
    }

    // validation password
    if (!empty($password) && !empty($password2)) {
        if ($password != $password2) {
            $error['password'] = 'Vos mots de passe ne correspondent pas';
        }
        if (strlen($password) < 6) {
            $error['password'] = 'Votre mot de passe est trop court. (minimum 6 caractères)';
        }
    } else {
        $error['password'] = 'Veuillez entrer un mot de passe';
    }

    // SI AUCUNE ERROR
    if (count($error) == 0) {
        $success = true;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = generateRandomString(120);
        $sql = "INSERT INTO vaccin1_user (name,email,token,password,role,created_at) VALUES (:name,:email,'$token',:password,'user',NOW())";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $hash, PDO::PARAM_STR);
        $query->execute();
        header ('location: moncarnet.php');
    }
}
?>
<?php include 'inc/header.php' ?>
<div class="wrap">
  <h2>S'inscrire</h2>
  <!-- formulaire d'inscriptions -->
  <form action="" method="post">

      <!-- form name -->
      <label for="name">name *</label>
      <span class="error"><?php if (!empty($error['name'])) {echo $error['name'];}?></span>
      <input type="text" name="name" value="<?php if (!empty($_POST['name'])) {echo $_POST['name'];}?>"
          placeholder="jeanjean">

      <!-- form email -->
      <label for="email">Email *</label>
      <span class="error"><?php if (!empty($error['email'])) {echo $error['email'];}?></span>
      <input type="email" name="email" value="<?php if (!empty($_POST['email'])) {echo $_POST['email'];}?>"
          placeholder="jeanjean@gmail.com">

      <!-- form password -->
      <label for="password">Password *</label>
      <span class="error"><?php if (!empty($error['password'])) {echo $error['password'];}?></span>
      <input type="password" name="password" value="">

      <!-- form password2 -->
      <label for="password2">Confirm Password *</label>
      <input type="password" name="password2" value="">

      <!-- form submit -->
      <input type="submit" name="submitted" value="Envoyer">
  </form>
</div>
<?php include 'inc/footer.php';
