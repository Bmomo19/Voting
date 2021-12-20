<?php
session_start();
$cookie_name = "email";
if( basename($_SERVER['PHP_SELF'])=='evenement.php' && !isset($_COOKIE[$cookie_name])){
  setcookie($cookie_name, $_POST["email"], time() + (86400 * 30), "/");
}
if( basename($_SERVER['PHP_SELF'])!='index.php' && !isset($_COOKIE[$cookie_name])){
  header('Location: index.php'); 
  return ;
}
if(basename($_SERVER['PHP_SELF'])=='index.php' && isset($_COOKIE[$cookie_name])){
  header('Location: evenement.php'); 
  return ;
}


$host = "http://172.31.247.7:8888/app-voting/api/app_voting_api"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>APP VOTING CLIENT</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="css/style.css">
  <!-- Copyright © 2014 Monotype Imaging Inc. All rights reserved -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.5.0/dist/css/orangeHelvetica.min.css" integrity="sha384-e8MwV9etVvzgFAywWdlyEtXAdRYElY+BlimyrAcXkDiyJXy4oIZZqrV/ST605uwF" crossorigin="anonymous">
  <!-- Copyright © 2016 Orange SA. All rights reserved -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.5.0/dist/css/orangeIcons.min.css" integrity="sha384-Zd5WIT6PZ7YtONlsULMAoLWo0iJi5GPix2LFrMhPQjMYjBA0FhvsKInWdLKM+9nW" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boosted@4.5.0/dist/css/boosted.min.css" integrity="sha384-QYLV+ojryK3B49TCQMGtvBTwDYQmQzzuiw3Ajw+9I4GkTu6bV3bl/YNUv/0IY5hg" crossorigin="anonymous">
  
</head>