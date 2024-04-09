<?php
include 'mysql.php';

$conn = createDBConnection();

$method = $_SERVER['REQUEST_METHOD'];
echo $method, '<br/>';

$errors = [];


if ($method === 'POST' && $dataAsArray = getJsonData()) {
  if (!isset($dataAsArray['title']) || strlen($dataAsArray['title']) < 3)
    $errors[] = 'Invalid or missing title.';
  if (!isset($dataAsArray['subtitle']) || strlen($dataAsArray['subtitle']) < 3)
    $errors[] = 'Invalid or missing subtitle.';
  if (!isset($dataAsArray['content']) || strlen($dataAsArray['content']) < 5)
    $errors[] = 'Invalid or missing content.';
  if (!isset($dataAsArray['author_name']) || strlen($dataAsArray['author_name']) < 5)
    $errors[] = 'Invalid or missing author_name.';
  if (!isset($dataAsArray['author_photo_url']) || strlen($dataAsArray['author_photo_url']) < 5)
    $errors[] = 'Invalid or missing author_photo_url.';
  if (!isset($dataAsArray['author_photo_alt']) || strlen($dataAsArray['author_photo_alt']) < 2)
    $errors[] = 'Invalid or missing author_photo_alt.';
  if (!isset($dataAsArray['image']) || strlen($dataAsArray['image']) < 2)
    $errors[] = 'Invalid or missing image.';
  if (!isset($dataAsArray['sticker']))
    $errors[] = 'Invalid or missing sticker.';
  if (!isset($dataAsArray['featured']) || !($dataAsArray['featured'] == 0 || $dataAsArray['featured'] == 1))
    $errors[] = 'Invalid or missing featured.';
  if (!isset($dataAsArray['recent']) || !($dataAsArray['recent'] == 0 || $dataAsArray['recent'] == 1))
    $errors[] = 'Invalid or missing recent.'; 

  if (empty($errors)) {
    $post_id = generate_uuid();
    $publish_date = date('Y-m-d H:i:s', time());
    $image_url = '';
    saveImage($dataAsArray['image'], $post_id, $image_url);
    $sql = "INSERT INTO post
      SET 
        post_id = '$post_id',
        title = '{$dataAsArray['title']}',
        subtitle = '{$dataAsArray['subtitle']}',
        content = '{$dataAsArray['content']}',
        author_name = '{$dataAsArray['author_name']}',
        author_photo_url = '{$dataAsArray['author_photo_url']}',
        author_photo_alt = '{$dataAsArray['author_photo_alt']}',
        publish_date = '{$publish_date}',    
        image_alt = '{$dataAsArray['image_alt']}',
        image_url = '{$image_url}',
        sticker = '{$dataAsArray['sticker']}',
        featured = {$dataAsArray['featured']}, 
        recent = {$dataAsArray['recent']}";
    if ($conn->query($sql)) {
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
