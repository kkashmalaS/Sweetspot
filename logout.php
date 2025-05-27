<?php 
    include 'header.php';
    if(!isset($_SESSION['id']))
    {
        header('Location: index.php');
    }
    else
    {
        session_destroy();
        session_abort();
        header('Location: index.php');
    }
?>