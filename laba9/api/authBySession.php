<?php
session_name('auth');

session_start();

function checkAuth()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../home.php');
    }
}

function checkGuest()
{
    if (isset($_SESSION['user_id'])) {
        header('Location: ../admin.php');
    }
}

function logout()
{    
    $_SESSION = [];
    session_destroy();
    setcookie(session_name(), '', time()-3600);
    header('Location: ../login.php');
}

function avatarLetter() 
{    
    return $_SESSION['avatarLetter'] ?? 'N';    
}