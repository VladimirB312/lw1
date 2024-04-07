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
$feature_block_title = 'Featured Posts';
$most_recent_title = 'Most Recent';
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
      <h2 class="featured-block__title  posts-title"><?= $feature_block_title ?></h2>
      <div class="featured-block__content">
        <?php
        $sql = "SELECT * FROM post WHERE featured = 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            include 'post_preview.php';
          }
        } else {
          echo "0 results";
        };
        ?>
      </div>
    </div>
    <div class="most-recent container">
      <h2 class="most-recent__title posts-title"><?= $most_recent_title ?></h2>
      <div class="most-recent__content">
        <?php
        $sql = "SELECT * FROM post WHERE featured = 0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            include 'card_preview.php';
          }
        } else {
          echo "0 results";
        };
        ?>
      </div>
    </div>
  </main>
  <?php
  include 'footer.php';
  ?>
</body>

</html>
<?php closeDBConnection($conn, $featured = 0); ?>