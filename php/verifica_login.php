<?php

session_start();

if(!$_SESSION['fname']){
    header('Location: login.php');
    exit();
}