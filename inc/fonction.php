<?php
function br(){
  echo '<br>';
}
function debug($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function isLogged()
{
    if (!empty($_SESSION['user']) AND
        !empty($_SESSION['user']['id']) AND
        !empty($_SESSION['user']['name']) AND
        !empty($_SESSION['user']['email']) AND
        !empty($_SESSION['user']['role']) AND
        !empty($_SESSION['user']['ip'])) {
        if ($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
            return true;
        }
    }
    return false;
}

function isAdmin() {
 if(islogged()) {
   if($_SESSION['user']['role'] == 'admin') {
     return true;
   }
 }
 return false;
}
