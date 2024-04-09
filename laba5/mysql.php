<?php
const HOST = 'localhost';
const USERNAME = 'blog_user';
const PASSWORD = 'password';
const DATABASE = 'blog';

function createDBConnection(): mysqli
{
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error) . '<br/>';
  }
  return $conn;
}

function closeDBConnection(mysqli $conn): void
{
  $conn->close();
}

function getPostsFromDB(mysqli $conn): array
{
  $sql = "SELECT * FROM post ORDER BY publish_date DESC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $posts[] = $row;
    }
  } else {
    echo "0 results <br/>";
  }
  return $posts;
}

function getPostFromDB(mysqli $conn, $post_id)
{
  $sql = "SELECT * FROM post WHERE post_id = '$post_id'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    return $result->fetch_assoc();
  }
}

function saveImage(string $imageBase64, string $post_id, string &$image_url)
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  saveFile("images/{$post_id}.{$imgExtention}", $imageDecoded);
  $image_url = "./static/images/{$post_id}.{$imgExtention}";
}

function saveFile(string $file, string $data): void
{
  $myFile = fopen($file, 'w');
  if (!$myFile) {
    echo 'Произошла ошибка при открытии файла <br/>';
    return;
  }

  $result = fwrite($myFile, $data);
  if ($result) {
    echo 'Данные успешно сохранены в файл <br/>';
  } else {
    echo 'Произошла ошибка при сохранении данных в файл <br/>';
  }

  fclose($myFile);
}

function getJsonData()
{
  $dataAsJson = file_get_contents("php://input");
  if ($dataAsArray = json_decode($dataAsJson, true)) {    
    return $dataAsArray;
  }
}

function generate_uuid()
{
  return sprintf(
    '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0x0fff) | 0x4000,
    mt_rand(0, 0x3fff) | 0x8000,
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff)
  );
}
