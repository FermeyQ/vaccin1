<?php

function findBy($id,$table) {

}

function getAllVaccinsOfThisUser($user_id)
{
  global $pdo;
  $sql = "SELECT * FROM vaccin1_user_vaccin WHERE user_id = $user_id";
  $query = $pdo -> prepare($sql);
  $query -> execute ();
  $vaccins = $query -> fetchAll();
  return $vaccins;
}
