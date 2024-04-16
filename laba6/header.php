<?php
$header = [
  'logo_link' => '/home',
  'logo_text' => 'Escape.',
  'menu' => [
    ['name' => 'Home', 'link' => '/home.php'],
    ['name' => 'Categories', 'link' => '#'],
    ['name' => 'About', 'link' => '#'],
    ['name' => 'Contact', 'link' => '#'],
  ],
  'banner_title' => "Let's do it together.",
  'banner_subtitle' => "We travel the world in search of stories. Come along for the ride.",
  'banner_link' => '#',
  'banner_link_text' => 'View Latest Posts',

];
?>

<header class="header-nav container">
    <a href="<?= $header['logo_link'] ?>" class="header-nav__logo">
      <?= $header['logo_text'] ?>
    </a>
    <nav class="header-nav__menu">
      <ul class="header-nav__menu-list">
        <?php foreach ($header['menu'] as $item) : ?>
          <li class="header-nav__menu-item">
            <a href="<?= $item['link'] ?>" class="header-nav__menu-link"><?= $item['name'] ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </header>