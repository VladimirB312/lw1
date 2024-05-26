<?php
$footer = [
  'logo_link' => '/home',
  'logo_text' => 'Escape.',
  'menu' => [
    ['name' => 'Home', 'link' => '/home.php'],
    ['name' => 'Categories', 'link' => '#'],
    ['name' => 'About', 'link' => '#'],
    ['name' => 'Contact', 'link' => '#'],
  ],
];
?>

<footer class="footer">
  <form class="footer__sub-form sub-form">
    <h2 class="sub-form__title">Stay in Touch</h2>
    <div class="sub-form__input-wrapper">
      <input type="text" class="sub-form__input-email" placeholder="Enter your email address" required>
      <input type="submit" class="sub-form__submit-button" value="Submit">
    </div>
  </form>
  <div class="footer__background">
    <div class="footer__link container">
      <a href="<?= $footer['logo_link'] ?>" class="footer__logo-image">
        <?= $footer['logo_text'] ?>
      </a>
      <nav class="footer__menu">
        <ul class="footer__menu-list">
          <?php foreach ($footer['menu'] as $item) : ?>
            <li class="footer__menu-item">
              <a href="<?= $item['link'] ?>" class="footer__menu-link"><?= $item['name'] ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      </nav>
    </div>
  </div>
</footer>