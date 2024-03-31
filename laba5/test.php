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
  echo "Connected successfully<br>";
  return $conn;
}

function closeDBConnection(mysqli $conn): void
{
  $conn->close();
}

function getAndPrintPostsFromDB(mysqli $conn): void
{
  $sql = "SELECT * FROM post";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if ($row['featured']) {
        include 'post_preview.php';
      }
    }
  } else {
    echo "0 results";
  };
}

$conn = createDBConnection();
getAndPrintPostsFromDB($conn);
closeDBConnection($conn);
