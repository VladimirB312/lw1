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

function existsEmailFromDB(mysqli $conn, $email): bool
{
  $sql = "SELECT * FROM user WHERE email = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    return true;
  }

  return false;
}

function getUserFromDB(mysqli $conn, $email)
{
  $sql = "SELECT * FROM user WHERE email = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    return $result->fetch_assoc();
  }

  return null;
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

  return null;
}

function saveImage(string $imageBase64, string $postId): string
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  try {
    saveFile("images/{$postId}.{$imgExtention}", $imageDecoded);
  } catch (\Throwable $th) {
    echo $th;
    return '';
  }

  $imageUrl = "./static/images/{$postId}.{$imgExtention}";
  return $imageUrl;
}

function saveAuthorPhoto(string $imageBase64, string $authorName): string
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  try {
    saveFile("images/{$authorName}.{$imgExtention}", $imageDecoded);
  } catch (\Throwable $th) {
    echo $th;
    return '';
  }

  $imageUrl = "./static/images/{$authorName}.{$imgExtention}";
  return $imageUrl;
}

function saveFile(string $file, string $data): void
{
  $myFile = fopen($file, 'w');
  if (!$myFile) {
    throw new Error('Произошла ошибка при открытии файла');
  }

  $result = fwrite($myFile, $data);
  if ($result) {
    echo 'Данные успешно сохранены в файл <br/>';
  } else {
    throw new Error('Произошла ошибка при сохранении данных в файл');
  }

  fclose($myFile);
}

function getJsonData()
{
  $dataAsJson = file_get_contents("php://input");
  $data = json_decode($dataAsJson, true);

  return $data ?? null;
}

function generateUuid()
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
