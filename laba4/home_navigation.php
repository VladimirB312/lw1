<?php
$navigation = [
  ['name' => 'Nature', 'link' => '#'],
  ['name' => 'Photography', 'link' => '#'],
  ['name' => 'Relaxation', 'link' => '#'],
  ['name' => 'Vacation', 'link' => '#'],
  ['name' => 'Travel', 'link' => '#'],
  ['name' => 'Adventure', 'link' => '#'],
];
?>

<div class="navigation-block container">
  <ul class="navigation-block__menu-list">
    <?php foreach ($navigation as $nav_item) : ?>
      <li class="navigation-block__menu-item">
        <a href="<?= $nav_item['link'] ?>" class="navigation-block__menu-link"><?= $nav_item['name'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>