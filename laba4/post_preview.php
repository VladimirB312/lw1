<a class="card" title="<?= $post['title'] ?>" href="/post?id=<?= $post['id'] ?>">
    <img class="card__image" src="<?= $post['img_src'] ?>" alt="The Road Ahead">
    <h3 class="card__title"><?= $post['title'] ?></h3>
    <h4 class="card__subtitle"><?= $post['subtitle'] ?></h4>
    <div class="card__info">
        <img class="card__author-photo" src="<?= $post['author_photo_src'] ?>" alt="Mat Vogels">
        <p class="card__author-name"><?= $post['author_name'] ?></p>
        <p class="card__date"><?= date("F j, Y", $post['date']) ?></p>
    </div>
    <?php if ($post['sticker']): ?>
        <div class="card__sticker"><?= $post['sticker'] ?></div>
    <?php endif ?>
</a>