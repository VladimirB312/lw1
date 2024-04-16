<?php
include 'mysql.php';

$conn = createDBConnection();
$posts = getPostsFromDB($conn);
closeDBConnection($conn);
$featureBlockTitle = 'Featured Posts';
$mostRecentTitle = 'Most Recent';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="static/styles/styleshome.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
  <title>Home</title>
</head>

<body>
  <?php
  include 'home_header.php';
  ?>
  <?php
  include 'home_navigation.php';
  ?>
  <main class="main-block">
    <div class="featured-block container">
      <h2 class="featured-block__title  posts-title"><?= $featureBlockTitle ?></h2>
      <div class="featured-block__content">
        <?php
        foreach ($posts as $post) {
          if ($post['featured']) {
            include 'post_preview.php';
          }
        }
        ?>
      </div>
    </div>
    <div class="most-recent container">
      <h2 class="most-recent__title posts-title"><?= $mostRecentTitle ?></h2>
      <div class="most-recent__content">
        <?php
        foreach ($posts as $post) {
          if ($post['recent']) {
            include 'card_preview.php';
          }
        }
        ?>
      </div>
    </div>
  </main>
  <?php
  include 'footer.php';
  ?>
</body>

</html>