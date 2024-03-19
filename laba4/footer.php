<footer class="footer">
    <div class="footer__background">
        <div class="footer__link container">
            <a href="<?= $footer['logo_link'] ?>" class="footer__logo-image">
                <?= $footer['logo_text'] ?>
            </a>
            <nav class="footer__menu">
                <ul class="footer__menu-list">
                    <?php foreach($footer['menu'] as $item) : ?>
                    <li class="footer__menu-item">
                        <a href="<?= $item['link'] ?>" class="footer__menu-link"><?= $item['name'] ?></a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
    </div>
</footer>