<?php
    session_start(); 


    // if the user is logged in, unset the session 
    if (isset($_SESSION['USER'])) { 
        unset($_SESSION['USER']); 
    } 
    session_destroy(); //destroy the session
    setcookie('USER', '', time()-3600, '/'); 
    setcookie('USER', '', time()-3600, '/');


    // go to login page 
    header('Location: index.php'); 
    exit; 
?> 