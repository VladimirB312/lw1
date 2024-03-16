<?php
$posts = [
  [ 
    'id' => 1,
    'sticker' => '',
    'img_src' => './static/images/roadahead.jpg',
    'title' => 'The Road Ahead',
    'subtitle' => 'The road ahead might be paved - it might not be.',
    'author_photo_src' => './static/images/matvogels.jpg',
    'author_name' => 'Mat Vogels',
    'date' => 1443139200,
  ],
  [
    'id' => 2,
    'sticker' => 'adventure',
    'img_src' => './static/images/fromtop.jpg',
    'title' => 'From Top Down',
    'subtitle' => 'Once a year, go someplace you’ve never been before.',
    'author_photo_src' => './static/images/william.jpg',
    'author_name' => 'William Wong',
    'date' => 1443139200,
  ],
];
?>

<?php
$cards = [
  [ 
    'id' => 3,
    'card_link' => '#',
    'img_src' => './static/images/still.jpg',
    'title' => 'Still Standing Tall',
    'subtitle' => 'Life begins at the end of your comfort zone.',
    'author_photo_src' => './static/images/william.jpg',
    'author_name' => 'William Wong',
    'date' => 1443139200,
  ],
  [
    'id' => 4,
    'card_link' => '#',
    'img_src' => './static/images/sunny.jpg',
    'title' => 'Sunny Side Up',
    'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
    'author_photo_src' => './static/images/matvogels.jpg',
    'author_name' => 'Mat Vogels',
    'date' => 1443139200,
  ],
  [
    'id' => 5,
    'card_link' => '#',
    'img_src' => './static/images/water.jpg',
    'title' => 'Water Falls',
    'subtitle' => 'We travel not to escape life, but for life not to escape us.',
    'author_photo_src' => './static/images/matvogels.jpg',
    'author_name' => 'Mat Vogels',
    'date' => 1443139200,
  ],
  [
    'id' => 6,
    'card_link' => '#',
    'img_src' => './static/images/through.jpg',
    'title' => 'Through the Mist',
    'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
    'author_photo_src' => './static/images/william.jpg',
    'author_name' => 'William Wong',
    'date' => 1443139200,
  ],
  [
    'id' => 7,
    'card_link' => '#',
    'img_src' => './static/images/awaken.jpg',
    'title' => 'Awaken Early',
    'subtitle' => 'Not all those who wander are lost.',
    'author_photo_src' => './static/images/matvogels.jpg',
    'author_name' => 'Mat Vogels',
    'date' => 1443139200,
  ],
  [
    'id' => 8,
    'card_link' => '#',
    'img_src' => './static/images/tryit.jpg',
    'title' => 'Try it Always',
    'subtitle' => 'The world is a book, and those who do not travel read only one page.',
    'author_photo_src' => './static/images/matvogels.jpg',
    'author_name' => 'Mat Vogels',
    'date' => 1443139200,
  ],
];
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
  <div class="header">
    <header class="header-nav container">
      <a href="#" class="header-nav__logo">
        Escape.
      </a>
      <nav class="header-nav__menu">
        <ul class="header-nav__menu-list">
          <li class="header-nav__menu-item">
            <a href="#" class="header-nav__menu-link">Home</a>
          </li>
          <li class="header-nav__menu-item">
            <a href="#" class="header-nav__menu-link">Categories</a>
          </li>
          <li class="header-nav__menu-item">
            <a href="#" class="header-nav__menu-link">About</a>
          </li>
          <li class="header-nav__menu-item">
            <a href="#" class="header-nav__menu-link">Contact</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="banner container">
      <h1 class="banner__title">Let's do it together.</h1>
      <h2 class="banner__subtitle">We travel the world in search of stories. Come along for the ride.</h2>
      <div class="banner__link">
        <a href="#" class="banner__link-text">View Latest Posts</a>
      </div>
    </div>
  </div>
  <div class="navigation-block container">
    <ul class="navigation-block__menu-list">
      <li class="navigation-block__menu-item">
        <a href="#" class="navigation-block__menu-link">Nature</a>
      </li>
      <li class="navigation-block__menu-item">
        <a href="#" class="navigation-block__menu-link">Photography</a>
      </li>
      <li class="navigation-block__menu-item">
        <a href="#" class="navigation-block__menu-link">Relaxation</a>
      </li>
      <li class="navigation-block__menu-item">
        <a href="#" class="navigation-block__menu-link">Vacation</a>
      </li>
      <li class="navigation-block__menu-item">
        <a href="#" class="navigation-block__menu-link">Travel</a>
      </li>
      <li class="navigation-block__menu-item">
        <a href="#" class="navigation-block__menu-link">Adventure</a>
      </li>
    </ul>
  </div>
  <main class="main-block">
    <div class="featured-block container">
      <h2 class="featured-block__title  posts-title">Featured Posts</h2>
      <div class="featured-block__content">
        <?php
        foreach ($posts as $post) {
          include 'post_preview.php';
        }
        ?>
      </div>
    </div>
    <div class="most-recent container">
      <h2 class="most-recent__title posts-title">Most Recent</h2>
      <div class="most-recent__content">
        <?php
        foreach ($cards as $card) {
          include 'card_preview.php';
        }
        ?>
      </div>
    </div>
  </main>
  <footer class="footer">
    <div class="footer__background">
      <div class="footer__link container">
        <a href="#" class="footer__logo-image">
          Escape.
        </a>
        <nav class="footer__menu">
          <ul class="footer__menu-list">
            <li class="footer__menu-item">
              <a href="#" class="footer__menu-link">Home</a>
            </li>
            <li class="footer__menu-item">
              <a href="#" class="footer__menu-link">Categories</a>
            </li>
            <li class="footer__menu-item">
              <a href="#" class="footer__menu-link">About</a>
            </li>
            <li class="footer__menu-item">
              <a href="#" class="footer__menu-link">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </footer>
</body>

</html>