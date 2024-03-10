<a class="card__link <?= $post['sticker'] ?>" href="<?= $post['post_link'] ?>">
    <img class="card__image" src="<?= $post['img_link'] ?>" alt="The Road Ahead">
    <h3 class="card__title"><?= $post['title'] ?></h3>
    <h4 class="card__subtitle"><?= $post['subtitle'] ?></h4>
    <div class="card__info">
        <img class="card__author-photo" src="<?= $post['author_photo'] ?>" alt="Mat Vogels">
        <p class="card__author-name"><?= $post['author_name'] ?></p>
        <p class="card__date"><?= $post['date'] ?></p>
    </div>
</a>