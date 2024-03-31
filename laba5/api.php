<?php
function createDBConnection(): mysqli
{
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully<br>";
  return $conn;
}

function closeDBConnection(mysqli $conn): void
{
  $conn->close();
}

const HOST = 'localhost';
const USERNAME = 'blog_user';
const PASSWORD = 'password';
const DATABASE = 'blog';
$conn = createDBConnection();


$method = $_SERVER['REQUEST_METHOD'];
echo $method;


if ($method === 'POST') {
  $dataAsJson = file_get_contents("php://input");
  $dataAsArray = json_decode($dataAsJson, true);
  saveImage($dataAsArray['image']);
  $sql = "INSERT INTO post (title, subtitle, content, author, author_url, author_alt, publish_date, image_url, image_alt, sticker, featured) VALUES ('{$dataAsArray['title']}', '{$dataAsArray['subtitle']}', '{$dataAsArray['content']}', '{$dataAsArray['author']}', '{$dataAsArray['author_url']}', '{$dataAsArray['author_alt']}', '{$dataAsArray['publish_date']}', '{$dataAsArray['image_url']}', '{$dataAsArray['image_alt']}', '{$dataAsArray['sticker']}', {$dataAsArray['featured']});";
  if ($conn->query($sql)) {
    echo "Данные успешно добавлены";
  } else {
    echo "Ошибка: " . $conn->error;
  };
}

function saveImage(string $imageBase64)
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  global $dataAsArray;
  saveFile("images/{$dataAsArray['image_name']}.{$imgExtention}", $imageDecoded);
}

function saveFile(string $file, string $data): void
{
  $myFile = fopen($file, 'w');
  if (!$myFile) {
    echo 'Произошла ошибка при открытии файла';
    return;
  }

  $result = fwrite($myFile, $data);
  if ($result) {
    echo 'Данные успешно сохранены в файл';
  } else {
    echo 'Произошла ошибка при сохранении данных в файл';
  }

  fclose($myFile);
}
