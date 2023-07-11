<?php
session_start();
$_SESSION['logged'] = false;
if(session_destroy()){
    header('location:index.php');
}
