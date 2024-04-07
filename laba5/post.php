<?php
const HOST = 'localhost';
const USERNAME = 'blog_user';
const PASSWORD = 'password';
const DATABASE = 'blog';

function createDBConnection(): mysqli
{
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function closeDBConnection(mysqli $conn): void
{
  $conn->close();
}


$conn = createDBConnection();

$post_id = $conn->real_escape_string($_GET['id']);

$sql = "SELECT * FROM post WHERE post_id = '$post_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
} else {
  header("Location: /404.php");
};


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
  <title><?= $row['title'] ?><?= $post_id ?></title>
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <main class="main">
    <div class="title-block container">
      <h1 class="title-block__title"><?= $row['title'] ?></h1>
      <h2 class="title-block__subtitle"><?= $row['subtitle'] ?></h2>
    </div>
    <div class="content">
      <img class="content__image" src="<?= $row['image_url'] ?>" alt="<?= $row['image_alt'] ?>">
      <div class="content__text container">
        <?= $row['content'] ?>
      </div>
    </div>
  </main>
  <?php
  include 'footer.php';
  ?>
</body>

</html>