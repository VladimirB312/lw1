<?php
$header_banner = [
  'banner_title' => "Let's do it together.",
  'banner_subtitle' => "We travel the world in search of stories. Come along for the ride.",
  'banner_link' => '#',
  'banner_link_text' => 'View Latest Posts',

];
?>

<div class="header">
<?php
  include 'header.php';
  ?>
  <div class="banner container">
    <h1 class="banner__title"><?= $header_banner['banner_title'] ?></h1>
    <h2 class="banner__subtitle"><?= $header_banner['banner_subtitle'] ?></h2>
    <div class="banner__link">
      <a href="<?= $header_banner['banner_link'] ?>" class="banner__link-text"><?= $header_banner['banner_link_text'] ?></a>
    </div>
  </div>
</div>