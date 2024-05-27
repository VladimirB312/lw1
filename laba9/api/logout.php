<?php
require_once 'authBySession.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    logout();
} else {
    header('Location: ../home.php');
}
