<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/styles/newpost.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <title>New post</title>
</head>

<body>
    <header class="header-container">
        <div class="menu">
            <img src="images/admin_logo.svg" width="132" height="26" class="menu__logo" alt="Logo">
            <div class="menu__list">
                <a href="#" class="menu__profile">N</a>
                <a href="#" class="menu__logout"><img src="images/log-out.svg" width="24" height="24" class="menu__logout-image" alt="Logout"></a>
            </div>
    </header>

    <div class="main-header">
        <div class="main-header__caption">
            <h1 class="main-header__title">New post</h1>
            <p class="main-header__description">Fill out the form bellow and publish your article</p>
        </div>
        <input type="submit" class="main-header__publish" value="Publish">
    </div>

    <main class="main">
        <div class="fields-error">
            Whoops! Some fields need your attention :o
        </div>
        <div class="publish-complete">
            Publish Complete!
        </div>

        <div class="information">
            <h2 class="information__title">Main Information</h2>
            <div class="information__wrapper">
                <form class="information__form post">
                    <label class="post__title-label">Title</label>
                    <input type="text" class="post__title-field" placeholder="New Post">
                    <label class="post__subscription-label">Short description</label>
                    <input type="text" class="post__subscription-field" placeholder="Please, enter any description">
                    <label class="post__author-name-label">Author name</label>
                    <input type="text" class="post__author-name-field">
                    <label class="post__author-photo-label">Author Photo</label>
                    <div class="post__author-photo-upload">
                        <div class="post__author-photo-icon"></div>
                        <label for="upload-photo-button" class="post__author-photo-upload-label">Upload</label>
                        <input type="file" id="upload-photo-button" name="upload-photo" class="post__author-photo-upload-button">
                    </div>
                    <label class="post__publish-date-label">Publish Date</label>
                    <input type="date" class="post__publish-date-field" value="2024-04-18">
                    <label class="post__hero-image-label">Hero Image</label>
                    <div class="post__hero-image-upload">
                        <label for="hero-image" class="post__hero-image-upload-label upload-area">
                            <p class="upload-area__text">Upload</p>
                        </label>
                        <input type="file" id="hero-image" name="hero-image" class="post__hero-image-field">
                        <p class="post__desc-image-format">Size up to 10mb. Format: png, jpeg, gif.</p>
                    </div>
                    <label class="post__hero-small-image-label">Hero Image </label>
                    <div class="post__hero-small-image-upload">
                        <label for="hero-small-image" class="post__hero-small-image-upload-label small-upload-area">
                            <p class="small-upload-area__text">Upload</p>
                        </label>
                        <input type="file" id="hero-small-image" name="hero-small-image" class="post__hero-small-image-field">
                        <p class="post__desc-small-image-format">Size up to 10mb. Format: png, jpeg, gif.</p>
                    </div>
                </form>
                <div class="information__preview">
                    <div class="information__preview-article article-preview">
                        <h3 class="article-prview__caption">Article preview</h3>
                        <div class="article-preview__window">
                            <div class="article-preview__tab">
                                <div class="article-preview__tab-panel">
                                    <div class="article-preview__tab-panel-dot"></div>
                                    <div class="article-preview__tab-panel-dot"></div>
                                    <div class="article-preview__tab-panel-dot"></div>
                                </div>
                                <div class="article-preview__page article">
                                    <h4 class="article__title">New Post</h4>
                                    <h5 class="article__desc">Please, enter any description</h5>
                                    <div class="article__image"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="information__preview-post-card card-preview">
                        <h3 class="card-prview__caption">Post card preview</h3>
                        <div class="card-preview__window">
                            <div class="card-preview__card card">
                                <div class="card__image"></div>
                                <h3 class="card__title">New Post</h3>
                                <h4 class="card__desc">Please, enter any description</h4>
                                <div class="card__info">
                                    <img src="/images/plug.png" class="card__author-photo" width="26px" height="26px">
                                    <p class="card__author-name">Enter author name</p>
                                    <p class="card__date">4/19/2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <h2 class="content__caption">Content</h2>
            <label class="content__text-label">Post content (plain text)</label>
            <textarea class="content__text-area" placeholder="Type anything you want ..."></textarea>
        </div>
    </main>
</body>

</html>