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