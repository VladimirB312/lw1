<?php
include 'bdtools.php';

$conn = createDBConnection();

$method = $_SERVER['REQUEST_METHOD'];
echo $method, '<br/>';

$errors = [];

$data = getJsonData();

if ($method === 'POST' && $data) {
  if (!isset($data['title']) || strlen($data['title']) < 3)
    $errors[] = 'Invalid or missing title.';
  if (!isset($data['subtitle']) || strlen($data['subtitle']) < 3)
    $errors[] = 'Invalid or missing subtitle.';
  if (!isset($data['content']) || strlen($data['content']) < 5)
    $errors[] = 'Invalid or missing content.';
  if (!isset($data['author_name']) || strlen($data['author_name']) < 5)
    $errors[] = 'Invalid or missing author_name.';
  if (!isset($data['author_photo_url']) || strlen($data['author_photo_url']) < 5)
    $errors[] = 'Invalid or missing author_photo_url.';
  if (!isset($data['author_photo_alt']) || strlen($data['author_photo_alt']) < 2)
    $errors[] = 'Invalid or missing author_photo_alt.';
  if (!isset($data['image']) || strlen($data['image']) < 2)
    $errors[] = 'Invalid or missing image.';
  if (!isset($data['sticker']))
    $errors[] = 'Invalid or missing sticker.';
  if (!isset($data['featured']) || !($data['featured'] == 0 || $data['featured'] == 1))
    $errors[] = 'Invalid or missing featured.';
  if (!isset($data['recent']) || !($data['recent'] == 0 || $data['recent'] == 1))
    $errors[] = 'Invalid or missing recent.';

  if (empty($errors)) {
    $post_id = generate_uuid();
    $publish_date = date('Y-m-d H:i:s', time());
    $image_url = saveImage($data['image'], $post_id);

    if(!$image_url) {
      $errors[] = 'error parse image'; 
    } 

    
    $query = "INSERT INTO post
    SET 
      post_id = '$post_id',
      title = '{$data['title']}',
      subtitle = '{$data['subtitle']}',
      content = '{$data['content']}',
      author_name = '{$data['author_name']}',
      author_photo_url = '{$data['author_photo_url']}',
      author_photo_alt = '{$data['author_photo_alt']}',
      publish_date = '{$publish_date}',    
      image_alt = '{$data['image_alt']}',
      image_url = '{$image_url}',
      sticker = '{$data['sticker']}',
      featured = {$data['featured']}, 
      recent = {$data['recent']}";

    
    if ($image_url && $conn->query($query)) {
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
