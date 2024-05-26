<?php
require_once 'api/functions.php';
checkAuth();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/styles/stylesadmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Admin</title>
</head>

<body>
    <header class="header-container">
        <div class="menu">
            <img src="images/admin_logo.svg" width="132" height="26" class="menu__logo" alt="Logo">
            <div class="menu__list">
                <a href="#" class="menu__profile">N</a>
                <button type="button" id="logoutButton" class="menu__logout"><img src="images/log-out.svg" width="24" height="24" class="menu__logout-image" alt="Logout"></a>
            </div>
    </header>

    <div class="main-header">
        <div class="main-header__caption">
            <h1 class="main-header__title">New post</h1>
            <p class="main-header__description">Fill out the form bellow and publish your article</p>
        </div>
        <input id="publishButton" type="submit" form="main-form" class="main-header__publish" value="Publish">
    </div>

    <main class="main">
        <div id="publishErrorMessage" class="fields-error hidden">
            Whoops! Some fields need your attention :o
        </div>
        <div id="publishCompleteMessage" class="publish-complete hidden">
            Publish Complete!
        </div>

        <div class="information">
            <h2 class="information__title">Main Information</h2>
            <div class="information__wrapper">
                <form id="main-form" class="information__form post">
                    <label for="titleField" class="post__title-label">Title</label>
                    <div class="post__title-field-wrapper">
                        <input type="text" id="titleField" class="post__title-field" placeholder="New Post" maxlength="50" required>
                        <p id="titleError" class="post__title-field-error hidden">Title is required</p>
                    </div>
                    <label for="descriptionField" class="post__description-label">Short description</label>
                    <div class="post__description-field-wrapper">
                        <input type="text" id="descriptionField" class="post__description-field" placeholder="Please, enter any description" maxlength="100" required>
                        <p id="descriptionError" class="post__description-field-error hidden">Short description is required</p>
                    </div>
                    <label for="authorNameField" class="post__author-name-label">Author name</label>
                    <div class="post__author-name-field-wrapper">
                        <input type="text" id="authorNameField" class="post__author-name-field" maxlength="50" required>
                        <p id="authorNameError" class="post__author-name-field-error hidden">Author name is required</p>
                    </div>
                    <label class="post__author-photo-label">Author Photo</label>
                    <div class="post__author-photo-upload">
                        <img id="loadedAuthorPhoto" src="#" class="post__author-loaded-photo hidden">
                        <div id="photoIcon" class="post__author-photo-icon"></div>
                        <label for="uploadAuhorPhotoButton" id="labelNew" class="post__author-photo-upload-label">Upload</label>
                        <input type="file" id="uploadAuhorPhotoButton" name="upload-photo" class="post__author-photo-upload-button" accept="image/jpeg, image/png, image/gif">
                        <button type="button" id="removeButtonInField" class="post__author-photo-remove-button hidden">Remove</button>
                    </div>
                    <label class="post__publish-date-label">Publish Date</label>
                    <div class="post__publish-date-field-wrapper">
                        <input type="date" id="dateField" class="post__publish-date-field" placeholder="2024-04-18">
                        <p id="publishDateError" class="post__publish-date-error hidden">Publish date is required</p>
                    </div>
                    <label class="post__hero-image-label">Hero Image</label>
                    <div class="post__hero-image-upload">
                        <img src="#" id="heroImage" class="post-hero-image-loaded hidden" width="560" height="160">
                        <label for="heroImageField" id="labelImageField" class="post__hero-image-upload-label upload-area">
                            <p class="upload-area__text">Upload</p>
                        </label>
                        <input type="file" id="heroImageField" name="hero-image" class="post__hero-image-field" accept="image/jpeg, image/png, image/gif">
                        <button type="button" id="removeHeroImage" class="post__hero-image-remove-button hidden">Remove</button>
                        <p id="descHeroImageFormat" class="post__desc-image-format">Size up to 10mb. Format: png, jpeg, gif.</p>
                    </div>
                    <label class="post__hero-small-image-label">Hero Image </label>
                    <div class="post__hero-small-image-upload">
                        <img src="#" id="heroSmallImage" class="post__hero-small-image-loaded hidden" width="296" height="150">
                        <label for="heroSmallImageField" id="labelSmallImageField" class="post__hero-small-image-upload-label small-upload-area">
                            <p class="small-upload-area__text">Upload</p>
                        </label>
                        <input type="file" id="heroSmallImageField" name="hero-small-image" class="post__hero-small-image-field" accept="image/jpeg, image/png, image/gif">
                        <button type="button" id="removeHeroSmallImage" class="post__hero-small-image-remove-button hidden">Remove</button>
                        <p id="descHeroSmallImageFormat" class="post__desc-small-image-format">Size up to 10mb. Format: png, jpeg, gif.</p>
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
                                    <h4 id="postTitle" class="article__title">New Post</h4>
                                    <h5 id="postDescription" class="article__desc">Please, enter any description</h5>
                                    <div id="previewHeroImage" class="article__image"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="information__preview-post-card card-preview">
                        <h3 class="card-prview__caption">Post card preview</h3>
                        <div class="card-preview__window">
                            <div class="card-preview__card card">
                                <div id="previewHeroSmallImage" class="card__image"></div>
                                <h3 id="cardTitle" class="card__title"></h3>
                                <h4 id="cardDescription" class="card__desc"></h4>
                                <div class="card__info">
                                    <div id="cardAuthorPhoto" class="card__author-photo"></div>
                                    <p id="cardAuthorName" class="card__author-name"></p>
                                    <p id="cardDate" class="card__date">4/19/2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <h2 class="content__caption">Content</h2>
            <label for="contentText" class="content__text-label">Post content (plain text)</label>
            <textarea id="contentText" class="content__text-area" placeholder="Type anything you want ..."></textarea>
            <p id="contentTextError" class="content__text-area-error hidden">Post content is required</p>
        </div>
    </main>
    <script src="admin.js"></script>
</body>

</html>