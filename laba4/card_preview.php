<a class="recent-card" title="<?= $card['title'] ?>" href="/post?id=<?= $card['id'] ?>">
    <img class="recent-card__image" src="<?= $card['img_src'] ?>">
    <h3 class="recent-card__title"><?= $card['title'] ?></h3>
    <h4 class="recent-card__subtitle"><?= $card['subtitle'] ?></h4>
    <div class="recent-card__info">
        <img class="recent-card__author-photo" src="<?= $card['author_photo_src'] ?>">
        <p class="recent-card__author-name"><?= $card['author_name'] ?></p>
        <p class="recent-card__date"><?= date("n/j/Y", $card['date']) ?></p>
    </div>
</a>