<?php
include 'bdtools.php';

$conn = createDBConnection();

$post_id = isset($_GET['id'])
  ? $conn->real_escape_string($_GET['id'])
  : null;

if (!$post_id) {
  header("Location: /404.php");
  return;
}

$post = getPostFromDB($conn, $post_id);
if (!$post) {  
  header("Location: /404.php");
  return;  
}

$post['content'] = explode("\n", $post['content']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/stylespost.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
  <title><?= $post['title'] ?><?= $post_id ?></title>
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <main class="main">
    <div class="title-block container">
      <h1 class="title-block__title"><?= $post['title'] ?></h1>
      <h2 class="title-block__subtitle"><?= $post['subtitle'] ?></h2>
    </div>
    <div class="content">
      <img class="content__image" src="<?= $post['image_url'] ?>" alt="<?= $post['image_alt'] ?>">
      <div class="content__text container">
        <?php foreach ($post['content'] as $paragrah) : ?>
          <p class="content__paragraph"><?= $paragrah ?></p>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
  <?php
  include 'footer.php';
  ?>
</body>

</html>