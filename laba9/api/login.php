<?php
require_once '../bdtools.php';
require_once 'authBySession.php';

$conn = createDBConnection();
$method = $_SERVER['REQUEST_METHOD'];
$data = getJsonData();
$salt = 'Pass';

try {
    if ($method === 'POST' && $data) {
        $email = trim($conn->real_escape_string($data['email'])) ?? null;
        $password = trim($conn->real_escape_string($data['password'])) ?? null;

        if (strlen($password) < 5) {            
            throw new Error('Короткий пароль');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {           
            throw new Error('Неверный формат email');   
        }

        $userData = getUserFromDB($conn, $email);
        
        if (!$userData) {            
            throw new Error('Нет пользователя с таким email'); 
        }

        $password = md5(md5($password) . $salt);
                        
        if ($password != $userData['password']) {
            throw new Error('Неверный пароль!');     
        }
    }
   
} catch (\Throwable $th) {    
    header('HTTP/1.1 401 Unauthorized');        
    die($th->getMessage());
}

$userId = $userData['user_id'];

$_SESSION['user_id'] = $userId;
$_SESSION['avatarLetter'] = strtoupper(substr($email, 0, 1));

header('Location: ../admin.php');
