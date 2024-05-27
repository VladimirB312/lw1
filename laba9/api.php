<?php
include 'bdtools.php';
require_once 'api/authBySession.php';

checkAuth();

$conn = createDBConnection();

$method = $_SERVER['REQUEST_METHOD'];
echo $method, '<br/>';

$errors = [];

$data = getJsonData();

if ($method === 'POST' && $data) {
  if (!isset($data['title']) || strlen($data['title']) < 3)
    $errors[] = 'Invalid or missing title.';
  if (!isset($data['description']) || strlen($data['description']) < 3)
    $errors[] = 'Invalid or missing description.';
  if (!isset($data['postTextContent']) || strlen($data['postTextContent']) < 5)
    $errors[] = 'Invalid or missing postTextContent.';
  if (!isset($data['authorName']) || strlen($data['authorName']) < 5)
    $errors[] = 'Invalid or missing author_name.';
  if (!isset($data['publishDate']))
    $errors[] = 'Invalid or missing publish date.';
  if (!isset($data['heroImage']) || strlen($data['heroImage']) < 2)
    $errors[] = 'Invalid or missing image.';
  if (!isset($data['sticker']))
    $errors[] = 'Invalid or missing sticker.';
  if (!isset($data['featured']) || !($data['featured'] == 0 || $data['featured'] == 1))
    $errors[] = 'Invalid or missing featured.';
  if (!isset($data['recent']) || !($data['recent'] == 0 || $data['recent'] == 1))
    $errors[] = 'Invalid or missing recent.';

  if (empty($errors)) {
    $postId = generateUuid();
    $publishDate = date("Y-m-d H:i:s", strtotime($data['publishDate']));
    $imageUrl = saveImage($data['heroImage'], $postId);

    if(!$imageUrl) {
      $errors[] = 'error parse image'; 
    } 

    $authorPhotoUrl = saveImage($data['authorPhoto'], $data['authorName']);

    if(!$authorPhotoUrl) {
      $errors[] = 'error parse author photo'; 
    } 

    foreach ($data as $key => $value) {
      $value = $conn->real_escape_string($value);
    }
    
    $query = "INSERT INTO post
    SET 
      post_id = '$postId',
      title = '{$data['title']}',
      subtitle = '{$data['description']}',
      content = '{$data['postTextContent']}',
      author_name = '{$data['authorName']}',
      author_photo_url = '{$authorPhotoUrl}',
      author_photo_alt = '{$data['authorName']}',
      publish_date = '{$publishDate}',    
      image_alt = '{$data['heroImageAlt']}',
      image_url = '{$imageUrl}',
      sticker = '{$data['sticker']}',
      featured = {$data['featured']}, 
      recent = {$data['recent']}";

    
    if ($imageUrl && $conn->query($query)) {
      echo "Данные успешно добавлены <br/>";
    } else {
      echo "Ошибка: " . $conn->error;
    }
  } else {
    echo 'Ошибки: </br>';
    foreach ($errors as $error) {
      echo $error, '</br>';
    }
  }
} else {
  echo "Ошибка в запросе. </br>";
}
