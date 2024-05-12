document.addEventListener("DOMContentLoaded", () => {
    const postData = {
        title: '',
        description: '',
        authorName: '',
        authorPhoto: '',
        publishDate: '',
        heroImage: '',
        cardHeroImage: '',
        postTextContent: '',
    }

    const postPreview = {
        postTitle: document.getElementById('postTitle'),
        cardTitle: document.getElementById('cardTitle'),
        postDescription: document.getElementById('postDescription'),
        cardDescription: document.getElementById('cardDescription'),
        cardAuthorName: document.getElementById('cardAuthorName'),
        cardPhoto: document.getElementById('cardAuthorPhoto'),
        postPreviewHeroImage: document.getElementById('previewHeroImage'),
        cardPreviewHeroImage: document.getElementById('previewHeroSmallImage'),
        cardDatePreview: document.getElementById('cardDate'),
    }

    function readFileAsBase64(file, onLoad) {
        const reader = new FileReader();

        reader.addEventListener("load", () => {
            onLoad(reader.result)
        });

        reader.readAsDataURL(file)
    }

    function handleInputTitle(event) {
        postData.title = titleField.value;
        titleError.classList.add('disable');
        titleField.classList.remove('red-border-bottom');

        rerenderPostPreview();
    }

    function handleInputDescription(event) {
        postData.description = descriptionField.value;
        descriptionError.classList.add('disable');
        descriptionField.classList.remove('red-border-bottom');        

        rerenderPostPreview();
    }

    function handleInputAuthorName(event) {
        postData.authorName = authorNameField.value;
        authorNameError.classList.add('disable');
        authorNameField.classList.remove('red-border-bottom');       

        rerenderPostPreview();
    }

    function handleChangeAuthorPhoto(event) {
        const tempFile = uploadAuhorPhotoButton.files[0]

        readFileAsBase64(
            tempFile,
            (base64) => {
                postData.authorPhoto = base64;

                rerenderPostPreview()
            })

        loadedAuthorPhoto.classList.remove('post__author-loaded-photo_disabled');
        photoIcon.classList.add('post__author-photo-icon_disabled');
        labelNew.classList.add('post__author-photo-upload-label-new');
        labelNew.textContent = buttonUploadNewText;
        removeAuthorPhotoButton.classList.remove('post__author-photo-remove-button_disabled');
    }

    function handleRemoveAuthorPhoto(event) {
        postData.authorPhoto = '';
        loadedAuthorPhoto.classList.add('post__author-loaded-photo_disabled');
        photoIcon.classList.remove('post__author-photo-icon_disabled');
        labelNew.classList.remove('post__author-photo-upload-label-new');
        labelNew.textContent = buttonUploadText;
        removeAuthorPhotoButton.classList.add('post__author-photo-remove-button_disabled');

        rerenderPostPreview();
    }


    function handleChangeHeroImage(event) {
        const tempFile = uploadHeroImageButton.files[0]

        readFileAsBase64(
            tempFile,
            (base64) => {
                postData.heroImage = base64;

                rerenderPostPreview()
            }
        )


        loadedHeroImage.classList.remove('disable');
        labelImageField.classList.add('upload-area_loaded');
        removeHeroImageButton.classList.remove('disable');
        descHeroImageFormat.classList.add('disable');
    }

    function handleRemoveHeroImage(event) {
        postData.heroImage = '';
        loadedHeroImage.classList.add('disable');
        labelImageField.classList.remove('upload-area_loaded');
        removeHeroImageButton.classList.add('disable');
        descHeroImageFormat.classList.remove('disable');

        rerenderPostPreview();
    }

    function handleChangeHeroSmallImage(event) {
        const tempFile = uploadHeroSmallImageButton.files[0]

        readFileAsBase64(
            tempFile,
            (base64) => {
                postData.cardHeroImage = base64;

                rerenderPostPreview()
            })

        loadedHeroSmallImage.classList.remove('disable');
        labelSmallImageField.classList.add('upload-area_loaded');
        removeHeroSmallImage.classList.remove('disable');
        descHeroSmallImageFormat.classList.add('disable');
    }

    function handleRemoveHeroSmallImage(event) {
        postData.cardHeroImage = '';
        loadedHeroSmallImage.classList.add('disable');
        labelSmallImageField.classList.remove('upload-area_loaded');
        removeHeroSmallImage.classList.add('disable');
        descHeroSmallImageFormat.classList.remove('disable');

        rerenderPostPreview();
    }

    function handleChangePublishDate(event) {
        postData.publishDate = dateField.value;
        publishDateError.classList.add('disable');
        dateField.classList.remove('red-border-bottom');

        rerenderPostPreview();
    }

    function handleChangeContentText(event) {
        postData.postTextContent = contentText.value;
        contentTextError.classList.add('disable');
        contentText.classList.remove('red-border');

        rerenderPostPreview();
    }

    function handlePublishPostButton(event) {
        event.preventDefault();

        if (validatePostData()) {
            console.log(JSON.stringify(postData));
            publishCompleteMessage.classList.remove('disable');
            publishErrorMessage.classList.add('disable');
        } else {
            publishErrorMessage.classList.remove('disable');
        }
        validatePostData()
        rerenderPostPreview();
    }

    function validatePostData() {
        let isValidPost = true;

        if (postData.title.length < 5) {
            isValidPost = false;
            titleError.classList.remove('disable');
            titleField.classList.add('red-border-bottom');
        }

        if (postData.description.length < 5) {
            isValidPost = false;
            descriptionError.classList.remove('disable');
            descriptionField.classList.add('red-border-bottom');
        }

        if (postData.authorName.length < 5) {
            isValidPost = false;
            authorNameError.classList.remove('disable');
            authorNameField.classList.add('red-border-bottom');
        }

        if (postData.publishDate === '') {
            isValidPost = false;
            publishDateError.classList.remove('disable');
            dateField.classList.add('red-border-bottom');
        }

        if (postData.postTextContent.length < 5) {
            isValidPost = false;
            contentTextError.classList.remove('disable');
            contentText.classList.add('red-border');
        }

        if (postData.authorPhoto === '' ||
            postData.heroImage === '' ||
            postData.cardHeroImage === ''
        ) {
            isValidPost = false; 
        }

        return isValidPost;
    }

    const titleField = document.getElementById('titleField');
    const descriptionField = document.getElementById('descriptionField');
    const authorNameField = document.getElementById('authorNameField');

    const uploadAuhorPhotoButton = document.getElementById('uploadAuhorPhotoButton');
    const loadedAuthorPhoto = document.getElementById('loadedAuthorPhoto');
    const photoIcon = document.getElementById('photoIcon');
    const labelNew = document.getElementById('labelNew');
    const removeAuthorPhotoButton = document.getElementById('removeButtonInField');
    const buttonUploadNewText = 'Upload New';
    const buttonUploadText = 'Upload';

    const uploadHeroImageButton = document.getElementById('heroImageField');
    const loadedHeroImage = document.getElementById('heroImage');
    const labelImageField = document.getElementById('labelImageField');
    const descHeroImageFormat = document.getElementById('descHeroImageFormat');
    const removeHeroImageButton = document.getElementById('removeHeroImage');

    const uploadHeroSmallImageButton = document.getElementById('heroSmallImageField');
    const loadedHeroSmallImage = document.getElementById('heroSmallImage');
    const labelSmallImageField = document.getElementById('labelSmallImageField');
    const descHeroSmallImageFormat = document.getElementById('descHeroSmallImageFormat');
    const removeHeroSmallImage = document.getElementById('removeHeroSmallImage');

    const dateField = document.getElementById('dateField');

    const contentText = document.getElementById('contentText');

    const publishButton = document.getElementById('publishButton');
    const publishCompleteMessage = document.getElementById('publishCompleteMessage');
    const publishErrorMessage = document.getElementById('publishErrorMessage');

    //константы для подсветки ошибок   
    const titleError = document.getElementById('titleError');
    const descriptionError = document.getElementById('descriptionError');
    const authorNameError = document.getElementById('authorNameError');
    const publishDateError = document.getElementById('publishDateError');
    const contentTextError = document.getElementById('contentTextError');

    function initEventListeners() {
        titleField.addEventListener('input', handleInputTitle);
        descriptionField.addEventListener('input', handleInputDescription);
        authorNameField.addEventListener('input', handleInputAuthorName);
        uploadAuhorPhotoButton.addEventListener('change', handleChangeAuthorPhoto);
        removeAuthorPhotoButton.addEventListener('click', handleRemoveAuthorPhoto);
        uploadHeroImageButton.addEventListener('change', handleChangeHeroImage);
        removeHeroImageButton.addEventListener('click', handleRemoveHeroImage);
        uploadHeroSmallImageButton.addEventListener('change', handleChangeHeroSmallImage);
        removeHeroSmallImage.addEventListener('click', handleRemoveHeroSmallImage);
        dateField.addEventListener('change', handleChangePublishDate);
        contentText.addEventListener('input', handleChangeContentText);
        publishButton.addEventListener('click', handlePublishPostButton);
    }


    function rerenderPostPreview() {
        postPreview.postTitle.textContent = postData.title;
        postPreview.cardTitle.textContent = postData.title

        postPreview.postDescription.textContent = postData.description;
        postPreview.cardDescription.textContent = postData.description;

        postPreview.cardAuthorName.textContent = postData.authorName;

        if (postData.authorPhoto != '') {
            postPreview.cardPhoto.style.backgroundImage = 'url(' + postData.authorPhoto + ')';
            loadedAuthorPhoto.src = postData.authorPhoto;
        } else {
            postPreview.cardPhoto.style.backgroundImage = 'none';
            loadedAuthorPhoto.src = '#';
            uploadAuhorPhotoButton.value = '';
        }

        if (postData.heroImage != '') {
            postPreview.postPreviewHeroImage.style.backgroundImage = 'url(' + postData.heroImage + ')';
            loadedHeroImage.src = postData.heroImage;
        } else {
            postPreview.postPreviewHeroImage.style.backgroundImage = 'none';
            loadedHeroImage.src = '#';
            uploadHeroImageButton.value = '';
        }

        if (postData.cardHeroImage != '') {
            postPreview.cardPreviewHeroImage.style.backgroundImage = 'url(' + postData.cardHeroImage + ')';
            loadedHeroSmallImage.src = postData.cardHeroImage;
        } else {
            postPreview.cardPreviewHeroImage.style.backgroundImage = 'none';
            loadedHeroSmallImage.src = '#';
            uploadHeroSmallImageButton.value = '';
        }

        postPreview.cardDatePreview.textContent = postData.publishDate;
    }

    initEventListeners()
    rerenderPostPreview()
});