<?php
require_once '../bdtools.php';
require_once 'functions.php';

$conn = createDBConnection();

$method = $_SERVER['REQUEST_METHOD'];

$data = getJsonData();

$salt = 'Pass';

$_SESSION['validation'] = [];

try {
    if ($method === 'POST' && $data) {
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (strlen($password) < 5) {
            $_SESSION['validation']['name'] = 'Короткое имя';
            throw new Error('Короткий пароль');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['validation']['email'] = 'Неверный формат email'; 
            throw new Error('Неверный формат email');   
        }

        if (existsEmailFromDB($conn, $email)) {
            $_SESSION['validation']['email'] = 'Такой email уже существует';
            throw new Error('Такой email уже существует'); 
        }

         $password = md5(md5($password) . $salt);

        $query = "INSERT INTO user
        SET 
            email = '{$email}', 
            password = '{$password}'";

        if (!$conn->query($query)) {
            throw new Error($conn->error); 
        }
        
    }
   
} catch (\Throwable $th) {    
    header('HTTP/1.1 401 Unauthorized');        
    die($th->getMessage());
}



header('Location: ../login.php');
